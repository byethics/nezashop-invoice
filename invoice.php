<?php
include_once("./partials/header.php");
if (isset($_GET['invno']))
    $_SESSION['ponumber'] = $_GET['invno'];
include_once("./config/auth.php");


?>
<div class="container mt-4">
    <table>
        <tr>
            <td width="70%">
                <strong>
                    <b>NEZA Supper Market</b><br>
                    Phone: + 250 788888030 <br>
                    Bill to: 21RP02942
                </strong>
            </td>
            <td>
                <strong>
                    <b>INVOICE</b> <br>
                    Date:<?= date("D d-m-YY"); ?> <br>
                    No# <?= $_SESSION['ponumber']; ?> <br>

                </strong>
            </td>
        </tr>
    </table>
    <table border='1' class="table table-bordered col-lg-12 mt-4">
        <tr>
            <th>No</th>
            <th>item</th>
            <th>Quantity</th>
            <th>P/U (FRW)</th>
            <th>Total (FRW)</th>

        </tr>
        <?php
        $search = isset($_POST['search']) ? $_POST['search'] : '';
        $num = $_SESSION['ponumber'];
        $stmt = "SELECT * From Products Where productsoldnumber='$num'";
        $stmt2 = "SELECT sum(total) From Products Where productsoldnumber like'%$num%'";
        $sql = mysqli_query($conn, $stmt);
        $sql2 = mysqli_query($conn, $stmt2);
        $res = mysqli_fetch_array($sql2);
        $no = 1;
        echo $num;
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['item'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['unit'] ?></td>
                <td><?= $row['total'] ?></td>

            </tr>
        <?php
            $no++;
        }
        ?>
        <tr>
            <td colspan="4">TOTAL</td>
            <td><b><?= $res['sum(total)'] ?> FRW</b></td>
        </tr>
    </table>
    <button class="btn btn-success px-4" onclick="window.print()">Print</button>
</div>
<?php
unset($_SESSION['ponumber']);
include_once("./partials/footer.php");

?>