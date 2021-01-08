<?php

define('TITLE','Home');

define('PAGE','Home');

include('header.php');

if(isset($_POST['send'])){

    require('phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    //Server settings
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thedk3210@gmail.com';                     // SMTP username
    $mail->Password   = '7209608270a';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->setFrom($_POST['email'],$_POST['name']);
    $mail->addAddress('official@worldwidenovel.com');    // Add a recipient
    $mail->addReplyTo($_POST['email'],$_POST['name']);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Subject:'.$_POST['subject'];
    $mail->Body    = '<h4><b style="font-size:17px;">Name: </b>'.$_POST['name'].'<br style="font-size:17px;"><b>Email: </b>'.$_POST['email'].'<br><b style="font-size:17px;">Message: </b>'.$_POST['msg'].'</h4>';

  if(!$mail->send()){
    $emsg="Something went wrong. Please try again...";
    header('location:index.php#contact');

  }else{
      $emsg="Thanks! ".$_POST['name']." for contacting us. We'll get back to you soon!";
      header('location:#contact');

    }
}
// Newsletter section start...
if(isset($_POST['newsletter_btn'])){
	$email=$_POST['nemail'];
	$sql= "insert into newsletter(nemail) values('$email')";
	$row = mysqli_query($con,$sql);
	if($row){
		
	}else{
		echo 'failed';
	}
}
if(isset($_SESSION['uemail'])){ $nemail = $_SESSION['uemail'];}
else{
	$nemail = "email@google.com";
};
$q="select nemail from newsletter where nemail='".$nemail."'";
$row = mysqli_query($con,$q);
$result= mysqli_fetch_assoc($row);
if(mysqli_num_rows($row)>0){
	$subscribed = "yes";
}else{
	$subscribed = "no";
}
?>

	<script async src='//www.responserver.com/052a7ca4cc9f96ed4b5566e15089f3eb/invoke.js'></script>

<!-- banner area start -->
<div id="preloader"></div>

<section class="banner" id="index">

	<div class="content">

		<div class="left-section">

			<h3 class="text-center d-none d-md-block text-dark text-lg-left">Welcome To</h3>

			<h1 class="text-uppercase text-center text-lg-left mt-md-1 font-weight-bold">World wide novel</h1>

			<p class="text-center text-lg-left" style="font-size:23px">We provide many types of novel for you with sort notes.</p>

			<a href="#about" class="btn btn-success d-md-inline-block d-none">Read more</a>

	

				<div class="nav-btn d-block d-md-none">

				<?php if(!isset($_SESSION['ulogin'])){ ?>

				<div class="text-center"> 

				    <a href="" class="btn shadow btn-primary mr-2" data-toggle="modal" data-target="#signin">Sign in</a>

				<a href="" class="btn shadow btn-success" data-toggle="modal" data-target="#signup">Sign up</a>

				</div>

				<?php }?>

				<?php if(isset($_SESSION['ulogin'])){ ?>

				<div class="text-center">

				    <a href="logout.php" class="btn shadow btn-danger mx-auto">Logout</a>

				</div>

				<?php }?>

			</div>

		</div>

		<div class="right-section text-right d-none d-md-block">

			<img src="./img/book.png" class="img-fluid" alt="banner-image">

			</div>

		</div>

	</section>

	<!-- end of banner section -->

										

<script async="async" data-cfasync="false" src="//pl15871674.topprofitablegate.com/c26cdcd98aa77f9e0134916f8d69cd93/invoke.js"></script>

<div id="container-c26cdcd98aa77f9e0134916f8d69cd93"></div>

<div class="d-block d-md-none text-center">

<script type="text/javascript">

	atOptions = {

		'key' : '9c817ad72ba97def45e481eabc831f69',

		'format' : 'iframe',

		'height' : 50,

		'width' : 320,

		'params' : {}

	};

	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.profitabledisplaycontent.com/9c817ad72ba97def45e481eabc831f69/invoke.js"></scr' + 'ipt>');

</script>

</div>

	<!-- start books section -->

	<section class=" jumbotron" id="books">

		<h3 class="text-center text-dark pb-3 font-weight-bold"><i class="fas fa-book-open"></i> &nbsp;My Books</h3>

		<div class="container-fluid d-flex flex-wrap justify-content-between">

			<!-- card section 1st -->

			<div class="card shadow px-3 pt-2 mt-3" style="width: 18rem;">

				<img src="./media/book.jpg" class="card-img-top" alt="...">

					<div class="card-body p-2">

						<h5 class="card-title font-weight-bold">Buying Your first Home.</h5>

						<p class="card-text text-muted">Buying your first home उन लोगों के लिए एक गाइड है जो काफी समय से किराए के घर में रह रहे है और अब खुद का घर खरीदने के बारे में सोच रहे हैं। अगर आप उनमें से एक है तो यह किताब बताएगी की एक घर खरीदने के बारे में सोचने से लेकर घर खरीदने तक आपको  किन किन बातों का ध्यान रखना चाहिए</p>

						<a href="./pdf/Buying your first Home.pdf" target="_blank" class="btn btn-primary">Read PDF</a>

					</div>

				</div>

				<!-- card section second -->

				<div class="card shadow px-3 mt-3 pt-2" style="width: 18rem;">

					<img src="./media/man-s-search-for-meaning.jpg" class="card-img-top" alt="...">

						<div class="card-body p-2">

							<h5 class="card-title font-weight-bold">Man Search for Meaning.</h5>

							<p class="card-text text-muted">अगर आपको ऐसा लगता है कि आप अपने जीवन में सबसे कमजोर समय से गुजर रहे हैं तो आपको यह बुक जरूर पढ़नी चाहिए।

 लाइफ में मीनिंग कैसे खोजना है ये इस बुक के ऑथर सिखाएंगे। वो आपको ये सिखाएंगे की जब तक आप जिंदा है तब तक कहीं न कहीं होप भी जिंदा है।</p>

							<a href="./pdf/Man SEARCH FOR MEANING-converted.pdf" target="_blank" class="btn btn-primary">Read PDF</a>

						</div>

					</div>

					<!-- card section third -->

					<div class="card shadow mt-3 px-3 pt-2" style="width: 18rem;">

						<img src="./media/51p+C-CV47L.jpg" class="card-img-top" alt="...">

							<div class="card-body p-2">

								<h5 class="card-title font-weight-bold">Parable of the Pipeline.</h5>

								<p class="card-text text-muted">क्या आप भी ये सोचते हो कि सक्सेस का मतलब है एक स्टेबल और सिक्योर जॉब? क्या हम बस एक एम्प्लोई बनने के लिए इतने सालो से पढ़ाई कर रहे थे? क्या यही हमारी डेस्टिनी है? तो हमे फाइनेंशियल सिक्योरिटी कैसे मिलेगी? आप एक मिलेनियर कैसे बनोगे? इस बुक में आपको इन सारे सवालों के जवाब मिलेंगे और  इसके अलावा काफी कुछ सीखने को मिलेगा।</p>

								<a href="./pdf/Parable of The Pipeline-converted.pdf" target="_blank" class="btn btn-primary">Read PDF</a>

							</div>

						</div>

						<!-- card section fourth -->

						<div class="card shadow mt-3 px-3 pt-2" style="width: 18rem;">

							<img src="./media/5-love-language.jpg" class="card-img-top" alt="...">

								<div class="card-body p-2">

									<h5 class="card-title font-weight-bold">The five love languages.</h5>

									<p class="card-text text-muted">The 5 love languages में हम देखेंगे कि प्यार की कौन कौन से भाषाएं होती है और उन्हें किस तरह से समझ जाता है। हर किसी की प्यार की अपनी भाषा होती है। इस किताब में हम उन पांच भाषाओं के बारे में जानेंगे  जिसकी मदद से आप अपने पार्टनर को अच्छे से समझ कर अपने रिश्ते को मजबूत कर सकते है और अपने बीच का प्यार बढ़ा सकते है।</p>

									<a href="./pdf/5-love-language.pdf" target="_blank" class="btn btn-primary">Read PDF</a>

								</div>

							</div>

						</div>

						<div class="book-btn text-center pt-4">

							<a href="book.php" class="btn btn-danger">See more</a>

						</div>

					</section>

					<!-- end of books section -->

					<!-- start about us section -->

					<section id="about" class="bg-light">

						<div class="container-fluid">

							<h3 class="text-center text-dark py-4 font-weight-bold"><i class="fas fa-biohazard"></i> &nbsp;About us</h3>

							<div class="row px-md-4 px-0">

								<div class="col-lg-5 col-md-7 about-content">

									<h1>Here are some words about my book's !</h1>

									<p class="text-muted">Hii, i am The DK and  I am giving you the opportunity to know about business, 

     culture, our country and more.</p>

									<p class="text-muted">I want to tell you one thing which is that you have to read all these books at least 

    one time....

  </p>

									<a href="about.php" class="btn text-white abtn">Read more</a>

									<h4 class="py-3">Thank You.&nbsp;<i class="fas fa-pencil-alt"></i></h4>

								</div>

								<div class="col-lg-7 col-sm-5 d-none d-md-block about-img text-right">

									<img src="./img/aboutmain.png" class="img-fluid" alt="">

									</div>

								</div>

							</div>

						</section>

						<!-- start of contact us section -->

						<section id="contact" class="pb-3">

							<h3 class="text-light text-center py-4 font-weight-bold"><i class="fas fa-address-book"></i> &nbsp;Contact us</h3>

							<div class="row m-0">

								<div class="col-lg-5 mx-md-auto col-md-7">

									<form class=" p-3 shadow-lg bg-light contact-form" method="post">

										<h5 class="text-center text-info pt-2">

											<?php if(isset($emsg)){echo $emsg;} ?>

										</h5>

										<div class="form-group">

											<label for="name">Name</label>

											<input type="text" name="name" class="form-control" id="name">

											</div>

											<div class="form-group">

												<label for="email">Email</label>

												<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">

													<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

												</div>

												<div class="form-group">

													<label for="password">Subject</label>

													<input type="text" name="subject" class="form-control" id="password">

													</div>

													<div class="form-group">

														<label for="message">Message</label>

														<textarea name="msg" class="form-control" id="message" cols="30" rows="6"></textarea>

													</div>

													<button type="submit" name="send" class="btn btn-success">Send</button>

												</form>

											</div>

											<div class="col-md-5 col-lg-4 mx-2 mx-md-auto shadow-lg p-4 main-contact">

												<div class="social-icon">

													<a href="https://www.facebook.com/profile.php?id=100006345784123" class="nav-link">

														<i class="fab fa-facebook fa-2x"></i>

													</a>

													<a href="https://instagram.com/dhiraj12345?igshid=ib8t6j0nds79" class="nav-link">

														<i class="fab fa-instagram fa-2x"></i>

													</a>

													<a href="https://api.whatsapp.com/send?text=hello&phone=917209608270" class="nav-link">

														<i class="fab fa-whatsapp fa-2x"></i>

													</a>

												</div>

												<div class="mt-2 text-light">

													<h4 class="text-center">+91 9162046282</h4>

													<h4 class="text-center">+91 9559629117 </h4>

													<h4 class="text-center pb-1">official@worldwidenovel.com</h4>

												</div>

											</div>

										</section>

				<!-- start modal section for signu
<!-- Modal for Newsletter -->
<?php if(isset($_SESSION['ulogin']) && $subscribed == "yes"){ ?>

<!-- Modal -->
<div class="modal fade" id="newsletter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsletter">Newsletter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			<form method="post">
      <div class="modal-body">
        <div class="form-group">
					<label for="email">Email</label>
					<input type="email" required value="<?php if(isset($_SESSION['ulogin'])){echo $_SESSION['uemail']; } ?>" placeholder="Enter your email" name="nemail" id="email" class="form-control">
				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="newsletter_btn" class="btn btn-danger">Subscribe</button>
			</div>
			</form>
    </div>
  </div>
</div>
<?php }?>
<?php include('footer.php'); ?>