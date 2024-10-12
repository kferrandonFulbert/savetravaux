<?php
/**
 * @author Kevin FERRANDON
 * @version 1.0 beta
 * Configuration : pour configurer ajouter en face de la variable le libellé qui lui correspond
 */
// Config a la BDD
$config = array();
$config['dbBdd'] = 'clocking';
$config['dbUser'] = 'root';
$config['dbMdp'] = 'SENALIA86';
$config['dbServeur'] = 'ch-web-05';


$config['Template'] = 'default';

$smarty->assign("Titre","Clocking outil de gestion du temps");
$smarty->assign("Description","Clocking Un outil de gestion du temps full web pour gerer votre temps mais aussi le temps passer a travailler pour les autres services");


?>
