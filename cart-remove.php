<?php

require("includes/common.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"]; 
    $user_id = $_SESSION['user_id'];
    $query1 = "select * from `users_products` where `product_id` = '$item_id' and `user_id`='$user_id' ";
    $result = mysqli_query($con, $query1) or die(mysqli_error($con));
    $row = mysqli_fetch_array($result);
    $quantity = $row['quantity'];
    if($quantity > 1 )
    {
        $quantity = $quantity-1;
        $_SESSION['quantity'] = $quantity;
        $query2 = "UPDATE `users_products` SET `quantity` = '$quantity' WHERE `product_id`= '$item_id' AND `user_id`='$user_id'";
        mysqli_query($con, $query2) or die(mysqli_error($con));
    }
    else
    {
    
    // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    $query = "DELETE FROM users_products WHERE product_id='$item_id' AND user_id='$user_id' ";
    $res = mysqli_query($con, $query) or die($mysqli_error($con));
    }
    header("location:cart.php");
}
?>