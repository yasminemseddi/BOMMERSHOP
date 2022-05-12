<?php
include '../../config.php';
    include '../../CONTROLLER/LivraisonC.php ';

    $LivraisonC=new LivraisonC();
    $LivraisonC->modifierLivraison(intval($_GET["idC"]),intval($_GET["idL"]));
    header('Location:ListeLivraisons.php');
?>