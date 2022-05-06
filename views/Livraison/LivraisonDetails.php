

<?php
include '../../CONTROLLER/LivraisonC.php ';
include '../../config.php';

$LivraisonC=new LivraisonC();
$Livraisons=$LivraisonC->afficherLivraisonById(intval($_GET["idC"]),intval($_GET["idL"]));
foreach($Livraisons as $l )
{
    $Livraison=$l;
}
?>


<?php include("../../inc/header.php") 
?>
<div class="container-fluid " style="margin-bottom:30px;">

    <div class=" text-center  mt-s-3 card " style="margin-bottom:10px;" >
                    

        <div class="card-body row">
                                    <div class="col-md-4 ">
                                        <h4 ><b>ID Livraison</b> </h4>
                                        <span class="badge  bg-success text-white fs-5">#<?= $Livraison["idC"]."-".$Livraison["idL"]?></span>                            

                                    </div>
                                    <div class=" col-md-4 ">
                                         <h4><b class="">Etat Livraison</b></h4>
                                            <?php if ($Livraison['statusL']=="En cours") : ?>

                                            <span class="badge bg-warning text-white fs-5"> <?= $Livraison['statusL'] ?></span>
                                            <?php endif ?>
                                            <?php if ($Livraison['statusL']=="Annuler") : ?>

                                            <span class="badge bg-danger text-white fs-5"> <?= $Livraison['statusL'] ?></span>
                                            <?php endif ?>
                                            <?php if ($Livraison['statusL']=="livré") : ?>

                                           <span class="badge bg-succes text-white fs-5"> <?= $Livraison['statusL'] ?></span>
                                            <?php endif ?>

                                    
                                       
                                    
                                    </div>
                                    <div class="col-md-4 ">
                                        <h4 ><b>Date Creation</b> </h4>
                                        <span class="badge  bg-success text-white fs-5"><?= $Livraison["dateL"]?></span>                            

                                    </div>

                             
</div>
                            </div>
                        





   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   


   <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Details Commande</h5>
                                <hr>

                                <div class="table-responsive">
                                    <table class="table table-hover" id="tabla">
                                        <thead class="bg-inverse thead-dark text-white" style="background-color:#212529;">
                                            <tr>
                                                <th><b>ID Commande</b></th>
                                                <th><b>Description Commande</b></th>
                                                <th><b>Adresse Destination</b></th>
                                                <th><b>Quantite</b></th>
                                                <th><b>Prix</b></th>
                                              


                                            </tr>
                                        </thead>
                                        <tbody id="projects-tbl">
                                            
                                                    <tr class="card-hover">
                                                        <td><?= $Livraison["idC"]?></td>
                                                        <td><?= $Livraison["descC"]?></td>
                                                        <td><?= $Livraison["adresseC"]?></td>
                                                        <td><?= $Livraison["qtC"]?></td>
                                                        <td><?= $Livraison["prixC"]?></td>
                                                       

                                                     </tr>
                                                                                        </tbody>

                                                                             </table>
                                </div>


                            </div>
                        </div>



                    </div>
                </div>
   <br>


   <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Details Livreur </h5>
                                <hr>


                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5> &nbsp;<b>Nom</b></h5>
                                            <p class="text-muted  m-l-5">   &nbsp;  <?= $Livraison["Nom"]?>
 </p>


                                        </div>

                                    </div>


                                  

                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5> &nbsp;<b>Prenom</b></h5>
                                            <p class="text-muted  m-l-5"> &nbsp;<?= $Livraison["Prenom"]?></p>


                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center">
                                            <h5> &nbsp;<b>Age</b></h5>
                                            <p class="text-muted  m-l-5"> &nbsp; <?= $Livraison["Age"]?></p>


                                        </div>

                                    </div>



                                </div>


                              


                            </div>
                        </div>



                    </div>
    </div>

 
</div>
