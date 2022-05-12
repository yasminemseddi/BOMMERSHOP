<?php 

class CommandeC{
    function afficherCommandeNonLivraison(){
        $sql="SELECT * from commande where idC not in(SELECT idC from livraison);        ";
        $db=config::getConnexion();
        try
        {
        $liste= $db ->query($sql);
        return $liste;
        
        }
        catch (Exception $e)
        {
            die('Erreur:'.$e->getMessage());
        }
        }
}
?>