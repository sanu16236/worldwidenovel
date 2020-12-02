<?php 
define('TITLE','Update Book');
define('PAGE','Edit Book');
include('../dbconnection.inc.php');
include('header.php');
if(!isset($_SESSION['alogin'])){
   header('location:login.php');
 }
if(isset($_GET['type']) && $_GET['type'] == 'edit'){
  $usql = "select * from book where bid='".$_GET['id']."'";
$urow = mysqli_query($con,$usql);
$result = mysqli_fetch_assoc($urow);
}

// code for update book
if(isset($_POST['addbook'])){
  $id = $_POST['id'];
  $catname = $_POST['catname'];
  $btitle = $_POST['btitle'];
  $sdesc = $_POST['sdesc'];
  $mtype = $_POST['type'];
if($mtype == 'free'){
    $sprice = 0.00;
  }else{
    $sprice = $_POST['sprice'];
  }
  $oprice = $_POST['oprice'];
 
  // code for book image
  if($_FILES['bimage']['error'] == 0){

      $img_name = rand(111111,999999).$_FILES['bimage']['name'];
      $tmp_name = $_FILES['bimage']['tmp_name'];
      $type = $_FILES['bimage']['type'];

      if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
        move_uploaded_file($tmp_name, "../media/".$img_name);
    }else{
        $msger = "<span class='alert alert-danger'>Please select png, jpg & jpeg image format</span>";
      
      }
}

// // code for book pdf link
if($_FILES['pdf']['error'] == 0){
  
  $book_link = rand(111111,999999).$_FILES['pdf']['name'];
  $book_tmp = $_FILES['pdf']['tmp_name'];
  $btype = $_FILES['pdf']['type'];

  if($btype == "application/pdf"){
    move_uploaded_file($book_tmp,"../pdf/".$book_link);
         
  }else{
    $msger = "<span class='alert alert-danger'>Please select  only pdf file..</span>";
   
  }
}

// sql query for updare data into data base
if(!isset($msger)){
  $sql = "update book set cat_id='$catname', book_title='$btitle', s_desc='$sdesc', image='$img_name', book='$book_link', type='$mtype', original_price='$oprice', selling_price='$sprice', status=1 where bid='$id'";
  $res = mysqli_query($con,$sql);
  if($res){
    unlink('../media/'.$result['image']);
    unlink('../pdf/'.$result['book']);
    $msg = '<span class="alert alert-success">Data updated successfully..</span>';
  }else{
    $msg = '<span class="alert alert-danger">Data updated failed..</span>';
  }
}
}





?>
<div class="container mt-3">
<h2 class="text-dark">Update Book</h2>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php if(isset($result)){echo $result['bid'];} ?>" class="form-control">
<div class="form-group">
<label for="name">Category Name</label>
<select name="catname" required class="form-control" id="name">
 <option disabled>Select Category</option>
 <?php $csql="select name,id from category";
 $crow = mysqli_query($con,$csql);
 while($creasult = mysqli_fetch_assoc($crow)){
 ?>
 <option value="<?php echo $creasult['id'] ?>"><?php echo $creasult['name'] ?></option>
 <?php } ?>
</select>
</div>
<div class="form-group">
<label for="book_title">Book Title</label>
<input type="text" required value="<?php if(isset($result)){echo $result['book_title'];} ?>" name="btitle" id="book_title" placeholder="Book Title" class="form-control">
</div>
<div class="form-group">
<label for="s_desc">Short Description</label>
<input type="text" required value="<?php if(isset($result)){echo $result['s_desc'];} ?>" name="sdesc" id="s_desc" placeholder="Short Description" class="form-control">
</div>
<label for="type">Select Type</label>
<select name="type" required class="form-control" id="type">
 <option disabled>Select Type</option>
 <?php if(isset($result)){ 
   if($result['type'] == 'free'){
   ?>
 <option selected value="free">Free</option>
 <option  value="paid">Paid</option>
<?php }else{?> 
<option value="free">Free</option>
 <option selected value="paid">Paid</option>


<?php } } ?>
</select>
<div class="fomr-group">
<label for="oprice">Original Price</label>
<input type="text" required value="<?php if(isset($result)){echo $result['original_price'];} ?>" placeholder="Original Price" name="oprice" id="oprice" class="form-control">
</div>
<div class="form-group">
<label for="sprice">Selling Price</label>
<input type="text" value="<?php if(isset($result)){echo $result['selling_price'];} ?>" required placeholder="Selling Price"  name="sprice" id="sprice" class="form-control">
</div>

<div class="form-group">
<label for="image">Book Image</label>
<input type="file" required name="bimage" id="image" class="form-control-file">
</div>
<div class="form-group">
<label for="pdf">Pdf File</label>
<input type="file" required name="pdf" id="pdf" class="form-control-file">
</div>
<div class="form-group">
<input type="submit" name="addbook" value="Update Book" class="btn btn-success">
<a href="book.php" class="btn btn-secondary">Close</a>
<?php if(isset($msg)){echo $msg;} ?>
<?php if(isset($msger)){echo $msger;} ?>

</div>
</form>
</div>

<?php include('footer.php'); ?>