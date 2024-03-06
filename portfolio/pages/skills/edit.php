<?php
session_start();
include '../../path.php';
include ROOT_PATH . '/components/header.php';
destroyingSession();
$skills = "";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $pdo = getPdo();
  $req = $pdo->prepare('SELECT * FROM competences WHERE id = :id');
  $req->bindValue(':id', $id);
  $req->execute();
  $skills = $req->fetch();

}
if (isset($_POST['btn'])) {
  $titre = $_POST['nom'];
  $niveau = $_POST['niveau'];
  $req = $pdo->prepare('UPDATE competences SET nom = :titre, niveau = :niveau WHERE id = :id');
  $req->bindValue(':titre', $titre);
  $req->bindValue(':niveau', $niveau);
  $req->bindValue(':id', $id);
  $donnee = $req->execute();
}
?>
<div class="d-flex justify-content-end pt-5 px-3">
  <a href="/portfolio/admin/index.php">
    <button class="btn btn-secondary btn-sm">Retour au tableau de bord</button>
  </a>
</div>
<div class="container d-flex justify-content-center">
  <a href="<?php echo BASE_URL; ?>/pages/skills/index.php">
    <button class="text-center" id="account_btn">Afficher la liste des compétences</button>
  </a>
</div>

<div class=" pt-5">
  <h1 class="text-center">Modification de compétence</h1>
</div>
<form method="post" action="">
  <div class="container pt-5">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto">
        <!-- Votre formulaire ici -->
        <div class="mb-3">
          <label>Titre</label>
          <input type="text" value="<?= $skills['nom'] ?>" name="nom" class="form-control" placeholder="javascript">
        </div>
        <div class="mb-3">
          <label class="mt-3" for="niveau">niveau de comppétence</label><br>
          <select class=" form-select mt-3" name="niveau" id="">
            <option value="10%" <?php echo $skills['niveau'] == "10%" ? "selected" : "" ?>>10%</option>
            <option value="20%" <?php echo $skills['niveau'] == "20%" ? "selected" : "" ?>>20%</option>
            <option value="30%" <?php echo $skills['niveau'] == "30%" ? "selected" : "" ?>>30%</option>
            <option value="40%" <?php echo $skills['niveau'] == "40%" ? "selected" : "" ?>>40%</option>
            <option value="50%" <?php echo $skills['niveau'] == "50%" ? "selected" : "" ?>>50%</option>
            <option value="60%" <?php echo $skills['niveau'] == "60%" ? "selected" : "" ?>>60%</option>
            <option value="70%" <?php echo $skills['niveau'] == "70%" ? "selected" : "" ?>>70%</option>
            <option value="80%" <?php echo $skills['niveau'] == "80%" ? "selected" : "" ?>>80%</option>
            <option value="90%" <?php echo $skills['niveau'] == "90%" ? "selected" : "" ?>>90%</option>
            <option value="100%" <?php echo $skills['niveau'] == "100%" ? "selected" : "" ?>>100%</option>
          </select>
        </div>
        <div class="mb-3">
          <button type="submit" name="btn">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>
</form>