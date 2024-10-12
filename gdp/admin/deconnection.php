<?php
session_destroy();
//redirection();
           $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
?>
<script language="javascript" type="text/javascript">

window.location.replace("<?php echo "http://$host$uri/"; ?>");

</script>