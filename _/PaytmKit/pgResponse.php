<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tnx Status </title>
	<!-- favicon icon -->
  <link rel="shortcut icon" type="image/x-icon" href="../img/favi.jpg">
  <!-- bootstrap file  -->
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
					<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
			
	<!-- sweet alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>

</body>
</html>



<?php

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include('../dbconnection.inc.php');
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

if($isValidChecksum == "TRUE") {
		if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<h2 class='text-center text-success'>Transaction status is success</h2>";
$stu_email = $_GET['uid'];
$course_id = $_GET['id'];
$order_id = $_POST["ORDERID"];
$amount = $_POST["TXNAMOUNT"];
$status = $_POST['STATUS'];
$resmsg = $_POST['RESPMSG'];
$date = $_POST['TXNDATE'];
$sql = "update book_sell set order_id='$order_id', amount='$amount', status='$status', res_msg='$resmsg', date='$date' where stu_email='$stu_email' and course_id='$course_id'";
$res = mysqli_query($con, $sql);


echo '<h2 class="text-primary text-center">Redirecting to your Liberary.....</h2>';
echo '<script>';
echo 'setTimeout(function(){';
	header('location:../profile.php');
echo '},3000)';
echo '</script>';
		echo '<script>';
	echo 'swal({';
  echo 'title: "Thanks for buying this book!",';
  echo 'text: "Your transaction status is success..",';
 echo 'icon: "success",';
echo '});';
echo '</script>';
$dsql = "select order_id from book_sell where stu_email='$stu_email' and order_id = ' '";
	$dres = mysqli_query($con,$dsql);
	// $result = mysqli_fetch_assoc($dres);
	if(mysqli_num_rows($dres) > 0){
		$q = "delete from book_sell where stu_email='$stu_email' and order_id=' '";
		$row = mysqli_query($con,$q);
	}
}else {

		echo "<h2 class='text-center mx-auto mt-5 text-danger font-weight-bold'>Transaction status is failure</h2>";
		echo '<script>';
	echo 'swal({';
  echo 'title: "Something went wrong ?",';
  echo 'text: "Your transaction is failed..",';
 echo 'icon: "error",';
echo '});';
echo '</script>';
echo '<div class="text-center"><a href="../book.php" class="btn btn-danger">Go to checkout page</a></div>';
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
	
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
}
?>