<?php

/**
 * Description of styleElement
 *
 * @author kferrandon
 */
class styleElement {

    protected $codestyle;
    
    public function __construct($style=array()) {
        $this->codestyle='';
        $this->setStyle($style);
    }
    public function __toString() {
        return $this->codestyle;
    }

    public function getStyle(){
        return $this->codestyle;
    }
    public function setStyle($style){
        $this->codestyle = '';
        foreach ($style as $key => $value){
          $this->codestyle .= $key.':'.$value.';';  
        }
    }
}

?>
