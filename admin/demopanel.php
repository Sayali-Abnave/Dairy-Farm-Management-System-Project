 <?php

include 'connect.php';

session_start();
/*
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:adn_login2.php');
}
*/
?>

 
 
 
 
 
 
 
 
 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <title>Dairy Farm Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style_adn_panel.css">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #2C3E50;
            padding: 1em;
            text-align: center;
            color: #ECF0F1;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        section {
            display: flex;
            flex: 1;
        }

        nav {
            width: 20%;
            background: #3498DB;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        nav a i {
            margin-right: 10px;
			}
			
li i a{
   display:flex;
   justify:content;
}
       

        nav a:hover {
            background-color: #2980B9;
        }

        main {
            width: 70%;
            padding: 20px;
            background-color: #ECF0F1;
            border-radius: 10px;
            margin-top: 20px;
        }
		
		
#main_sec {
  height: 100%; /* Adjust the height as needed */
  width: 100%; /* Adjust the width as needed */
  /* overflow: hidden; */ /* Temporarily remove overflow: hidden for debugging */
}

/* Adjust the styling for the content loaded from display.php */
#main_sec object {
  height: 100vh; /* Make the content fill the entire height of the main_sec div */
  width: 100%; /* Make the content fill the entire width of the main_sec div */
}
 
        /* Your existing styles */

        main {
            width: 70%;
            padding: 20px;
            background-color: #ECF0F1;
            border-radius: 10px;
            margin-top: 20px;
            display: flex;
			 
    justify-content: space-evenly;
    align-items: center;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
		 
            width: 30%; /* Adjust the width as needed */
            margin-bottom: 20px;
            border: 1px solid black;
            border-radius: 8px;
            overflow: hidden;
			box-shadow: 10px 10px 5px lightblue;
			
}
        }

        .card-header {
            background-color: #3498DB;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }

        .card-body {
            padding: 15px;
        }
		
		
		
    </style>

 

        
  

     
	
	 <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- <link rel="stylesheet" href="style_adn_panel.css">-->
    
	<script>
function function1()
{

document.getElementById("main_sec").innerHTML='<object  data="invoice.php" ></object>';
}
function funct2()
{
document.getElementById("main_sec").innerHTML='<object  data="admin.php" ></object>';
}
function funct3()
{
document.getElementById("main_sec").innerHTML='<object  data="Customer_display.php" ></object>';
}
function funct4()
{
document.getElementById("main_sec").innerHTML='<object  data="admin_order.php" ></object>';
}
function funct5()
{
document.getElementById("main_sec").innerHTML='<object  data="report.php" ></object>';
}
</script>

	
</head>
<body>

    <header>
        <h2>Dairy Farm Management System</h2>
		
		  
	  
	  
    </header>

    <section>
        <nav>
    <ul>
	<li><a>Admin Dashboard</a></li>
	  <li><i class="fa-solid fa-building"> <a href="#" onclick="funct3()">Customer</a></i></li>
      <li><i class="fa-solid fa-list"><a href="#" onclick="funct4()">Order</a></i></li>
      <li><i class="fa-solid fa-product-hunt"><a href="#" onclick="funct2()">Product</a></i></li>
	  <li><i class="fa-solid fa-file-invoice-dollar"><a href="#" onclick="function1()">Invoice</a></i></li>
      <li><i class="fa-solid fa-file-lines"><a href="#" onclick="funct5()">Report</a></i></li>
      <li><i class="fa-solid fa-right-from-bracket"><a href="a_logout.php">logout</a></i></li>
    </ul>
  </nav>
       <main id="main_sec">
            <!-- Cards for each navigation link -->
			
			 <div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					<?php
            $total_pendings = 0;
            $select_pending = mysqli_query($con, "SELECT total_price FROM cust_order WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>Rs.<?php echo $total_pendings; ?>/-</h3>
         <p style="border:solid 2px black; color:white;width: 148px;background-color:purple;height: 26px;border-radius: 11px; align-items:center">total pendings</p>
					
					<center>
					
                </div>
            </div>


  <div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					<?php
            $total_completed = 0;
            $select_completed = mysqli_query($con, "SELECT total_price FROM cust_order WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>Rs.<?php echo $total_completed; ?>/-</h3>
         <p style="border:solid 2px black;background-color:purple;color:white; width: 170px;height: 26px;border-radius: 11px; align-items:center">completed payments</p>
      
          		
					<center>
					
                </div>
            </div>







<div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					<?php 
            $select_orders = mysqli_query($con, "SELECT * FROM cust_order") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
        
         <p style="border:solid 2px black;background-color:purple; color:white;width: 170px;height: 26px;border-radius: 11px; align-items:center">Order Placed</p>
      
          		
					<center>
					
                </div>
            </div>









<div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					<?php 
            $select_products = mysqli_query($con, "SELECT * FROM Product") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         
         <p style="border:solid 2px black;color:white;background-color:purple; width: 170px;height: 26px;border-radius: 11px; align-items:center">Products added</p>
      
          		
					<center>
					
                </div>
            </div>










<div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					 <?php 
			 
			 $select_users = mysqli_query($con, "SELECT * FROM Customer") or die('query failed');

			
			$number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         
         
         <p style="border:solid 2px black;color:white;background-color:purple; width: 170px;height: 26px;border-radius: 11px; align-items:center">No. of customers</p>
      
          		
					<center>
					
                </div>
            </div>
			
			
			
			
			
			
			<div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					<?php 
            $select_admins = mysqli_query($con, "SELECT * FROM Admin") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
          
         
         
         <p style="border:solid 2px black; color:white;background-color:purple; width: 170px;height: 26px;border-radius: 11px; align-items:center">Admin user</p>
      
          		
					<center>
					
                </div>
            </div>





<div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					<?php 
					
					  $select_admin_accounts = mysqli_query($con, "SELECT * FROM Admin") or die('query failed');
             $number_of_admin_accounts = mysqli_num_rows($select_admin_accounts);
					
            $select_customer_accounts = mysqli_query($con, "SELECT * FROM Customer") or die('query failed');
            $number_of_customer_accounts = mysqli_num_rows($select_customer_accounts);
			
			$total_accounts = $number_of_admin_accounts + $number_of_customer_accounts;
    ?>
          
         <h3><?php echo $total_accounts; ?></h3>
          
         
         <p style="border:solid 2px black;color:white; background-color:purple;width: 170px;height: 26px;border-radius: 11px; align-items:center">total accounts</p>
      
          		
					<center>
					
                </div>
            </div>




<!--
<div class="card">
                 
                <div class="card-body">
				 
					<center>
					
					<?php 
            $select_messages = mysqli_query($con, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         
         
         <p style="border:solid 2px black; width: 170px;height: 26px;border-radius: 11px; align-items:center">new messages</p>
      
          		
					<center>
					
                </div>
            </div>

-->










			
             
             

        </main>
    </section>

     

      
        

</body>
</html>
