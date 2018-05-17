<!-- Start upper bar -->
<div class="upper-bar">
  <?php if(isset($_SESSION['user'])) { ?>
    <a href = "profile.php"> profile </a>
 <?php } ?>
</div>
<!-- End upper bar -->
<!-- Start main navbar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Buy me,</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav nav-js navbar-nav links">
        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
          <li><a href="catagory.php">Catagories</a></li>
        <li><a href="item.php">Market</a></li>
        <li><a href="#">About</a></li>
      </ul>
      <div class = "login-link-nav">
          <?php
            if(isset($_SESSION['user'])){?>
              <i class = "fa fa-unlock-alt"></i><a href = "logout.php">Logout</a>
          <?php }else{?> 
            <i class = "fa fa-lock fa-login"></i><span class = "login-nav access-links">Log In</span><span> |
            <i class = "fa fa-user fa-sign"></i><span class = "register-nav access-links">Register</span>
            </span> 
          <?php } ?>
      </div>
        <!-- Start login form -->
      <div class = "login-arrow"></div>
      <div class = "login-form-nav">
        <form class = "form-group" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
          <div>
            <label>UserName</label>
            <input class = "form-control" 
                   type = "text" 
                   name = "username" 
                   placeholder = "Username" 
                   required 
                   autocomplete= "off"/>
          </div>
          <div>
            <label>Password</label>
            <input class = "form-control" 
                   type = "password" 
                   name = "password" 
                   placeholder = "Password" 
                   required>
          </div>
          <div>
            <input class = "login-btn-nav btn btn-primary" type = "submit" name = "login" value = "Log In">
          </div>
        </form>
      </div>
      <!-- End login form -->
      <!-- Start register form -->
      <div class = "register-arrow"></div>
      <div class = "register-form-nav">
        <form class = "form-group" method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" enctype =        multipart/form-data >
          <div>
            <label>UserName</label>
            <input class = "form-control" 
                   type = "text" 
                   name = "username" 
                   placeholder = "Username" 
                   required>
          </div>
          <div>
            <label>Email</label>
            <input class = "form-control" 
                  type = "email" 
                  name = "email" 
                  placeholder = "Email" 
                  required>
          </div>
          <div>
            <label>Full name</label>
            <input class = "form-control" 
                   type = "text" 
                   name = "fullname" 
                   placeholder = "Full Name" 
                   required>
          </div>
          <div>
            <label>Password</label>
            <input class = "form-control" 
                    type = "password" 
                    name = "password" 
                    placeholder = "Password" 
                    required>
          </div>
          <div>
            <label>Phone number</label>
            <input class = "form-control" 
                   type = "text" 
                   name = "phone" 
                   placeholder = "Phone Optional">
          </div>
          <div class ="form-group-lg">
            <label>Image</label>
            <input  type = "file"  
                    name = "image" 
                    class = "form-control" />
          </div>
          <div>
            <label>User Type</label>
              <select class="user-sign-type form-control" name="user-type" required='required'>
                <option value="0">...</option>
                <option value="normal">Normal User</option>
                <option value="campany">Campany</option>
              </select>
          </div>
          <div>
            <input class = "login-btn-nav btn btn-success" 
                   type = "submit" 
                   name = "register" 
                   value = "Register">
          </div>
        </form>
      </div>
      <!-- End register form -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- End Main navbar -->