<?php
session_start();

include 'dbconnect.php';


$id=$_REQUEST['id'];
$query = "SELECT * from acc where id='".$id."' "; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
?>
<html>
    <head>

    </head>
    <?php
    $kq="";
    if(isset($_POST['new']) && $_POST['new']==1)
       {
       $id=$_REQUEST['id'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $email=$_REQUEST['email'];
    $role=$_REQUEST['role'];
         
    $check="SELECT *FROM acc where  username='$username' OR email='$email' OR password='$password'" ;
    $v_c=mysqli_query($con,$check);
    $notify= mysqli_fetch_assoc($v_c);
        if($notify){
            if($notify['username']===$username){
                echo'<p>The username has already exist, you cannot use this username more!...<br>Please enter again<br></p>';
              $error="Failed to update the user account information";
              echo $error;
             
           
            }
            if($notify['email']===$email){
                echo"the email you have edited is $email have already existed so you cannot use this email anymore....<br>Please enter again<br>";
                echo"Failed to update the user information   (email)" ;
            }
        }else{
            $password=md5($password);
    $update="UPDATE acc set
    username='".$username."', password='".$password."',email='".$email."',role='".$role."' where id='".$id."'";
    
    
    mysqli_query($con, $update) or die(mysqli_connect_error());
$info = "Staff Account Updated Successfully. </br></br>
<a href='viewlistofstaffaccount.php'>Details of Updated Staff account information  </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
    
    
    
    
    ?>
       <body >
    <div class="from-group">
    
    <div >
        <form action="editstaffacc.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="username">Username </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="username" placeholder="Enter Name" required value="<?php echo $row['username'];?>" /></p>
        <label for="password">Password </label>
        <p><input type="password" name="password" style="height:200px;" placeholder="Enter Password here......" 
required value="<?php echo $row['password'];?>" /></p>
<label for="email">Email </label>
<p><input type="text" name="email " placeholder="Enter staff account email:" required value="<?php echo $row['email'];?>" /></p>
<select id="role" name="role">
                            <option value="admin">
                            Admin 
                            </option>
                            <option value="staff">
                            Staff 
                            </option>
                            <option value="QAmanager">
                            QAmanager 
                            </option>
                            <option value="QAcoordinator">
                            QAcoordinator
                            </option>
</select>
<p><input name="submit" type="submit" value="Update" /></p> 
          
        </form>
        <?php } ?>
        </div>
        </div>
    </body>
</html>