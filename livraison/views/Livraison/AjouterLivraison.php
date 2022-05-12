<?php
include '../../config.php';

 include '../../CONTROLLER/CommandeC.php ';
 include '../../CONTROLLER/LivreurL.php ';
 include '../../CONTROLLER/LivraisonC.php ';

 $CommandeC=new CommandeC();
 $Commandes=$CommandeC->afficherCommandeNonLivraison();
 $LivreurL=new LivreurL();
 $Livreurs=$LivreurL->afficherLivreur();
 if($_GET)
 {
    if($_GET["id"] && $_GET["idL"])
    {
       $LivraisonC=new LivraisonC();
       $LivraisonC->ajouterLivraison(intval($_GET["idL"] ),intval( $_GET["id"]));
       $CommandeC=new CommandeC();
        $Commandes=$CommandeC->afficherCommandeNonLivraison();
   }
 }

?>
<?php include("../../inc/header.php") ?>

<div class="">

<!-- Table livreur -->
<div class="card border-primary ">
    <div class="card-header bg-primary text-white">
    <strong><i class="fa fa-database"></i> Ajouter une Livraison Livraison</strong>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <h5 class="card-title float-left">Table Livraison</h5>
        </div>
    </div>
    <div class="table-responsive">

    <table id="dataTable" class="dataTable table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>ID Commande</th>
                <th>Description Commande</th>
                <th>Adresse Destination</th>

                <th>Qantite commande</th>
                <th>Prix Commande</th>
                <th style="width: 20%;">Livreur</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Commandes as $Commande) : ?>
            <tr>
                <td><?= $Commande['idC'] ?></td>
                <td><?= $Commande['descC'] ?></td>
                <td><?= $Commande['adresseC'] ?></td>

                <td><?= $Commande['qtC'] ?></td>
                <td><?= $Commande['prixC'] ?></td>

                <td class="text-center">
                   <select class="form-select" onchange=" a('?idL='+this.value+'&id='+<?= $Commande['idC'] ?>)">
                       <option disabled selected>Selection un Livreur</option>
                       <?php foreach ($Livreurs as $livreur) : ?>
                        <option  value=<?=$livreur["id"] ?>> <?=$livreur["Nom"].$livreur["Prenom"] ?> </option>
                        <?php endforeach ?>

                   </select>
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

<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
</script>
<script type="text/javascript">
   (function(){
      emailjs.init("jj5_Yn5l1q_3v9KGY");// api 
   })();
function a(r)// quand je modofie la liste des livreurs 
{
    
   var templateParams = {
to_name: "Yassmine ",
message: "Votre commande est en expédition",
email: "yasmine.mseddi@esprit.tn",
};// option mail
 
emailjs.send("service_gi17wzk","template_fcy7trk", templateParams)
    .then(function(response) {
        window.location.href=r;
    }, function(error) {
       console.log('FAILED...', error);
    });
   

}
</script>
<?php include("../../inc/footer.php") ?>
