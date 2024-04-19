<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../profil/user.css">
  <title>Espace Client</title>
</head>

<body>
  <div class="container">
    <div>
      <?php if (isset($_SESSION['pseudo'])): ?>
        <h3>Bonjour
          <?= $_SESSION['pseudo'] ?> bienvenu dans votre espace client
        </h3>
      <?php endif; ?>
    </div>
    <div>
      <a href="login.php">
        <button id="logout">Déconnexion</button>
      </a>
    </div>
  </div>
</body>

</html>