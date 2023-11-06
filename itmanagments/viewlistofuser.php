<?php
session_start();
// If the user is not logged in redirect to the login page...

include "dbconnect.php";
$stmt = $con->prepare("SELECT fullname,email,department FROM user WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($fullname, $email,$department);
$stmt->fetch();
$stmt->close();
?>
<html>
    <head></head>
    <body>
    <body>
<div>

		
			
		<h1 > List of User  details are below: </h1></div>
				<table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>User fullname</strong></th>
<th><strong>User email </strong></th>


<th><strong>User department </strong></th>

<th><strong>User username </strong></th>
<th><strong>User email</strong></th>
<th><strong>Role of User</strong></th>
<th><strong>User account password</strong></th>

</tr>
                </thead>
<tbody>

<?php
    $count=1;
    $test="SELECT u.fullname, u.email, u.department,a.username ,a.password,a.email,a.role
    FROM user AS u
    JOIN acc AS a ON u.id = a.id";
    $back=mysqli_query($con,$test);
    while($row = mysqli_fetch_assoc($back)) { ?>
   
        <tr><td ><?php echo $count; ?></td>
        <td ><?php echo $row["fullname"]; ?></td>
        <td ><?php echo $row["email"]; ?></td>
        
        <td ><?php echo $row["department"];?></td>
        <td ><?php echo $row["username"];?></td>
        <td ><?php echo $row["email"];?></td>
        <td ><?php echo $row["role"];?></td>
        <td ><?php echo $row["password"];?></td>
       

        </tr>
<?php $count++; } ?>

</tbody>
                </table>

			</div>
    </body>
</html>