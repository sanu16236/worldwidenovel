<?php 
include('dbconnection.inc.php');
session_start();
unset($_SESSION['ulogin']);
header('location:index.php');

?>