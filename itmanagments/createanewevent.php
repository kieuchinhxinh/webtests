<?php
 include 'dbconnect.php';
$query = "SELECT ename, deadline,idease_id 
          FROM ideasevent 
          WHERE deadline > CURDATE()";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "Các event đang có sẵn (còn hạn đến ngày mai):<br>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Event: " . $row['ename'] . "<br>";
            echo "Deadline: " . $row['deadline'] . "<br>";
            echo "<a href='createidea.php?event=" . $row['ename'] . "'>Submit Idea</a>";
            echo "<hr>";
        }
    } else {
        echo "Không có event nào đang có sẵn.";
    }
} else {
    echo "Lỗi truy vấn: " . mysqli_error($con);
}

?>
<html>
    <head>
        <h2>Create a new event page </h2>
    </head>
    <body>
        <div>
            <form action="createanewevent.php" method="post" >
            <label for="ename">Name</label><br>
        <input type="text" class="form-control" name="ename" placeholder="Enter a event name ..."/>
			</div>
            <div class="from-group">
        <label for="deadline">Deadline</label><br>
        <input type="date" class="form-control" name="deadline" placeholder="Enter a event deadline ..."/>
            </div>
            <div class="from-group">
        <label for="idease_id">Link ideas_id To event </label><br>
        <input type="number" class="form-control" name="idease_id" placeholder="Enter a event idease_ideas ..."/><br>
        <input type="submit" name="add" value="Add">
        <?php
        if(isset($_POST['add'])){
                $ename=$_POST['ename'];
                $deadline = $_POST['deadline'];
                $idease_id = $_POST['idease_id'];
                $db_add = "INSERT INTO ideasevent (ename, deadline, idease_id) VALUES ('$ename', '$deadline', '$idease_id')";
                $kq=mysqli_query($con,$db_add);
                if($kq) {
                    echo "Add a new event succesfully .";
                    echo"<br>";
                } else {
                    echo "failed to add a new event" . mysqli_error($con);
                }
                
                $query = "SELECT * FROM ideasevent WHERE idease_id = '$idease_id' ";
                $result = mysqli_query($con, $query);
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "Tiêu đề: " . $row['ename'] . "<br>";
                        echo "Mô tả: " . $row['deadline'] . "<br>";
                      
                        echo "<hr>";
                        
                    }
                } else {
                    echo "Không có event nào trong danh mục này.";
                } 
                
                
                           
        }
        
        
        
        ?>
            </div>
            </form>
        </div>
    </body>
</html>