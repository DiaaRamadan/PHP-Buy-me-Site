<?php
ob_start();
session_start();
$p_title = "Items";
include 'init.php';
$page = isset($_GET['page']) ? $_GET['page']:'Manage';
$catname = isset($_GET['catname']) ? $_GET['catname']:'Manage';
$catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET['catid']):0; 
$item_id = isset($_GET['item_id']) && is_numeric($_GET['item_id']) ? intval($_GET['item_id']):0; 
$errorArray = array();
$userId = '';
if(isset($_SESSION['user_id'])){
    $userId =  $_SESSION['user_id'];
}
$query = "SELECT * FROM `catagories`";
$query_run_cat = mysql_query($query);
if($page == 'Manage'){
    $query = "SELECT items.*,catagories.cat_name 
        FROM items 
        INNER JOIN catagories
        ON items.itemcat_id = catagories.cat_ID ORDER BY `item_id` DESC";
        $query_run = mysql_query($query);
?>
    <h1  class = "text-center market-header">The Market<h1>
    <div class = "related-item">
                    <div class = "container">
                        <div class = "row">
                            <div class = "cat-items-rlt">
                                  <?php while($result = mysql_fetch_array($query_run)) { ?>
                                    <div class="col col-md-3 col-sm-6">
                                    <div class = "every-item ">
                                        <img src='uploded_image/<?php echo $result['item_image']?>' class="img-responsive img-thumbnail" />
                                        <h3>Name: <?php echo $result['item_name'] ?></h3>
                                        <div>
                                            <span>Price: <?php echo $result['price'] ?></span>
                                        </div>
                                        <div>
                                            <span>Made in: <?php echo $result['conutry'] ?></span>
                                        </div>
                                    <div>
                                     <span>Added Date: <?php echo $result['item_date'] ?></span>
                                 </div>
                                 <div>
                                    <a href = 'item.php?page=itemInfo&item_id=<?php echo $result['item_id'] ?>'>Show details</a>
                                  </div>
                                </div> 
                        </div>    
                    <?php } ?>
                </div>
            </div>
         </div>
    </div>
<?php }
if($page == 'Add'){
?>
<div class = "add-item">
    <div class = "container">
        <div class ="add-header">
            <i class = 'add-left-face fa fa-smile-o'></i>
            <h1 class ="text-center">Add Your Item</h1>
            <i class = 'add-right-face fa fa-smile-o'></i>
        </div>
        <hr>
       <form class = "form-group" method="POST" action = "item.php?page=Insert" enctype = multipart/form-data >
            <!-- Start item name -->
                <div class = 'form-group form-group-lg'>
                    <label class = "col-md-3 control-label" >Name: </label>
                    <div class ="col-md-8" >
                        <input type = "text"
                            class = "form-control"
                            name = "item-name"
                            required
                            placeholder = "Item Name"
                            autocomplete = "off" />
                    </div>        
                </div>
                <!-- End item name -->
                <!-- Start item description -->
                <div class = 'form-group form-group-lg'>
                    <label class = "col-md-3 control-label">Description: </label>
                    <div class ="col-md-8" >
                        <input type = "text"
                            class = "form-control"
                            name = "item-description"
                            required
                            placeholder = "Item Description"
                            autocomplete = "off" />
                    </div>
                </div>
                <!-- End item description -->
                <!-- Start item price -->
                <div class = 'form-group form-group-lg'>
                    <label class = "control-label col-md-3">Price: </label>
                    <div class ="col-md-8" >
                        <input type = "text"
                            class = "form-control"
                            name = "item-price"
                            required
                            placeholder = "Item Price"
                            autocomplete = "off" />
                    </div>        
                </div>
                <!-- End item price -->
                <!-- Start item Image -->
                <div class = 'form-group form-group-lg'>
                    <label  class = "col-md-3 control-label">Item Image: </label>
                    <div class ="col-md-8" >
                        <input type = "file"
                            class = "form-control"
                            name = "item-image"
                            required
                            placeholder = "Item Image"
                            autocomplete = "off" />
                    </div>
                </div>
                <!-- End item Image -->
			    <!--start item country-->
				<div class="form-group form-group-lg">
					<label class = "col-md-3 control-label">Country</label>
					<div class ="col-md-8">
						<input type="text" 
                                name="country" 
                                class="form-control" 
                                required="required" 
                                placeholder="Country of made" 
                                autocomplete = "off" />
					</div>
				</div>
			    <!-- End item country -->
			    <!-- Start item status -->
				<div class="form-group form-group-lg">
					<label class = "col-md-3 control-label">Status</label>
					<div  class ="col-md-8 item-status-select">
						<select name="status" required="required">
							<option value="0">...</option>
							<option value="New">New</option>
							<option value="Like new">Like New</option>
							<option value="Used">Used</option>
							<option value="Very Old">Very Old</option>
						</select>
					</div>
				</div>
                <!-- End item status -->
                <!--start item Catagories -->
				<div class="form-group form-group-lg">
					<label class = "col-md-3 control-label">Catagories</label>
					<div  class ="col-md-8 item-status-select">
						<select name="catagory" required="required">
							<option value="0">...</option>
                            <?php
                                while($cats = mysql_fetch_array($query_run_cat)) {

                                   echo " <option value=".$cats[cat_ID].">".$cats[cat_name]."</option>";
                                }
                            ?>
						</select>
					</div>
				</div>
                <!--end item status-->
                <!-- Start btn add-->
						<div class="form-group form-group-lg">
							<div class="col-sm-offset-3 col-sm-10 btn-add">
                                <i class = "fa fa-plus"></i>
								<input type="submit" value="Add Item" class="btn btn-primary btn-lg">
							</div>
						</div>
			    <!-- End btn add-->
       </form>
    </div>
</div>

<?php }else if($page =='itemInfo') { 

        $query = "SELECT items.*, users.name FROM items
        JOIN users ON users.id = items.itemuser_id 
        WHERE items.item_id='$item_id'";
        $query_run = mysql_query($query);
        $itemInfo = mysql_fetch_array($query_run);
    ?>
    <div class ="the_item_info">
        <div class = "container">
            
                <h1 class = 'text-center'><?php echo $itemInfo['item_name'] ?></h1>
                <img src='uploded_image/<?php echo $itemInfo['item_image']?>' class="img-responsive img-thumbnail" />
                <p><?php echo $itemInfo['item_name'] ?></p>
                <span><?php echo $itemInfo['item_price'] ?></span>
                <p><?php echo $itemInfo['item_name'] ?></p>
        </div>
    </div>

<?php 
}



