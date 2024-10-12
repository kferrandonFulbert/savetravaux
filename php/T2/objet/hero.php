<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hero
 *
 * @author kferrandon
 */
class hero extends objetDeplacable{
    public $nom;
    /**
     *
     * @param int $posX position en abscisse
     * @param int $posY
     * @param string $img
     * @param string $extention
     * @param int $avancement 
     */
  public function __construct($posX, $posY, $img, $extention, $avancement=40) {
      parent::__construct($posX, $posY, $img, $extention, $avancement);

    }
    public function init($nom){
        $this->setNom($nom);
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getNom(){
        return $this->nom;
    }
}

?>
