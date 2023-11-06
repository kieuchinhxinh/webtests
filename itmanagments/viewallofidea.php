<?php
session_start();
include 'dbconnect.php';
$stmt = $con->prepare("SELECT title,explanation,category_id ,ie_id FROM ideas WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($title, $explanation,$category_id,$ie_id);
$stmt->fetch();
$stmt->close();

?>
<html>
    <head>
       
    </head>
<body>
<div>
    <a href="ideamanagementhomepage.php">Go back to ideamanagement homepage</a><br>
    <form action="viewallofidea.php" method="post">
    <label for="searchidea">Search idea by hastags</label><br>
    <input type="text" name="hastags" placeholder="Enter the hastags of idea here .......">
    <input type="submit" name="search" value="Search">
    </form>
    <?php
    if(isset($_POST['search'])){
        $hastags=$_REQUEST['hastags'];
 
        $checkQ = "SELECT * FROM ideas WHERE hastags LIKE '%#%'";
    $backto = $con->query($checkQ);

    // Hiển thị kết quả
    if ($backto->num_rows > 0) {
        while($a = $backto->fetch_assoc()) {
            echo"You have selected the hastags is $hastags for searching<br>";
            echo"<h2>Here is your finding idea</h2>";
            echo "<h4>Idea Name:".$a["title"] . "</h4>";
         
            echo "<h4>Idea explanation:".$a["explanation"] . "</h4>";
          
            echo "<h4>Idea hastags:".$a["hastags"] . "</h4>";
        
          
          
        }
    } else {
        echo "Không có kết quả phù hợp.";
    }

       
    }
 
    
    
    ?>
<h1 > List of Ideas:</h1></div>
				<table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>Idea title</strong></th>
<th><strong>Idea explanation </strong></th>

<th><strong>Idea category_id</strong></th>
<th><strong>Idea ideaevent_id </strong></th>



</tr>
                </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM ideas  ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td ><?php echo $count; ?></td>
<td ><?php echo $row["title"]; ?></td>
<td ><?php echo $row["explanation"]; ?></td>

<td ><?php echo $row["category_id"];?></td>
<td ><?php echo $row["ie_id"];?></td>
<td >
<a href="editidea.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td >
<a href="deleteidea.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
<td >
<a href="cmtidea.php?id=<?php echo $row["id"]; ?>">Write a comment for idea </a>
</td>
<td>
    <a href="like.php?id=<?php echo $row["id"]; ?>">Like  </a></td>
    <td>
    <a href="dislike.php?id==<?php echo $row["id"]; ?>">Dislike  </a>
</td>

</tr>
<?php $count++; } ?>
</tbody>

			</div>
</body>
</html>
</div>