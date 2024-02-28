<?php
require('../lib/functions.php');
require('../lib/mysqli.php');
if (isset($_POST['add-customer'])) {

    $customer = sanitize($_POST['names']);
    $stmp = db()->prepare("INSERT INTO Customers values(null,?);");
    $stmp->bind_param('s', $customer);
    if ($stmp->execute()) {
        redirect('../customers.php');
    }
}
