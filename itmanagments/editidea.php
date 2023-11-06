<?php
session_start();
include 'dbconnect.php';
$id=$_REQUEST['id'];
$query = "SELECT * from ideas where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);

?>
<html >
    <head>
    
    </head>

    <body>
        <h2>Edit Idea Information Page</h2>
        
        <?php 
      
        if(isset($_POST['new']) && $_POST['new']==1){
            $id=$_REQUEST['id'];
            $title=$_REQUEST['title'];
            $explanation=$_REQUEST['explanation'];
            $category_id=$_REQUEST['category_id'];
            $check ="SELECT *FROM ideas where title='$title' OR explanation ='$explanation' ";
            $v_c=mysqli_query($con,$check);
            $notify=mysqli_fetch_assoc($v_c);
           if($notify){
            if($notify['title']===$title){
                echo'<p style="text-align:center;text-transform:uppercase;color:red">(ERROR MSG) The idea title has already exist!...... To update the new idea information , please enter the new idea title </p>';
            }
            if($notify['explanation']===$explanation){
                echo"the explanation is $explanation has already used..... Please enter a new explanation";
           }
        }else{
           
            $modify="UPDATE ideas set 
            title='".$title."', explanation='".$explanation."',category_id='".$category_id."'where id='".$id."'";
             
    mysqli_query($con, $modify) or die(mysqli_connect_error());
            $info = "Idea Information Updated Successfully. </div></br>
            <a href='viewallofidea.php'>Details of Updated Idea Information </a>";
            echo '<p style="color:#FF0000;">'.$info.'</p>';}
            }else {
       
        
        
        
        ?>
    <form action="editidea.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="title">Idea title </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="title" placeholder="Enter the idea title here........." required value="<?php echo $row['title'];?>" /></p>
        <label for="explanation">User explantion</label>
        <p><input type="text" name="explanation"  placeholder="Enter idea explanation here..." required value="<?php echo $row['explanation'];?>"></p>
        <label for="category_id">Idea category_id  </label>
        <p><input type="number" name="category_id"  placeholder="Enter cat_id here..." min="1" max ="3"required value="<?php echo $row['category_id'];?>"></p>
     

        
        
        
        
        
        <input type="submit" name="submit"value="Submit">
        <?php } ?>
</form>
    </body>
</html>