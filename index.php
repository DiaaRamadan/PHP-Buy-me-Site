<?php
ob_start();
session_start();
$p_title = "Home";
include "init.php";
?>  
<div class="home-side">
    <div class=" home-content">
        <div class="container">
                <div class="bars">
                <!-- Start Slider-->
                <div id="site-slide" class="carousel slide" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="layout/images/slid1.jpg" alt="image not found">
                      <div class="carousel-caption">
                      </div>
                    </div>
                    <div class="item">
                      <img src="layout/images/slid2.jpg" alt="image not found">
                      <div class="carousel-caption">
                      </div>
                    </div>
                    <div class="item">
                      <img src="layout/images/slid3.jpg" alt="image not found">
                      <div class="carousel-caption">
                      </div>
                    </div>
                  </div>
                  <!-- Controls -->
                  <a class="left carousel-control" href="#site-slide" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#site-slide" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <!-- Start side bar -->
                <div class="side-bar">
                    <div class="content">
                        <p><span>Buy me,</span> help you to find the product that you need, and other products that you may be needed. <strong>Try to enjoy</strong></p>
                    </div>
                     <div class="items-content">
                        <h4>Shoping Now:</h4>
                         <div class="items-link">
                             <i class="fa fa-book"></i>
                            <a href="#"><span>Market</span></a>
                         </div>
                         <div class="items-link">
                             <i class="fa fa-car"></i>
                            <a href="#"><span>Cars</span></a>
                         </div>
                         <div class="items-link">     
                            <i class="fa fa-black-tie"></i>
                            <a href="#"><span>Clothes</span></a>
                         </div>    
                         <div class="items-link">
                             <i class="fa fa-book"></i>
                            <a href="#"><span>Books</span></a>
                         </div>
                         <div class="items-link">
                             <i class="fa fa-laptop"></i>
                            <a href="#"><span>Electronics</span></a>
                         </div>
                         <div class="items-link">
                            <i class="fa fa-medkit"></i>
                            <a href="#"><span>Beauty&Healthy</span></a>
                         </div>
                </div>
                <!-- End Side bar -->
            </div>
        </div>
            <!-- Start Products Part -->
            <div class="products">
            <div class="cat-type">
                    <h3>Clothes Devision</h3>
                    <div class="row">
                       <div class="item">
                                <?php
                                $query ="SELECT items.* 
                                FROM items 
                                INNER JOIN catagories 
                                ON catagories.cat_ID = items.itemcat_id 
                                WHERE catagories.cat_name='Clothes' ORDER BY `item_id` DESC LIMIT 4";
                                if($query_run = mysql_query($query)) { 
                                    while($result = mysql_fetch_array($query_run)){    
                                        echo '<div class="col col-md-3 col-sm-6">';
                                            echo "<img src='uploded_image/".$result['item_image']."' >";
                                            echo "<div class='caption'>";
                                                echo "<a href = '#'><h4>".$result['item_name']."</h4></a>";
                                                echo "<span>Price:".$result['price']."</span>";
                                                echo "<p>Added date: ".$result['item_date']."</p>";          
                                            echo "</div>";
                                        echo "</div>";    
                                        
                                        }
                                    }  
                                ?>
                        </div>  
                    </div>
                </div>
          <!-- End Products Part -->
           <!-- Start cars -->
              
                <div class="cat-type">
                    <h3>Cars Devision</h3>
                    <div class="row">
                       <div class="item">
                                <?php
                                $query ="SELECT items.* 
                                FROM items 
                                INNER JOIN catagories 
                                ON catagories.cat_ID = items.itemcat_id 
                                WHERE catagories.cat_name='Cars' ORDER BY `item_id` DESC LIMIT 4";
                                if($query_run = mysql_query($query)) { 
                                    while($result = mysql_fetch_array($query_run)){    
                                        echo '<div class="col col-md-3 col-sm-6">';
                                            echo "<img src='uploded_image/".$result['item_image']."' >";
                                            echo "<div class='caption'>";
                                                echo "<a href = '#'><h4>".$result['item_name']."</h4></a>";
                                                echo "<span>Price:".$result['price']."</span>";
                                                echo "<p>Added date: ".$result['item_date']."</p>";          
                                            echo "</div>";
                                        echo "</div>";    
                                        
                                        }
                                    }  
                                ?>
                        </div>  
                    </div>
                </div>
              <!-- Endcars -->
              <!-- Start Electronics-->
              
              <div class="cat-type">
                    <h3>Electorinecs Devision</h3>
                    <div class="row">
                       <div class="item">
                                <?php
                                $query ="SELECT items.* 
                                FROM items 
                                INNER JOIN catagories 
                                ON catagories.cat_ID = items.itemcat_id 
                                WHERE catagories.cat_name='Electorinecs' ORDER BY `item_id` DESC LIMIT 4";
                                if($query_run = mysql_query($query)) { 
                                    while($result = mysql_fetch_array($query_run)){    
                                        echo '<div class="col col-md-3 col-sm-6">';
                                            echo "<img src='uploded_image/".$result['item_image']."' >";
                                            echo "<div class='caption'>";
                                                echo "<a href = '#'><h4>".$result['item_name']."</h4></a>";
                                                echo "<span>Price:".$result['price']."</span>";
                                                echo "<p>Added date: ".$result['item_date']."</p>";          
                                            echo "</div>";
                                        echo "</div>";    
                                        
                                        }
                                    }  
                                ?>
                        </div>  
                    </div>
                </div>
            <!-- End Electronics -->
    <!-- End Products part -->
        </div>
 </div>
<?php
include "include/templates/footer.php";
ob_end_flush();
?>