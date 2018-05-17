<?php
$username = "localhost";
$root = "root";
$password = "";
$DB_name = "shoping";

$conn =@mysql_connect($username, $root, $password);

if(!$conn||!mysql_select_db($DB_name)){
    die(mysql_error());
    
}
?>