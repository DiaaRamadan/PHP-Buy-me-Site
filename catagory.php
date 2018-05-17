<?php
ob_start();
session_start();
$p_title = "Catagories page";
include 'init.php';
?>
<div class = "catagory-page">
    <div class = "container">
        <div class = "cat">
            <!-- Start search about the Catagory -->
            <div class = "cat-search">
                <form class = "form-group" action="catagory.php?page=Insert" method = "GET">
                <i class = "fa fa-search i-input"></i>
                    <input type="text" 
                            class = "form-control search-input" 
                            name = "search" 
                            placeholder = "Search About Catagory" />
                    <i class = "fa fa-search i-btn"></i>
                    <input  type="submit" 
                            value = "search"
                            name = 'Search'
                            class = "btn btn-primary search-btn" />        
                </form>
            </div>
            <?php
            if($_SERVER['REQUEST_METHOD']=='GET'){
                if(isset($_GET['search'])){
                    $search_name =$_GET['search'];
                    if(!empty($search_name)){
                        $query = "SELECT * From `catagories` WHERE `cat_name` LIKE '%$search_name%'";
                        if($query_run = mysql_query($query)){
                            $num_row = mysql_num_rows($query_run);
                            if($num_row > 0){
                                while ($result = mysql_fetch_array($query_run)){
                                    echo '<div class = "cat-info-search">';
                                        echo '<h2><a href = "item.php?page=Category_items&catid='.$result['cat_ID'].'&catname='.$result['cat_name'].'">'.$result['cat_name'].'</a></h2>';
                                        echo '<p>'.$result['cat_description'].'</p>';
                                        echo "<span>Added Date: \"".$result['date']."\"</span>";
                                    echo '</div>';
                                }
                            }else{
                                echo 'No Items Matched';
                            }
                        }
                    }

                } 
            }
            ?>
            <!-- End search about the Catagory -->
            <!-- Start Retreive the Catagories from Database -->
            <?php
                $query = "SELECT * From `catagories` ORDER BY `cat_ID` DESC";
                if($query_run = mysql_query($query)){?>
                    <div class = "panel panel-default">
                        <div class = "panel-heading">
                            <i class = "fa fa-tag"></i>
                            <h2>Catagories:</h2>
                            <div class = "selected toggle-info">
                                <i class = "fa fa-plus cat-show-hide"></i>
                            </div>
                        </div>
                        <div class = "panel-body">
                       <?php while ($result = mysql_fetch_array($query_run)) { ?>
                                <div class = "cat-info">
                                    <h3> <?php echo $result['cat_name'] ; ?></h3>
                                    <p><?php echo $result['cat_description'] ; ?></p>
                                    <span>Added Date: <?php echo $result['date'] ;?></span>
                                    <div class = "cat-btn-manage">
                                        <a href = "item.php?page=Category_items&catid=<?php echo $result['cat_ID'] ?>&catname=<?php echo $result['cat_name'] ?>"><button  class = "btn btn-info">Show items</button></a>
                                        <?php if(isset($_SESSION['user'])) {?>
                                        <a href = "item.php?page=Add"><button  class = "btn btn-primary">Add Item</button></a>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                </div>
                      <?php } ?>
                    </div>    
          <?php } ?>
            <!-- End Retreive the Catagories from Database -->
        </div>
    </div>
</div>

<?php
include "include/templates/footer.php";
ob_end_flush();
?>
