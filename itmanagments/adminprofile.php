<?php
session_start();
// If the user is not logged in redirect to the login page...

include "dbconnect.php";

$stmt = $con->prepare("SELECT password,username,role,email FROM acc WHERE id = ? AND role='admin'");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username,$password,$role,$email);
$stmt->fetch();
$stmt->close();
?>
<html>
    <head>
        <h2>Admin Profile Page </h2>
    </head>

<div>
<a href="adminhomepage.php">Admin homepage </a>
		<p> Your account details are below:</p>	
			
            <table width="100%" border="1" style="border-collapse:collapse;">
			<tr>
			<td>Your account id</td>
			<td><?=$_SESSION['user_id']?></td>
			</tr>
		<tr>
			
						<td>Username:</td>
						<td><?=$_SESSION['username']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$_SESSION['password']?></td>
					</tr>
					<tr>
						<td>Role:</td>
						<td><?=$_SESSION['role']?></td>
                        
					</tr>
					
			
						
					
					
				</table>
						
		</div>

</body>
</html>

			