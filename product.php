<?php 
define('TITLE','Product');
define('PAGE','product');
include('dbconnection.inc.php');
include('header.php');
// query for user details
$email = $_SESSION['uemail'];
$sql = "select s.id, s.name, s.description, s.price, s.image, s.whatsapp from sell as s join user as u on s.user_id = u.uid order by id desc";
$row = mysqli_query($con,$sql);
$usql = "select name, image from user where email='$email'";
$res = mysqli_query($con,$usql);
$uname = mysqli_fetch_assoc($res);
if(isset($_GET['type']) && $_GET['type'] == 'delete'){
     $id = $_GET['id'];
     $row = mysqli_query($con,"delete from sell where id='$id'");
     if($row){
          $msg = "<div class='alert alert-success m-2' style='height:50px'>Product Deleted</div>";
     }else{
          $msg = "<div class='alert alert-danger m-2' style='height:50px'>Product not deleted</div>";
     }
}
?>
<!-- code for medium device -->
<section class="d-block d-md-none">
	<div class="bg-dark main-res text-center d-flex justify-content-between">
		<div class="d-flex">
			<?php if($uname['image'] != ' '){ ?>
			<img src="media/
				<?php echo $uname['image'] ;?>" class="img-fluid m-3 profile-img" alt="">
				<?php }else{ ?>
				<img src="media/avtar.png" class="img-fluid m-3 profile-img" alt="">
					<?php }?>
					<h4 class="text-white d-none d-md-block res-profile-text text-uppercase mt-5">
						<?php echo $uname['name']; ?>
					</h4>
				</div>
				<nav class="">
					<ul class="d-flex res-profile">
						<li class="nav-item">
							<a href="" class="
								<?php if(PAGE == 'Profile'){echo 'active';} ?>text-light p-2 nav-link">Library
							</a>
						</li>
						<li class="nav-item">
							<a href="edit_profile.php" class="text-light p-2 nav-link">Profile</a>
						</li>
						<li class="nav-item">
							<a href="product.php" class="<?php if(PAGE == 'product'){echo 'active';} ?>text-light p-2 nav-link">My Product</a>
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
					<?php if($uname['image'] != ' '){ ?>
					<img src="media/<?php echo $uname['image'] ;?>" class="profile-img" alt="">
						<?php }else{ ?>
						<img src="media/avtar.png" class="profile-img" alt="">
							<?php }?>
							<h4 class="text-white text-uppercase pt-3">
								<?php echo $uname['name']; ?>
							</h4>
							<div class="dropdown-divider"></div>
							<ul class="navbar-nav">
								<li class="nav-item">
									<a href="profile.php" class="
										<?php if(PAGE == 'Profile'){echo 'active';} ?>text-light nav-link">
										<i class="fas fa-book-open"></i>&nbsp;&nbsp;Library
									</a>
								</li>
								<li class="nav-item">
									<a href="edit_profile.php" class="text-light nav-link">
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
					<?php 
					if(isset($msg)){
					echo $msg;
					echo '<script>window.location.href="product.php	"</script>';
					die();} ?>
                         <?php if(mysqli_num_rows($row) > 0){
               while($result = mysqli_fetch_assoc($row)){ ?>
               <div class="col-12 col-md-5 col-lg-3 my-2"> 
               
              
               <div class="shopping-card shadow p-2 w-100">
                    <div>
                         <img src="media/<?php echo $result['image']; ?>" class="img-fluid" style="height:250px; width:100%;">
                    </div>
                    <h3 class="text-uppercase my-1"><i class="far fa-hand-point-right"></i>&nbsp;<?php echo $result['name']; ?></h3>
                    <p class="text-capitalize m-0"><?php echo $result['description']; ?></p>
                    <h5 class="text-secondary">Rs. <?php echo $result['price']; ?></h5>
                    <div class="text-center my-2"><a href="product.php?type=delete&id=<?php echo $result['id'] ?>" class="btn btn-outline-danger">Delete Product</a></div>
               </div>
               </div>
               <?php }}else{ echo '<div class="m-2 alert alert-danger" style="height:50px">No Products are Available..</div>';} ?>
                         
               </div>
					<!-- code for select all book for liberary -->
<?php  include('footer.php'); ?>