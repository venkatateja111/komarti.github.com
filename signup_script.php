<?php

require("includes/common.php");
$con = mysqli_connect("localhost","root", "", "e-commerce") or die(mysqli_error($con));
  $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
  $email_id = mysqli_real_escape_string($con, $_POST['email_id']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $password = MD5($password);
  $phone = mysqli_real_escape_string($con, $_POST['phone']);
  $query1 = "select email_id from `users` where `email_id` = '$email_id'";
  $result = mysqli_query($con, $query1) or die(mysqli_error($con));
  $num = mysqli_num_rows($result);
  if($num==0)
  {
    $query = "INSERT INTO `users`(`first_name`, `last_name`,`email_id`, `password`, `phone`) VALUES('$first_name', '$last_name', '$email_id','$password','$phone')";
    mysqli_query($con, $query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    $_SESSION['email_id'] = $email_id;
    $_SESSION['user_id'] = $user_id;
    header('location: products.php');
  }
  else
      header('location: signup.php?error=E-mail already exists');
  
    
   
 
?>