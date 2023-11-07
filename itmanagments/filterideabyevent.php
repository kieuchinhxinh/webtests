<?php
    session_start();
    include 'dbconnect.php';


    $sql = "SELECT DISTINCT ie_id FROM ideas";
    $result = $con->query($sql);
    $event = array();
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $event[] = $row['ie_id'];
    }
}

// Handle form submission to filter ideas based on event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ie_id'])) {
    $selectedEvent = $_POST['ie_id'];
    $sql = "SELECT * FROM ideas WHERE ie_id = '$selectedEvent'";
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
    <title>Ideas Filter</title>
</head>
<body>
    <h1>Filter Ideas by Event</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="ie_id">Select a event:</label>
        <select id="ie_id" name="ie_id">
            <?php
            foreach ($event as $ie_id) {
                echo "<option value='".$ie_id."'>".$ie_id."</option>";
            }
            ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php
    if (isset($filteredIdeas)) {
        echo "<h2>Ideas in event: ".$selectedEvent."</h2>";
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