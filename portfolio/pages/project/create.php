<?php
include '../../path.php';
include ROOT_PATH . '/components/header.php';
include ROOT_PATH . '/functions/functions.php';

if (isset($_POST['submit_btn'])) {
  $titre = $_POST['titre'];
  $description = $_POST['description'];
  $creat_at = $_POST['creat_at'];
  $erreur = [];
  $image = "";
  if (empty($titre) || !preg_match('/^[a-zA-Z]+$/', $titre)) {
    $erreur['titre'] = "Veuillez entrer un titre valide";
  }
  if (empty($description)) {
    $erreur['description'] = "Veuillez entrer une description";
  }
  if (empty($creat_at)) {
    $erreur['creat_at'] = "Veuillez entrer une date";
  }
  if (empty($image)) {
    $erreur['image'] = "Veuillez entrer une image";
  }
  if (empty($erreur)) {
    $stmt = $pdo->prepare('INSERT INTO projects(titre, description, creat_at, image) VALUES(?, ?, ?, ?)');
    $stmt->execute([$titre, $description, $creat_at, $image]);
    $image_name = $_FILES['product_image']['name'];
    //On spécifie le dossier de destination du stockage des image
    $destination = ROOT_PATH . "/upload" . $image_name;
    //On récupère le stockage temporaire de l'image
    $tmp_name = $_FILES["product_image"]["tmp_name"];
    //On déplace l'image du dossier temporaire vers le dossier de destination
    $result = move_uploaded_file($tmp_name, $destination);
    if ($result) {
      $image = $image_name;

      $pdo = getPdo();
      // Insertion des données dans la table marque
      $req = "INSERT INTO projets(titre, description, create_at, user_id, photo) VALUES (?, ?, ?, ?, ?)";
      $statement = $pdo->prepare($req);
      $statement->execute([$titre, $description, $creat_at, $image]);

    }
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
      <form method="post" action="">
        <div>
          <label class="form-label">Titre</label>
          <input type="text" name="titre" class="form-control" placeholder="javascript">
          <?php if (isset($erreur['titre'])): ?><br>
            <span style="color: red;"><?= $erreur['titre'] ?></span>
          <?php endif; ?>
        </div>
        <div>
          <label for="file" class="form-label">Télécharger une image:</label><br>
          <input type="file" name="image">
          <?php if (isset($erreur['image'])): ?><br>
            <span style="color: red;"><?= $erreur['image'] ?></span>
          <?php endif; ?>
        </div>
        <div>
          <label class="form-label">Indiquer la date</label><br>
          <input type="date" name="creat_at"><br>
          <?php if (isset($erreur['creat_at'])): ?>
            <span style="color: red;"><?= $erreur['creat_at'] ?></span>
          <?php endif; ?>
        </div>
        <div>
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="3"></textarea>
          <?php if (isset($erreur['description'])): ?>
            <span style="color: red;"><?= $erreur['description'] ?></span>
          <?php endif; ?>
      </div>
      <div class="mt-3">
        <button name="submit_btn" type="submit">Valider</button>
      </div>
    </form>
  </div>
</div>