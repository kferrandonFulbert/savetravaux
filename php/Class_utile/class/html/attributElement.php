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
        $this->attr = $attr;
        $this->setAttr();
    }
    protected function setAttr(){
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
