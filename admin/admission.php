<?php 
define('TITLE','Colleges');
define('PAGE','colleges');
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
 $usql = "update admission set status='$status' where id='".$_GET['id']."'";
$row = mysqli_query($con,$usql);

}

$sql = "select ad.college_name, ad.college_link, ad.status, ad.id, dp.name from admission ad join department as dp on ad.department = dp.id";
$row = mysqli_query($con,$sql);

?>

<div class="container mt-3">
<h2 class="text-dark">Colleges</h2><br>
  <table id="table_id" class="display text-center">
    <thead>
        <tr>
            <th> #S.no </th>
            <th>Department</th>
            <th>College Name</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
    <?php if(mysqli_num_rows($row) > 0){ 
      $i=1;
      while($reasult = mysqli_fetch_assoc($row)){ ?>
    
       <tr>
            <td><?php echo $i; ?></td>
           <td><?php echo $reasult['college_name']; ?></td>
           <td><?php echo $reasult['name']; ?></td>
           <td>
           <?php if($reasult['status'] == 1){ ?>
           <a href="admission.php?type=deactive&id=<?php echo $reasult['id']; ?>" class="btn btn-success">Active</a>

           <?php }else{?>
           <a href="admission.php?type=active&id=<?php echo $reasult['id']; ?>" class="btn btn-danger">Deactive</a>
              
           <?php }?>
          <a href="edit_college.php?type=edit&id=<?php echo $reasult['id']; ?>" class="btn btn-info">Edit</a>
           </td>
        </tr> 
       
       <?php $i++; } }else{?>
         <tr><td class="text-center bg-danger text-light" colspan="8">No books are available...</td></tr>
       <?php }  ?>
    </tbody>
</table>
</div>
<div class="addcatbtn">
<a href="add_colleges.php" title="Add College"><i class="fas fa-plus-square fa-3x"></i></a>
</div>


<?php include('footer.php'); ?>