<?php
include_once("./partials/header.php");
include_once("./config/auth.php");
require('lib/mysqli.php');
require_once('lib/functions.php');

?>
<div class="container mt-4">

    <div class="bd">
        <h3>Customers</h3>
        <form action="src/create-customer.php" method="post">
            Customer Name
            <div class="d-flex align-items-center gap-1">
                <input placeholder="muslim uwi" type="text" name="names" class="form-control">
                <input type="submit" value="Add CUSTOMER" name="add-customer" class="btn btn-success my-1">
            </div>
        </form>
        <form method="post">
            <div class="d-flex align-items-center gap-1">
                <input class="form-control flex-grow-1" type="search" name="search" style="width:60%" placeholder="search"><input type="submit" class="btn btn-success my-1" value="Search">
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
            $search = sanitize($_POST['search']);
            $no = 0;
            $stmt = db()->prepare("SELECT * From Customers Where customername like ?;");
            if (isset($search)) {

                $stmt->bind_param("s", "%$search%");
            } else {
                $stmt->bind_param("s", MYSQLI_TYPE_NULL);
            }
            $stmt->execute();
            $rows = $stmt->get_result()->fetch_all();
            foreach ($rows as $row) {
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['customername'] ?></td>
                    <td><a class="text-light" href="edit.php?cid=<?= $row['customerid'] ?>&&cname=<?= $row['customername'] ?>">EDIT</a></td>
                    <td><a class="text-light" href="app.php?delcid=<?= $row['customerid'] ?>">Delete</a></td>
                    <td><a class="text-light" href="shop.php?cid=<?= $row['customerid'] ?>">Purchase</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <?php
    include_once("./partials/footer.php");
    ?>