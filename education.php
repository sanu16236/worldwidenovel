<?php 
     define('TITLE','Education');

     define('PAGE','education');
     
     include('header.php');
?>
<!-- banner section -->
<div class="container-fluid education-banner">

</div>
<div class="row m-0 my-3">
     <h3 class="mx-auto">Admission & Colleges</h3>
</div>
<!-- education card section -->
<div class="contaner-fluid">
<p class="text-danger pl-5"><b>Note: </b>For more details or for Admission  contact us..</p>

     <div class="container">
          <div class="row m-0">
<?php $row = mysqli_query($con,"select * from department where status = 1");
while($result = mysqli_fetch_assoc($row)){?>
    <div class="col-12 mb-2 my-2 col-sm-12 col-md-6 col-lg-4 col-xl-3">
     <div class="card shadow-sm" style="width: 100%;">
     <div class="card-header">
     <h3 class="text-capitalize"><?php echo $result['name']; ?></h3>
     </div>
     <ul class="list-group list-group-flush">
  <?php $crow = mysqli_query($con,"select college_name, college_link,pdf from admission where status = 1 and department = '".$result['id']."'");
  if(mysqli_num_rows($crow) > 0){
  while($cresult = mysqli_fetch_assoc($crow)){?>
    <li class="list-group-item text-capitalize"><a target="_blank" href="<?php echo $cresult['college_link']; ?>"><i class="fas text-success fa-hand-point-right"></i>&nbsp;&nbsp;<?php echo $cresult['college_name']; ?></a><br>
    <?php if($cresult['pdf'] != null){ ?><a href="<?php echo './pdf/'.$cresult['pdf']; ?>" class="text-danger"><u>See more</u></a><?php } ?></li>
   <?php } }else{ echo "<p class='p-2'>No list are Available</p>";} ?>
  </ul> 
 </div>
</div>
<?php } ?>
</div>
</div>
</div>

<?php include('footer.php'); ?>