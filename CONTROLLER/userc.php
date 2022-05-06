<?php
include '../config.php';
include_once '../Model/user.php';
class AdherentC
{
    function afficheruser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }
    function supprimeruser($iduser)
    {
        $sql = "DELETE FROM user WHERE iduser=:iduser";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':iduser', $iduser);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMeesage());
        }
    }
    function ajouteruser($user)
    {
        $sql = "INSERT INTO user (iduser, Nom, Prenom,  Email, password) 
			VALUES (:iduser,:Nom,:Prenom, :Adresse,:Email, :password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'iduser' => $user->getiduser(),
                'Nom' => $user->getNom(),
                'Prenom' => $user->getPrenom(),
                'Email' => $user->getEmail(),
                'password' => $user->getpassword(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function recupereruser($iduser)
    {
        $sql = "SELECT * from user where iduser=$iduser";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifieruser($use, $iduser)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
					 
						Email= :Email, 
						password= :password
					WHERE iduser= :iduser'
            );
            $query->execute([
                'Nom' => $user->getNom(),
                'Prenom' => $user->getPrenom(),
                'Email' => $user->getEmail(),
                'password' => $user->getpassword(),
                'iduser' => $iduser
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
