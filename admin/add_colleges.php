<?php 

define('TITLE','Add Colleges');

define('PAGE','addcolleges');

include('../dbconnection.inc.php');

include('header.php');
$notification="";
$rows = "";
if(!isset($_SESSION['alogin'])){

   header('location:login.php');

 }

if(isset($_POST['add_colleges'])){

  $name = $_POST['name'];

  $link = $_POST['link'];

  $dep_name = $_POST['dname'];
  $sql = "INSERT INTO admission (college_name, college_link, department, status)

  VALUES ('$name', '$link', '$dep_name', 1)";
  
  $row = mysqli_query($con,$sql);
  if($row){
  $msg = "<span class='alert alert-success'>Data inserted successfully...</span>";
       
  }else{
  $msg = "<span class='alert alert-danger'>Data not inserted ...</span>";

  }

}


?>

<div class="container mt-3">

<h2 class="text-dark">Add College</h2>

<form action="" method="post">

<div class="form-group">

<label for="dname">Department</label>

<select name="dname" required class="form-control" id="dname">

 <option disabled>Select Departmet</option>

 <?php $csql="select name,id from department";

 $crow = mysqli_query($con,$csql);

 while($dreasult = mysqli_fetch_assoc($crow)){

 ?>

 <option value="<?php echo $dreasult['id'] ?>"><?php echo $dreasult['name'] ?></option>

 <?php } ?>

</select>

</div>
<div class="form-group">

<label for="name">College Name</label>

<input type="text" required value="" name="name" id="name" placeholder="College Name" class="form-control">

</div>
<div class="form-group">

<label for="link">College link</label>

<input type="text" required value="" name="link" id="link" placeholder="College Link" class="form-control">

</div>



<div class="form-group">

<input type="submit" name="add_colleges" value="Add College" class="btn btn-success">

<a href="admission.php" class="btn btn-secondary">Close</a>

<?php if(isset($msg)){echo $msg;} ?>

</div>

</form>

</div>



<?php include('footer.php'); ?>