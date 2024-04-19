<?php
require_once 'functions/functions.php';
$error = array();
if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $pseudo = $_POST['pseudo'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $passwordConfirm = $_POST['passwordConfirm'];

  if (empty($firstname)) {
    $error['firstname'] = 'Le champs nom est requis';
  }

  if (empty($lastname)) {
    $error['lastname'] = 'Le champs prénom est requis';
  }

  if (empty($pseudo)) {
    $error['pseudo'] = 'Le champs pseudo est requis';
  }

  if (empty($email)) {
    $error['email'] = 'Le champs nom est requis';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = 'Le champs email est invalide';
  }

  if (empty($password)) {
    $error['password'] = 'Le champs password est requis';
  }

  if (empty($passwordConfirm)) {
    $error['passwordConfirm'] = 'Le champs confirmation de mot de password est requis';
  } elseif ($password !== $passwordConfirm) {
    $error['passwordConfirm'] = 'Les mots de passe doivent être identiques';
  }
if (count($error) === 0) {
  $pasword_hash = password_hash($password, PASSWORD_BCRYPT);
  $pdo = pdo();
  $req = "INSERT INTO users(firstname, lastname, pseudo, email, password)VALUES(:firstname, :lastname, :pseudo, :email, :password)";
  $pdostatement = $pdo->prepare($req);
  $pdostatement->bindValue(':firstname', $firstname);
  $pdostatement->bindValue(':lastname', $lastname);
  $pdostatement->bindValue(':pseudo', $pseudo);
  $pdostatement->bindValue(':email', $email);
  $pdostatement->bindValue(':password', $pasword_hash);
  $pdostatement->execute();
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <form method="post" action="">
    <h1>Formulaire d'inscription:</h1>
    <label for="firstname">Nom:</label>
    <input type="text" name="firstname" class="input-width" id="firstname" placeholder="votre nom"><br>
    <?php if (isset($error['firstname'])): ?>
      <span style="color:red">
        <?= $error['firstname'] ?>
      </span><br>
    <?php endif; ?>

    <label for="lastname">Prénom:</label>
    <input type="text" name="lastname" id="lastname" class="input-width" placeholder="votre prenom"><br>
    <?php if (isset($error['lastname'])): ?>
      <span style="color:red">
        <?= $error['lastname'] ?>
      </span><br>
    <?php endif; ?>

    <label for="pseudo">Pseudo:</label>
    <input type="text" name="pseudo" class="input-width" id="pseudo" placeholder="votre pseudo"> <br>
    <?php if (isset($error['pseudo'])): ?>
      <span style="color:red">
        <?= $error['pseudo'] ?>
      </span><br>
    <?php endif; ?>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" class="input-width" placeholder="Votre email"><br>
    <?php if (isset($error['email'])): ?>
      <span style="color:red">
        <?= $error['email'] ?>
      </span><br>
    <?php endif; ?>

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" id="password" class="input-width" placeholder="Votre mot de passe"><br>
    <?php if (isset($error['password'])): ?>
      <span style="color:red">
        <?= $error['password'] ?>
      </span><br>
    <?php endif; ?>

    <label for="passwordConfirm">Confirmation mot de passe:</label>
    <input type="password" name="passwordConfirm" id="passwordConfirm" class="input-width"
      placeholder="confirmez votre autre mot de passe"><br>
    <?php if (isset($error['passwordConfirm'])): ?>

      <span style="color:red">
        <?= $error['passwordConfirm'] ?>
      </span><br>
    <?php endif; ?>
    <input type="submit" name="submit" id="submit" value="S'inscrire">
  </form>
</body>

</html>