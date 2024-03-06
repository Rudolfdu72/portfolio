<?php
session_start();
include '../../path.php';
include ROOT_PATH . '/components/header.php';
destroyingSession();
$pdo = getPdo();
$req = $pdo->query('SELECT * FROM competences');
$req->execute();
$skills = $req->fetchAll();
?>

<div class="d-flex justify-content-end pt-5 px-3">
    <a href="/portfolio/admin/index.php">
        <button class="btn btn-secondary btn-sm">Retour au tableau de bord</button>
    </a>
</div>
<h1 class="text-center">liste de compétences</h1>
<div class="container d-flex justify-content-center mt-5">
    <table>
        <thead>
            <tr>
                <th>#id</th>
                <th>Compétence</th>
                <th>Niveau</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skills as $skill): ?>
                <tr>
                    <td>
                        <?= $skill['id'] ?>
                    </td>
                    <td>
                        <?= $skill['nom'] ?>
                    </td>
                    <td>
                        <?= $skill['niveau'] ?>
                    </td>
                    <td>
                        <span class="edit">
                            <a href="<?= BASE_URL ?>/pages/skills/edit.php?id=<?= $skill['id']; ?>">
                                <button>Modifier</button>
                            </a>
                        </span>
                        <span>
                            <a href="<?= BASE_URL ?>/pages/skills/delete.php?id=<?= $skill['id']; ?>">
                                <button
                                    onclick="confirm('Voulez-vous vraiment supprimer cette compétence?')">Supprimer</button>
                            </a>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>