<?php
require_once('../libs/Smarty.class.php'); 
require_once('Library/KFramework/class.php');
require_once('Library/Helper/helper.php');
 include('fonction.php');
    $config = new ini('Application/config/config.ini');
    $myconnect = new BD($config->getClef('dbuser'), $config->getClef('dbmdp'), $config->getClef('dbname'), $config->getClef('dbserveur'));
        
$index = new Smarty();
$chemin = "templates/".$config->getClef('css')."/";
$index->assign('chemin',$chemin);
$index->assign('titre',$config->getClef('titre'));
$index->assign('description', $config->getClef('description'));
   
/****
 * pagination
 */

$req = "select count(*) from kfannuaire";
    $resultat =$myconnect->execRequete($req);
    $row = mysql_fetch_row($resultat);
    $total = $row[0];
    $epp = $config->getClef('enregistrementParPage'); // nombre d'entr�es � afficher par page (entries per page)
 $countp = ceil($total/$epp); // calcul du nombre de pages $countp (on arrondit � l'entier sup�rieur avec la fonction ceil() )
 
if(!isset($_GET['p']) || !is_numeric($_GET['p']) ) // si $_GET['p'] n'existe pas OU $_GET['p'] n'est pas un nombre (petite s�curit� suppl�mentaire)
    $current = 1; // la page courante devient 1
  else
  {
    $page = intval($_GET['p']); // stockage de la valeur enti�re uniquement
    if ($page < 1) $current=1; // cas o� le num�ro de page est inf�rieure 1 : on affecte 1 � la page courante
    elseif ($page > $countp) $current=$countp; //cas o� le num�ro de page est sup�rieur au nombre total de pages : on affecte le num�ro de la derni�re page � la page courante
    else $current=$page; // sinon la page courante est bien celle indiqu�e dans l'URL
  }



 $start = ($current * $epp - $epp);
  /* Appel de la fonction */

  
    $req = "select * from kfannuaire  LIMIT $start, $epp";
    $resultat =$myconnect->execRequete($req);
    $rowAnnuaire = array();
    while ($row = mysql_fetch_array($resultat)) {
	array_push($rowAnnuaire, $row);
}


 $pagination = paginate($_SERVER['PHP_SELF'], '?p=', $countp, $current);
  
$index->assign('pagination',$pagination);
  /**********    
   * fin pagination
   **********/
$index->assign('annuaire', $rowAnnuaire);


        $bouton = new Bouton('submit', 'bouton', 'Retour');
        $bouton->AjoutAction('onClick', 'javascript:window.history.go(-1)');
        $btn = $bouton->affiche();
        $index->assign('bouton', $btn);  

$index->display($config->getClef('css').'/index.html');
?>
   
 
