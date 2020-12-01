
<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content bg-danger">
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
						<input type="text" required placeholder=" John" name="name" id="sname" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" required placeholder="xyz@gmail.com" name="email" id="semail" class="form-control">
								<small id="mailmsg" class="form-text">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group">
							<label for="mobile">Mobile</label>
							<input type="text" required placeholder="9999999999" name="mobile" id="mobile" class="form-control">
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
					<div class="modal-content bg-danger">
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
										<small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
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
					<?php if(PAGE == 'Home'){ ?>
					<footer class="bg-dark text-white p-2 p-md-4">
						<p class="text-center">copyright &copy; 
							<span id="fdate"></span> | Design & Developed by World Wide Novel co.
						</p>
					</footer>
					<?php } ?>
					<!--javascriipt all liberaries  -->
					<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
						<!-- bootstrap js -->
					<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
					<!-- custom js file -->
					<script src="./js/custom.js"></script>
				</body>
			</html>