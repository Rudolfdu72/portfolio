<?php
include '../path.php';
include ROOT_PATH . '/components/header.php';
include ROOT_PATH . '/functions/functions.php';

if (isset($_POST['bouton'])) {
  $pseudo = $_POST['pseudo'];
  $password = $_POST['password'];
  $erreur = [];
  if (empty($pseudo) || !preg_match('/^[a-zA-Z0-9]+$/', $pseudo)) {
    $erreur['pseudo'] = "Veuillez entrer un pseudo valide";

  }

  if (empty($password)) {
    $erreur['password'] = "Veuillez entrer un mot de passe";

  }

  if (empty($erreur)) {
    $pdo = getPdo();
    $stmt = $pdo->prepare('INSERT INTO users(pseudo, password) VALUES(:pseudo, :password)');
    $stmt->bindValue(':pseudo', $pseudo);
    $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
    $stmt->execute();
  }
}
?>
<h1 class="text-center mt-5">Espace d'inscription</h1>
<div class="subscribe mt-5">
  <form method="POST" action="">
    <div>
      <label for="email" class="">Pseudo:</label>
      <div class="col-sm-10">
        <input type="pseudo" name="pseudo" class="" id="psedonyme">
        <?php if (isset($_POST['pseudo'])): ?><br>
          <span style="color:red;">
            <?= $erreur['pseudo']; ?>
          </span>
        <?php endif; ?>
      </div>
    </div>
    <div>
      <label for="password" class="">Mot de passe:</label>
      <div class="">
        <input type="password" name="password">
        <?php if (isset($_POST['password'])): ?><br>
          <span style="color:red;">
            <?= $erreur['password']; ?>
          </span>
        <?php endif; ?>
      </div>
      <div>
        <button class="mt-2" name="bouton" type="submit">S'inscrire</button>
      </div>
  </form>
</div>