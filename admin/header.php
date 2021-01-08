

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin-<?php echo TITLE; ?></title>
  <!-- favicon icon -->
  <link rel="shortcut icon" type="image/x-icon" href="../img/favi.jpg">

  
  <title>World Wide Novel- <?php echo TITLE; ?></title>
  <!-- bootstrap file  -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- fontawesome link -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
<!-- lato google font -->
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <!-- data table cdn -->
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  
  <!-- custom css -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- nav section start -->
<header>
  <?php session_start();
if(PAGE != 'adminlogin'){
?>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
     <div class="container">
    <a href="" class="navbar-brand font-weight-bold logo">WWN</a>
    
    <button type="button"  class="navbar-toggler" data-toggle="collapse" data-target="#navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mx-auto" id="nav">
      <li class="nav-item">
      <a href="index.php" class="nav-link <?php if(PAGE == 'Dashboard'){echo 'active';} ?>">Dashboard</a>
      </li>
      <li class="nav-item">
      <a href="category.php" class=" <?php if(PAGE == 'Cat' || PAGE == 'Addcat'){echo 'active';} ?> nav-link">Category</a>
      </li>
      <li class="nav-item">
      <a href="book.php" class="nav-link <?php if(PAGE == 'Book' || PAGE == 'Edit Book' || PAGE == 'Addbook'){echo 'active';} ?>">Books</a>
      </li>
      <li class="nav-item">
      <a href="user.php" class="nav-link <?php if(PAGE == 'User'){echo 'active';} ?>">User</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="department.php">Department</a>
          <a class="dropdown-item" href="admission.php">Colleges</a>
        </div>
      </li>
      </ul> 
    </div>
    <div class="d-none d-md-block">
    <span class="text-light font-weight-bold mr-3"><?php echo "Welcome, ".ucfirst($_SESSION['aname']); ?></span>
    <a href="logout.php" class="btn btn-outline-danger">logout</a>
    </div>
    </div>
  </nav>

</header>
<?php }?>