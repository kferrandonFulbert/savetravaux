<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of titre
 *
 * @author kferrandon
 */
class titre extends baliseHTML{
    protected $message;
    protected $rang;

    public function __construct($msg, $balise,$style = array(), $attr=array()) {
        $this->message = $msg;
        $this->balise=$balise;
        parent::__construct($style, $attr);
        $this->attr = new attributElement($attr);

        if(empty ($rang) || !is_int($rang)){
            $rang = 1;
        }
        $this->rang = ((((int) $rang) >=1) && (((int) $rang)) <=6 )? "h".(int)$rang : "h1";
        $this->setBalise();
     
    }
    public function setBalise(){
        $this->codeHTML = '<'.$this->rang.' style="'.$this->style->getStyle().'" '.$this->attr->getAttr().'>'.$this->message.'</'.$this->rang.'>';
    }
  /*  public function affiche(){     
        return $this->balise;
    }*/
    public function setAndGet(){
        $this->setBalise();
        return $this->codeHTML;
    }
    
    
} 
?>
