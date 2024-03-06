
<?php
include '../../path.php';
include ROOT_PATH . '/functions/functions.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $pdo = getPdo();
  $req = $pdo->prepare('DELETE FROM competences WHERE id = ?');
  $req->execute([$id]);
  if ($req) {
    echo '<span style="background-color:green;>La compétence a bien été supprimée</span>';
  }
}