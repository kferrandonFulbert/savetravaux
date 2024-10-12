<?php

/**
 * Description of img
 *
 * @author kferrandon
 */
class img extends baliseHTML{
    protected $source;
    public function __construct($src, $style = array(), $attr=array()) {
        parent::__construct('', 'img', $style, $attr);
        $this->source = $src;
        $this->codeHTML =  '<'.$this->balise.' src="'.$this->source.'" style="'.$this->style.'" />';
    }
    public function affiche() {
      //   $this->codeHTML= '<'.$this->balise.' src="'.$this->source.'" style="'.$this->style.'" />';
         return $this->codeHTML;
    }
}

?>
