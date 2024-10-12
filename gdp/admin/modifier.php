<?php
//cas update de la base
if (isset($_POST['modifier'])) {
    if ($_POST['modifier'] == 1) {
        $nom = htmlspecialchars($_POST['nom']);
        $url = urlencode($_POST['url']);
        $codehtml = htmlspecialchars($_POST['codehtml']);
        $description = htmlspecialchars($_POST['description']);
        $lang = htmlspecialchars($_POST['lang']);
        $dir = $_POST['dir'];
        $target = $_POST['target'];
        $id = $_POST['id'];
        $sql = "
UPDATE kfannuaire
SET
   nom = '$nom', url = '$url', codehtml = '$codehtml', description = '$description',
   lieu = '$lang', dir='$dir', target='$target'
WHERE
   id_annuaire=$id
";
        $myconnect->execRequete($sql);
           $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  ?>
<script language="javascript" type="text/javascript">

window.location.replace("<?php echo "http://$host$uri/?page=verif"; ?>");

</script>
<?php

    }
} else {
       $target = array('_blank','_self', '_top', '_parent');
       $admin->assign('target', $target);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "
SELECT * FROM kfannuaire
WHERE id_annuaire=$id
";
        $res = $myconnect->execRequete($sql);

    $rowAnnuaire = array();
        while ($row = mysql_fetch_array($res)) {
        array_push($rowAnnuaire, $row);
    }
    $admin->assign('annuaire', $rowAnnuaire);

    }
}
?>
