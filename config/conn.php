<?php
require_once("lib/functions.php");
try {
    $conn = mysqli_connect("localhost", "root", "", "Invoice");
} catch (\Throwable $th) {
    redirect("/uwi/config/init_db.php");
}
