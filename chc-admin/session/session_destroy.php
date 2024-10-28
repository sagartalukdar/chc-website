<?php
session_start();
unset ($_COOKIE['pop']);
setcookie('pop', null, -1);
//unset($_SESSION['email_id']);
session_destroy();
header('location: ../sign-in.php');
exit();
?>