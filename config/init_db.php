<?php
$conn1=@mysqli_connect("localhost","root","");
$conn;
$stmt="CREATE DATABASE Invoice";
try {
    if(mysqli_query($conn1,$stmt)){
        $conn=@mysqli_connect("localhost","root","","Invoice");
        
        $stmt1="CREATE Table Customers( customerid int(11) primary key auto_increment, customername text NOT 
        NULL)";
        $stmt2="CREATE TABLE  Products ( id int(11) primary key auto_increment, productsoldnumber varchar(20) 
        NOT NULL, item text NOT NULL, quantity int(11) NOT NULL, unit int(11) NOT 
        NULL,total int(11) NOT NULL, date date NOT NULL, customerid int(11) )";
        $stmt3="CREATE TABLE Users(userId int primary key auto_increment, Username varchar(30),password 
        varchar(30))";
        if(mysqli_query($conn,$stmt1)&&mysqli_query($conn,$stmt2)&&mysqli_query($conn,$stmt3))
        Header("Location: /uwi");
        else {
            echo"Failled To create Tables";
        }
    }
    else {
        echo"Failled";
    }
} catch (\Throwable $th) {
   print_r($th);
}
?>