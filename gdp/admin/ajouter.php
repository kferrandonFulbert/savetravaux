<?php
define('vide', 'Vous devez saisir une valeur dans les champs obligatoire');
$berreur = false;
$chErreur = "";
if(isset($_POST['send'])){
    $url = urlencode($_POST['url']);
    $nom = htmlspecialchars($_POST['nom']);
    if(empty($url)|| empty($nom)){
      $berreur = true;
      $chErreur = vide;
    }
     if($berreur){
        echo "<div class='erreur'>".$chErreur."<br />";
        $bouton = new Bouton('bouton', 'bouton', 'Retour');
        $bouton->AjoutAction('onClick', 'javascript:window.history.go(-1)');
        $bouton->AjoutAction('rel', 'prev');
        echo $bouton->affiche();
        echo "</div>";
     }
     else{
    $description = htmlspecialchars($_POST['description']);
    $datecrea = date('Y-m-d');
    $target = htmlspecialchars($_POST['target']);
    $codehtml = htmlspecialchars($_POST['codehtml']);
    $dir = $_POST['dir'];
    $lang = htmlspecialchars($_POST['lang']);
    $tabInsert = array('url'=>$url,
                    'nom'=>$nom,
                    'description'=>$description,
                    'datecrea'=>$datecrea,
                    'target'=>$target,
                    'codehtml'=>$codehtml,
                    'dir'=>$dir,
                    'lieu'=>$lang,
        );
     $insert="";
        foreach ($tabInsert as $key=>$valeur){
            if($key=='lieu'){
                $insert .= " ".$key." = '".$valeur."' ";
            }else{$insert .= " ".$key." = '".$valeur."', ";}
        }


    $sql = "
INSERT INTO kfannuaire
set $insert ";

    $myconnect->execRequete($sql);
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  ?>
<script language="javascript" type="text/javascript">

window.location.replace("<?php echo "http://$host$uri/?page=verif"; ?>");

</script>
<?php
  }
}

?>
