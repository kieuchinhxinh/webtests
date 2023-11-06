<?php
include "dbconnect.php";
session_start();
if(isset($_POST['Signin'])){
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$kq=mysqli_query($con,"SELECT *FROM staff where role='staff'");
$row=mysqli_fetch_array($kq);
if($row){
   
    $_SESSION['login']= $row['role'];
    if(!$_SESSION['login']) {
        header("Location:home.php");
    }
    if($_SESSION['login'] && $_SESSION['login']=='staff') {
        header("Location:staff.php");
 
    }
}
}
?>


<html>
    <head>

    <h2>Staff management homepage</h2>      
    </head>
    <body>
        <div>
            <a href="ideamanagementhomepage.php">Ideamanagemnt homepage</a>
            <a href="logout.php">Logout </a>
        </div>
    </body>
</html>