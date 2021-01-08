<?php
define('TITLE','Dashboard');
define('PAGE','Dashboard');
include('../dbconnection.inc.php');
include('header.php'); 
 if(!isset($_SESSION['alogin'])){
   header('location:login.php');
 }
?>
  <div class="container-fluid mt-2 px-5 d-block d-md-none py-2 bg-secondary d-flex justify-content-between">
  <div><span class="text-light font-weight-bold font-weight-bold mr-3"><?php echo "Welcome, ".ucfirst($_SESSION['aname']); ?></span>
    </div>
  <div> <a href="logout.php" class="btn btn-danger">logout</a>
   </div>
  </div>
<div class="container p-4">
   <div class="row">
   <!-- sql query for total users -->
   <?php
   $sql = "select * from user";
   $res = mysqli_query($con,$sql);
   $result = mysqli_num_rows($res);
   ?>
   <div class="col-md-3 col-sm-6 mb-2">
   <div class="card bg-danger text-light text-center">
   <div class="card-header">
   <h4>Users</h4>
   </div>
   <div class="card-body">
   <h2 class="font-weight-bold"><?php echo $result; ?></h2>
   </div>
   <a href="user.php" class="text-light">
   <div class="card-footer">
   View
   </div>
   </a>
   
   </div>
   </div>
   <div class="col-md-3 col-sm-6 mb-2">
     <div class="card bg-success text-light text-center">
     <!-- sql query for total category -->
   <?php
   $csql = "select * from category";
   $cres = mysqli_query($con,$csql);
   $cresult = mysqli_num_rows($cres);
   ?>
   <div class="card-header">
   <h4>Category</h4>
   </div>
   <div class="card-body">
   <h2 class="font-weight-bold"><?php echo $cresult; ?></h2>
   </div>
   <a href="category.php" class="text-light">
   <div class="card-footer">
   View
   </div>
   </a>
   
   </div>
   </div>
   <div class="col-md-3 col-sm-6 mb-2">
   <div class="card bg-primary text-light text-center">
   <!-- sql query for total active users -->
   <?php
   $asql = "select amount from book_sell where status='TXN_SUCCESS'";
   $ares = mysqli_query($con,$asql);
   if( mysqli_num_rows($ares)>0){
     $total=0;
while($result=mysqli_fetch_assoc($ares)){
  $total += $result['amount'];
}
   }else{
     $total = 0;
   }
   ?>
   <div class="card-header">
   <h4>Total Earning</h4>
   </div>
   <div class="card-body">
   <h2 class="font-weight-bold"><?php echo $total; ?></h2>
   </div>
   <a href="user.php" class="text-light">
   <div class="card-footer">
   View
   </div>
   </a>
   
   </div>
   </div>
   <div class="col-md-3 col-sm-6 mb-2">
   <div class="card bg-secondary text-light text-center">
   <!-- sql query for total books -->
   <?php
   $bsql = "select * from book";
   $bres = mysqli_query($con,$bsql);
   $bresult = mysqli_num_rows($bres);
   ?>
   <div class="card-header">
   <h4>Books</h4>
   </div>
   <div class="card-body">
   <h2 class="font-weight-bold"><?php echo $bresult; ?></h2>
   </div>
   <a href="book.php" class="text-light">
   <div class="card-footer">
   View
   </div>
   </a>
   
   </div>
   </div>

   </div>
</div>

  
<?php include('footer.php'); ?>