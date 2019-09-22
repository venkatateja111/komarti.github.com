<?php

require("includes/common.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"]; 
    $user_id = $_SESSION['user_id'];
    $query1 = "select * from `users_products` where `product_id` = '$item_id' and `user_id`='$user_id' ";
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    $quantity = $row['quantity'];
    
        $quantity = $quantity + 1;
        $_SESSION['quantity'] = $quantity;
        $query2 = "UPDATE `users_products` SET `quantity` = '$quantity' WHERE `product_id`= '$item_id' AND `user_id`='$user_id'";
        mysqli_query($con, $query2) or die(mysqli_error($con));
    
    header("location:cart.php");
}
?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

