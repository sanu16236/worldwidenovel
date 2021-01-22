<?php
define('TITLE','Shop');
define('PAGE','sell');
include 'dbconnection.inc.php';
include 'header.php';
if(!isset($_SESSION['ulogin'])){
     echo "<script>";
     $_SESSION['errmsg']=true;
     echo "window.location.href='index.php'";
     echo"</script>";
     die();
}
$row = mysqli_query($con,"select uid from user where email = '".$_SESSION['uemail']."'");
$result = mysqli_fetch_assoc($row);
if(isset($_POST['add_product'])){
 
  $id = $_POST['id'];
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $whatsapp = $_POST['mobile'];
  $cat = $_POST['product_cat'];
  $final_image = rand(11111111,99999999).'_'.$_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  move_uploaded_file($tmp_name,"media/".$final_image);

  $psql = "insert into sell(user_id, name, description, price, image, whatsapp,category, status) values('$id', '$name', '$desc', '$price', '$final_image','$whatsapp', '$cat', 1)";
  $pq = mysqli_query($con,$psql);
  if($pq){
    $msg = "<div class='mx-2 alert alert-success'>Product added successfully</div>";
  }else{
    $msg = "<div class='mx-2 alert alert-danger'>Product not added</div>";
  }
}
?>

<div class="row m-0 my-3">  
     <h3 class="mx-auto text-center">Product Details</h3>
</div>
<?php
if(isset($msg)){ 
 echo $msg; 
}
?>
<p class="p-3 text-danger text-capitalize">Note: Enter your product details for sell your product..</p>
<div class="container-fluid">
     <div class="container">
          <div class="row">
               <div class="mx-auto shadow p-3 my-4 col-12 col-md-8 col-lg-6">
               <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?php echo $result['uid'] ?>">
  </div>
  <div class="form-group">
    <label for="category">Product Category</label>
    <select required name="product_cat" class="form-control">
    <option>Select Category</option>
    <?php
    $prow = mysqli_query($con,"select * from product_cat where status = 1");
    while($presult = mysqli_fetch_assoc($prow)){ ?>
      <option value="<?php echo $presult['id']; ?>"><?php echo $presult['name']; ?></option>
    <?php }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control" placeholder="Product Name" name="name" required id="name">
  </div>
  <div class="form-group">
    <label for="desc">Product Description</label>
    <input type="text" class="form-control" name="desc" required placeholder="Product Description" id="desc">
  </div>
  <div class="form-group">
    <label for="price">Product Price</label>
    <input type="text" class="form-control" name="price" required placeholder="Product Price" id="price">
  </div>
  <div class="form-group">
    <label for="mobile">Whatsapp Number</label>
    <input type="text" class="form-control" name="mobile" required placeholder="Whatsapp Number" id="mobile">
  </div>
  <div class="form-group">
    <label for="image">Product Image</label>
    <input type="file" accept="image/*" class="form-control-file" name="image" required id="image">
  </div>
  <input type="submit" value="Add Product" name="add_product" class="btn btn-primary">
  <a href="index.php" class="btn btn-danger">Close</a>  
</form>
            
     </div>
          </div>
     </div>

</div>
<?php include 'footer.php' ?>