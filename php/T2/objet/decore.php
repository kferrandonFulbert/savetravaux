<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of decore
 *
 * @author kferrandon
 */
class decore extends objet implements SplObserver {

    protected $action;

    public function __construct($posX, $posY, $img, $extention, $action) {
        parent::__construct($posX, $posY, $img, $extention);
        $this->action = $action;
    }
    
    public function parler(){
        echo '<div top="'.$this->getPosY().'" left="'.$this->getPosX().'" >bonjour comment vas tu?</div>';
    }

    public function update(SplSubject $s) {
        
        if (($s->getXMax() >= $this->getPosX()) && ($s->getYMin() <= $this->getPosY())
           //    && ($s->getPosX() <= $this->getXMax()) && ($s->getPosY() >= $this->getYMin())
                ) {
      //      $s->gauche();
            $this->parler();
        }

       // return true;
    }

}

?>
