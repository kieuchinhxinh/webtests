<?php
session_start();
?>
<html>
    <head>
    <title>Ideas </title>
     <meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
  <style>
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(87, 6, 140) ;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #ffffff;
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
}
.pagination {
  display: inline-block;
  margin: auto;
  text-align: center;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px; 

}

.pagination a.active {
  background-color: #CA8CE9;
  color: white;
  border: 1px solid #CA8CE9;  margin: auto;

}

.pagination a:hover:not(.active) {background-color: #CA8CE9;}
  </style>
</head>
    <body>        <ul>
            <li><a href="staff.php"><i class="glyphicon glyphicon-user"></i>
</a></li>

         <li><a href="ideamanagementhomepage.php">IDEA HOME</a></li>

  <li><a href="filterideabycategory.php">IDEA OF CATEGORY</a></li>
  <li><a href="filterideabyevent.php">IDEA OF EVENT</a></li>
  <li><a href="createidea.php">NEW IDEA</a></li>
  <li><a href="viewallofidea.php">IDEAS</a></li>
  <li><a href="postideawithpdffile.php">FILE</a></li>

 
</ul>
<div>
        <p id="rcorners2">
    <!-- hien thi toan bo idea -->
        </p>   </div>
         <div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#" class="active">1</a>
  <a href="#" >2</a>
  <a href="#">3</a>
  <a href="#">&raquo;</a>
  </div> 
    </body>
</html>
