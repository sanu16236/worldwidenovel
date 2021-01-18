<?php
define('TITLE','Buy-Book');
define('PAGE','buy');
include 'dbconnection.inc.php';
include 'header.php';

?>
<!-- buy page banner -->
<div class="buy-banner">
</div>
<!-- end of buy page banner -->
<div class="container-fluid my-4">
<!-- <h5 class="text-center">Add section</h5> -->
</div>
<div class="container-fluid">
<h3 class="text-center my-4"><i class="fas fa-cart-plus text-success"></i>&nbsp;Our Products</h3>
     <div class="container">
     <?php $crow = mysqli_query($con,"select * from product_cat where status = 1");
     if(mysqli_num_rows($crow) > 0){
     while($cresult = mysqli_fetch_assoc($crow)){ ?>
          <div class="row m-0 mt-4">
          <?php
          echo '<h3 class="w-100 text-capitalize text-dark"><i class="fas fa-angle-double-right"></i>&nbsp;'.$cresult['name'].'</h3>';
           $row = mysqli_query($con,"select * from sell where category = '".$cresult['id']."'");
           if(mysqli_num_rows($row) > 0){
               while($result = mysqli_fetch_assoc($row)){ ?>
               <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 my-2">
               <div class="shopping-card shadow p-2 w-100">
                    <div>
                         <img src="media/<?php echo $result['image']; ?>" class="img-fluid" style="height:250px; width:100%;">
                    </div>
                    <h3 class="text-uppercase my-1"><i class="far fa-hand-point-right"></i>&nbsp;<?php echo $result['name']; ?></h3>
                    <p class="text-capitalize m-0"><?php echo $result['description']; ?></p>
                    <h5 class="text-secondary">Rs. <?php echo $result['price']; ?></h5>
                    <div class="text-center my-2"><a href="https://api.whatsapp.com/send?phone=91<?php echo $result['whatsapp']; ?>&text=<?php echo  'name: '.$result['name'].' description: '.$result['description']; ?>" target="_blank" class="btn btn-outline-success">Buy Now</a></div>
               </div>
               </div>
               <?php }}else{ echo '<div class="alert alert-danger w-100">No Products are Available..</div>';} ?>
          </div>
          <?php } }else{ echo '<div class="alert alert-danger w-100">No Products are Available..</div>';}?>
     </div>
</div>
<?php include 'footer.php'; ?>