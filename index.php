<?php
include_once("./partials/header.php");
require_once("lib/functions.php");
if (isset($_SESSION['User'])) {
  redirect("/uwi/home.php");
}
?>

<div class="container m-5">
  <div class="card mx-auto bg-secondary text-light p-4 col-lg-4 col-md-6 col-sm-12 m-5">
    <form action="login.php" method="post">
      <?php
      include_once("./partials/form_control.php");
      ?>
      <input type="submit" value="Login" class="btn btn-success">
    </form>
  </div>
  <?php
  include_once("./partials/footer.php");
  ?>