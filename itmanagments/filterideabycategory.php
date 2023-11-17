<?php
    session_start();
    include 'dbconnect.php';


    $sql = "SELECT DISTINCT category_id FROM ideas";
    $result = $con->query($sql);
    $categories = array();
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category_id'];
    }
}

// Handle form submission to filter ideas based on category
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category_id'])) {
    $selectedCategory = $_POST['category_id'];
    $sql = "SELECT * FROM ideas WHERE category_id = '$selectedCategory'";
    $result = $con->query($sql);
    $filteredIdeas = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filteredIdeas[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ideas </title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .nav-tabs{
        background-color:rgb(87, 6, 140) ;    }
        .nav-tabs a:hover{
            background-color:rgb(87, 6, 140) ; 
        }
        li{
        background-color:rgb(87, 6, 140) ; ;
        }
        a{color: white;}
  </style>
</head>
<body>
    <ul class="nav nav-tabs"><li><a href="home.php">HOME</a></li>  <li><a href="ideamanagementhomepage.php">IDEA</a></li>

  <li><a href="filterideabycategory.php">IDEA OF CATEGORY</a></li>
  <li><a href="filterideabyevent.php">IDEA OF EVENT</a></li>
 
</ul>
    <h1>Filter Ideas by Category</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="category_id">Select a category:</label>
        <select id="category" name="category_id">
            <?php
            foreach ($categories as $category) {
                echo "<option value='".$category."'>".$category."</option>";
            }
            ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php
    if (isset($filteredIdeas)) {
        echo "<h2>Ideas in category: ".$selectedCategory."</h2>";
        if (!empty($filteredIdeas)) {
            foreach ($filteredIdeas as $idea) {
                // Display the filtered ideas
                echo "<p>Title: " . $idea['title'] . "<br> - Explanation: " . $idea['explanation'] . "</p>";
            }
        } else {
            echo "No ideas found in the selected category.";
        }
    }
    ?>

</body>
</html>