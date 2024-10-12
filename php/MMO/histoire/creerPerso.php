<?php 
include '../objet/ChargeObjet.php'; 

?>

<?php

if(empty($_POST['Nom'])){
    echo "Le nom saisi est incorect";
}
else{
    $hero = new Personnage();
    switch ($_POST['camp']){
        case "Ligue": 
            $hero->init(12,$_POST['Age'], 12, 12, $_POST['Nom'], 100, "HUMAIN");
             echo 'Bonjour '.$hero->getNom().' tu as '.$hero->getAge(). ' ans <br />Bienvenue dans la Ligue';
            break;
        case "Horde":
             $hero->init(14,$_POST['Age'], 11, 6, $_POST['Nom'], 100, "HUMAIN");
             echo 'Bonjour '.$hero->getNom().' tu as '.$hero->getAge(). ' ans. <br />J\'espère que tu es pret a mourire';
            break;
        default :
             $hero->init(12,$_POST['Age'], 12, 12, $_POST['Nom'], 100, "HUMAIN");
             echo 'Bonjour '.$hero->getNom().' tu as '.$hero->getAge(). ' ans <br />';
        
    }

}
?>
