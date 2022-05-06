<?php 

class LivreurL{
function afficherLivreur(){
$sql="SELECT * from livreur";
$db=config::getConnexion();
try
{
$liste= $db ->query($sql)->fetchAll();
return $liste;

}
catch (Exception $e)
{
    die('Erreur:'.$e->getMessage());
}
}

function supprimerLivreur($id){
    $sql="DELETE FROM livreur WHERE id=:id";
    $db = config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id', $id);
    try{
        $req->execute();
    }
    catch(Exception $e){
        die('Erreur:'. $e->getMessage());
    }
}
function ajouterLivreur($livreur){
    $sql = 'INSERT INTO livreur(id, Nom, Prenom, Age) 
    VALUES(?, ?, ?,? )';
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->execute([
            null,
            $livreur->getNom(),
            $livreur->getPrenom(),
            $livreur->getAge()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }			
    
}
function AfficherLiv($id){
    $sql = "SELECT * FROM livreur WHERE id = :id LIMIT 1";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
        $query->bindParam(":id", $id, PDO::PARAM_INT);
         $query->execute();	
         return $query->fetch();	
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }			
}
function modifierLivreur($nom , $prenom,$age,$id){
    $sql = "UPDATE `livreur` SET `Nom` = ':n', `Prenom` = ':p', `Age` = ':a' WHERE `livreur`.`id` = :i;";
              $sql=  str_replace(":n",$nom,$sql);
               $sql= str_replace(":i",$id,$sql);
              $sql=  str_replace(":a",$age,$sql);



        $sql=str_replace(":p",$prenom,$sql);
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
       
        $query->execute();	
        
      
        }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }			
}
}
?>