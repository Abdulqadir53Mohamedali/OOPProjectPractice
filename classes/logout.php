<?php

include "..//connection/connection.php";

session_start();
unset($_SESSION['cart']); 
$_SESSION = array();
session_destroy();
header("Location:/practice/homepage.php");
exit;

?>
