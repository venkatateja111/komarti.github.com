<?php
if (isset($_SESSION['email_id'])) {
     $con = mysqli_connect("localhost","root", "", "e-commerce") or die(mysqli_error($con));
    $que = "select `first_name` from `users` where `email_id` = '".$_SESSION['email_id']."'";
    $que1 = mysqli_query($con, $que) or die($mysqli_error($con));
    $row = mysqli_fetch_array($que1);
    $_SESSION['name'] = $row['first_name'];
    $name = $_SESSION['name'];
}
?>


<div class="navbar navbar-inverse navbar-fixed-top"> 
    <div class="container"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button> 
            <a class="navbar-brand" href="index.php">Lifestyle Store</a> 
        </div> 
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right"> 
                <?php 
                
                   
                    if (isset($_SESSION['email_id'])) { 
                    ?> <li><a href = "cart.php"><span class = "glyphicon glyphicon-shopping-cart"></span> Cart </a></li>
                    
                    <li class="dropdown">
                        <a href="#" class=" dropdown-toggle" data-toggle="dropdown" ><span class = "glyphicon glyphicon-user"> <b><?php echo "hello   ".$name  ?></b></span></a> 
                   
                         <ul class="dropdown-menu">
                    <li><a href = "settings.php"><span class = "glyphicon glyphicon-user"></span> Settings</a></li> 
                    <li><a href = "logout_script.php"><span class = "glyphicon glyphicon-log-in"></span> Logout</a></li>
                         </ul>
                    </li>
                    
                    </div>
    
                     <?php
                      }
else { 
    ?> 
  <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
  <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
      <?php } ?>
            </ul> 
        </div> 
    </div> 