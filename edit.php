<?php
ob_start();
include_once("./partials/header.php");
include_once("./config/auth.php");
 if(!isset($_SESSION['ponumber'])){
$res="p".date("dmy-h:m:s")."-".rand(0,50);
$_SESSION['ponumber']=$res;  
 }

?>
<div class="container">

    <div class="bd">
        <h1>Customers</h1>
        <form action="app.php" method="post" class="card p-3 col-lg-6">
            <input class="form-control" type="hidden" name="cid" value="<?=$_GET['cid'] ?>">
       Customer Name <input  class="form-control"  type="text" name="names" value="<?=$_GET['cname'] ?>" ><br><br><input  class="btn btn-success"  type="submit" value="UPDATE CUSTOMER" name="edit-customer">
    </form>
    
    </div>
</div>
<?php
include_once("./partials/footer.php");

?>
