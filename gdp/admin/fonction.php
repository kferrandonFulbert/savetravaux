<?php

function redirection($param=null) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    if (!is_null($param)) {
        header("Location: http://$host$uri/$param");
    } else {
        header("Location: http://$host$uri/");
    };
    flush();
    die();
}

?>
