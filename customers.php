<?php
include_once("./partials/header.php");
include_once("./config/auth.php");

?>
<div class="container mt-4">

    <div class="bd">
        <h3>Customers</h3>
        <form action="app.php" method="post" >
       Customer Name 
       <div class="d-flex align-items-center gap-1">

           <input placeholder="muslim uwi" type="text" name="names" class="form-control" >
           <input  type="submit" value="Add CUSTOMER" name="add-customer" class="btn btn-success my-1">
        </div>
    </form>
    <form  method="post">
    <div class="d-flex align-items-center gap-1">
        <input  class="form-control flex-grow-1"  type="search" name="search" style="width:60%" placeholder="search"><input type="submit" class="btn btn-success my-1" value="Search">

    </div>
    </form>
    <hr>
    <table border='1' class="table">
        <tr>
            <th>No</th>
            <th>Names</th>
            <th colspan="3">Actions</th>
        </tr>
        <?php
        $search = isset($_POST['search'])? $_POST['search'] : '';
        $stmt="SELECT * From Customers Where customername like'%$search%'";
        $sql=mysqli_query($conn,$stmt);
        $no=1;
        while($row=mysqli_fetch_array($sql)){
    ?>
    <tr>
        <td><?=$no?></td>
        <td><?=$row['customername']?></td>
        <td><a class="text-light" href="edit.php?cid=<?=$row['customerid']?>&&cname=<?=$row['customername']?>">EDIT</a></td>
        <td><a class="text-light" href="app.php?delcid=<?=$row['customerid']?>">Delete</a></td>
        <td><a class="text-light" href="shop.php?cid=<?=$row['customerid']?>">Purchase</a></td>
    </tr>
    <?php
    $no++;
        }
        ?>
    </table>
</div>
<?php
include_once("./partials/footer.php");
?>