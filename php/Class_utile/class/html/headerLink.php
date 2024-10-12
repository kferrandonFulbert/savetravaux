<?php

/**
 * Description of headerLink
 *
 * @author kferrandon
 */
class headerLink {
    protected $codeHtml;
    
    public function __construct($rel='', $type='', $href='') {
        $this->setLink($rel, $type, $href);
    }
    public function setLink($rel, $type, $href){
        $this->codeHtml = '<link rel="'.$rel.'" type="'.$type.'" href="'.$href.'" />';
    }
    public function affiche(){
        return $this->codeHtml;
    }

}

?>
