<?php


  


//  admin Registration page
/*
 
include 'config.php';
  session_start();

if (!empty($_SESSION["id"])) {
    header('location:index2.php');
}

if (isset($_POST["submit"])) {  
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $duplicate = mysqli_query($conn, "SELECT * FROM Customer WHERE name = '$username' OR email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username and Email are already taken');</script>";
    } else {
		
		
		 
		
		
	 if ($password == $confirmpassword) 
		   {
            $query = "INSERT INTO Customer (name, email, contact_no, password) VALUES ('$username', '$email', '$contact_no', '$password')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful');</script>";
        } else {
            echo "<script>alert('Password Does not Match');</script>";
        }
		
    }
}
 */
 
 include 'connect.php';
 session_start();
 
 
 
if (!empty($_SESSION["id"])) {
    header('location:adn_login2.php');
    exit();
}

 

 

  if (isset($_POST["submit"])) {  
    $username = $_POST['username'];
    $email = $_POST['email'];
  
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

   $select_users = mysqli_query($con, "SELECT * FROM Admin WHERE email = '$email'  OR password = '$password'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
       echo "<script>alert('Username and Email are already taken');</script>";
   }else{
	   
	   
      // Validate email format using a single preg_match statement
        if (preg_match('/^[a-zA-Z][a-zA-Z0-9._-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $email)) {
            if ($password == $confirmpassword) {
                
                $query = "INSERT INTO Admin (username, email, password) VALUES ('$username', '$email', '$password')";
                mysqli_query($con, $query);
                
                echo "<script>alert('Registration Successful');</script>";
                header('location:adn_login2.php');
                exit();
            } else {
                echo "<script>alert('Password Does not Match');</script>";
            }
        } else {
            echo "<script>alert('Invalid email address');</script>";
        }
    }
}
 

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Registration</title>
  <link rel="stylesheet" href="style_login2.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
    <!-- ... other head elements ... -->
   <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delayed clear to account for browser autofill
        setTimeout(function() {
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            document.getElementById('confirmassword').value = '';
        }, 100);
    });
</script>

  
  
</head>
<body>

 

  <div class="wrapper">
    <form action="" method="post" autocomplete="off">
      <h1> Admin Registration</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name="username" id="username" value="" autocomplete="off" required>
        <i class='bx bxs-user'></i>
      </div>
	  <div class="input-box">
        <input type="email" placeholder="Email" name="email" id="email" value="" autocomplete="off" required>
       <i class='bx bxs-envelope'></i>
      </div>
	   
	  
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" id="password" value="" autocomplete="off" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
	  
	        <div class="input-box">
        <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" value="" autocomplete="off" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
	  
	  
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" class="btn" name="submit">Login</button>
       <div class="register-link">
        <p>Already register? <a href="adn_login2.php">Login</a></p>
      </div>
    </form>
  </div>
  
  
  
</body>
</html>
	