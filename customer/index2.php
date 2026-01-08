<?php



 
session_start();
include 'connect.php';

if (empty($_SESSION["customer_ID"])) {
    header('location: log.php');
    exit();
}

$id = $_SESSION["customer_ID"];
$result = mysqli_query($conn, "SELECT * FROM Customer WHERE customer_ID = '$id'");
$row = mysqli_fetch_assoc($result);
 

/*
//welcome page

include 'config.php';
if(!empty($_SESSION["id"]))
{
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "select * from Customer where id = '$id'");
	$row = mysqli_fetch_assoc($result);
}
else
{
	header('location:log.php');
}

*/
?>

<?php
session_start();

if (isset($_SESSION['success_message'])) {
    echo "<script>alert('".$_SESSION['success_message']."');</script>";
    unset($_SESSION['success_message']); // Clear the message once displayed
}
?>








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
<h2>welcome<?php echo $row["name"]; ?></h2>
<a href="lout.php">logout</a>
</body>
</html>



