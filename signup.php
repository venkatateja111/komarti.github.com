<?php
require("includes/common.php");
if (isset($_SESSION['email_id'])) {
    header('location: products.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Signup | Life Style Store</title>
       <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
            body{
                background-color: rgba(0,0,0,0.8);
                background: url("img/back.jpg");
                
            }
            h2{
                color: yellow;
                
            }
            input{
                background-color: pink;
            }
        </style>
            
    </head>
    <body>
        
        <div><?php include 'includes/header.php'; ?></div>
        
        <br><br><br><br><br><br>
        <div class="col-md-offset-1">
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        
                            <h2> SIGN UP</h2>

                       
                        <form  action="signup_script.php" method="POST">
                            <div class="form-group">
                                <input class="form-control" placeholder="first_name" name="first_name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="last_name" name="last_name"  required = "true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="email_id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="email_id" required = "true">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" pattern=".{6,}" name="password" required = "true">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control"  placeholder="phone" maxlength="10" size="10" name="phone" required = "true">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <?php echo $_GET['error']??''; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
            <?php include "includes/footer.php"; ?>
        
        
    </body>
</html>