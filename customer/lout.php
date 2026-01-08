<?php


// logout page
include 'config.php';

$_SESSION = [];
session_unset();
session_destroy();
header('location:log.php');

 
?>