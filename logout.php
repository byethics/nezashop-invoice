<?php
session_start();
session_destroy();
require_once('lib/functions.php');
redirect('index.php');
