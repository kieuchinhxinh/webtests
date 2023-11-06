<?php
    session_start();
    include 'dbconnect.php';
   


$name = $_POST['name'];
$description = $_POST['description'];

$query = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
$result = mysqli_query($connection, $query);

if ($result) {
    echo "Thêm danh mục thành công.";
} else {
    echo "Thêm danh mục thất bại: " . mysqli_error($connection);
}






?>
<html>
    <head>
        <h2>Create a new categories page </h2>
    </head>
    <body>
        <div>
            <form action="createanewcat.php" method="post" >
            <label for="name">Name</label><br>
        <input type="text" class="form-control" name="name" placeholder="Enter a category name ..."/>
			</div>
            <div class="from-group">
        <label for="description">Description</label><br>
        <input type="text" class="form-control" name="description" placeholder="Enter a category description ..."/>
            </form>
        </div>
    </body>
</html>