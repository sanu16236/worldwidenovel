<?php 
define('TITLE','Profile');
define('PAGE','Profile');
include('dbconnection.inc.php');
include('header.php');
if(!isset($_SESSION['ulogin'])){
header('location:warning.php');
}
// query for user details
$email = $_SESSION['uemail'];
$sql = "select bs.stu_email, bs.course_id, bk.book_title, bk.s_desc, bk.image, bk.book, bk.original_price, bk.selling_price from book_sell as bs join book as bk on bs.course_id = bk.bid where bs.stu_email= '$email' and bs.status= 'TXN_SUCCESS' order by id desc";
$row = mysqli_query($con,$sql);
$usql = "select name, image from user where email='$email'";
$res = mysqli_query($con,$usql);
$uname = mysqli_fetch_assoc($res);
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
									<a href="" class="
										<?php if(PAGE == 'Profile'){echo 'active';} ?>text-light nav-link">
										<i class="fas fa-book-open"></i>&nbsp;&nbsp;Library
									</a>
								</li>
								<li class="nav-item">
									<a href="edit_profile.php" class="text-light nav-link">
										<i class="fas fa-user"></i>&nbsp;&nbsp;Profile
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- code for select all book for liberary -->
					<div class="col-md-10">
						<div class="row mr-0 mb-2 mt-2">
							<?php if(mysqli_num_rows($row)>0){
  while($result = mysqli_fetch_assoc($row)){
  ?>
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="card shadow mt-3 mx-4 px-2 mx-md-0 px-md-1 pt-2">
									<img src="<?php echo "./media/".$result['image']; ?>" class="card-img-top" alt="...">
										<div class="card-body p-2">
											<h6> <span class="text-dark font-weight-bold">Price: &nbsp;</span>
												<del class="text-muted">
													<?php echo 'Rs '.$result['original_price'].'.00'; ?>
												</del> &nbsp;
												<?php echo 'Rs '.$result['selling_price'].'.00'; ?>
											</h6>
											<h5 class="card-title font-weight-bold">
												<?php echo $result['book_title']; ?>
											</h5>
											<p class="card-text">
												<?php echo $result['s_desc'].'.'; ?>
											</p>
											<a href="<?php echo "./pdf/".$result['book']; ?>" target="_blank" class="btn btn-success">Read PDF
											</a>
										</div>
									</div>
								</div>
								<?php } }else{?>
                  <h5 class=" mx-md-auto ml-5 text-danger font-weight-bold"> No books are available in your library..</h5>

								<?php }?>
							</div>
						</div>
					</div>
					<?php  include('footer.php'); ?>