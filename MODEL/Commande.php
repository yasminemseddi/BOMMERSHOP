<?php
    class Commande{
     private  $idC;
     private  $qtC; 
     private  $DesC;
     private  $prixC;
     public function  __construct (int $idC,int $qtC,string $DesC, float $prixC )
     {  
         $this->idC=$idC;
         $this->qtC=$qtC ;
         $this->DesC=$DesC;
         $this->prixC=$prixC;
 
     }
     public function getidC() 
     {
         return $this->idC;
     }

     public function getQtC() 
     {
         return $this->qtC;
     }
     public function getDesC() 
     {
         return $this->DesC;
     }
     public function getPrixC() 
     {
         return $this->prixC;
     }



     public function setidC($idC)
     {
         $this->idC= $idC;
 
         return $this;
     }
     public function setQtC($qtC)
     {
         $this->qtC= $qtC;
 
         return $this;
     }
     public function setDesC($DesC)
     {
         $this->DesC = $DesC;
 
         return $this;
     }
     public function setPrixC($prixC)
     {
         $this->prixC = $prixC;
 
         return $this;
     }


}

	

	


?>