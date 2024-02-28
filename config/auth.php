<?php

require_once('lib/functions.php');
if (!isset($_SESSION['User'])) {
    redirect("/uwi/index.php");
}
