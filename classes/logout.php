<?php

include "..//connection/connection.php";

session_start();
$_SESSION = array();
session_destroy();
header("Location:/practice/homepage.php");
exit;

?>
