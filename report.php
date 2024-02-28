<?php
  include_once("./partials/header.php");
  include_once("./config/auth.php");

?>
<div class="container">

    <div class="bd">
        <h1>Create Report</h1>
        <hr>
        <a href="getreport.php" class="btn btn-primary">All customers</a><br>
    <form  method="post" class="my-2 d-flex">
        <input type="search" class="form-control" name="search" style="width:60%" placeholder="search........."><input type="submit" class="btn m-1 btn-success" value="Search">
    </form>
    <hr>
    <h2>choose customer</h2>
    <table border='1' class="table  table-bordered">
        <tr>
            <th>No</th>
            <th>Names</th>
            <th>Action</th>
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
        <td><a href="customerReport.php?cid=<?=$row['customerid']?>" class="btn btn-primary">Generate Report</a></td>
    </tr>
    <?php
    $no++;
        }
        ?>
    </table>
    
    </div>
</div>
<?php
  include_once("./partials/footer.php");
?>