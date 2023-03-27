<?php
  include_once("./partials/header.php");
  if (isset($_SESSION['User'])) {
    header("Location: /uwi/home.php");
  }
?>

                <div class="container m-5">
                <div class="card bg-secondary mx-auto text-light  p-4 col-lg-4 col-md-6 col-sm-12 m-5">
<form action="app.php" method="post">
             

                    <?php
  include_once("./partials/form_control.php");
?>               
                     Confirm Password <input type="password" name="psw2" class="form-control" required><br>
                     <input type="submit" value="Signup" class="btn-lg btn-primary" name="signup">
            </form>
</div>
            <?php

  include_once("./partials/footer.php");
?>