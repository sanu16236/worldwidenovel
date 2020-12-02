<?php

include('dbconnection.inc.php');

session_start();

/* code for signup*/
if(isset($_GET['id'])){
    $q = "update user set status=1 where uid='".$_GET['id']."'";
    $row  = mysqli_query($con,$q);
    if($row){
     $_SESSION['ulogin'] = true;
     
     echo '<script>window.location.href="https://worldwidenovel.com/index.php";</script>';
    }else{
     echo 'fail';
    }
  }


$name = mysqli_real_escape_string($con,trim($_POST['name']));

$mobile = mysqli_real_escape_string($con,trim($_POST['mobile']));

$email = mysqli_real_escape_string($con,trim($_POST['email']));

$password =mysqli_real_escape_string($con,trim(md5($_POST['password'])));

$image = " ";

if(!empty($name) && !empty($email) && !empty($password) && !empty($mobile)){

    

  $vsql = "select email from user where email = '$email'";

  $vrow=mysqli_query($con,$vsql);

  $reasult = mysqli_num_rows($vrow);

  if($reasult > 0){

    echo 1;

  }else{
    $sql = "insert into user(name, email,password,mobile,image,status) values('$name','$email', '$password','$mobile','$image',1)";
    $row = mysqli_query($con,$sql);
    $random = rand(111111111111111,999999999999999);
  if($row){
   $id=mysqli_insert_id($con);
   $_SESSION['uemail']=$email;
   $_SESSION['ulogin'] = true;
   require('phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    //Server settings
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thedk3210@gmail.com';                     // SMTP username
    $mail->Password   = '7209608270a';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->setFrom('official@worldwidenovel.com');
    $mail->addAddress($email);    // Add a recipient
    $mail->addReplyTo('official@worldwidenovel.com');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Email Verificatio from World Wide Novel';
    $mail->Body ='<p>Verification link here : </p><br> <a href="https://worldwidenovel.com/signup.php?id='.$id.'&'.$random.'">https://worldwidenovel.com/signup.php?id='.$id.'&'.$random.'</a><br> Thakns for Register on World Wide Novel!!!!';

  if(!$mail->send()){
    echo 'notsend';
  }else{
    
     echo 'sent';
  }
 }else{
    echo "fail";
  }
}
}
?>