<?php
ob_start();
session_start();
$p_title = "Items";
include 'init.php';
?>

<?php
include "include/templates/footer.php";
ob_end_flush();
?>