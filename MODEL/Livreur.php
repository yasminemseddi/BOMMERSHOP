<?php
    class Livreur{
     private  $id;
     private  $nom; 
     private  $prenom;
     private  $age;
     public function  __construct (int $id,string $nom,string $prenom, int $age )
     {  
         $this->id=$id;
         $this->nom=$nom ;
         $this->prenom=$prenom;
         $this->age=$age;
 
     }
     public function getId() 
     {
         return $this->id;
     }

     public function getNom() 
     {
         return $this->nom;
     }
     public function getPrenom() 
     {
         return $this->prenom;
     }
     public function getAge() 
     {
         return $this->age;
     }



     public function setId($id)
     {
         $this->id= $id;
 
         return $this;
     }
     public function setNom($nom)
     {
         $this->nom= $nom;
 
         return $this;
     }
     public function setPrenom($prenom)
     {
         $this->prenom = $prenom;
 
         return $this;
     }
     public function setAge($age)
     {
         $this->age = $age;
 
         return $this;
     }


}

	

	


?>