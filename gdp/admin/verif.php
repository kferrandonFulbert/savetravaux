<?php 
$utilisateur = "";
$mdp = "";

if(isset($_POST['utilisateur'])){
    $utilisateur=$_POST['utilisateur'];
}
if(isset($_POST['password'])){
    $mdp=$_POST['password'];
}
$user=$config->getClef('user');
$password=$config->getClef('password');

$bAffiche=false;
// si ok
if(isset($_SESSION['user']) && isset($_SESSION['mdp'])){
$bAffiche=true;
}
if($user==$utilisateur && $mdp==$password){
    $_SESSION['user'] = $user;
    $_SESSION['mdp']   = $mdp;
$bAffiche=true;
}
else{
//redirection();
}
 $admin->assign('erreur', $bAffiche);
if($bAffiche){
       $req = "select * from kfannuaire";
    $resultat =$myconnect->execRequete($req);
    $rowAnnuaire = array();
    while ($row = mysql_fetch_array($resultat)) {
	array_push($rowAnnuaire, $row);
    }
$admin->assign('annuaire', $rowAnnuaire);
 
}

    ?>


