     <?php
	  
	  
	  @include 'connect.php';
      
      $select_rows = mysqli_query($con, "SELECT * FROM Cart") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DFMNS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--<link rel="stylesheet" href="style_home.css">
    <!--==Import-Font-Family======================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
 

*{
    margin: 0;
    padding: 0;
    font-family:  Arial, Helvetica, sans-serif;
    border: border-box;
}
body{
    font-family:poppins;
}


/* Header Styles */
header {
    background: linear-gradient(to top, #9890e3 0%, #b1f4cf 100%);  
	position: sticky;
  top: 0;
  z-index: 100;
     border-radius: 20px;
	  
	  
    
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
	border-radius: 20px;
    margin-bottom: 4px;
	 
}

.logo {
    background-image: url("images/dfms1.png");
    background-size: cover;
    border-radius: 50%;
    width: 100px;
    height: 100px;
}

.menu {
    display: flex;
    list-style: none;
}

.menu li {
    margin-right: 20px;
}

.menu li a {
    color: #333;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
	    margin: 3px;
}

.menu li a:hover {
    color: #666;
}
.menu li:hover{
    /*border:1.5px solid #0f1111;*/
    transform: scale(1.2);
}
.nav-card a {
    color: #333;
    text-decoration: none;
    font-size: 18px;
}

.nav-card a:hover {
    color: #666;
}

 .nav-card:hover{
    /*border:1.2px solid #0f1111;*/
    transform: scale(1.2);
 }
.panel{
    height: 40px;
   background: linear-gradient(to top, #9890e3 0%, #b1f4cf 100%);  
	
    display: flex;
    color: white;
    align-items: center;
    justify-content: space-evenly;
    /*border-radius: 13px;*/
}
.nav-search{
    display: flex;
    justify-content: space-evenly;
    background-color: antiquewhite;
    width: 620px;
    height: 40px;
    border-radius: 4px;

}
.search-input{
    width: 100%;
    font-size: rem;
    border: 2px solid rgb(234, 218, 218);
    text-align: center;
    background-color: antiquewhite;
    border-radius: 4px;
    font-size: 17px;
	 
}
 
.search-icon{
    width: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
    background: linear-gradient(178.6deg, rgb(20, 36, 50) 11.8%, rgb(124, 143, 161) 83.8%);
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;

}

.nav-search:hover {
    border:2px solid #e46161;
}

 
</style>
</head>
<body>
   <header>
    <div class="navbar">
        <div class="nav-logo border">
            <div class="logo">
                 
            </div>
        </div>
        <div class="menu">
            
             <li><a href="home.php">Home</a></li>
             <li><a href="orders.php">Order</a></li>
			 <li><a href="products.php">View Products</a></li>
             
             <li><a href="aboutus.php">About</a></li>
             <li><a href="contact.php">Contact Us</a></li>
			   <li><a href="f.php">Review</a></li>
             
        </div>
        <div class="nav-card">
            <a href="cart.php" class="cart"> 
                 
                    <i class="fa-solid fa-cart-shopping"></i>
                 
    <?php
	  
	  
	  @include 'connect.php';
      
      $select_rows = mysqli_query($con, "SELECT * FROM Cart") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
            <span style="font-size:20px;">Cart  </span><?php echo "(".$row_count.")"; ?>
        </a>
        </div>
		
		 
		 
		
		
		<li style="list-style-type:none; color:black;font-size: 21px;"><i class="fa-solid fa-arrow-right-from-bracket"></i><a href="lout.php" style="color:black;font-size: 21px; text-decoration:none;">Logout</a></li>
    </div>
	
    <div class="panel">
    
    <div class="nav-search"> 
             
			 <form action="" method="post">
  <input type="text" name="search" placeholder="Search for products" style="background-color: antiquewhite;font-size: 15px;margin-top: 9px;">
    <input type="submit" value="Search" style="font-size: 19px;margin-top: 9px;">
   </form>
			<!--
             <input type="text" placeholder="Search dairy Product" class="search-input">
          
             <div class="search-icon" value="Search">
                 <i class="fa-solid fa-magnifying-glass"></i>

     
             </div>
			 -->
     
</div>

    </div>
</header>