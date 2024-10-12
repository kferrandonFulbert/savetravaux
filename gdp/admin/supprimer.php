<?php

if(isset($_GET['id'])){$id=$_GET['id'];}else{redirection();}
try{
    $sql = "
DELETE FROM kfannuaire
WHERE id_annuaire = $id
";

    $myconnect->execRequete($sql);
}
catch(Exception $e){
    echo 'Exception : ',  $e->getMessage(), "\n";
}
  
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  ?>
<script language="javascript" type="text/javascript">
window.location.replace("<?php echo "http://$host$uri/?page=verif"; ?>");
</script>
