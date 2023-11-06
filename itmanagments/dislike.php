<?php
session_start();
include 'dbconnect.php';
if(isset($_POST['like'])){
$ideaId = $_POST['idea_id'];
$userId = $_POST['user_id'];
$likeStatus = $_POST['like_status'];

// Kiểm tra xem người dùng đã thích hoặc không thích ý tưởng này chưa
$checkQuery = "SELECT * FROM likes_dislikes WHERE idea_id = '$ideaId' AND user_id = '$userId'";
$checkResult = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    if($likeStatus=='dislike'){
    // Người dùng đã có lựa chọn, cập nhật like_status của ý tưởng
    $updateQuery = "UPDATE likes_dislikes SET like_status = '$likeStatus' WHERE idea_id = '$ideaId' AND user_id = '$userId'";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        echo "Cập nhật thành công.";
    } else {
        echo "Cập nhật thất bại: " . mysqli_error($con);
    }
}
} else {
    // Người dùng chưa có lựa chọn, thêm mới like_status của ý tưởng
    $insertQuery = "INSERT INTO likes_dislikes (idea_id, user_id, like_status) VALUES ('$ideaId', '$userId', '$likeStatus')";
    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        echo "Thêm mới thành công.";
    } else {
        echo "Thêm mới thất bại: " . mysqli_error($con);
    }
}


// Đếm số lượng like cho ý tưởng
$likeQuery = "SELECT COUNT(*) AS like_count FROM likes_dislikes WHERE idea_id = $ideaId AND like_status = 'dislike'";
$likeResult = mysqli_query($con, $likeQuery);

if ($likeResult) {
    $row = mysqli_fetch_assoc($likeResult);
    $likeCount = $row['like_count'];

    echo "Số lượng dislike: " . $likeCount;
} else {
    echo "Lỗi truy vấn: " . mysqli_error($con);
}

}
?>
<html>
    <head>
        <h2>Like Page</h2>
        
    </head>
    <body>
        <div>
        <form action="like.php" method="post">
        <label for="idea_id">Idead_id</label>
      <input type="number" id="idea_id" name="idea_id" required>
    </div>
    <div>
      <label for="user_id">user_id</label>
      <input type="number" id="user_id" name="user_id" required>
    </div> 
    <div>
      <label for="like_status">Like status</label>
      <input type="text" id="like_status" name="like_status" required>
    </div> 
    <input type="submit" name="like" value="Like">   
        </form>
        </div>
       
    </body>
</html>