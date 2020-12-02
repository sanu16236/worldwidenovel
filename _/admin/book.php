<?php 
define('TITLE','Book');
define('PAGE','Book');
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
 $usql = "update book set status='$status' where bid='".$_GET['id']."'";
$row = mysqli_query($con,$usql);

}

$sql = "select b.book_title, b.image, b.original_price, b.selling_price, b.type, b.status, b.bid, c.name  from book as b join category as c on b.cat_id = c.id";
$row = mysqli_query($con,$sql);

?>

<div class="container mt-3">
<h2 class="text-dark">Books</h2><br>
  <table id="table_id" class="display text-center">
    <thead>
        <tr>
            <th> #S.no </th>
            <th>Category</th>
            <th>Book</th>
            <th>Image</th>
            <th>Type</th>
            <th>Original Price</th>
            <th>Selling Price</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
    <?php if(mysqli_num_rows($row) > 0){ 
      $i=1;
      while($reasult = mysqli_fetch_assoc($row)){ ?>
    
       <tr>
            <td><?php echo $i; ?></td>
           <td><?php echo $reasult['name']; ?></td>
           <td><?php echo $reasult['book_title']; ?></td>
           <td><img width="100px" height="100px" src="../media/<?php echo $reasult['image']; ?>" alt=""></td>
           <td><?php echo $reasult['type']; ?></td>
           <td><?php echo $reasult['original_price']; ?></td>
           <td><?php echo $reasult['selling_price']; ?></td>
           <td>
           <?php if($reasult['status'] == 1){ ?>
           <a href="book.php?type=deactive&id=<?php echo $reasult['bid']; ?>" class="btn btn-success">Active</a>

           <?php }else{?>
           <a href="book.php?type=active&id=<?php echo $reasult['bid']; ?>" class="btn btn-danger">Deactive</a>
              
           <?php }?>
          <a href="editbook.php?type=edit&id=<?php echo $reasult['bid']; ?>" class="btn btn-info">Edit</a>
           </td>
        </tr> 
       
       <?php $i++; } }else{?>
         <tr><td class="text-center bg-danger text-light" colspan="8">No books are available...</td></tr>
       <?php }  ?>
    </tbody>
</table>
</div>
<div class="addcatbtn">
<a href="addbook.php" title="Add Book"><i class="fas fa-plus-square fa-3x"></i></a>
</div>


<?php include('footer.php'); ?>