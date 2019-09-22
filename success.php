<?php

require("includes/common.php");
if (!isset($_SESSION['email_id'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];
//$item_ids_string = $_GET['item_id'];

//We will change the status of the items purchased by the user to 'Confirmed'
$query = "UPDATE users_products SET status='Confirmed' WHERE user_id=" . $user_id . " AND  status='Added to cart'";
mysqli_query($con, $query) or die($mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Success | Life Style Store</title>
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
            #a{
                
                height: 100%;
                width: 100%;
                
            }
           
        </style>
        
    </head>
    
        <?php include 'includes/header.php'; ?>
    <body>
        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="jumbotron">
                      <h3 align="center">Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
                <img src="img/success.jpg" id="a">
            </div>
        </div>
        <div class="navbar-fixed-bottom">
        <?php include("includes/footer.php");
        ?>
        </div>
    </body>
</html>