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

      <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Staff Page</title><script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        
        <style>
           .dropbtn {
  background-color: rgb(108, 7, 171);
  color: #ffffff;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  
display: inline-block;}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 190px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: rgb(108, 7, 171);;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-weight: bold;
}
.nav-bar{
    background-color:rgb(108, 7, 171) ;  ;
}

.dropdown-content a:hover {background-color:#f5e7fe
; }

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: rgb(108, 7, 171);
}
             .top-nav-index {
    background-color:rgb(87, 6, 140) ;
        color: rgb(255, 255, 255);
        font-size: 28px;
        padding: 10px 15px;
        font-weight: bold;
            }
#rcorners2 {
  border-radius: 40px 40px 40px 40px;
  background: #f5e7fe
;
  padding: 10px 10px; 
  width: 800px;
  height:200px; 
  margin: auto;
  margin-top: 10px;
}input[type=submit] {
  background-color: rgb(230, 0, 0);
  color: white;
  padding: 8px 19px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  height: 45px;
  cursor: pointer;
  font-size: 12px;
} input[type=text], select {
  width: 90%;
  padding: 12px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.title-idea{
    font-weight: bold;
}
        </style>
    </head>
    <body>
          <div class="top-nav-index">STAFF </div>
 <div class="nav-bar">
          <div class="dropdown">
                <button class="dropbtn"><a href="staff.php" style="color:#ffffff">HOME</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn">IDEA</button>
                <div class="dropdown-content">
                     <a href="viewallofidea.php" >IDEAS</a>
                    <a href="ideamanagementhomepage.php" >IDEA HOME</a>
                </div>
            </div>
         <div class="dropdown">
             <button class="dropbtn">UPLOAD</button>
                <div class="dropdown-content">
                    <a href="postideawithpdffile.php" ><i class="fa-solid fa-paperclip"></i>FILE PDF</a>
                </div>
            </div>
            <div class="dropdown">
             <button class="dropbtn">PORTFOLIO</button>
                <div class="dropdown-content">
                    <a href="editstaffacc.php" >PROFILE</a>
                    <a href="logout.php" >LOG OUT</a>
                </div>
            </div>

        </div>
       <div>
        <p id="rcorners2">
            <a><i class="glyphicon glyphicon-list" style="font-size:16px;  color:black; padding: 6px 4px; "></i></a>
            <br><a class="title-idea" href="#">Title</a><br>
            <a class="title-explanation">Title Explanations Title ExplanationsTitle ExplanationsTitle ExplanationsvTitle ExplanationsTitle Explanations</a><br><br>
            <a><i class="glyphicon glyphicon-comment" style="font-size:16px;  color:black; padding: 6px 4px; "></i></a>
            <a><i class="glyphicon glyphicon-thumbs-up" style="font-size:16px;  color:black; padding: 6px 4px;"></i>
</a>
<a><i class="glyphicon glyphicon-thumbs-down" style="font-size:16px;  color:black; padding: 6px 4px;" ></i></a><br>
<input type="text" id="cmt" name="comments" placeholder="Write Comments" required>    
<input type="submit" value="Post" name="post">


    <!-- hien thi toan bo idea -->
        </p>   </div>
    </body>
    
</html>