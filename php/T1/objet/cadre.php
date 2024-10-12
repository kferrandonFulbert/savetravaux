<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of circuit
 *
 * @author kferrandon
 */
class cadre implements SplObserver  {
    protected $bloc;
    protected $x;
    protected $y;
    protected $bord;
    protected $limitXMin;
    protected $limitXMax;
    protected $limitYMax;
    protected $limitYMin;
    

    // bloc est un carré haut, droite, bas, gauche.
    public function __construct() {
        $this->bloc = Array();
        $this->x = 100;
        $this->y = 500;
        
    }
    public function creaBlocBas($i){
        $this->bloc[$i][0] = '0,0,1,0';
        $this->bloc[$i][0] = 'green';
        
    }
    public function creaBlocHaut($i){
        $this->bloc[$i][0] = '1,0,0,0';
        $this->bloc[$i][0] = 'green';
    }
    public function creaBord($longueur,$hauteur,$tailleBordure,$color){
        $this->bord = '<div style="z-index:-1;position: absolute;top:'.($hauteur+100).'px;left:200px;background-color:'.$color.';width:'.$longueur.'px;height:'.$tailleBordure.'px;">&nbsp;</div>
        <div style="z-index:-1;position: absolute;top:100px;left:200px;background-color: '.$color.';width:'.$tailleBordure.'px;height:'.$hauteur.'px;">&nbsp;</div> 
        <div style="z-index:-1;position: absolute;top:100px;left:200px;background-color: '.$color.';width:'.$longueur.'px;height:'.$tailleBordure.'px;">&nbsp;</div>
        <div style="z-index:-1;position: absolute;top:100px;left:'.(200+$longueur).'px;background-color: '.$color.';width:'.$tailleBordure.'px;height:'.($hauteur+50).'px;">&nbsp;</div>';
        $this->limitXMax = (200+$longueur);
        $this->limitXMin = (200+$tailleBordure);
        $this->limitYMin = (100+$tailleBordure);
        $this->limitYMax = (100+$hauteur);    
    }
    public function afficheBordure(){
        return $this->bord;
    }
    public function afficheLimit(){
        return "Limite : X($this->limitXMin,$this->limitXMax), Y($this->limitYMin, $this->limitYMax)";
    }
    public function getXMin(){
        return $this->limitXMin;
    }
    public function getXMax(){
        return $this->limitXMax;
    }
    public function getYMin(){
        return $this->limitYMin;
    }
    public function getYMax(){
        return $this->limitYMax;
    }
    
    public function __toString(){
        return get_class($this) . " " . $this->name;
    }
        /**
      Implement the one method of SplObserver
     */
    public function update(SplSubject $s) {
        
        if ($s->getXMax() >= $this->getXMax()) {
            $s->gauche();
        }
        if ($s->getXMin() <= $this->getXMin()) {
            $s->droite();
        }
        if ($s->getYMin() <= $this->getYMin()) {
            $s->bas();
        }
        if ($s->getYMax() >= $this->getYMax()) {
            $s->haut();
        }
       // return true;
    }
    
}

?>
