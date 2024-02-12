<?php 
include '../../path.php'; 
include ROOT_PATH . '/components/header.php'; 
?>

<div class="d-flex justify-content-end pt-5 px-3" >
  <a href="/portfolio/admin/index.php">
    <button  class="btn btn-secondary btn-sm">Retour au tableau de bord</button>
  </a>
</div>

<div class="container d-flex justify-content-center mt-5">
  <table>
    <thead>
      <tr>
      <th>#id</th>
      <th>Compétence</th>
      <th>Niveau</th>
      <th colspan="2" >Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Nom</td>
      <td>niveau</td>
      <td>
        <a href="<?php echo BASE_URL; ?>/pages/skills/edit.php">
          <button>Modifier</button>
        </a>
      </td>
      <td>
        <a href="<?php echo BASE_URL; ?>/pages/skills/delete.php">
           <button>Supprimer</button>
        </a>
      </td>
    </tr>
  </tbody>
</table>
</div>
