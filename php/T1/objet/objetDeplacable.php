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
class objetDeplacable implements SplSubject {

    protected $posX;
    protected $posY;
    protected $img;
    protected $image;
    protected $avancement;
    protected $extention;
    protected $chemin;
    protected $infos_image;
    private $observers = array();
    private static $nbInstance;
   
    public function __construct($posX, $posY, $img, $extention, $avancement=40) {
        self::$nbInstance++;
        $this->posX = $posX;
        $this->posY = $posY;
        $this->avancement = $avancement;
        $this->extention = $extention;
        $this->image = $img;
        $this->chemin = "./img/";
        $this->img = $this->chemin . $this->image . "D" . $this->extention;
         $this->infos_image = @getImageSize($this->img); // info sur la dimension de l'image
    }

    public function droite() {
        $this->posX += $this->avancement;
        $this->setImage("D");
    }

    public function gauche() {
        $this->posX -= $this->avancement;
        $this->setImage("G");
    }

    public function haut() {
        $this->posY -= $this->avancement;
        $this->setImage("H");
    }

    public function bas() {
        $this->posY += $this->avancement;
        $this->setImage("B");
    }

    public function affiche() {
        $pos = '<img src="' . $this->img . '" style="position:absolute;left:' . $this->posX . ';top:' . $this->posY . '"/>';
        return $pos;
    }
    private function setImage($direction){
         $this->img = $this->chemin. $this->image . $direction . $this->extention;
         $this->infos_image = @getImageSize($this->img); // info sur la dimension de l'image
         $this->notify();
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

    public function __toString() {
        return get_class($this) . " " . $this->name;
    }

    /**
      Implemente SplSubject attach methode
     */
    public function attach(SplObserver $o) {
        $elements = array_keys($this->observers, $o);
        $notinarray = true;
        foreach ($elements as $value) {
//objects with the same attributes can be distinguished
//using identity operator but derived class with same
//attributes will be different
            if ($o === $this->observers[$value]) {
                $notinarray = false;
                break;
            }
        }
//On test s'il existe deja
        if ($notinarray) {
            $this->observers[] = $o;
        } else {
            echo "$o est déja observateur.<br />"; // plus pour debugger
        }
    }

    /**
      Implemente SplSubject detach methode
     */
    public function detach(SplObserver $o) {
//use the same logic to detach
        $elements = array_keys($this->observers, $o);
        foreach ($elements as $value) {
//objects with the same attributes can be distinguished
//using identity operator
//but derived class with same attributes will be different
            if ($o === $this->observers[$value]) {
                unset($this->observers[$value]);
                echo "$o is no longer an observer. <br />";
                break;
            }
        }
    }

    /**
      Implement SplSubject method
     */
    public function notify() {
        foreach ($this->observers as $value) {
            $value->update($this);
        }
    }

}

?>
