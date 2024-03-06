<?php
session_start();
include '../path.php';

include ROOT_PATH . '/components/header.php';
destroyingSession();
?>
<prep>
  <?php
  // permet de trouver le chemin du fichier de session:echo session_save_path();
  //  
  ?>
</prep>
<h1 class="text-center">Bienvenue sur votre espace administrateur</h1>
<div class="container vh-100 d-flex flex-column">
  <div class="mt-3">
    <a href="<?php ROOT_PATH ?>/portfolio/index.php" target="_blank">
      <button class="text-white bg-dark">Aller sur le site</button>
    </a>
  </div>
  <div class="mt-3">
    <a href="/portfolio/pages/skills/create.php">
      <button class="text-white bg-dark">Ajouter unenouvelle compétence</button>
    </a>
  </div>
  <div class="mt-3">
    <a href="/portfolio/pages/project/create.php">
      <button class="text-white bg-dark">Ajouter un nouveau projet</button>
    </a>
  </div>
  <div class="mt-3">
    <a href="<?= BASE_URL ?>/auth/logout.php">
      <button class="text-white bg-dark">Déconnexion</button>
    </a>
  </div>
</div>

<?php
include ROOT_PATH . "/components/footer.php";
?>