<?php
ob_start();
session_start();
$p_title = "Items";
include 'init.php';
$item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ? intval($_GET['item_id']):0; 
$userid = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if(isset($_POST['comment']) && !empty($_POST['comment'])) {
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
        $query = "INSERT INTO `comments`(`comment`, `user_id`, `item_id`, `date`) VALUES ('$comment','$userid','$item_id',now())";
        if($query_run = mysql_query($query)) {
            redirect('<div class = " container alert alert-success">Your comment add <strong>successfully</strong></div>', 'back');
        }
    }else {
        echo '<div class = " container alert alert-danger">Comment field shouldn\'t be <strong>empty</strong></div>';
        
    }
}else {
    echo 'Can not reach to this page';
}
include "include/templates/footer.php";
ob_end_flush();
?>