<?php
/*function __autoload($class_name) {
    include 'class/'.$class_name . '.php';
}  */
include_once 'class/html2/class.php';
include_once 'class/chrono.php';
include_once 'class/pdo/Mypdo.class.php';

$chrono = new chrono();
$db = new MyPDO('config/config.ini');
$sql = 'Select nom from theme';

$a = $db->query($sql); 
$a->setFetchMode(PDO::FETCH_OBJ); 
//$themes = $a->fetch();
$tmp = 'Liste des themes : <br />'; 
  // var_dump($themes);
 //  die();
//$themes = '';
//$img= new img('http://www.frannuaire-gratuit.com/themes/frannuaire/images/banniere.png');
$p = new elementHTML('Bonjour tout le monde', 'p', array('top'=>'250px', 'text-align'=>'center'));
while( $themes = $a->fetch() ) // on récupère la liste des membres
{
        $tmp .= $themes->nom.'<br />'; // on affiche les membres
}
$rc = new br();  
$p2 = new elementHTML($tmp, 'p', array('color'=>'#8cf01a', 'font-size'=>'x-large'));
  $p2->setStyle(array('color'=>'#000', 'background-color'=>'#ff0000'));


$div = new elementHTML($p.$rc.$p2.$rc, 'div');
$div->setStyle(array('color'=>'#ff0cf7', 'background-color'=>'#ddd'));
$div->setAttr(array('title'=>'Petit test'));
//echo $div;
$tmp = $rc.'Temps d\'execution :'.$chrono->stop().' sec';
 
$title = new elementHTML('Mon titre', 'title');
$head = new elementHTML($title, 'head');
$body = new elementHTML($div.$tmp, 'body');
$html = new elementHTML($head.$body, 'html');
echo $html;
?>
