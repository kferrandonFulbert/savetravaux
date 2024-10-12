<?php
//session_start();

require_once('../../libs/Smarty.class.php');
require_once('../Library/KFramework/class.php');
require_once('../Library/Helper/helper.php');
require_once('fonction.php');

$config = new ini('../Application/config/config.ini');
$myconnect = new BD($config->getClef('dbuser'), $config->getClef('dbmdp'), $config->getClef('dbname'), $config->getClef('dbserveur'));

$admin = new Smarty();

$chemin = "../templates/".$config->getClef('css')."/";
$admin->assign('chemin',$chemin);
$admin->assign('titre', $config->getClef('titre'));
$admin->assign('description', $config->getClef('description'));
$template = '';
$cheminTemplate = $chemin.'admin/';

           $page = isset($_GET['page']) ? $_GET['page'] : 'accueil';
            $pages = array('accueil' => 'accueil.html',
                'verif' => 'verif.html',
                'ajouter' => 'ajouter.html',
                'modifier' => 'modifier.html',
                'supprimer' => 'supprimer.html',
                'deconnection' => 'deconnection.html',
                'partenaires' => 'partenaires.html',
                'mention' => 'mention.html',
                '' => 'accueil.html'
            );
           $includePage = isset($_GET['page']) ? $_GET['page'] : 'accueil';
            $includePages = array('accueil' => 'accueil.php',
                'verif' => 'verif.php',
                'ajouter' => 'ajouter.php',
                'modifier' => 'modifier.php',
                'supprimer' => 'supprimer.php',
                'deconnection' => 'deconnection.php',
                'partenaires' => 'partenaires.php',
                'mention' => 'mention.php',
                '' => 'accueil.php'
            );
            if (array_key_exists($includePage, $includePages)) {
                include($includePages[$includePage]);
            }

$admin->allow_php_tag = true;
            if (array_key_exists($page, $pages)) {
                $template = $pages[$page];
                $admin->assign('template',$cheminTemplate.$template);
                //include($pages[$page]);
            }
            
    $req = "select * from kfannuaire";
    $resultat =$myconnect->execRequete($req);
    $partenaire = array();
    while ($row = mysql_fetch_array($resultat)) {
	array_push($partenaire, $row);
    }
$admin->assign('partenaire', $partenaire);
    $bouton = new Bouton('bouton', 'bouton', 'Retour');
    $bouton->AjoutAction('rel', 'prev');
    $bouton->AjoutAction('onClick', 'javascript:window.history.go(-1)');
    
    $admin->assign('btnValider', elementHTML::Bouton('submit', 'bouton', 'Valider')->affiche());
    $admin->assign('btnRetour', $bouton->affiche());
    $admin->assign('cheminTemplate', $cheminTemplate);

    $admin->display($chemin.'admin/index.html');
?>
