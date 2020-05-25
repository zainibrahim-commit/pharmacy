<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";


// Create connection
$conn = new mysqli('localhost', 'root', 'root', 'database');
// Check connection

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
if(isset($_POST['delete'])) //check that there is data (NOT NULL)	
{
		$name =$_POST['medicineName'];


      

		// sql to delete a record
		$sql = "DELETE FROM medicine WHERE name='$name'";
        

		if ($conn->query($sql) === TRUE) {
		    echo "Record deleted successfully";
		} else {
		    echo "Error deleting record: " . $conn->error;
		}


}
}


$conn->close();

?>

<html>
    <body>
        <div>
        
    </div>
        <form  action="delete.php" method="post" name="delete">
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
                        medicineName
                    </td>
                    <td>
                        <input type="text" name="medicineName" required="required">
                    </td>
                </tr>
                
                 <tr>
                     <td colspan="2">
                         <input type="submit" name="delete" value="Delete">
                    </td>
                    
                </tr>
            </table>
            
            
        </form>
    </body>
</html>
 

