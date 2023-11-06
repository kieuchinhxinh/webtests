<?php
    session_start();
    include 'dbconnect.php';
    if(isset($_POST['add'])){
        $title = $_POST['title'];
$explanation = $_POST['explanation'];
$category_id = $_POST['category_id'];
    $ie_id=$_POST['ie_id'];



$db_add = "INSERT INTO ideas (title, explanation, category_id,ie_id) VALUES ('$title', '$explanation', '$category_id','$ie_id')";
$kq=mysqli_query($con,$db_add);
if($kq) {
    echo "Add a new idea succesfully .";
    echo"<br>";
} else {
    echo "failed to add a new idea" . mysqli_error($con);
}

$query = "SELECT * FROM ideas WHERE category_id = '$category_id' ";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Tiêu đề: " . $row['title'] . "<br>";
        echo "Mô tả: " . $row['explanation'] . "<br>";
      
        echo "<hr>";
        
    }
} else {
    echo "Không có ý tưởng nào trong danh mục này.";
} 


    }
?>
<html>
    <head>
        <h2>Create a new idea Form</h2>
    </head>
    <body>
        <div>
            <form action='createidea.php' method="post">
                <label for="title">Idea title</label><br>
                <input type="text" name="title" placeholder="Enter idea title "required><br>
                <label for="explanation">Idea explanation</label><br>
                <input type="text" name="explanation" placeholder="Enter idea explanation" required><br>
                <label for="category_id">Idea cat_id</label><br>
                <input type="number" name="category_id" placeholder="Enter idea cat_id" required><br>
                <label for="ie_id">Idea event id</label><br>
                <input type="number" name="ie_id" placeholder="Enter idea event id" required><br>
                <label for="termsandc"> Terms and condition</label><input type="checkbox"  value="I agreed"required>I agreed <br>
                <input type="submit" name="add" value="Add">
                <?php
                if(isset($_POST['add'])){
                    $db_query="SELECT i.title, i.explanation, i.category_id,c.name ,i.ie_id,c.description
                    FROM ideas AS i
                    JOIN categories AS c ON i.category_id = c.id";
                    $returnback=mysqli_query($con,$db_query);
                    if(mysqli_num_rows($returnback)>0){
                        while($q=mysqli_fetch_array($returnback)){
                            echo'<h4>Idea title:'.$q['title'].'</h4>';
                            echo'<h4>Idea explanation:'.$q['explanation'].'</h4>';
                            echo'<h4>Idea category_id:'.$q['category_id'].'</h4>';
                            echo'<h4>Idea event_id:'.$q['ie_id'].'</h4>';
                            echo'<h4>categories name:'.$q['name'].'</h4>';
                            echo'<h4>category description:'.$q['description'].'</h4>';
                          
                          
                    
                    }
                    }
                
                }
                
                
                ?>
            </form>
        </div>
    </body>



</html>