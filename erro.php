<?php
//path variable 
$p_title = 'Error...';
$templates = "include/templates/";
$functions_page = "include/functions/";
//All includes pages

include $functions_page."functions.php";
include $templates."header.php";
?>

<div class = 'erro-massage'>
    <i class = 'erro fa fa-frown-o'></i>
    <span>The user or email is not valid...</span>
    <?php redirect('The user or email is not valid...', 'back'); ?>
    <div>
        <a href = "index.php"><button class = 'btn btn-danger'>Go Home</button></a>
    </div>    
</div>
<script src="<?php echo $js;?>jquery-3.2.1.min.js"></script>
<script src="<?php echo $js;?>bootstrap.min.js"></script>
<script src="<?php echo $js;?>jquery-ui.min.js"></script>
<script src="<?php echo $js;?>jquery.selectBoxIt.min.js"></script>
<script src="<?php echo $js;?>main.js"></script>
</body>
</html>