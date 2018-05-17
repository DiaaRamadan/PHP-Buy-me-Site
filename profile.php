<?php
ob_start();
session_start();
$p_title = "Items";
include 'init.php';
?>
<div class = 'profile'>
    <div class = 'container'>
        
    </div>
</div>

<?php
include "include/templates/footer.php";
ob_end_flush();
?>