<?php
require("includes/common.php");
if (isset($_SESSION['email_id'])) {
  header('location: products.php');
}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Lifestyle Store</title>
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css">
    </head>
    <body>
         <?php
         include 'includes/header.php';
         ?>
        
        <div id="banner_image">
            <div class="container">
                <center>
                <div class="banner_content">
                    <h1> We sell lifestyle </h1>
                    <p style="font-size:14px;">Flat 40% OFF on premium brands</p>
                    <a href="products.php" class="btn btn-danger active"> Shop Now </a>
                </div>
                </center>
            </div>
        </div>
       <?php
         include 'includes/footer.php';
         ?>
    </body>
</html>
    
