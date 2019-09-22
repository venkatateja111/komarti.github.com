<?php
require("includes/common.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $con = mysqli_connect("localhost","root", "", "e-commerce") or die(mysqli_error($con));
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query1 = "select * from `users_products` where `product_id` = '$item_id' and `user_id`='$user_id' and `status`='Added to cart'";
    $query3 = "select `status` from `users_products` where `product_id` = '$item_id' and `user_id`='$user_id' ";
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    $result1 = mysqli_query($con, $query3) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    $row2 = mysqli_fetch_array($result1);
    $quantity1 = mysqli_num_rows($result);
    $quantity = $row['quantity'];
    $status = $row2['status'];
    
    if(($quantity1==0) || ($quantity1==0) && ($status=='Confirmed'))
    {
        $quantity = 1;
        $_SESSION['quantity'] = $quantity;
       // $_SESSION['quantity'] = $quantity;
    $query = "INSERT INTO `users_products`(`user_id`, `product_id`, `quantity`,`status`) VALUES('$user_id', '$item_id','$quantity', 'Added to cart')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    }
 else {
     
     $quantity = $quantity + 1;
     $_SESSION['quantity'] = $quantity;
     
        $query2 = "UPDATE `users_products` SET `quantity` = '$quantity' WHERE `product_id`= '$item_id' AND `user_id`='$user_id'";
        mysqli_query($con, $query2) or die(mysqli_error($con));
    }
  
    header('location: products.php');
    
}
?>   