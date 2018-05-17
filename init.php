<?php
//path variable 

$templates = "include/templates/";
$functions_page = "include/functions/";
//All includes pages

include $functions_page."functions.php";
include $templates."header.php";
include $templates."navbar.php";
include "connect.php";
include 'login.php';
?>