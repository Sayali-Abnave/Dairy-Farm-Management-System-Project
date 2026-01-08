<?php
include 'connect.php';

session_start();

if (!empty($_SESSION["id"])) {
    header('location:log.php');
    exit();
}

if (isset($_POST["submit"])) {  
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $duplicate = mysqli_query($con, "SELECT * FROM Customer WHERE name = '$username' OR email = '$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username and Email are already taken');</script>";
    } else {
        // Validate email format using a single preg_match statement
        if (preg_match('/^[a-zA-Z][a-zA-Z0-9._-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/', $email)) {
            if ($password == $confirmpassword) {
                mysqli_query($con, "DELETE FROM Cart");

                $query = "INSERT INTO Customer (name, email, contact_no, password) VALUES ('$username', '$email', '$contact_no', '$password')";
                mysqli_query($con, $query);
                
                echo "<script>alert('Registration Successful');</script>";
                header('location:log.php');
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

<!-- Rest of your HTML code... -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="style_login2.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   
  
</head>
<body>
  <div class="wrapper">
    <form action="" method="post" autocomplete="off">
      <h1>Registration</h1>
      <div class="input-box">
        <input type="text" placeholder="Username" name="username" id="username" value="" autocomplete="off" required>
        <i class='bx bxs-user'></i>
      </div>
	  <div class="input-box">
        <input type="email" placeholder="Email" name="email" id="email" value="" autocomplete="off" required>
       <i class='bx bxs-envelope'></i>
      </div>
	  <div class="input-box">
        <input type="number" placeholder="Phone number" name="contact_no" id="contact_no" value="" autocomplete="off" required>
        <i class='bx bxs-phone' ></i>
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
      <button type="submit" class="btn" name="submit">Register</button>
       <div class="register-link">
        <p>Already have an account? <a href="log.php">Login</a></p>
      </div>
    </form>
  </div>
  
   

  
  
  
</body>
</html>
	
 