else if  ($page =='Insert') {
    echo "<div class = 'insert-page'>";
        echo "<h1 class= 'text-center'>Insert Item</h1>";
        if($_SERVER['REQUEST_METHOD'] =='POST') {
            if(isset($_POST['item-name']) && isset($_POST['item-description']) && isset($_POST['item-price']) && isset($_FILES['item-image']) && isset($_POST['country']) && isset($_POST['status']) && isset($_POST['catagory'])){
                $name = $_POST['item-name'];
                $description = $_POST['item-description'];
                $price = $_POST['item-price'];
                $country = $_POST['country'];
                $status = $_POST['status'];
                $catagory = $_POST['catagory'];

                // uplode image
                $imagename = $_FILES['item-image']['name'];
                $imageSize = $_FILES['item-image']['size'];
                $imageType = $_FILES['item-image']['type'];
                $imageTemp = $_FILES['item-image']['tmp_name'];
                $imageAllowExt = array('jpg','jpeg','png','gif');
                $iamgeUserExt = strtolower(end(explode('.', $imagename)));
                $uploadeimage = rand(0,1000000).'_'.$imagename;
                move_uploaded_file($imageTemp,"../Trining_project/uploded_image/".$uploadeimage);

            if(strlen($name) < 3){
                $errorArray [] = 'Item name Should be Greater Than 3 chars';
            } 
            if(!empty($imageAllowExt) && !in_array($iamgeUserExt,$imageAllowExt)){
                $errorArray [] = "This type of images not allow";
            }

            if($imageSize > 4194304){
                    $errorArray [] = "The image should be less than or equal 4MB";
                }

           if(empty($errorArray)){
                $query2 = " INSERT INTO `items`(`item_name`, `price`, `item_date`, `item_description`, `itemuser_id`, `itemcat_id`, `conutry`, `status`, `item_image`) VALUES ('$name','$price',now(),'$description','$userId','$catagory','$country
                ','$status','$uploadeimage')";
                if($query_run_items = mysql_query($query2)) {
                    echo '"<div class = "alert alert-success container">"Your Item Added"</div>"';
                }
            }

            foreach ($errorArray as $error) {
                    echo "<div class = 'insert-errors alert alert-danger container'>".$error."</div>";
             }
            }
        }
     echo "</div>";        
    }else if($page =='Category_items'){
        $query3 = "SELECT items.*,catagories.cat_name 
        FROM items 
        INNER JOIN catagories
        ON items.itemcat_id = catagories.cat_ID
        WHERE catagories.cat_ID = '$catid' ORDER BY `item_id` DESC";
        if($query_run = mysql_query($query3)) {
            $num_rows = mysql_num_rows($query_run);
            if($num_rows > 0) {?>
                <div class = "related-item">
                    <div class = "container">
                        <div class = "row">
                        <h1 class = "main-h1-cat text-center"><?php echo $catname; ?> devision</h1>
                            <div class = "cat-items-rlt">
                                  <?php while($result = mysql_fetch_array($query_run)) { ?>
                                        <div class="every-item col col-md-3 col-sm-6">
                                            <img src='uploded_image/<?php echo $result['item_image']?>' class="img-responsive img-thumbnail" />
                                            <h3>Name: <?php echo $result['item_name'] ?></h3>
                                            <p>Description: <?php echo $result['item_description'] ?></p>
                                            <div>
                                                <span>Price: <?php echo $result['price'] ?></span>
                                            </div>
                                            <div>
                                                <span>Made in: <?php echo $result['conutry'] ?></span>
                                            </div>
                                            <div>
                                                 <span>Added Date: <?php echo $result['item_date'] ?></span>
                                            </div>
                                        </div>    
                                  <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
               
           <?php }else {
                echo "This Category is empty No ):";
            }
        }
    }
?>

<?php
include "include/templates/footer.php";
ob_end_flush();
?>
