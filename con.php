<?php
//path variable 
$p_title = 'Congratulation...';
$templates = "include/templates/";
$functions_page = "include/functions/";
//All includes pages

include $functions_page."functions.php";
include $templates."header.php";
?>

<div class = 'con-massage'>
    <i class = 'con fa fa-smile-o'></i>
    <span>congratulation...</span>
    <div>
        <a href = "index.php"><button class = 'btn btn-info'>Go Home</button></a>
    </div>    
</div>
<script src="<?php echo $js;?>jquery-3.2.1.min.js"></script>
<script src="<?php echo $js;?>bootstrap.min.js"></script>
<script src="<?php echo $js;?>jquery-ui.min.js"></script>
<script src="<?php echo $js;?>jquery.selectBoxIt.min.js"></script>
<script src="<?php echo $js;?>main.js"></script>
</body>
</html>