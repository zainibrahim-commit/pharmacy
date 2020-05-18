<?php

$servername = "localhost";
$database = "database";
$username = "root";
$password = "root";
 
// connect to the database
 $connection = mysqli_connect("Localhost","root","root","database");
   if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
}
else
{
	echo "Connected successfully";
}
	if(isset($_POST['update'])) //check that there is data (NOT NULL)	
{
		$oldname = $_POST['oldname'];
		$newname = $_POST['newname'];
	    $newdescription = $_POST['newdescription'];
		$newprice = $_POST['newprice'];


		$d=mysql_query("SELECT * FROM medicine WHERE name='$oldname'");

		$check = ($d);
                		
				$newname = $_POST['newname'];
				$newdescription = $_POST['newdescription'];
				$newprice = $_POST['newprice'];

				//query to insert in the database
				$edit = mysql_query("update medicine set name = '$newname' , description = '$newdescription' ,
						price = '$newprice' where name = '$oldname'");
//  $connection = mysql_connect("localhost", "root", "");
  //         mysql_select_db("database",$connection);
            
			if(!$edit)
			{
				echo mysql_error();
			}
			else
			{
				echo "medicine updated";
			}
}


/*
 
         if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'rootpassword';
            
            $conn = mysql_connect($dbhost, $dbuser, $dbpass,'database');
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $oldname= $_POST['name'];
            $newname= $_POST['oldname'];
            $newdescription = $_POST['description'];
            $newprice = $_POST['price'];
            
            $sql = "UPDATE medicine ". "SET name = $newname,description = $new description,price = $newprice ". 
               "WHERE name = $oldname" ;
            mysql_select_db('database');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Updated data successfully";
            
            mysql_close($conn);
        
          
            ?>
 }       
*/  
 ?>
<html>
    <body>
        <div>
          
    </div>
        <form  action="update.php" method="post" name="update">
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
                      oldname
                   </td>
                <td>
                        <input type="text" name="oldname" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        newname
                    </td>
                    <td>
                        <input type="text" name="newname" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        newdescription
                    </td>
                    <td>
                        <input type="text" name="newdescription" required="required">
                    </td>
                </tr>
                 <tr>
                    <td>
                        newprice
                    </td>
                    <td>
                        <input type="text" name="newprice" required="required">
                    </td>
                </tr>

                 <tr>
                     <td colspan="2">
                         <input type="submit" name="update" value="Register">
                    </td>
                    
                </tr>
                    </table>
          
          
           
            
        </form>
    </body>
</html>

