<?php
/**
 * Description of elementHTML
 *
 * @author Kevin FERRANDON
 */
class elementHTML {
   
    public function Bouton($type, $class=null, $libelle=null){
        return new Bouton($type, $class, $libelle);
    }

}
?>
