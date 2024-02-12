<?php
include ROOT_PATH . '/functions/functions.php';

if (isset($_POST['envoyer'])) {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $objet = $_POST['objet'];
  $message = $_POST['message'];
  $erreur = [];

  if (empty($nom) || !preg_match('/^[a-zA-Z]+$/', $nom)) {
    $erreur['nom'] = "Veuillez entrer un nom valide";
  }
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erreur['email'] = "Veuillez entrer un email valide";
  }

  if (empty($message)) {
    $erreur['message'] = "Veuillez entrer un message";
  }

  if (empty($objet)) {
    $erreur['objet'] = "Veuillez entrer un objet";
  }

  if (empty($erreur)) {
   $pdo = getPdo();
    $stmt = $pdo->prepare('INSERT INTO contacts(nom, e_mail, objet, message) VALUES(?, ?, ?, ?)');
    $stmt->execute([$nom, $email, $objet, $message,]);
  }
}
?>

<div class="container">
  <h2 class="text-center mb-5 pt-5">Contact</h2>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="row">
      <div class="col-12 col-md-6">
        <label for="nom" class="form-lable">Nom</label>
        <input type="text" name="nom" class="form-control" id="">
        <?php if(isset($erreur['nom'])):?>
        <span style="color: red;"><?= $erreur['nom']; ?></span>
        <?php endif?>
      </div>
      <div class="col-12 col-md-6">
        <label for="email" class="form-lable">E-mail</label>
        <input type="email" name="email" class="form-control" id="">
        <?php if(isset($erreur['email'])):?>
        <span style="color: red;"><?= $erreur['email']; ?></span>
        <?php endif?>
      </div>
      <div>
        <label for="objet" class="form-lable">Objet</label>
        <input type="text" name="objet" class="form-control" id="objet">
        <?php if(isset($erreur['objet'])):?> 
        <span style="color: red;"><?= $erreur['objet']; ?></span>
        <?php endif?>
      </div>
      <div>
        <textarea name="message" class="form-control mb-2" id="" cols="30" rows="10"></textarea>
        <?php if(isset($erreur['message'])):?> 
        <span style="color: red;"><?= $erreur['message']; ?></span>
        <?php endif?>
      </div>
      <div>
        <button type="submit" name="envoyer" class="btn btn-dark mb-2">Soumettre</button>
      </div>
    </div>
  </form>
</div>