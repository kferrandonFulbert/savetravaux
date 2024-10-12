<?php

function __autoload($class_name) {
    include $class_name . '.php';
  //  echo $class_name;
}

function collisionBordure($objet,$objBordure){
    if($objet->getXMin()<$objBordure->getXMin()){
        return true;
    }
    if($objet->getXMax()>$objBordure->getXMax()){
        return true;
    }
    if($objet->getYMax()>$objBordure->getYMax()){
        return true;
    }
    if($objet->getYMin()<$objBordure->getYMin()){
        return true;
    }
    return false;
}
?>
