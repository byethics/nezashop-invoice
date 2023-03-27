<?php
if (!isset($_SESSION['User'])) {
header("Location: /uwi/index.php");
}
?>