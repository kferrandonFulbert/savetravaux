<?php
mail("celtic28@free.fr", $subject, $message, "From: PHPMailer\nReply-To: $from\nX-Mailer: PHP/" . phpversion());
?>