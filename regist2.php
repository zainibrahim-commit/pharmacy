 <?php 

if(isset($_POST['submit'])){
    //echo "first post is here";
$username =$_POST['username'];                             
$firstname =$_POST['fname'];
$lastname =$_POST['lname']; 
$password=$_POST['password'];
$email =$_POST['email']; 
  if(isset($_POST['submit'])){
   // echo "post is here"; }

   $connection = mysqli_connect("Localhost","root","root","database");
   if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
}
  echo "Connected successfully";
$sql = "INSERT INTO  user(username,FirstName,LastName,password,  )values('$username','$firstname','$lastname','$password','$email')";
//$stmt->bind_param("ssss",$first_name,$last_name,$email,$phonenumber);
 if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
mysqli_close($connection);
}
}
                                                                            
?>

<html>
    <body>
        <div>
        
    </div>
        <form  action="regist2.php" method="post" name="register">
            <table>
                <tr>
                    <td>
                        User Type
                    </td>
                
                    <td>
                        <select name="type" >
                            <option value="0" >Select type</option>
                            <?php
                            
                            $all_types_sql='SELECT * FROM "user"';
                            $all_types_result=  mysqli_query($conn,$all_types_sql);
                            while($row=  mysqli_fetch_array($all_types_result)){
                                echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                            }
                            
                            
                            
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type="text" name="username" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <input type="text" name="password" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        <input type="email" name="email" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        First Name
                    </td>
                    <td>
                        <input type="text" name="fname" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        Last name
                    </td>
                    <td>
                        <input type="text" name="lname" required="required">
                    </td>
                </tr>
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="submit" value="Register">
                    </td>
                    
                </tr>
            </table>
            
            
        </form>
    </body>
</html>

