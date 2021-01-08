<?php 

define('TITLE','Add Book');

define('PAGE','Addbook');

include('../dbconnection.inc.php');

include('header.php');
$notification="";
$rows = "";
if(!isset($_SESSION['alogin'])){

   header('location:login.php');

 }

if(isset($_POST['addbook'])){

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

  // start code for book image

if($_FILES['bimage']['error'] == 0){



  $img_name = rand(111111,999999).$_FILES['bimage']['name'];

  $tmp_name = $_FILES['bimage']['tmp_name'];

  $type = $_FILES['bimage']['type'];



  if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg"){

    move_uploaded_file($tmp_name,"../media/".$img_name);


}

}

  // end code for book image

   // start code for book pdf link

if($_FILES['pdf']['error'] == 0){

  

  $book_link = rand(111111,999999).$_FILES['pdf']['name'];

  $book_tmp = $_FILES['pdf']['tmp_name'];

  $btype = $_FILES['pdf']['type'];



  if($btype == "application/pdf"){

    move_uploaded_file($book_tmp,"../pdf/".$book_link);

 

  }

}

  // end code for book pdf link

if(isset($_POST['addbook'])){
  $sql = "INSERT INTO book (cat_id, book_title, s_desc, image, book, type, original_price, selling_price, status)

VALUES ('$catname', '$btitle', '$sdesc', '$img_name', '$book_link', '$mtype', $oprice, $sprice, 1)";

$row = mysqli_query($con,$sql);

if($row){
  $notification="yes";
  $msg = "<span class='alert alert-success'>Data inserted successfully...</span>";

}
}else{
  $notification="";
  $msg = "<span class='alert alert-danger'>Data not inserted successfully...</span>";

}
}

if($notification=="yes"){
  $query="select nemail from newsletter";
  $row=mysqli_query($con,$query);
  if(mysqli_num_rows($row)>0){
    require('../phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    //Server settings
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thedk3210@gmail.com';                     // SMTP username
    $mail->Password   = '7209608270a';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->setFrom('official@worldwidenovel.com');
    while($final=mysqli_fetch_assoc($row)){
        // $mail->addAddress($final['nemail']);
        $mail->addBCC($final['nemail']);    // Add a recipient
    }
    // $mail->addBCC($final['nemail']);
    $mail->addReplyTo('official@worldwidenovel.com');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Notification for new Books';
    $mail->Body    = '<p>Hii, <br> We are world wide novel. <br> New books are available on our website. Please visit our site. <br> Thank you.. <br>website link: <a href="https://www.worldwidenovel.com/">https://www.worldwidenovel.com/</a></p>';
    $mail->addAttachment('../media/'.$img_name);
  if(!$mail->send()){
    echo "fail email";
  }else{
     
    }
 }
}


?>

<div class="container mt-3">

<h2 class="text-dark">Add Book</h2>

<form action="" method="post" enctype="multipart/form-data">

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

<input type="text" required value="" name="btitle" id="book_title" placeholder="Book Title" class="form-control">

</div>

<div class="form-group">

<label for="s_desc">Short Description</label>

<input type="text" required value="" name="sdesc" id="s_desc" placeholder="Short Description" class="form-control">

</div>

<label for="type">Select Type</label>

<select name="type" required class="form-control" id="type">

 <option disabled>Select Type</option>

 <option value="free">Free</option>

 <option value="paid">Paid</option>



</select>

<div class="form-group">

<label for="oprice">Original Price</label>

<input type="text" required  placeholder="Original Price" name="oprice" id="oprice" class="form-control">

</div>

<div class="form-group">

<label for="sprice">Selling Price</label>

<input type="text" required placeholder="Selling Price"  name="sprice" id="sprice" class="form-control">

</div>

<div class="form-group">

<label for="image">Book Image</label>

<input type="file" required  name="bimage" id="image" class="form-control-file">

</div>

<div class="form-group">

<label for="pdf">Pdf File</label>

<input type="file" required  name="pdf" id="pdf" class="form-control-file">

</div>

<div class="form-group">

<input type="submit" name="addbook" value="Add Book" class="btn btn-success">

<a href="book.php" class="btn btn-secondary">Close</a>

<?php if(isset($msg)){echo $msg;} ?>

</div>

</form>

</div>



<?php include('footer.php'); ?>