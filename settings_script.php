<?php

// This page updates the user password
require("includes/common.php");
if (!isset($_SESSION['email_id'])) {
    header('location: index.php');
}
$new_email = mysqli_real_escape_string($con, $_POST['new_email_id']);
$old_pass = mysqli_real_escape_string($con, $_POST['old-password']);
$old_pass = MD5($old_pass);
$new_pass = mysqli_real_escape_string($con, $_POST['password']);
$new_pass = MD5($new_pass);
$new_pass1 = mysqli_real_escape_string($con, $_POST['password1']);
$new_pass1 = MD5($new_pass1);

$query = "SELECT email_id, password FROM users WHERE email_id ='" . $_SESSION['email_id'] . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$row = mysqli_fetch_array($result);
$orig_pass = $row['password'];

if(strlen($new_email)>0)
{
$query1 = "UPDATE `users` SET `email_id` = '$new_email' WHERE `email_id`= '".$_SESSION['email_id']."' AND `password`='$orig_pass'";
        mysqli_query($con, $query1) or die($mysqli_error($con));
        $_SESSION['email_id'] = $new_email;
        header('location: settings.php?error2=E-mail Updated');
}
else if(strlen($old_pass) >0 && strlen($new_pass) > 0)        
{
if ($new_pass != $new_pass1) {
    header('location: settings.php?error3=The two passwords don\'t match');
} else {
    if ($old_pass == $orig_pass) {
        $query = "UPDATE  users SET password = '" . $new_pass . "' WHERE email_id = '" . $_SESSION['email_id'] . "'";
        mysqli_query($con, $query) or die($mysqli_error($con));
        header('location: settings.php?error3=Password Updated');
    } else
        header('location: settings.php?error3=Wrong Old Password');
}
}
?>