<?php require_once 'auth_conf.php' ?>
<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: index.php");
exit;
?>
