<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
 $connection = mysqli_connect("Localhost","root","","database");
   if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
}
  echo "Connected successfully";
$sql = "INSERT INTO  admin(username,password )values('username','$password')";
//$stmt->bind_param("ssss",$first_name,$last_name,$email,$phonenumber);
 if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
// REGISTER USER
if (isset($_POST['register'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM admin WHERE username='$username'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO admin (username, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location:medicinephp');
  }
}

// ... // ... 

// LOGIN USER
if (isset($_POST['login-user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: admin1.php');
  	}else {
        
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
<html>
    <body>
        <div>
      
    </div>
        <form  action="register.php" method="post" name="register">
            <table>
                <tr>
                    <td>
                        User Type
                    </td>
                
                    <td>
                        <select name="type" >
                            <option value="0" >Select type</option>
                            <?php
                            
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

