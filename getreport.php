<?php
ob_start();
session_start(); 
 if(!isset($_SESSION['ponumber'])){
$res="p".date("dmy-h:m:s")."-".rand(0,50);
$_SESSION['ponumber']=$res;  
 }
 
  include_once("./partials/header.php");
  include_once("./config/conn.php");
  include_once("./config/auth.php");

?>
<div class="container">

    <div class="bd">
        <h1>
            NEZA SUPER MARKET REPORT
        </h1>
    <hr>
    <form action="" method="post">
     Start Date   <input type="date"  class="form-control" name="start">
     Ending Date    <input type="date"  class="form-control" name="end"> 
      <input class="btn my-1 btn-success" type="submit" value="Submit" name="search"><br>
    </form>
    <table border='1' cellspacing="0" width="50%">
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Customer</th>
            <th>item</th>
            <th>Qt</th>
            <th>up</th>
            <th>Totp</th>
            
        </tr>
        <?php
        $num=$_SESSION['ponumber'];
        if(isset($_POST['start']) &&isset($_POST['end'])){
            $end=$_POST['end'];
            $start=$_POST['start'];
            $stmt="SELECT * From Products inner Join Customers Where Products.customerid=Customers.customerid AND date>='$start' and date<='$end'";
            $stmt2="SELECT sum(total) From Products inner Join Customers Where Products.customerid=Customers.customerid AND date>='$start' and date<='$end'";
        }
        else{
            
            $stmt="SELECT * From Products inner Join Customers Where Products.customerid=Customers.customerid";
            $stmt2="SELECT sum(total) From Products inner Join Customers Where Products.customerid=Customers.customerid";
        }
        $sql=mysqli_query($conn,$stmt);
        $sql2=mysqli_query($conn,$stmt2);
        $res=mysqli_fetch_array($sql2);
        $no=1;
        while($row=mysqli_fetch_array($sql)){
    ?>
    <tr>
        <td><?=$no?></td>
        <td><?=$row['date']?></td>
        <td><?=$row['customername']?></td>
        <td><?=$row['item']?></td>
        <td><?=$row['quantity']?></td>
        <td><?=$row['unit']?></td>
        <td><?=$row['total']?></td>
    
    </tr>
    <?php
    $no++;
        }
        ?>
        <tr>
            <td colspan="6">TOTAL</td>
            <td><?=$res['sum(total)']?></td>
        </tr>
    </table>
    
    </div>
</div>
<?php
  include_once("./partials/footer.php");

?>