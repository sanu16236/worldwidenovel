<?php 

define('TITLE','Add Category');

define('PAGE','Addcat');

include('../dbconnection.inc.php');

include('header.php');

if(!isset($_SESSION['alogin'])){

   header('location:login.php');

 }

if(isset($_POST['addcat'])){

  $id = $_POST['id'];

  $name = $_POST['catname'];

if($id == null){
    $sql = "insert into category(name, status) values('$name', 1)";
    $row = mysqli_query($con,$sql);

}else{
    $sql = "update category set name= '$name', status=1 where id='$id'";
    $row = mysqli_query($con,$sql);

}

if($row){
    $msg = "<span class='alert alert-success'>Update/Inserted successfully...</span>";

}else{

     $msg = "<span class='alert alert-danger'>Data not Inserted/Updated... </span>";

}

}

if(isset($_GET['type']) && $_GET['type'] == 'edit'){

  $sql = "select * from category where id='".$_GET['id']."'";

$row = mysqli_query($con,$sql);

$result = mysqli_fetch_assoc($row);

}

?>

<div class="container mt-3">

<h2 class="text-dark">Add/Update Category</h2>

<form action="" method="post">

<input type="hidden" name="id" value="<?php if(isset($result)){echo $result['id'];} ?>" class="form-control">

<div class="form-group">

<label for="name">Category Name</label>

<input type="text" required value="<?php if(isset($result)){echo $result['name'];} ?>" name="catname" id="name" placeholder="Category Name" class="form-control">

</div>

<div class="form-group">

<input type="submit" name="addcat" value="Add Category" class="btn btn-success">

<a href="category.php" class="btn btn-secondary">Close</a>

<?php if(isset($msg)){echo $msg;} ?>

</div>

</form>

</div>



<?php include('footer.php'); ?>