<?php

/**
 * Description of baliseHTML
 *
 * @author kferrandon
 */
abstract class baliseHTML {
    protected $attr;
    protected $style;
    protected $codeHTML;
    protected $balise;
    public function __construct($balise,$style=array(), $attr=array()) {
        $this->style = new styleElement($style);
        $this->attr = new attributElement($attr);
        $this->balise = $balise;
    }
    public function affiche(){
        return $this->codeHTML;
    }
    public function setStyle($style){
        $this->style = new styleElement($style);
    }
    

}

?>
