<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Dashbord</title>
</head>

<body class="bg-dark">
  <div class="text-light text-center bg-success">
    <div class="container py-4 d-flex justify-content-between">
      <a href=" " class="fs-4">
        NEZA SUPERMARKET SYSTEM
      </a>
      <span>
        <?php
        if (isset($_SESSION['User'])) {
        ?>

          <a class="text-light badge " style="text-decoration: none;" href="home.php">Home</a>
          <a class="text-light badge " style="text-decoration: none;" href="customers.php">Customer</a>
          <a class="text-light badge " style="text-decoration: none;" href="products.php">Purchase</a>
          <a class="text-light badge " style="text-decoration: none;" href="invoces.php">Invoice</a>
          <a class="text-light badge " style="text-decoration: none;" href="report.php">Report</a>
          <a class="text-light badge bg-primary" style="text-decoration: none;" href="logout.php">Logout</a>
        <?php

        } else {
        ?>
          <a class="text-light badge bg-primary" style="text-decoration: none;" href="index.php">Login</a>
          <a class="text-light  badge bg-primary" style="text-decoration: none;" href="signup.php">Register</a>

        <?php
        }
        ?>
      </span>
    </div>
  </div>