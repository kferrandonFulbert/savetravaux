<?php
function __autoload($class_name) {
    include 'class/'.$class_name . '.php';
}
include_once 'class/html2/class.php';
//include_once 'class/chrono.php';
$chrono = new chrono();
$html = new html('',true);
//$html->head->titre('bonjour petit test');
$titre=new titre('test2','h5');

$titre->setStyle(array('color'=>'#ff0cf6'));

echo $titre->setAndGet();

$style = array('color'=>'#ff0000', 'border-style'=>'solid');
$attr=array('title'=>'petit test de title', 'width'=>'150px');
$html->titre('test', 'h2', $style);

echo "<br /><br />fin :  ".$chrono->stop();
echo $html->affiche();


?>
