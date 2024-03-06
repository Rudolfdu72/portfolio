<?php
session_start();
include '../../path.php';
include ROOT_PATH . '/components/header.php';

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
    //$req->bindValue(':url', $destination);
    $req->bindValue(':url', $image_name);
    $req->bindValue(':user_id', $_SESSION['user']['id']);
    $req->execute();

  }
}
?>
<div class="d-flex justify-content-end pt-5 px-3">
  <a href="/portfolio/admin/index.php">
    <button class="btn btn-secondary btn-sm">Retour au tableau de bord</button>
  </a>
</div>

<div class="container d-flex justify-content-center">
  <a href="<?php echo BASE_URL; ?>/pages/project/index.php">
    <button id="account_btn">Afficher la liste des projets</button>
  </a>
</div>

<div class=" pt-5">
  <h1 class="text-center">Enregistrement de projet</h1>
</div>
<div class="container pt-5">
  <div class="row">
    <div class="col-12 col-md-8 mx-auto">
      <!-- Votre formulaire ici -->
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div>
          <label class="form-label">Titre</label>
          <input type="text" name="titre" class="form-control" placeholder="javascript">
          <?php if (isset($erreur['titre'])): ?>
            <p class="text-danger">
              <?= $erreur['titre'] ?>
            </p>
          <?php endif; ?>
        </div>

        <div>
          <label for="file" class="form-label">Télécharger une image:</label><br>
          <input type="file" name="image">
          <?php if (isset($erreur['image'])): ?>
            <p class="text-danger">
              <?= $erreur['image'] ?>
            </p>
          <?php endif; ?>
        </div>
        <div>
          <label class="form-label">Indiquer la date</label><br>
          <input type="date" name="creat_at"><br>
          <?php if (isset($erreur['creat_at'])): ?>
            <p class="text-danger">
              <?= $erreur['creat_at'] ?>
            </p>
          <?php endif; ?>
        </div>

        <div>
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="3"></textarea>
          <?php if (isset($erreur['description'])): ?>
            <p class="text-danger">
              <?= $erreur['description'] ?>
            </p>
          <?php endif; ?>
        </div>
        <div class="mt-3">
          <button name="submit_btn" type="submit">Valider</button>
        </div>
      </form>
    </div>
  </div>