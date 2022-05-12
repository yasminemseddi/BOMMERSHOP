<?php
include '../../config.php';

    include '../../CONTROLLER/LivreurL.php';
    $LivreurL=new LivreurL();
    $LivreurL->supprimerLivreur($_GET["id"]);
    header('Location:ListeLivreurs.php');
?>