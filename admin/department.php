<?php
define('TITLE', 'Department');
define('PAGE', 'department');
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
 $usql = "update department set status='$status' where id='".$_GET['id']."'";
$row = mysqli_query($con,$usql);

}

$sql = "select * from department";
$row = mysqli_query($con,$sql);

?>

<div class="container mt-3">
<h2 class="text-dark">Department</h2><br>
  <table id="table_id" class="display text-center">
    <thead>
        <tr>
            <th> #S.no </th>
            <th>Department Name</th>
            
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
           
           <td>
           
           <?php if($reasult['status'] == 1){ ?>
           <a href="department.php?type=deactive&id=<?php echo $reasult['id']; ?>" class="btn btn-success">Active</a>

           <?php }else{?>
           <a href="department.php?type=active&id=<?php echo $reasult['id']; ?>" class="btn btn-danger">Deactive</a>
              
           <?php }?>
          <a href="add_department.php?type=edit&id=<?php echo $reasult['id']; ?>" class="btn btn-info">Edit</a>
           </td>
        </tr> 
       
       <?php $i++; } }else{?>
         <tr><td class="text-center bg-danger text-light" colspan="3">No Departments are available..</td></tr>
       <?php }  ?>
    </tbody>
</table>
</div>
<div class="addcatbtn">
<a href="add_department.php" title="Add Department"><i class="fas fa-plus-square fa-3x"></i></a>
</div>

<?php include('footer.php'); ?>