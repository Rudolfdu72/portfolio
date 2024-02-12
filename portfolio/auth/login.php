
<?php
session_start();
include '../path.php';
include ROOT_PATH . '/components/header.php';
include ROOT_PATH . '/functions/functions.php';

if (isset($_POST['submit'])) {
  $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
  $password_saisi = htmlspecialchars($_POST['password']);

  if (empty($pseudo_saisi)) {
    $_SESSION['pseudo'] = "Veuillez entrer un pseudo valide";
  }

  if (empty($password_saisi)) {
    $_SESSION['password'] = "Veuillez entrer un password valide";
  } else {

    $pdo = getPdo();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE pseudo = ?');
    $stmt->execute([$pseudo_saisi]);
    $user = $stmt->fetch();
    if ($user !== false) {
      if (password_verify($password_saisi, $user["password"])) {
        $_SESSION['user'] = $user;
        header('Location:' . BASE_URL . '/admin/index.php');
      }
    }
  }
}
?>

<h1 class="text-center mt-5">Connexion</h1>
<div class="subscribe mt-5">
  <form method="POST" action="">
    <div>
      <label for="email" class="">Pseudo:</label>
      <div class="col-sm-10">
        <input type="pseudo" name="pseudo" class="" id="psedonyme"><br>
        <?php if (isset($_SESSION['pseudo'])): ?>
          <span style="color:red;">
            <?= $_SESSION['pseudo']; ?>
          </span>
          <?php unset($_SESSION['pseudo']); ?>
        <?php endif; ?>
      </div>
    </div>
    <div>
      <label for="password" class="">Mot de passe:</label>
      <div class="">
        <input type="password" name="password" class="password" id=""><br>
        <?php if (isset($_SESSION['password'])): ?>
          <span style="color:red;">
            <?= $_SESSION['password']; ?>
          </span>
          <?php unset($_SESSION['password']); ?>
        <?php endif; ?>
      </div>
      <div class="mt-2">
        <button type="submit" name="submit">Connexion</button>
      </div>
  </form>
</div>

