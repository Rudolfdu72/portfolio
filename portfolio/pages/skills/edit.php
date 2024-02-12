<?php
include '../../path.php';
include ROOT_PATH . '/components/header.php';
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
<form method="" action="">
  <div class="container pt-5">
    <div class="row">
      <div class="col-12 col-md-8 mx-auto">
        <!-- Votre formulaire ici -->
        <div class="mb-3">
          <label>Titre</label>
          <input type="text" class="form-control" placeholder="javascript">
        </div>
        <div class="mb-3">
          <label class="mt-3" for="niveau">niveau de comppétence</label><br>
          <select class=" form-select mt-3" name="skils-level" id="">
            <option selected>Selectionner le niveau</option>
            <option value="10">10%</option>
            <option value="10">20%</option>
            <option value="10">40%</option>
            <option value="10">50%</option>
            <option value="10">60%</option>
            <option value="10">70%</option>
            <option value="10">80%</option>
            <option value="10">90%</option>
            <option value="10">100%</option>
          </select>
        </div>
        <div class="mb-3">
          <button type="submit" name="btn">Modifier</button>
        </div>
      </div>
    </div>
  </div>
</form>