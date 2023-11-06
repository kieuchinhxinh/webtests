<?php
include 'dbconnect.php';

?>
<html>
    <head></head>
    <body>
        <div>
            <h2>Comment Idea Page </h2>
            <form action=cmtidea.php method="post">
            <p>What have you thought about the quality of our features and blogs?</p>
            <textarea name="feedback_info" rows="8" cols="40"></textarea>
    <input type="submit" name="submit"value="Submit">
    <?php
        $error=array();
        if(isset($_REQUEST['submit'])){
            $count=1;
            $txt_=mysqli_real_escape_string($con,$_POST['feedback_info']);
            if(empty($txt_)){array_push($error,"feedback_info  is required");}
            if(count($error)!=0){
                print_r($error);
                echo'<br>';
                echo'<div style="color:red;text-transform:uppercase;background-color:orange;text-align:center;"><b>Something went wrong!.....Failed to submit a comment </b></div>';
            }else{
                $ins_query="INSERT INTO comment(feedback_info) VALUES('$txt_')";
                mysqli_query($con,$ins_query) or die(mysqli_connect_error());
                echo'<div style="color:olive;text-transform:uppercase;background-color:orange;text-align:center;"><b>Give a comment successfully </b></div>';
              
                
            }
        }
    
    
    ?>
            </form>
        </div>
    </body>
</html>