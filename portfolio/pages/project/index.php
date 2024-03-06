<?php 
session_start();
include '../../path.php'; 
include ROOT_PATH . '/components/header.php'; 
destroyingSession();

$pdo = getPdo();
$req = $pdo->prepare('SELECT * FROM projets');
$req->execute();
$project = $req->fetchAll();

?>

<div class="d-flex justify-content-end pt-5 px-3" >
  <a href="/portfolio/admin/index.php">
    <button  class="btn btn-secondary btn-sm">retour au tableau de bord</button>
  </a>
</div>

<div class="container container d-flex justify-content-center mt-5">
  <table>
  <thead>
    <tr>
    <th>#id</th>
    <th>Titre du projet</th>
    <th>Description</th>
    <th>Illustration</th>
    <th>Date de création</th>
    <th colspan="2" >Action</th>
  </tr>
  </thead>
  <tbody>
    <?php foreach ($project as $projet): ?>
    <tr>
      <td><?= $projet['id']?></td>
      <td><?= $projet['titre']?></td>
      <td><?= $projet['description']?></td>
      <td><?= $projet['photo']?></td>
      <td><?= $projet['created_at']?></td>
      <td>
        <a href="<?php echo BASE_URL; ?>/pages/project/edit.php?id=<?= $projet['id']?>">
          <button>Modifier</button>
        </a>
      </td>
      <td>
        <a href="<?php echo BASE_URL; ?>/pages/project/delete.php?id=<?= $projet['id']?>">
           <button onclick="confirm('Voulez-vous enrgegistrer cette cette Modification?')">Supprimer</button>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
