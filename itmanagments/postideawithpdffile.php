
<html>
    <head>
        <h2>Post idea by pdf file Form</h2>
    </head>
    <body>
        <div>
        <form action="postideawithpdffile.php" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required><br>
    <label for="explanation">Explantion:</label>
    <textarea name="explanation" id="explanation" required></textarea><br>
    <label for="category_id">cat_id:</label>
    <input type="number" name="category_id" id="category_id" required><br>
   
    <label for="file">Upload PDF:</label>
    <input type="file" name="file" id="file"><br>
  
    <input type="submit" value="Submit" name="post">
    <?php
        session_start();
        include 'dbconnect.php';
        if(isset($_REQUEST['post'])){
        $title = $_POST['title'];
        $explanation = $_POST['explanation'];
        $category_id= $_POST['category_id'];
       
       
        $targetDir = 'uploads/';
        $targetFile = $targetDir . basename($_FILES['file']['name']);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    
    // Set the appropriate permissions for file uploads
    chmod($targetDir, 0755);
// Check if the file is a PDF
        if ($fileType !== 'pdf') {
        echo "Only PDF files are allowed.";
        $uploadOk = 0;
    }

// Move the uploaded file
        if ($uploadOk) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        // Store the idea information in the database
        $filePath = $targetFile;
        $filePath = $con->real_escape_string($filePath);
        // Write a database insert query and execute it
        // ...
        $db_add = "INSERT INTO ideas (title, explanation, category_id,file_path) VALUES ('$title', '$explanation', '$category_id','$filePath')";
        $kq=mysqli_query($con,$db_add);
        echo "Idea submitted successfully.";
       
        } else {
        echo "Error uploading the file.";
        }
    }
    }
    ?>
</form>
        </div>
    </body>
</html>