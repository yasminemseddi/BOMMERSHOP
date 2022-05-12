<?php
include '../../config.php';

include '../../CONTROLLER/LivreurL.php ';
$id = $_GET['id'] ? intval($_GET['id']) : 0;

$LivreurL=new LivreurL();
$livreur=$LivreurL->AfficherLiv($id);


?>
<?php include("../../inc/header.php") ?>
    <div class="">
    <a href="ListeLivreurs.php" class="btn btn-light mb-3"><< Go Back</a>
        <!-- Show  a livreur -->
        <div class="card border-primary ">
            <div class="card-header bg-primary  text-white">
                <strong><i class="fa fa-database"></i> Details livreur</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered table-striped">
                        <tr>
                                <th>Id</th>
                                <td><?= $livreur['id'] ?></td>
                               
                            </tr>   
                            <tr>
                            <th>Nom</th>
                                <td><?= $livreur['Nom'] ?></td>
                              

                      
                            </tr>  
                            <tr>
                            <th>Prenom</th>
                                <td><?= $livreur['Prenom'] ?></td>
                            </tr>   
                            <tr>
                               
                                <th>Age</th>
                                <td><?= $livreur['Age'] ?></td>
                            </tr>  
                           
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="../../assets/images/avatar.png" class="img-fluid img-thumbnail" style="width: 200px;">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Show a livreur -->
        <br>
    </div><!-- /.container -->