<?php
ob_start();
include_once("./partials/header.php");
include_once("./config/auth.php");
if (!isset($_SESSION['ponumber'])) {
    $res = "p" . date("dmy-h:m:s") . "-" . rand(0, 50);
    $_SESSION['ponumber'] = $res;
}

?>
<div class="container">

    <div class="bd">
        <h1>
            NEZA SUPER MARKET REPORT
        </h1>
        <hr>
        <form action="" method="post">
            Start Date <br> <input type="date" name="start" class="form-control"><br>
            Ending Date <br> <input type="date" name="end" class="form-control"> <br>
            <br> <input type="submit" value="Submit" name="search" class="btn btn-success"><br>
            <br>
        </form>
        <table border='1' class="table  table-bordered">
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>invoiceNumber</th>
                <th>Totp</th>

            </tr>
            <?php
            $num = $_SESSION['ponumber'];
            if (isset($_POST['start']) && isset($_POST['end'])) {
                $end = $_POST['end'];
                $start = $_POST['start'];
                $stmt = "SELECT * From Products inner Join Customers Where Products.customerid=Customers.customerid AND date>='$start' and date<='$end' group by Productsoldnumber";
            } else {
                $stmt = "SELECT date,customername,sum(total),Productsoldnumber,Products.customerid From Products inner Join Customers Where Products.customerid=Customers.customerid  group by Productsoldnumber";
            }
            $sql = mysqli_query($conn, $stmt);
            $no = 1;
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['customername'] ?></td>
                    <td> <a href="invoice.php?invno=<?= $row['Productsoldnumber'] ?>&&cid=<?= $row['customerid'] ?>"><?= $row['Productsoldnumber'] ?></a></td>
                    <td><?= $row['sum(total)'] ?></td>

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