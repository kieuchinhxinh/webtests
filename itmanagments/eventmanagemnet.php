<?php
session_start();
include 'dbconnect.php';
$stmt = $con->prepare("SELECT ename,deadline,idease_id FROM ideasevent WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($ename, $deadline,$idease_id);
$stmt->fetch();
$stmt->close();

?>
<html>
    <head>
       
    </head>
<body>
<div>
    <a href="adminhomepage.php">Go back to admin homepage</a><br>
    <a href="createanewevent.php">Create a new event </a>
   
<h1 > List of Ideas:</h1></div>

				<table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>Event name</strong></th>
<th><strong>Event  deadline </strong></th>

<th><strong>Event  idease_id</strong></th>




</tr>
                </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM ideasevent  ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td ><?php echo $count; ?></td>
<td ><?php echo $row["ename"]; ?></td>
<td ><?php echo $row["deadline"]; ?></td>

<td ><?php echo $row["idease_id"];?></td>
<td >
<a href="editevent.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td >
<a href="deleteevent.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>



</tr>
<?php $count++; } ?>
</tbody>

			</div>
</body>
</html>
</div>