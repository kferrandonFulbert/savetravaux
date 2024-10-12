<?php
include 'objet/class.php';

$bomber = new hero(300, 600, 'hero', '.jpg', 40);
$bomber->init('bomberman');

echo $bomber->getNom().'<br />';

echo $bomber->affiche();

        $_POST['hero'] = $bomber;
        $param = base64_encode(serialize($bomber));   
?>
<?php 
include 'direction.php';

$circuit = new cadre();
$circuit->creaBord(800, 600, 50, '#00aa00');
echo $circuit->afficheBordure();
$bomber->attach($circuit);
echo '<br /><br /><br /><br /><br /><div style="">'.$circuit->afficheLimit().'</div>';
?>
<!-- <img src="test.php" style="position:absolute;top:500px;left:200px;"/> -->
