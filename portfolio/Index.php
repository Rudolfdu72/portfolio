<?php
include 'path.php';
include ROOT_PATH . '/components/header.php';
$pdo = getPdo();
$req = $pdo->prepare('SELECT * FROM competences');
$req->execute();
$skills = $req->fetchAll();
$req = $pdo->prepare('SELECT * FROM projets');
$req->execute();
$projects = $req->fetchAll();
?>
<div class="container-fluid hauteur d-flex align-items-center justify-content-center bg-light" id="background_img">
  <div class="animation-text">
    <h1 class="text-center text-white">Bienvenue</h1>
    <p class="text-center text-white">Je m'appelle Rudolf Apoto et je suis développeur full stack</p>
  </div>
</div>
<div class="container min-vh-100 mt-5 shadow p-3 mb-5 bg-body rounded">
  <h2 class="text-center mb-5" id="profil">À propos</h2>
  <div class="row">
    <div class="col-12 col-md-6 mb-3">
      <img class="img-fluid" src="./assets/images/profil.jpg" alt="" srcset="">
    </div>
    <div class="col-12 col-md-6">
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident obcaecati necessitatibus id alias, illo,
        < nulla natus animi ipsum perspiciatis vitae reiciendis quia. Explicabo, illum nemo veniam quas repellat dicta
          dolorum!</p>
    </div>
  </div>
</div>
<!-- bloc de compétence -->
<div class="container mt-5">
  <div class="row">
    <div class="col-12 col-md-6">
      <h2 class="text-center" id="competence">Mes compétences</h2>
      <?php foreach ($skills as $skill): ?>
        <label for="<?= $skill['niveau'] ?>">
          <?= $skill['nom'] ?>
        </label>
        <?php
          $niveau = intval($skill['niveau']);
        ?>
        <div class="progress m-1">
          <div class="progress-bar bg-danger" role="progressbar" style="width:<?= $niveau?>%"
            aria-valuenow="<?= $niveau?>" aria-valuemin="0" aria-valuemax="100">
            <?= $skill['niveau'] ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- traitement de l'image -->
    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
      <div class="mt-5">
        <form method="POST" action="upload.php">
          <button type="submit" name="telecharger">Téléchargez mon cv</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!-- Bloc projets -->
<div class="mb-5">
  <h1 class="text-center" id="projets">Mes projets réalisés</h1>
  <p class="text-center">Quelques uns de mes projets réalisés</p>
</div>

<div class="container d-flex align-items-center justify-content-center mt-5">
  <div class="row">
    <?php foreach ($projects as $project): ?>
      <div class="col-12 col-md-4 mb-3">
        <div>
          <h2><?= $project['titre']?></h2>
          <img src="./upload/<?= $project['photo']?>" alt="illustration" srcset=""/>
        </div>
        <div>
          <p><?= $project['description']?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<section class="container-fluid contact mt-5 bg-light">
  <?php require_once './contact/contact.php'; ?>
</section>
<?php require "./components/footer.php"; ?>
