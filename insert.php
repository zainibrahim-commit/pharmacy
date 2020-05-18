<?php

$servername = "localhost";
$database = "database";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect('localhost', 'root' , '' , 'database');

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
else
{
	echo "Connected successfully";
}
 
 //$sql = "INSERT INTO  user(username,FirstName,LastName,password,email )values('username','$firstname','$lastname','$password','$email')";

if(isset($_POST['submit'])) //check that there is data (NOT NULL)	
{
	$name =$_POST['name'];
	$description=$_POST['description'];
	$price = $_POST['price'];



$sql = "INSERT INTO medicine (name, description, price) VALUES ('$name' , '$description' , '$price')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<html>
    <body>
        <div>
        
    </div>
        <form  action="insert.php" method="post" name="insert">
            <table>
                <tr>
                    <td>
                        User Type
                    </td>
                
                    <td>
                        <select name="type" >
                            <option value="0" >Select type</option>
                            <?php
                            
                            $all_types_sql='SELECT * FROM "medicine"';
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
                      name  
                   </td>
                    <td>
                        <input type="text" name="name" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        description
                    </td>
                    <td>
                        <input type="text" name="description" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        price
                    </td>
                    <td>
                        <input type="text" name="price" required="required">
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