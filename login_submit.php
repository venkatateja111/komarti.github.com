<?php
require("includes/common.php");
$con = mysqli_connect("localhost","root", "", "e-commerce") or die(mysqli_error($con));
$email_id = mysqli_real_escape_string($con, $_POST['email_id']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$password = MD5($password);
$query = "SELECT id, email_id,first_name FROM users WHERE email_id='$email_id' AND password='$password'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);


// If the email and password are not present in the database, the mysqli_num_rows returns 0, it is assigned to $num.
if ($num == 0) {
  $error = "<span class='red'>Please enter correct E-mail id and Password</span>";
  header('location: login.php?error=' . $error);
} else {  
  $row = mysqli_fetch_array($result);
  $_SESSION['email_id'] = $row['email_id'];
  $_SESSION['user_id'] = $row['id'];
  $_SESSION['name'] = $row['first_name'];
  header('location: products.php');
}
