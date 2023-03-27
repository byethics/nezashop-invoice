<?php
ob_start();
include_once("./partials/header.php");
include_once("./config/conn.php");

if(!isset($_GET['cid'])){
    header("location:Products.php");
}
 if(!isset($_SESSION['ponumber'])){
$res="p".date("dmy-h:m:s")."-".rand(0,50);
$_SESSION['ponumber']=$res;  
 }
 ?>

<div class="container mt-4">

    <form action="" method="post" class="w-50">
     Start Date   <input type="date" name="start" class="form-control my-1">
     Ending Date    <input type="date" name="end"  class="form-control my-1">  <input  class="btn btn-success" type="submit" value="Submit" name="search"><br>
    </form>
    <table border='1' class="table mt-4  table-bordered">
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>invoiceNumber</th>
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
            $stmt="SELECT * From Products inner Join Customers Where Products.customerid=Customers.customerid AND date>='$start' and date<='$end' And Products.customerid='$_GET[cid]'";
            $stmt2="SELECT sum(total) From Products inner Join Customers Where Products.customerid=Customers.customerid AND date>='$start' and date<='$end' And Products.customerid='$_GET[cid]'";
        }
        else{
            
            $stmt="SELECT * From Products inner Join Customers Where Products.customerid=Customers.customerid And Products.customerid='$_GET[cid]'";
            $stmt2="SELECT sum(total) From Products inner Join Customers Where Products.customerid=Customers.customerid And Products.customerid='$_GET[cid]'";
        }
        $sql=mysqli_query($conn,$stmt);
        $sql2=mysqli_query($conn,$stmt2);
        $res=mysqli_fetch_array($sql2);
        $no=1;
        while($row=mysqli_fetch_array($sql)){
         
    ?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $row['date'];?></td>
        <td> 
  
        <a href="shop.php?invno=<?php echo $row['productsoldnumber'];?>&cid=<?php echo $row['customerid'];?>">
            <?php echo $row['productsoldnumber'];?> 
        </td>
        <td><?php echo $row['item'];?></td>
        <td><?php echo $row['quantity'];?></td>
        <td><?php echo $row['unit'];?></td>
        <td><?php echo $row['total'];?></td>
    
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

<?php
include_once("./partials/footer.php");
?>