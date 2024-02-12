<?php 
include '../../path.php'; 
include ROOT_PATH . '/components/header.php'; 
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
    <th>Illustration</th>
    <th colspan="2" >Action</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>Nom</td>
      <td>Photo</td>
      <td>Details</td>
      <td>
        <a href="<?php echo BASE_URL; ?>/pages/project/edit.php">
          <button>Modifier</button>
        </a>
      </td>
      <td>
        <a href="<?php echo BASE_URL; ?>/pages/project/delete.php">
           <button>Supprimer</button>
        </a>
      </td>
    </tr>
  </tbody>
</table>
</div>
