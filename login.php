<?php
require_once("partials/header.php");
require_once("lib/functions.php");
require_once("lib/mysqli.php");
$user = filter_input(INPUT_POST, 'usn', FILTER_SANITIZE_SPECIAL_CHARS);
$pass = filter_input(INPUT_POST, 'psw', FILTER_DEFAULT);
$stmt = db()->prepare("SELECT * FROM Users WHERE Username=? AND password=?");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();

if (isset($_SESSION['User'])) {
  redirect("/home.php");
}
if ($row['Username'] == $user) {
  $_SESSION['User'] = $user;
  redirect("home.php");
} else {
?>
  <div class="alert alert-warning" role="alert">
    <p>user name or password is not correct</p>
    <a href="index.php" class="btn btn-primary"> try again</a>
  </div>
<?php
  die();
}
