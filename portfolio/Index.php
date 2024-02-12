<?php
include 'path.php'; 
include ROOT_PATH . '/components/header.php'; 
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
          nulla natus animi ipsum perspiciatis vitae reiciendis quia. Explicabo, illum nemo veniam quas repellat dicta
          dolorum!</p>
      </div>
    </div>
  </div>
  
   <!-- bloc de compétence -->
   <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-6">
        <h2 class="text-center" id="competence" >Mes compétences</h2>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0"
            aria-valuemax="100">90%</div>
        </div>
        <label for="">HTML</label>
        <div class="progress m-1">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0"
            aria-valuemax="100">80%</div>
        </div>
        <label for="">CSS</label>
        <div class="progress m-1">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
            aria-valuemax="100">75%</div>
        </div>
        <label for="">bootstrap</label>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0"
            aria-valuemax="100">60%</div>
        </div>
        <label for="">PHP</label>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="40"
            aria-valuemin="40" aria-valuemax="100">40%</div>
        </div>
        <label for="">Javascript</label>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35"
            aria-valuemin="35" aria-valuemax="100">35%</div>
        </div>
        <label for="">SQL</label>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80"
            aria-valuemin="80" aria-valuemax="100">80%</div>
        </div>
        <label for="">SASS</label>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
            aria-valuemax="100">60%</div>
        </div>
        <label for="">MariaDB</label>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90"
            aria-valuemin="90" aria-valuemax="100">90%</div>
        </div>
        <label for="">MYSQL</label>
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0"
            aria-valuemax="100">90</div>
        </div>
      </div>

      <!-- traitement de l'image -->
        <?php 
        ?>

      <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
        <div class="mt-5">
          <form method="POST" action="upload.php">
            <button type="submit" name="telecharger" >Téléchargez mon cv</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>

  <!-- Bloc projets -->
  <div class="container d-flex align-items-center justify-content-center mt-5">
    <div class="row">
      <div class="mb-5">
        <h1 class="text-center" id="projets">Mes projets réalisés</h1>
        <p class="text-center">Quelques uns de mes projets réalisés</p>
      </div>
      <div class="col-12 col-md-4 mb-3">
        <div>
          <h2>Titre</h2>
          <a href="#"><img src="" alt="" srcset=""></a>
        </div>
      </div>
      <div class="col-12 col-md-4 mb-3">
        <div>
          <h2>Titre</h2>
          <a href="#"><img src="" alt="" srcset=""></a>
        </div>
      </div>
      <div class="col-12 col-md-4 mb-3">
        <div>
          <h2>Titre</h2>
          <a href="#"><img src="" alt="" srcset=""></a>
        </div>
      </div>
    </div>
  </div>


  <section class="container-fluid contact mt-5 bg-light">
    <?php 
    require_once './contact/contact.php'
     ?>
  </section>
<?php
require "./components/footer.php";
?>