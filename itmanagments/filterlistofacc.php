
<html>
    <head>
        <h2>Filter list of account by role name</h2>
    </head>
    <div>
        <form action="filterlistofacc.php" method="post">
            <div>
                <label for="role">Role</label>
                <input type="text" name="role" placeholder="Enter the role name to be filtered here.....">
                <input type="submit" name="filter" value="Filter">
            </div>
            <?php
session_start();
include 'dbconnect.php'; 

if(isset($_REQUEST['filter'])){
  $role=$_POST['role'];
    $query = "SELECT * FROM acc WHERE role = '$role'";
    $result = $con->query($query);

    // Display the filtered results
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo"<h2>List of account by role name here:</h2>";
            echo "Username: " . $row["username"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Role: " . $row["role"] . "<br><br>";
        }
    } else {
        echo "No accounts found for the selected role.";
    }
}

?>
        </form>
    </div>
</html>