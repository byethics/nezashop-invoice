<?php
require_once("lib/functions.php");
require_once("lib/mysqli.php");

if (isset($_POST['signup'])) {
    $usn = mysqli_real_escape_string($conn, $_POST['usn']);
    $psw1 = mysqli_real_escape_string($conn, $_POST['psw']);
    $psw2 = mysqli_real_escape_string($conn, $_POST['psw2']);
    if ($psw1 != $psw2)
        echo "<script>alert('Password not matching'); location.href='index.php';</script>";
    $sql = mysqli_query($conn, "INSERT INTO Users values(null,'$usn','$psw2')") or die("failled");
    if ($sql) {
        echo "<script>alert('user added'); location.href='index.php';</script>";
    }
}
if (isset($_POST['edit-customer'])) {
    $customer = mysqli_real_escape_string($conn, $_POST['names']);
    $sql = mysqli_query($conn, "update Customers set customername='$customer' WHERE customerId='$_POST[cid]'") or die("failled");
    if ($sql) {
        echo "<script>alert('Customer updated'); location.href='customers.php';</script>";
    }
}

if (isset($_GET['trid'])) {
    $sql = mysqli_query($conn, "DELETE FROM products WHERE id='$_GET[trid]'") or die("failled");
    if ($sql) {
        $cid = $_GET['cid'];
        redirect("shop.php?cid=$cid");
    } else
        echo "failled";
}
if (isset($_GET['cid'])) {
    $sql = mysqli_query($conn, "DELETE FROM Customers WHERE customerid='$_GET[cid]'") or die("failled");
    if ($sql) {
        redirect("customers.php");
    } else
        echo "failled";
}
