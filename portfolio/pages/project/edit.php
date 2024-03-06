<?php
session_start();
include '../../path.php';
include ROOT_PATH . '/components/header.php';
include ROOT_PATH . '/pages/project/imgrecup.php';
destroyingSession();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $pdo = getPdo();
  $req = $pdo->prepare("SELECT * FROM projets WHERE id = ?");
  $req->execute(array($id));
  $data = $req->fetch();
}

if (isset($_POST['btn'])) {
  $pdo = getPdo();
  $modif = $pdo->prepare("UPDATE projets SET titre = ?, description = ?, created_at = NOW(), photo=? WHERE id = ?");
  $modif->execute(array($_POST['titre'], $_POST['description'], $_FILES['image']['name'], $id));
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
  <h1 class="text-center">Modification du projet</h1>
</div>
<form method="post" action="">
  <div class="container pt-5">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto">
        <!-- Votre formulaire ici -->
        <div class="mb-3">
          <label>Titre</label>
          <input type="text" name="titre" value="<?= $data['titre']; ?>" class="form-control" placeholder="javascript">
        </div>
        <div class="mb-3">
          <label>Télécharger</label>
          <input type="file" name="photo" value="<?= $data['photo']; ?>" class="form-control" placeholder="javascript">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="3"><?= $data['description']; ?></textarea>
        </div>
        <div class="mb-3">
          <label class="mb-3">Indiquer la date</label><br>
          <input type="date" value="<?= $data['created_at']; ?>" name="date_modif">
        </div>
        <div class="mb-3">
          <button type="submit" name="btn">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>
</form>