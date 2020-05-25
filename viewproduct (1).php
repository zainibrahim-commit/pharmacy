<?php

$link = mysqli_connect("localhost", "root", "root", "database");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['viewproduct'])) //check that there is data (NOT NULL)   
{
    $name=$_POST['name'];
 
// Attempt select query execution
$sql = "SELECT * FROM medicine WHERE name= '$name' ";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>description</th>";
                echo "<th>price</th>";
               
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
             
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
}
?>
<html>
    <body>
        <div>
        
    </div>
        <form  action="viewproduct.php" method="post" name="update">
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
 .                   <td>
                        <input type="text" name="name" required="required">
                    </td>
                </tr>

               

                 <tr>
                     <td colspan="2">
                         <input type="submit" name="viewproduct" value="View">
                    </td>
                    
                </tr>
            </table>
          
          
           
            
        </form>
    </body>
</html>
