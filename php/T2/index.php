<?php

include 'objet/class.php';

$bomber = new hero(300, 400, 'hero', '.jpg', 40);
$bomber->init('bomberman');

echo $bomber->getNom() . '<br />';

echo $bomber->affiche();

$_POST['hero'] = $bomber;
$param = base64_encode(serialize($bomber));
?>
<?php

include 'direction.php';

$circuit = new cadre();
$circuit->creaBord(700, 500, 50, '#00aa00');

echo $circuit->afficheBordure();
$bomber->attach($circuit);
echo '<br /><br /><br /><br /><br /><div style="">' . $circuit->afficheLimit() . '</div>';


$fond = new objet(250, 540, 'fond', '.png');
//echo $fond->affiche();

$tabFond = array();
for($i=0;$i<11;$i++){
  for($j=0;$j<8;$j++){
      if($i==5&&$j==4){$img = 'tux';$action='parler';
            $tabFond[$j]=  new decore((250+($fond->getLargeur()*($i))), 540-($fond->getHauteur()*($j)), $img, '.png','parler');    
            $bomber->attach($tabFond[$j]);
      }else{$img = 'fond';$action='';
       $tabFond[$j]=  new objet((250+($fond->getLargeur()*($i))), 540-($fond->getHauteur()*($j)), $img, '.png'); 
      }
    echo $tabFond[$j]->affiche();
  }
}

 
?>

