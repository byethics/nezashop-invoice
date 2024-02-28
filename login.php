<?php
require_once "./config/conn.php";
session_start();
require_once("lib/functions.php");
$user = mysqli_real_escape_string($conn, $_POST['usn']);
$pass = mysqli_real_escape_string($conn, $_POST['psw']);
$sql = mysqli_query($conn, "SELECT * FROM Users WHERE Username='$user' AND password='$pass'");
if (isset($_SESSION['User'])) {
  redirect("/uwi/home.php");
}
if (mysqli_num_rows($sql) == 1) {
  $_SESSION['User'] = $user;
  redirect("home.php");
} else {
  echo "<script>alert('user name or password is not correct'); location.href='index.php';</script>";
}
