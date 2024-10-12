<?php
/**
 * @author Kevin FERRANDON
 * 
 **/
   
class ini{
   var $chNomFichier; // fichier + chemin
   var $tableValeur;
   function ini($fichier=''){
      $this->chNomFichier = $fichier;
      $this->tableValeur = parse_ini_file($fichier);
      //$this->init();
   }
   function init($fichier=''){
    
     $this->tableValeur = parse_ini_file($fichier);
    
   }
   function getClef($clef){
     // while (list($key, $val) = each($this->tableValeur))
      foreach($this->tableValeur as $key => $val)
        {
       // echo $key.' : '.$val;
          if($key==$clef){return $val;}
        }
       // return 'Clef introuvable';
    }
}
/*
$fichier = dirname(__FILE__)."/fichier.ini";
$tableauIni = parse_ini_file($fichier);
while (list($key, $val) = each($tableauIni))
{
    switch $key {
      case 'mail': $mail = $val;
      break;
      default:
    echo $key.' : '.$val;  
    }
    
}
*/
?>
