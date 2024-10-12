<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of objetDeplacable
 *
 * @author kferrandon
 */
 class objet {

    protected $posX;
    protected $posY;
    protected $img;
    protected $image;
    protected $extention;
    protected $chemin;
    protected $infos_image;
    protected $observers = array();
    protected static $nbInstance;
   
    public function __construct($posX, $posY, $img, $extention) {
        self::$nbInstance++;
        $this->posX = $posX;
        $this->posY = $posY;
        $this->extention = $extention;
        $this->image = $img;
        $this->chemin = "./img/";
        $this->img = $this->chemin . $this->image . $this->extention;
         $this->infos_image = @getImageSize($this->img); // info sur la dimension de l'image
    }


    public function affiche() {
        $pos = '<img src="' . $this->img . '" style="position:absolute;left:' . $this->posX . ';top:' . $this->posY . '"/>';
        return $pos;
    }
    public function setImage($direction){
         $this->img = $this->chemin. $this->image . $direction . $this->extention;
         $this->infos_image = @getImageSize($this->img); // info sur la dimension de l'image
         $this->notify();
    }
    public function getTailleImageX(){
        
    }
    public function getPosX() {
        return $this->posX;
    }

    public function getPosY() {
        return $this->posY;
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
    public function setPosX($posX){
        $this->posX = $posX;
    }
    public function setPosY($posY){
        $this->posY = $posY;
    }
    public function getLargeur(){
        return $this->infos_image[0];
    }
    public function getHauteur(){
        return $this->infos_image[1];
    }
    
    public function __toString() {
        return get_class($this) . " " . $this->name;
    }

  

}

?>
