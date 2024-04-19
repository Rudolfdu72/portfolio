<?php
session_start();
require_once '../functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pdo = pdo();
  $statement = $pdo->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
  $statement->bindValue(':pseudo', $_POST['pseudo']);

  if ($statement->execute()) {
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user === false) {
      echo 'Identifiants invalides';
    } else {
      if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['pseudo'] = $user['pseudo'];

        header('location: user.php');
        exit();
      } else {
        echo 'Identifiants invalides';
      }
    }
  } else {
    echo 'Impossible de récupérer l\'utilisateur';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../profil/login.css">
  <title>Connexion</title>
</head>

<body>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="pseudo">Votre pseudo:</label>
    <input type="text" name="pseudo" id="pseudo" placeholder="Entrer votre pseudo" required><br>
    <label for="password">Votre mot de passe:</label>
    <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe" required><br>
    <input type="submit" name="submit" id="button" value="connexion">
  </form>
</body>

</html>
