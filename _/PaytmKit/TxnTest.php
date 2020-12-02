<?php
session_start();
include('../dbconnection.inc.php');
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<!-- favicon icon -->
  <link rel="shortcut icon" type="image/x-icon" href="../img/favi.jpg">
 <!-- bootstrap file  -->
					<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
						<!-- fontawesome link -->
						<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
					  <!-- lato google font -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <!-- custom css -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="tnx-page">
	<h1 class="text-center text-light mt-5">User Check Out Page</h1>
	<div class="row mt-5 p-2 m-0">
		 <div class="col-md-5 mx-auto col-sm-8">
	<form method="post" class="bg-light p-4" action="pgRedirect.php">
	<h2 class="text-center font-weight-bold">WWN</h2>
					<table>
			<tbody>
				<?php
				$_SESSION['book_id'] = $_POST['bid'];
				
				?>
				
			<tr>
									<td><label class="font-weight-bold">BOOK_NAME <span class="text-danger">*</span></label></td>
		              <td><input type="text" readonly name="BOOK_NAME" value="<?php echo ucfirst($_POST['book_name']); ?>"></td>
							</tr>
				<tr>
					<td><label class="font-weight-bold">ORDER_ID <span class="text-danger">*</span></label></td>
					<td><input readonly id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					
					<td><label class="font-weight-bold">CUSTID <span class="text-danger">*</span></label></td>
					<td><input readonly id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['uemail']; ?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" readonly id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
				
					<td><input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					
					<td><label class="font-weight-bold">TxnAmount <span class="text-danger">*</span></label></td>
					<td><input readonly title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $_POST['price'] ;?>">
					</td>
				</tr>
				</tbody>
				</table>
				<div class="text-center mt-4">
					<input class="btn btn1 btn-success" value="CheckOut" type="submit"	onclick="">
					<a href="../book.php" class="btn btn1 btn-danger">Cancel</a>
	 <small class="form-text mt-2 text-light text-muted">Note: Complete Payment By Clicking Checkout Button</small>
           
</div>
	</form>
		 </div>
	</div>
	
  	<!--javascriipt all liberaries  -->
					<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
						<!-- bootstrap js -->
					<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
				</body>
</html>