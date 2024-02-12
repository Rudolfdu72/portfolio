<?php
include '../../path.php';
include ROOT_PATH . '/components/header.php';
include ROOT_PATH . '/functions/functions.php';

if(($_SERVER['REQUEST_METHOD']==="POST")){
  $skills = $_POST['skills'];
  $niveau = $_POST['niveau'];
  $erreur =[];

  if(empty($skills) || !preg_match('/^[a-zA-Z]+$/', $skills)){
    $erreur['skills'] ='Ce champs n\'est doit pas etre vide et doit pas avoir de caractères spéciaux';
  }

  if(empty($niveau)){
    $erreur['niveau'] ='Ce champs est requis';
  }

  if($erreur===0);
  $pdo = getPdo();
  $stmt = $pdo->prepare('INSERT INTO competences(nom, niveau) VALUES (?, ?)');
  $stmt->execute([$skills, $niveau]);
}
?>
<div class="d-flex justify-content-end pt-5 px-3">
  <a href="<?php echo BASE_URL; ?>/admin/index.php">
    <button>Retour au tableau de bord</button>
  </a>
</div>

<div>
  <h2 class="text-center">Ajout d'une nouvelle compétence</h2>
</div>
</div>

<div class="container d-flex justify-content-center">
  <a href="<?php echo BASE_URL; ?>/pages/skills/index.php">
    <button class="text-center" id="account_btn">Afficher la liste des compétences</button>
  </a>
</div>

<div class="container d-flex justify-content-center mt-5 px-3">
  <form method="POST" action="">
    <div class="row">
      <div class="col-12 col-md-8 max-auto">
        <label for="titre" class="mb-3">Nom de la compétence</label><br>
        <input type="text" name="skills" class="form-control" placeholder="Javascript">
        <?php if(isset($_POST['skills'])): ?>
          <span style="color:red;"><?= $erreur['skills'];?></span>
          <?php endif;?>
      </div>
      <div>
        <label class="mt-3" for="level">niveau de comppétence</label><br>
        <select class=" form-select mt-3" name="niveau">
          <option value="">Selectionner le niveau:</option>
          <option value="10%">10%</option>
          <option value="20%">20%</option>
          <option value="40%">40%</option>
          <option value="50%">50%</option>
          <option value="60%">60%</option>
          <option value="70%">70%</option>
          <option value="80%">80%</option>
          <option value="90%">90%</option>
          <option value="100%">100%</option>
        </select>
        <?php if(isset($_POST['niveau'])): ?>
          <span style="color:red;"><?= $erreur['niveau'];?></span>
          <?php endif;?>
      </div>
      <div>
        <button class="mt-2" type="submit">Valider</button>
      </div>
    </div>
  </form>
</div>