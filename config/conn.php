<?php
try {
    $conn=mysqli_connect("localhost","root","","Invoice");
    } catch (\Throwable $th) {
        Header("Location: /uwi/config/init_db.php");
    }