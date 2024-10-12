<?php
//include 'Personnage_abstract.php';

class Personnage{
   protected $force;
   protected $age;
   protected $dexterite;
   protected $charisme;
   protected $nom;
   protected $vie;
   protected $race;
   
   public function __construct() {
       
   } 
   public function init($force, $age, $dexterite, $charisme, $nom, $vie, $race){
       $this->race = new race($race);
       $this->force = $force;
       $this->age = $age;
       $this->charisme = $charisme;
       $this->dexterite = $dexterite;
       $this->nom = $nom;
       $this->vie = $vie;   
       
   }
   public function getNom(){
       return $this->nom;
   }
   public function getAge(){
       return $this->age;
   }
   
   
}



?>
