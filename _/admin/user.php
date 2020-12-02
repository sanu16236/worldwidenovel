<?php 
define('TITLE', 'User');
define('PAGE', 'User');

include('../dbconnection.inc.php');
include('header.php');
if(!isset($_SESSION['alogin'])){
   header('location:login.php');
 }
if(isset($_GET['type'])){
  if($_GET['type']== 'active'){
  $status = 1;
}else{
  $status = 0;
}
 $usql = "update user set status='$status' where uid='".$_GET['id']."'";
$row = mysqli_query($con,$usql);

}
$sql = "select * from user";
$row = mysqli_query($con, $sql);


?>
<div class="container mt-3">
<h2 class="text-dark">Users</h2><br>

  <table id="table_id" class="display text-center">
    <thead>
        <tr>
            <th> #S.no </th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Image</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
    <?php if(mysqli_num_rows($row) > 0){ 
      $i=1;
      while($reasult = mysqli_fetch_assoc($row)){
      ?>
    
       <tr>
            <td><?php echo $i; ?></td>
           <td><?php echo $reasult['name']; ?></td>
           <td><?php echo $reasult['email']; ?></td>
           <td><?php echo $reasult['mobile']; ?></td>
           <td>
             <?php if($reasult['image'] != ' '){ ?>
           <img width="80px" height="80px" src="<?php echo '../media/'.$reasult['image']; ?>">
          <?php }else{ ?>
           <img width="80px" height="80px" src="../media/avtar.png">
             
            <?php } ?>
          </td>
           <td>
           <?php if($reasult['status'] == 1){ ?>
           <a href="user.php?type=deactive&id=<?php echo $reasult['uid']; ?>" class="btn btn-success">Active</a>

           <?php }else{?>
           <a href="user.php?type=active&id=<?php echo $reasult['uid']; ?>" class="btn btn-danger">Deactive</a>
              
           <?php }?>
           
           </td>
        </tr> 
       
       <?php $i++; } }else{ ?>
               <tr><td class="text-center bg-danger text-light" colspan="6">No data found.....</td></tr>

       <?php } ?>
    </tbody>
</table>
</div>





<?php include('footer.php'); ?>