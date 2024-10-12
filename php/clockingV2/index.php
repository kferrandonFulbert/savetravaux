<?php

session_start();
require_once('libs/Smarty.class.php'); 
require_once('Library/KFramework/class.php');
require_once('Library/Helper/helper.php');
 include('fonction.php');
 $smarty = new Smarty;
 require_once ('Application/config.php');
$smarty->compile_check = true;
$smarty->debugging = false;

$myconnect = new BD($config['dbUser'], $config['dbMdp'], $config['dbBdd'], $config['dbServeur']);

$template = "../templates/".$config['Template']."/";

$smarty->assign('template', $template);

$smarty->display('default/index.html');
        
 ?>