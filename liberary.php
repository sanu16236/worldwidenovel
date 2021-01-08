<?php 
define('TITLE','Add Liberary');
define('PAGE','Add');
include('dbconnection.inc.php');
include('header.php');

if(!isset($_SESSION['ulogin'])){
header('location:warning.php');
}

if(isset($_GET['id'])){
$stu_email = $_SESSION['uemail'];
$course_id = $_GET['id'];
$date = date('y-m-d');

// query for check book already added
$bsql = "select * from book_sell where stu_email='$stu_email' and course_id='$course_id'";
$bres= mysqli_query($con,$bsql);
if(mysqli_num_rows($bres)>0){
    echo '<script>';
     echo 'window.location.href="profile.php"';
    // echo 'alert("you have already added this book!")';
   
    echo '</script>';

}else{
$sql = "insert into book_sell(order_id, stu_email, course_id, amount, status, res_msg, date )
 values('free', '$stu_email', '$course_id', 0, 'TXN_SUCCESS', 'free_book', '$date');";
$res = mysqli_query($con,$sql);
echo '<script>';
echo 'window.location.href="profile.php"';
echo '</script>';
  
}
}
// end code for user update
?>





<?php include('footer.php'); ?>