<?php

/**
 * Description of attributElement
 *
 * @author kferrandon
 */
class attributElement {
    protected $attr;
    protected $codeAttr;
    public function __construct($attr = array()) {
     //   $this->attr = $attr;
        $this->setAttr($attr);
    }
    public function __toString() {
        return $this->codeAttr;
    }
    public function setAttr($attr){
         $this->attr = $attr;
        $this->codeAttr = '';
        foreach ($this->attr as $key => $value) {
           $this->codeAttr .= $key.'="'.$value.'" ';
        }
    }
    public function getAttr(){
        return $this->codeAttr;
    }
}

?>
