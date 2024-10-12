<?php

/**
 * Description of headerTitle
 *
 * @author kferrandon
 */
class headerTitle {
    protected $titre;
    public function __construct($titre='') {
        $this->titre = "<title>$titre</title>";
    }
    public function affiche(){
        return $this->titre;
    }
}

?>
