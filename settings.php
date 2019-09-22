<?php
require_once("includes/common.php");
if (!isset($_SESSION['email_id'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>Settings | Life Style Store</title>
       <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
            body{
                background: url(img/settings.jpg);
                height: 100%;
                width: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover; 
            }
            h4{
                color: yellowgreen;
            }
            
            
        </style>
    </head>
    <body>
        <br><br><br><br>
        <?php include 'includes/header.php'; ?>
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <h4> change name</h4>
                    <form action="settings_script.php" method="POST">
                    <div class="form-group">
                                <input class="form-control" placeholder="first_name" name="first_name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="last_name" name="last_name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                         <?php echo $_GET['error1']??''; ?>
                         </form>
                    <h4> change e-mail</h4>
                    <form action="settings_script.php" method="POST">
                    <div class="form-group">
                                <input type="email" class="form-control"  placeholder="enter new email_id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="new_email_id" required = "true">
                            </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                         <?php echo $_GET['error2']??''; ?>
                    </form>
                    <h4>Change Password</h4>
                    <form action="settings_script.php" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old-password"  placeholder="Old Password" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="New Password" required = "true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password1"  placeholder="Re-type New Password" required = "true">
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                        <?php echo $_GET['error3']??''; ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="navbar-fixed-bottom">
        <?php include("includes/footer.php"); ?>
        </div>
    </body>
</html>