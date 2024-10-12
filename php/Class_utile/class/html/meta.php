<?php

/**
 * Description of meta
 *
 * @author kferrandon
 */
class meta {
    protected $codehtml;
    
    public function __construct($nom='',$contenu='') {
        $this->setMeta($nom, $contenu);
    }
    public function setMeta($nom, $contenu){
        $this->codehtml = '<meta name="'.$nom.'" content="'.$contenu.'" />';
    }
    public function affiche(){
        return $this->codehtml;
    }
}

?>
