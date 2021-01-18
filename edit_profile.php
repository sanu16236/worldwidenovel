<?php 
define('TITLE','Edit-Profile');
define('PAGE','Edit');
include('dbconnection.inc.php');
include('header.php');
if(!isset($_SESSION['ulogin'])){
header('location:warning.php');
}
$msg = "";
$email = $_SESSION['uemail'];
$sql = "select * from user where email= '$email'";
$row = mysqli_query($con,$sql);
$reasult = mysqli_fetch_assoc($row);

if(isset($_POST['update'])){
  $updateemail = mysqli_real_escape_string($con, $_POST['email']);
  $name = mysqli_real_escape_string($con, trim($_POST['name']));
  $password =md5(mysqli_real_escape_string($con,trim($_POST['password'])));
  $mobile= mysqli_real_escape_string($con,trim($_POST['mobile']));
// code for user profile image 
  if($_FILES['image']['error'] == 0){
     $img_name = rand(111111,999999).$_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $type = $_FILES['image']['type'];

  if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){
    move_uploaded_file($tmp_name,"media/".$img_name);
    

     $sql = "update user set name='$name',password='$password', mobile='$mobile', image='$img_name' where email='$email'";
  $row = mysqli_query($con,$sql);
  if($row){
   
   $msg= '
<div class="alert alert-success">Update successfully..</div>';
   echo '
<meta http-equiv="refresh" content="0">';
   unlink('media/'.$reasult['image']);
  }else{
   $msg="
	<div class='alert alert-danger'>Update failed..</div>";
  }
           
  }else{
    $msg = "
	<div class='alert alert-danger'>Please select png, jpg & jpeg image format</div>";
    die();
  }
}else{
   $sql = "update user set name='$name',password='$password', mobile='$mobile',image='".$reasult['image']."' where email='$email'";
  $row = mysqli_query($con,$sql);
  if($row){
    echo '
	<meta http-equiv="refresh" content="1">';
   $msg= '
		<div class="alert alert-success">Update successfully..</div>';
   
  }else{
   $msg="
		<div class='alert alert-danger'>Update failed..</div>";
  }

}
 
}
// end code for user update
?>
<!-- code for medium device -->
<section class=" d-block d-md-none">
<div class="bg-dark main-res text-center d-flex justify-content-between">
<div class="d-flex">
<?php if($reasult['image'] != ' '){ ?>
<img src="media/
	<?php echo $reasult['image'] ;?>" class="img-fluid m-3 profile-img" alt="">
	<?php }else{ ?>
	<img src="media/avtar.png" class="img-fluid m-3 profile-img" alt="">
		<?php }?>
		<h4 class="text-white d-none d-md-block res-profile-text text-uppercase mt-5">
			<?php echo $reasult['name']; ?>
		</h4>
	</div>
	<nav class="">
		<ul class="d-flex res-profile">
			<li class="nav-item">
				<a href="profile.php" class="
					<?php if(PAGE == 'Profile'){echo 'active';} ?>text-light p-2 nav-link">Liberary
				</a>
			</li>
			<li class="nav-item">
				<a href="edit_profile.php" class="
					<?php if(PAGE == 'Edit'){echo 'active';} ?>text-light p-2 nav-link">Profile
				</a>
			</li>
			<li class="nav-item">
				<a href="product.php" class="
					<?php if(PAGE == 'product'){echo 'active';} ?>text-light p-2 nav-link">My Product
				</a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="btn btn-danger mr-3">Logout</a>
			</li>
		</ul>
	</nav>
</div>
</section>

	<!-- banner section start -->
	
	<div class="row m-0">
		
			<div class="col-md-2 p-0">
				<div class="profile-nav d-none d-md-block bg-dark text-center">
					<?php if($reasult['image'] != ' '){ ?>
					<img src="media/<?php echo $reasult['image'] ;?>" class="profile-img" alt="">
						<?php }else{ ?>
						<img src="media/avtar.png" class="profile-img" alt="">
							<?php }?>
							<h4 class="text-white text-uppercase pt-3">
								<?php echo $reasult['name']; ?>
							</h4>
							
							<div class="dropdown-divider"></div>
					<ul class="navbar-nav">
								<li class="nav-item">
									<a href="profile.php" class="
										<?php if(PAGE == 'Profile'){echo 'active';} ?>text-light nav-link">
										<i class="fas fa-book-open"></i>&nbsp;&nbsp;Liberary
									</a>
								</li>
								<li class="nav-item">
									<a href="edit_profile.php" class="<?php if(PAGE == 'Edit'){echo 'active';} ?>text-light nav-link">
										<i class="fas fa-user"></i>&nbsp;&nbsp;Profile
									</a>
								</li>
								<li class="nav-item">
									<a href="product.php" class="<?php if(PAGE == 'product'){echo 'active';} ?>text-light nav-link">
										<i class="fas fa-tag"></i>&nbsp;&nbsp;My Product
									</a>
								</li>
							</ul>
							
						</div>
					</div>
	<div class="col-sm-10">
			<h3 class="text-md-center text-dark font-weight-bold pt-2">Update Profile</h3>
			<form action="" method="POST" class="p-5" enctype="multipart/form-data">
			<div class="form-group">
			<label for="email">Email</label>
			<input type="email" readonly class="form-control" value="
			<?php echo $email;?>" name="email">
			</div>
			<div class="form-group">
			<label for="name">Name</label>
			<input type="text" placeholder="DK" value="<?php echo $reasult['name'];?>" class="form-control" required id="name" name="name">
			</div>
			<div class="form-group">
			<label for="password">Password</label>
			<input type="password" value="" placeholder="******" class="form-control" required id="password" name="password">
			</div>
			<div class="form-group">
				<label for="mobile">Mobile</label>
			<input type="text" value="<?php echo $reasult['mobile']; ?>" placeholder="0000 0000 00" class="form-control" id="mobile" required name="mobile">
				</div>
				<div class="form-group">
					<label for="image">Profile Image</label>
					<input type="file" class="form-control-file" value="" id="image" name="image">
					</div>
					<?php if(isset($msg)){ echo $msg; }?>
					<input type="submit" class="btn btn-success mb-3" name="update" id="update" value="Update">
					</form>
		</div>
					
										
<?php include('footer.php'); ?>