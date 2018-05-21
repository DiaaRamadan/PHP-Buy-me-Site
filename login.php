<?php
ob_start();
$errorArray = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['login'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $hash_password = sha1($password);
          if(!empty($_POST['username'])&&!empty($_POST['password'])){
            $query = "SELECT * FROm `users` WHERE `username` = '$username' AND `password` = '$hash_password'";
            if($query_run = mysql_query($query)){
                $result = mysql_fetch_array($query_run);
                $num_row = mysql_num_rows($query_run);
                if($num_row >0){
                  $_SESSION['user'] = $username;
                  $_SESSION['user_id'] = $result['id'];
                  header('location:index.php');
                }else{
                  echo "Invalid Username Or Password";
                } 
            }
         }else{
          echo "Enter Username And Password";
        }
     }
   }

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['register'])){
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
        $phone = filter_var($_POST['phone'], FILTER_VALIDATE_INT);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $user_type = $_POST['user-type'];
        $hash_password = sha1($password);

      // uplode image
      $imagename = $_FILES['image']['name'];
      $imageSize = $_FILES['image']['size'];
      $imageType = $_FILES['image']['type'];
      $imageTemp = $_FILES['image']['tmp_name'];
      $imageAllowExt = array('jpg','jpeg','png');
      $iamgeUserExt = strtolower(end(explode('.', $imagename)));
      $uploadeimage = rand(0,1000000).'_'.$imagename;
      move_uploaded_file($imageTemp,"../Trining_project/uploded_image/".$uploadeimage);
      
      
      if(!empty($imageAllowExt) && !in_array($iamgeUserExt,$imageAllowExt)){
        $errorArray [] = "This type of images not allow";
      }

      if($imageSize > 4194304){
            $errorArray [] = "The image should be less than or equal 4MB";
      }
      
      if(empty($errorArray)){
        if(!empty($username) && !empty($password) && !empty($fullname) && !empty($email) && !empty($user_type) ){
          $queryemail ="SELECT `username` FROM `users` WHERE `username` = '$username'";
          $query ="SELECT `username` FROM `users` WHERE `username` = '$username'";
          if($query_run = mysql_query($query)){
              $num_rows = mysql_num_rows($query_run);
              if($num_rows > 0){
                header('location: erro.php');
              }else{
                $query2="INSERT INTO `users` ( `username`, `password`, `email`, `name`,`phone`,`Date`,`image`) VALUES('$username','$hash_password','$email','$fullname','$phone',now(),'$uploadeimage')";
                if($query_run = mysql_query($query2)){
                    header('location:con.php');
                }
              } 
          }
       }
      }else {
        foreach ($errorArray as $error) {
          echo "<div class = 'insert-errors alert alert-danger container'>".$error."</div>";
        }
      }
   }
 }
 ob_end_flush();
?>

   
       
  