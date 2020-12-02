<?php 

session_start();
include('dbconnection.inc.php');
$email = mysqli_real_escape_string($con,trim($_POST['lemail']));
$password = mysqli_real_escape_string($con,trim(md5($_POST['lpassword'])));
if(!empty($email) && !empty($password)){
  $sql = "select email, password from user where email='$email'and password='$password' and status= 1";
$row = mysqli_query($con,$sql);
$reasult = mysqli_num_rows($row);
if($reasult > 0){
  echo 1;
  $_SESSION['ulogin']= true;
  $_SESSION['uemail']=$email;
}else{
  echo 0;
}

}
?>