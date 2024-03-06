<?php
// include ROOT_PATH . '/components/header.php';

destroyingSession();
$erreur = [];
if (isset($_POST['submit_btn'])) {
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $creat_at = $_POST['creat_at'];
  $image_name = $_FILES['image']['name']; // nom de notre fichier
  $image_tmp_name = $_FILES['image']['tmp_name']; // dossier temporaire
  $image_error = $_FILES['image']['error']; // valeur d'erreur de notre image



  if (empty($titre)) {
    $erreur['titre'] = "Le titre est obligatoire";
  }
  if (empty($description)) {
    $erreur['description'] = "La description est obligatoire";
  }
  if (empty($creat_at)) {
    $erreur['creat_at'] = "La date est obligatoire";
  }
  if (empty($image_name)) {
    $erreur['image'] = "L'image est obligatoire";
  }
  // récupérer des informations sur notre image
  if (!$image_error === 0) {
    $erreur['image'] = "Erreur de téléchargement de l'image";
  }

  if (count($erreur) === 0){

    // Enregistrer l'image dans notre dossier uploads
    $destination = ROOT_PATH . "/upload/" . $image_name; // uploads/1.png
    move_uploaded_file($image_tmp_name, $destination);

    $pdo = getPdo();
    $req = $pdo->prepare('INSERT INTO projets (titre, description, created_at, photo, user_id) 
              VALUES (:titre, :description, :created_at, :url, :user_id)');

    $req->bindValue(':titre', $titre);
    $req->bindValue(':description', $description);
    $req->bindValue(':created_at', $creat_at);
    $req->bindValue(':url', $destination);
    $req->bindValue(':user_id', $_SESSION['user']['id']);
    $req->execute();

  }
}