<?php

function __autoload($class_name) {
    include $class_name . '.php';
}
// class devant être hérité
include_once 'styleElement.php';
include_once 'attributElement.php';
include_once 'baliseHTML.php';

//les class utilisées
include_once 'elementHTML.php';
include_once 'img.php';
include_once 'br.php';

?>
