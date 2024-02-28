<?php
ob_start();
include_once("./partials/header.php");
require_once("lib/functions.php");
if (!isset($_GET['cid']) && !isset($_SESSION['ponumber'])) {
    redirect("products.php");
}
if (isset($_GET['invno'])) {
    $_SESSION['ponumber'] = $_GET['invno'];
}
if (!isset($_SESSION['ponumber'])) {
    $res = "p" . date("dmy-h:m:s") . "-" . rand(0, 50);
    $_SESSION['ponumber'] = $res;
}
include_once("./config/conn.php");
include_once("./config/auth.php");

?>

<div class="container">

    <div class="bd">
        <h1>Customers</h1>
        <div class="card bg-success p-2">
            <form method="post" class="">
                <br>
                Product Name
                <br>

                <input type="text" name="item" class="form-control">
                <br>

                Quantinty
                <br>

                <input type="number" name="qt" class="form-control">
                <br>

                UnitPrice
                <br>

                <input type="number" name="up" class="form-control">
                <br>

                <input class="btn btn-secondary mx-2" type="submit" value="Add to cart" name="Add-to-Chart">
                <a href="invoice.php" target="_blank" class="btn btn-primary m-2 px-3"> Save<a>
            </form>
        </div>
        <hr>
        <table class="mt-4 table table-striped" cellspacing="0" width="50%">
            <tr>
                <th>No</th>
                <th>item</th>
                <th>Qt</th>
                <th>up</th>nitPric
                <th>Totp</th>
                <th>action</th>

            </tr>
            <?php
            $search = isset($_POST['search']) ? $_POST['search'] : '';
            $num = $_SESSION['ponumber'];
            $stmt = "SELECT * From Products Where productsoldnumber like'%$num%'";
            $stmt2 = "SELECT sum(total) From Products Where productsoldnumber like'%$num%'";
            $sql = mysqli_query($conn, $stmt);
            $sql2 = mysqli_query($conn, $stmt2);
            $res = mysqli_fetch_array($sql2);
            $no = 1;
            echo "INVOICE NO: #" . $num;
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['item'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td><?= $row['unit'] ?></td>
                    <td><?= $row['total'] ?></td>
                    <td><a href="app.php?trid=<?= $row['id'] ?>&&cid=<?= $row['customerid'] ?>" onclick="Return confirm('you want toremove from chart')" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php
                $no++;
            }
            ?>
            <tr>
                <td colspan="3">TOTAL</td>
                <td><?= $res['sum(total)'] ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

    <?php
    include_once("./partials/footer.php");
    ?>
    <?php
    if (isset($_POST['Add-to-Chart'])) {
        $item = $_REQUEST['item'];
        $qt = $_REQUEST['qt'];
        $up = $_REQUEST['up'];
        $tot = $qt * $up;
        $date = date("Y-m-d");
        $cid = $_GET['cid'];
        $num = $_SESSION['ponumber'];
        $sql = mysqli_query($conn, "INSERT INTO Products values(null,'$num','$item','$qt','$up','$tot','$date','$cid')") or die("failled");
        if ($sql) {
            echo "<script>location.href='shop.php?cid= $cid';</script>";
        }
    } elseif (isset($_POST['Submit-Chart'])) {
        echo "<script>location.href='invoice.php?cid= $cid';</script>";
    }
    ?>