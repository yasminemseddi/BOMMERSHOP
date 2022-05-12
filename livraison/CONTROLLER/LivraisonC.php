<?php 

class LivraisonC{
    function ajouterLivraison($idL,$idC){
        $sql = 'INSERT INTO livraison(idC, idL, statusL, dateL) 
        VALUES(?, ?, ?,? )';
        $db = config::getConnexion();
        try{
            ini_set("SMTP", "ssl://smtp.gmail.com");
            ini_set("smtp_port","587");
            $query = $db->prepare($sql);
            $query->execute([
                $idC,
                $idL,
                "En cours",
                date("Y-m-d")
                
            ]);		
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
        
    }
    function afficherLivraison(){
        $sql="SELECT * from livraison Li,livreur l , commande c where c.idC = Li.idC and l.id=Li.idL;";
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
        function afficherNbLivraisonParLivreur(){
            $sql="SELECT l.id , l.Nom , l.Prenom , COUNT(*) as 'NB' from livraison Li,livreur l , commande c where c.idC = Li.idC and l.id=Li.idL group by l.id;     ";
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
            function afficherNbLivraisonParStatus($status){
                $sql='SELECT COUNT(*) as "NB" from livraison Li,livreur l , commande c where c.idC = Li.idC and l.id=Li.idL and Li.statusL=":s";    ';
                $sql=  str_replace(":s",$status,$sql);

                $db=config::getConnexion();
                try
                {
                $liste= $db ->query($sql);

                return $liste->fetch()["NB"];
                
                }
                catch (Exception $e)
                {
                    die('Erreur:'.$e->getMessage());
                }
                }

        function modifierLivraison($idC , $idL){
            $sql = "UPDATE `livraison` SET `idL` = ':i' WHERE `livraison`.`idC` = :id;";
                      $sql=  str_replace(":id",$idC,$sql);
                  
        
        
                $sql=str_replace(":i",$idL,$sql);
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
               
                $query->execute();	
                
              
                }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }			
        }
        function supprimerLivraison($idC , $idL){
            $sql = "UPDATE `livraison` SET `statusL` = 'Annuler' WHERE `livraison`.`idC` = :id and `livraison`.`idL`= :i ;";
                      $sql=  str_replace(":id",$idC,$sql);
                  
        
        
                $sql=str_replace(":i",$idL,$sql);
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
               
                $query->execute();	
                
              
                }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }			
        }
        function afficherLivraisonById($idC,$idL){
            $sql="SELECT * from livraison Li,livreur l , commande c where  c.idC=Li.idC and l.id=Li.idL and c.idC = :id and l.id=:i;";
            $sql=  str_replace(":id",$idC,$sql);
                $sql=str_replace(":i",$idL,$sql);
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