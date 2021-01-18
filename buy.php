<?php
define('TITLE','Buy-Book');
define('PAGE','buy');
include 'dbconnection.inc.php';
include 'header.php';
$row = mysqli_query($con,"select * from sell");
?>
<div class="container-fluid my-4">
<!-- <h5 class="text-center">Add section</h5> -->
</div>
<div class="container-fluid">
<h3 class="text-center my-4">Our Products</h3>
     <div class="container">
          <div class="row m-0">
          <?php if(mysqli_num_rows($row) > 0){
               while($result = mysqli_fetch_assoc($row)){ ?>
               <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-2">
               <div class="shopping-card shadow p-2 w-100">
                    <div>
                         <img src="media/<?php echo $result['image']; ?>" class="img-fluid" style="height:250px; width:100%;">
                    </div>
                    <h3 class="text-uppercase my-1"><i class="far fa-hand-point-right"></i>&nbsp;<?php echo $result['name']; ?></h3>
                    <p class="text-capitalize m-0"><?php echo $result['description']; ?></p>
                    <h5 class="text-secondary">Rs. <?php echo $result['price']; ?></h5>
                    <div class="text-center my-2"><a href="https://api.whatsapp.com/send?phone=<?php echo $result['whatsapp']; ?>&text=<?php echo  'name: '.$result['name'].' description: '.$result['description']; ?>" target="_blank" class="btn btn-outline-success">Buy Now</a></div>
               </div>
               </div>
               <?php }}else{ echo '<div class="alert alert-danger w-100">No Products are Available..</div>';} ?>
          </div>
     </div>
</div>
<?php include 'footer.php'; ?>