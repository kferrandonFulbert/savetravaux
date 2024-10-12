<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicule
 *
 * @author kferrandon
 */
class vehicule {
    protected $nom;
    protected $marque;
    protected $nbRoue;
    protected $litreCarburant;
    protected static $nbVehicule = 0;
    protected $posX;
    protected $posY;
    protected $longueur;
    protected $hauteur;
    protected $infosImg;
    protected $img;
    public function __construct() {
       self::$nbVehicule++ ;
       $this->posX = 400;
       $this->posY = 400;
        $this->img = "./img/voiture.png";
        $this->infos_image = @getImageSize($this->img); // info sur la dimension de l'image

 //dimension 
/* $largeur = $infos_image[0]; // largeur de l'image
 $hauteur = $infos_image[1]; // hauteur de l'image
 $type    = $infos_image[2]; // Type de l'image
 $html    = $infos_image[3]; // info html de type width="468" height="60"
*/
    }
    public function __clone() {
        self::$nbVehicule++ ;
       
    }
    public function init($nom, $marque, $nbRoue, $litre){
        $this->nom = $nom;
        $this->marque = $marque;
        $this->nbRoue = $nbRoue;
        $this->litreCarburant = $litre;
    }
    
    public function getNom() {
       return $this->nom ;
    }
    public function getMarque() {
       return $this->marque ;
    }
    public function getRoue() {
       return $this->nbRoue ;
    }
    public function getLittre() {
       return $this->litreCarburant;
    }
    public function getnbVehicule() {
       return self::$nbVehicule;
    }
 /*   public function __toString() {
        return get_called_class();
    }*/
    protected function infoImg(){
        $this->infos_image = @getImageSize($this->img); // info sur la dimension de l'image
    }
    public function droite(){
        $this->posX += 10;
        $this->img = "./img/voitureD.png";
        $this->infoImg();
    }
    public function gauche(){
        $this->posX -= 10;
          $this->img = "./img/voitureG.png";
          $this->infoImg();
    }
    public function haut(){
        $this->posY -= 10;
          $this->img = "./img/voitureH.png";
          $this->infoImg();
    }
    public function bas(){
        $this->posY += 10;
        $this->img = "./img/voitureB.png";
        $this->infoImg();
    }
    public function getImgHtml(){
        return $this->infos_image[3];
    }
    public function affiche(){
        $pos = '<img src="'.$this->img.'" style="position:absolute;left:'.$this->posX.';top:'.$this->posY.'"/>';
        return $pos;
            
    }
    public function getXMin(){
        return $this->posX;
    }
    public function getXMax(){
        return ($this->posX+$this->infos_image[0]);
    }
    public function getYMin(){
        return $this->posY;
    }
    public function getYMax(){
        return ($this->posY+$this->infos_image[0]);
    }
   /* function __sleep() {   

    }
     function __wakeup() {

     }*/
}

?>
