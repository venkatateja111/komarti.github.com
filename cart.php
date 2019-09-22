<?php
require("includes/common.php");
if (!isset($_SESSION['email_id'])) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Cart | Life Style Store</title>
       <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
            body{
                background: url(img/cart.jpg);
                height: 100%;
                width: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover; 
            }
            table{
                
                background-color: blue;
            }
            td{
                color:yellow;
            }
            th{
                color:black;
            }
            a{
                color: #0f0f0f;
            }
           
            
            
        </style>
    </head>
    <body>
        <br><br><br><br>
        
        <div class="container-fluid" id="content">
            <?php include 'includes/header.php'; ?>
            
            <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table  table-bordered">
    
                        <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        $query = "SELECT p.price, p.id, p.name  FROM users_products up INNER JOIN products p ON up.product_id = p.id WHERE up.user_id='$user_id' and status='Added to cart'";
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        $query1 = "SELECT up.quantity FROM users_products up INNER JOIN products p ON up.product_id = p.id WHERE up.user_id='$user_id' and status='Added to cart'";
                        $result1 = mysqli_query($con, $query1)or die(mysqli_error($con));
                        $total = 0;
                        if (mysqli_num_rows($result) >= 1) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Item Number</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Cost</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while (($row = mysqli_fetch_array($result)) && ($row1 = mysqli_fetch_array($result1))) {
                                    $sum = 0;
                                    $sum+= $row['price']*$row1['quantity'];
                                    $total = $total+$sum;
                                    echo "<tr><td>" . "#" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>Rs " . $row['price'] . "</td><td>".$row1['quantity']."</td><td>".$sum."</td><td><a href='cart-remove.php?id={$row['id']}'> Remove</a></td><td><a href='cart-increase.php?id={$row['id']}'>Add</a> </td></tr>";
                                
                                    
                                    }
                              
                                echo "<tr><td></td><td>Total</td><td>Rs " . $total . "</td><td><a href='success.php' class='btn btn-primary'>Confirm Order</a></td></tr>";
                                ?>
                            </tbody>
                            <?php
                        } else {
                            echo "Add items to the cart first!";
                        }
                        ?>
                        <?php
                        ?>
                    </table>
                   
                </div>
            </div>
        </div>
        <div class="navbar-fixed-bottom">
        <?php include("includes/footer.php"); ?>
        </div>
                        

    </body>
</html>