<?php 
define('TITLE','Update College');
define('PAGE','Edit College');
include('../dbconnection.inc.php');
include('header.php');
if(!isset($_SESSION['alogin'])){
   header('location:login.php');
 }
if(isset($_GET['type']) && $_GET['type'] == 'edit'){
  $usql = "select * from admission where id='".$_GET['id']."'";
$urow = mysqli_query($con,$usql);
$result = mysqli_fetch_assoc($urow);
}

// code for update book
if(isset($_POST['edit_college'])){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $link = $_POST['link'];
  $dep_name = $_POST['dname'];


  $sql = "update admission set college_name='$name', college_link='$link', department='$dep_name', status=1 where id='$id'";
  $res = mysqli_query($con,$sql);
  if($res){
    $msg = '<span class="alert alert-success">Data updated successfully..</span>';
  }else{
    $msg = '<span class="alert alert-danger">Data updated failed..</span>';
  }
}



?>
<div class="container mt-3">
<h2 class="text-dark">Update College</h2>
<form action="" method="post">
<input type="hidden" name="id" value="<?php if(isset($result)){echo $result['id'];} ?>" class="form-control">
<div class="form-group">
<label for="name">Department Name</label>
<select name="dname" required class="form-control" id="dname">
 <option disabled>Select Department</option>
 <?php $csql="select name,id from department";
 $crow = mysqli_query($con,$csql);
 while($dreasult = mysqli_fetch_assoc($crow)){
 ?>
 <option value="<?php echo $dreasult['id'] ?>"><?php echo $dreasult['name'] ?></option>
 <?php } ?>
</select>
</div>
<div class="form-group">
<label for="college_name">Department Name</label>
<input type="text" required value="<?php if(isset($result)){echo $result['college_name'];} ?>" name="name" id="college_name" placeholder="College Name" class="form-control">
</div>
<div class="form-group">
<label for="link">College Link</label>
<input type="text" required value="<?php if(isset($result)){echo $result['college_link'];} ?>" name="link" id="link" placeholder="College Link" class="form-control">
</div>

<div class="form-group">
<input type="submit" name="edit_college" value="Update College" class="btn btn-success">
<a href="admission.php" class="btn btn-secondary">Close</a>
<?php if(isset($msg)){echo $msg;} ?>
<?php if(isset($msger)){echo $msger;} ?>

</div>
</form>
</div>

<?php include('footer.php'); ?>