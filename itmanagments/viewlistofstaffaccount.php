<?php
session_start();
// If the user is not logged in redirect to the login page...

include "dbconnect.php";
$stmt = $con->prepare("SELECT username,password,role,email FROM acc WHERE id = ? AND role='staff'");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $password,$role,$email);
$stmt->fetch();
$stmt->close();
?>
<html>
    <head>
       
    </head>
<body>
<div>
<a href="adminhomepage.php">Admin homepage </a>
		
			
		<h1 > List of staff account details are below: </h1></div>
				<table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>Staff username</strong></th>
<th><strong>Staff password </strong></th>

<th><strong>Role of staff</strong></th>
<th><strong>Staff email </strong></th>


</tr>
                </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM acc WHERE role= 'staff' ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td ><?php echo $count; ?></td>
<td ><?php echo $row["username"]; ?></td>
<td ><?php echo $row["password"]; ?></td>

<td ><?php echo $row["role"];?></td>

<td ><?php echo $row["email"]; ?></td>
<td><a href="editstaffacc.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
<td><a href="deletestaffacc.php?id=<?php echo $row["id"]; ?>">Delete</a></td>


</tr>
<?php $count++; } ?>
</tbody>

			</div>
</body>
</html>
