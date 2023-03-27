<?php
  include_once("./partials/header.php");
  include_once("./config/conn.php");
  include_once("./config/auth.php");

?>
<br>
<div class="container">

    <!-- <div class="bd"> -->
    <form  method="post" class="d-flex">
        <input type="search" class="form-control" name="search" style="width:60%" placeholder="search"><input class="btn btn-success" type="submit" value="Search">
    </form>
    <hr>
    <div class="col-lg-4 card bg-success p-4">
    <table border='1' cellspacing="0" width="80%" class="table">
        <tr>
            <th>No</th>
            <th>item</th>
            <th colspan="3">Action</th>
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
        <td><a href="shop.php?cid=<?=$row['customerid']?>">Continue &rightarrow;</a></td>
    </tr>
    <?php
    $no++;
        }
        ?>
    </table>
    </div>
    </div>
<!-- </div> -->
<?php
  include_once("./partials/footer.php");
?>