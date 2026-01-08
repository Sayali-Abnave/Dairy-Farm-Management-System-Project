<?php
session_start();

if (isset($_SESSION['id'])) {
    header('location: home.php');
    exit();
}

include 'connect.php';

if (isset($_POST["submit"])) {  
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];

    $result = mysqli_query($con, "SELECT * FROM Customer WHERE name = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["customer_ID"] = $row["customer_ID"];
			
			echo "<script>alert('Login Successful');</script>";
			 
            header('location: home.php');
            exit();
        } else {
            echo "<script>alert('Wrong Password');</script>";
        }
    } else {
        echo "<script>alert('User Not Registered');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="style_login2.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
    
  
  
</head>
<body>
  <div class="wrapper">
    <form action="log.php" method="POST" autocomplete="off">
      <h1>Login</h1>
      <div class="input-box">
        <input type="text" placeholder="Username OR Email" name="usernameemail" id="usernameemail" value="" autocomplete="off" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" id="password" value="" autocomplete="off" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="#">Forgot Password</a>
      </div>
      <button type="submit" name="submit" >Login</button>
      <div class="register-link">
        <p>Don't have an account? <a href="reg.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>