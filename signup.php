<?php
include('dbconnection.inc.php');
session_start();
/* code for signup*/

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
  if($row){
echo "ok";
$_SESSION['ulogin'] = true;
$_SESSION['uemail'] = $email;
  }else{
    echo "fail";
  }
  }
    
 
 }
 
?>