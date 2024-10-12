<?php

  include("a.php");
  
  $a = new A;
  $s = serialize($a);
  // enregistre $s quelque part ou page2.php peut le retrouver
  file_put_contents('store', $s);
?>
