<?php
/**
 *  Class Formulaire
 * @author Kevin FERRANDON
 */

 abstract class Formulaire{
     var $methode, $script, $nom, $classeCss;
     var $modeTable = false, $orientation, $transfertFichier = 0;
     var $entetes=array(), $champs=array(), $nbChamps=0, $nbLignes=0, $centre=true;
 }
?>
