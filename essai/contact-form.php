<?php
/* Email du destinataire (mettez ici votre email) */
// $destinataire = "contact@graphicdesigner.fr";
$destinataire = "kevin_ferrandon@hotmail.com";
/* Récupération */
$objet = $_POST['objet'];
$email = $_POST['email'];

$message = "message de ".$email."\r\n\r\n";
$message .= $_POST['message'];

$header  = 'From: emeteur <'.$email.'>'."\r\n";
$header .= 'Mime-Version: 1.0'."\r\n";
$header .= 'Content-type: text/html; charset=utf-8'."\r\n";
$header .= "\r\n";
if(mail( $destinataire , $objet , $message, $header)){
header('Location: index.html');
}
else{
 echo "Impossible d'envoyer le mail...";
}
?>