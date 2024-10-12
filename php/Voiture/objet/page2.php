<?php


// page2.php:
  
  // nous avons besoin de la définition de la classe
  // pour qu'unserialize() fonctionne
  include("a.php");

  $s = file_get_contents('store');
  $a = unserialize($s);

  // appel de show_one() sur l'objet $a, affiche 1
  $a->show_one();
?>
