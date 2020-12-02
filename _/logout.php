<?php 

include('dbconnection.inc.php');

session_start();

unset($_SESSION['ulogin']);
unset($_SESSION['uemail']);


header('location:index.php');



?>