<?php 
define('TITLE','Book');
define('PAGE','Book');
include('dbconnection.inc.php');
include('header.php');

if(!isset($_SESSION['ulogin'])){
echo "<script>";
echo "window.location.href='warning.html'";
echo"</script>";
} ?>
<!--ad section start-->
<script type='text/javascript' src='//pl15884251.topprofitablegate.com/05/9a/28/059a2845970c246aa4d2cc671303737b.js'></script>

<!-- /* banner section start */ -->
<section class="book-banner">
	<div class="container-fluid breadcrumb-area d-flex justify-content-center align-items-center">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page"> My Books</li>
			</ol>
		</nav>
	</div>
	<h3 class="text-center py-4 font-weight-bold text-dark"><i class="fas fa-book-open"></i>&nbsp; My Books</h3>
	<div class="bg-white px-5">
		<!-- sql code for select all book  -->
		<?php
 $sql = "select * from book where status = 1 order by bid desc";
 $res = mysqli_query($con,$sql);

?>
<div class="row pb-4">
			<?php if(mysqli_num_rows($res)>0){
  while($result = mysqli_fetch_assoc($res)){
  
  ?>
			<div class="card shadow mt-3 mx-auto px-2 pt-2" style="width: 19rem;">
				<img src="
					<?php echo "./media/".$result['image']; ?>" class="card-img-top p-2" alt="...">
					<div class="card-body p-2">
						<h6><span class="text-dark font-weight-bold">Price: &nbsp;</span>
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
						<form action="./PaytmKit/TxnTest.php" method="post">
							<input type="hidden" name="bid" value="<?php echo $result['bid']; ?>" class="form-control">
								<input type="hidden" name="price" value="<?php echo $result['selling_price']; ?>" class="form-control">
									<input type="hidden" name="book_name" value="<?php echo $result['book_title']; ?>" class="form-control">
										<?php if($result['type'] == 'free'){ ?>
										<a href="<?php echo "./pdf/".$result['book']; ?>" target="_blank" class="btn btn-success">Read PDF
										</a>
										<a href="liberary.php?id=<?php echo $result['bid']; ?>" class="btn btn-danger">Add to Library
										</a>
										<?php }else{ ?>
										<input type="submit" value="Buy Now" class="btn btn-info">
											<input type="submit" class="btn btn-danger btn-right " value="Add to Liberary">
												<?php } ?>
											</form>
										</div>
									</div>
									<?php } }else{?>
                  <h5 class="text-center text-danger font-weight-bold">No books are available now. we'll uploaded soon!</h5>

									<?php }?>
								</div>
</div>
</section>
	

<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" id="sform">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" required placeholder=" Dhiraj" name="name" id="sname" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" required placeholder="xyz@gmail.com" name="email" id="semail" class="form-control">
								<small id="mailmsg" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" placeholder="******" name="password" id="spassword" class="form-control">
								</div>
							</div>
							<div class="modal-footer">
								<span id="signuper"></span>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" id="signupbtn" class="btn btn-success">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- end of signup modal -->
			<!-- start signin modal -->
			<!-- Button trigger modal -->
			<!-- Modal -->
			<div class="modal fade" id="signin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" required class="form-control" name="email" id="lemail" placeholder="xyz@gmail.com">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" required class="form-control" name="password" id="lpassword" placeholder="******">
										</div>
									</div>
									<div class="modal-footer">
										<span id="loginer"></span>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" id="signinbtn" class="btn btn-primary">Sign In</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- end signin modal -->
					<!--javascriipt all liberaries  -->
					<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
					
						<!-- bootstrap js -->
					<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
					<!-- custom js file -->
					<script src="./js/custom.js"></script>
					
				</body>
			</html>
			