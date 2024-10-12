<?php

/**
 * Description of elementHTML
 *
 * @author Kevin FERRANDON
 */
abstract class Bouton_abstract {

    protected $type;
    protected $classCss;
    protected $libelle;

     function __construct($argType, $argClassCss=null, $argLibelle=null){
        $this->type = $argType;
        $this->classCss = $argClassCss;
        $this->libelle = $argLibelle;
    }

    abstract public function Affiche();
}
?>
