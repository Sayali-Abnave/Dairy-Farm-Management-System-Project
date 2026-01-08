<?php
//session_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$conn = mysqli_connect('localhost','root','','dfms');

if(!$conn)
{
die(mysqli_error($conn));
}
 
?>