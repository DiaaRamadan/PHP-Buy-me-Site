<?php
ob_start();
session_start();
$p_title = "Profile";
include 'init.php';
$userId = $_SESSION['user_id'];
$page = isset($_GET['page']) ? $_GET['page']:'Manage';
$users = userInfo('*', 'users', 'id', $userId);
if($page=='Manage') {
?>
<div class = 'profile'>
    <div class = 'container'>
        <div class = 'profile-user-info'>
            <?php
               foreach ($users as $user) {                   
                   echo '<img src="uploded_image/'.$user["image"].'" class="img-responsive img-thumbnail" />';
                   echo "<div class=profile-caption>";
                        echo "<a href = 'profile.php?page=Edit'><i class='fa fa-edit'> Edit</i></a>";
                        echo "<span>Full name: ".$user['name']."</span>";
                        echo "<span>E-mail: ".$user['email']."</span>";
                        echo "<span>Registered date: ".$user['Date']."</span>";
                    echo "</div>";
                }
              
            ?>
        </div>
    </div>
</div>
<?php }else if($page == 'Edit'){ ?>
    <div class = 'profile-edit'>
        <div class = 'container'>
            <h1 class='text-center'>Profile Information</h1>
           <form class = "form-group" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>"                     enctype =multipart/form-data >

                <div class='pedit'>
                <label class = "col col-md-3">Full name</label>
                <input class = "form-control col col-md-8" 
                    type = "text" 
                    name = "fullname" 
                    placeholder = "<?php echo  $user =userInfo('name', 'users', 'id', $userId); ?>" 
                    required>
                </div>
                <div class='pedit'>
                <label class = "col col-md-3">Password</label>
                <input class = "form-control col col-md-8" 
                    type = "password" 
                    name = "password" 
                    placeholder = "New Password" 
                    required>
                </div>
                <div class='pedit'>
                <label class = "col col-md-3">Phone number</label>
                <input class = "form-control col col-md-8" 
                    type = "text" 
                    name = "phone" 
                    placeholder = "Phone Optional">
            </div>
            <div class='pedit form-group-lg'>
                <label class = "col col-md-3">Image</label>
                <input  type = "file"  
                        name = "image" 
                        class = "form-control col col-md-8" />
            </div>

            <div>
            <input class = "profile-edit-btn btn btn-primary col-sm-offset-3" 
                   type = "submit"  
                   value = "Update">
          </div>

            </form>

        </div>
    </div>
<?php 



} ?>



<?php
include "include/templates/footer.php";
ob_end_flush();
?>