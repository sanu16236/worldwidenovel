<?php 
define('TITLE','Admin login');
define('PAGE','adminlogin');
include('../dbconnection.inc.php');
include('header.php');

if(isset($_POST['login'])){
  $email=mysqli_real_escape_string($con,trim($_POST['email']));
  $password = mysqli_real_escape_string($con,trim(md5($_POST['password'])));
  $sql = "select * from admin where email='$email' and password='$password'";
  $row = mysqli_query($con,$sql);
  $reasult = mysqli_num_rows($row);
  $res = mysqli_fetch_assoc($row);
  if($reasult > 0){
    $_SESSION['alogin']=true;
    $_SESSION['aname']=$res['name'];
    header('location:index.php');
  }else{
    $msg = '<span class="alert alert-danger">Please enter valid login details..</span>';
  }
}


?>

  <div class="banner container-fluid">
  <div class="login-main p-5 shadow text-light">
  <h3 class="text-center text-light">Admin login</h3>
    <form method="POST">
      <div class="form-group">
      <label for="email">Username</label>
      <input type="email" name="email" id="email" placeholder="Username" class="form-control">
      </div>
      <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Password" class="form-control">
      </div>
      
      <div class="form-group text-right">
        <?php if(isset($msg)){echo $msg ;} ?>
        <input type="submit" name="login" value="Login" class="btn btn-lg btn-success">
      </div>
    </form>
  </div>
  </div>

<?php include('footer.php'); ?>