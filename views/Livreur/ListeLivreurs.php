<?php 
include '../../config.php';

include '../../CONTROLLER/LivreurL.php ';
$livreurL=new LivreurL();
$livreurs=$livreurL->afficherLivreur();
?>
<?php include("../../inc/header.php") ?>

<div class="">
<?php if (isset($_GET['status']) && $_GET['status'] == "deleted") : ?>
<div class="alert alert-success" role="alert">
    <strong>Supprimer avec succes </strong>
</div>
<?php endif ?>
<?php if (isset($_GET['status']) && $_GET['status'] == "fail_delete") : ?>
<div class="alert alert-danger" role="alert">
    <strong>Echec</strong>
</div>
<?php endif ?>
<!-- Table livreur -->
<div class="card border-primary ">
    <div class="card-header bg-primary text-white">
    <strong><i class="fa fa-database"></i> livreurs</strong>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <h5 class="card-title float-left">Table livreurs</h5>
            <a href="AjouterLivreur.php" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Ajouter un livreur</a>
        </div>
    </div>
    <div class="table-responsive">

    <table id="dataTable" class="dataTable table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Age</th>
                <th style="width: 20%;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livreurs as $livreur) : ?>
            <tr>
                <td><?= $livreur['id'] ?></td>
                <td><?= $livreur['Nom'] ?></td>
                <td><?= $livreur['Prenom'] ?></td>
                <td><?= $livreur['Age'] ?></td>

                <td class="text-center">
                    <a href="afficherLivreur.php?id=<?=$livreur['id']?>" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                    <a href="ModifierLivreur.php?id=<?=$livreur['id']?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-<?= $livreur['id'] ?>"><i class="fa fa-trash"></i></a>
                    <?php include("../../inc/modal.php") ?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </div>
</div>
</div>
<!-- End Table livreur -->
<br>
</div><!-- /.container -->



<?php include("../../inc/footer.php") ?>
