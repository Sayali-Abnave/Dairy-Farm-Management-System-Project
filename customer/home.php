<?php

include 'connect.php';
  
session_start();

$user_id = $_SESSION['customer_ID'];
 
if(!isset($user_id)){
   header('location:log.php');
}
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DFMNS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style_home.css">
    <!--==Import-Font-Family======================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
		
		 
		 
		
		
		<li style="list-style-type:none; color:black;font-size: 21px;"><i class="fa-solid fa-arrow-right-from-bracket"></i><a href="lout.php" style="color:black; text-decoration:none;">Logout</a></li>
    </div>
    <div class="panel">
    
    <div class="nav-search"> 
             
			 
			
            <a href="products.php"><input type="text" placeholder="Search dairy Product" class="search-input"></a> 
          
             <div class="search-icon">
                 <i class="fa-solid fa-magnifying-glass"></i>

     
             </div>
    
</div>

    </div>
</header>




<!-- hero section -->
<!-- 
<div class="container">

        <div class="slides">
            <input type="radio" name="r" id="radio1" checked>
            <input type="radio" name="r" id="radio2">
            <input type="radio" name="r" id="radio3">
            <input type="radio" name="r" id="radio4">
            <input type="radio" name="r" id="radio5">


            <div class="slide s1">
                <img src="images/cow6.jpg" alt="" width="99%" height="100%">
            </div>
            <div class="slide">
                <img src="images/cow2.jpg" alt="" width="99%" height="100%">
            </div>
            <div class="slide">
                <img src="images/cow3.jpg" alt="" width="99%" height="100%">
            </div>
            <div class="slide">
                <img src="images/cow4.jpg" alt="" width="99%" height="100%">
            </div>
            <div class="slide">
                <img src="images/cow5.jpg" alt="" width="99%" height="100%">
            </div>

            <div class="navigation">
                <label for="radio1" class="bar bar1"></label>
                <label for="radio2" class="bar bar2"></label>
                <label for="radio3" class="bar bar3"></label>
                <label for="radio4" class="bar bar4"></label>
                <label for="radio5" class="bar bar5"></label>
            </div>
        </div>

    </div>


-->








 
<div class="hero-section">
 
            <img src="images/dairy.jpg" width="99%" height="100%">
			 
            </div>
    <div class="hero-msg">
        <p> you are on dfms.com . you can order any products with fast local delivery. <a href="#"> click here to get more information </a></p>
    </div>
</div>

 

<!-- categories -->
<section">
    <!--heading---------------->
    <div class="category-heading">
        <h2>Category</h2>
         <!--box-container---------->
        <div class="category-panel">
            <!--box---------------->
             
            
            <!--<a href="#" class="category-box">
                <img alt="Fish" src="images/Vegetables.png">
                <span>Organic Vegitables</span>
            </a>-->
            
            <a href="#" class="category-box">
                <img alt="Fish" src="images/Vegetables.png">
                <span>Paneer</span>
            </a>
            
            <a href="#" class="category-box">
                <img alt="Fish" src="images/Vegetables.png">
                <span>Milk</span>
            </a>
             
            <a href="#" class="category-box">
                <img alt="Fish" src="images/Vegetables.png">
                <span>Lassi</span>
            </a>
             
            <a href="#" class="category-box">
                <img alt="Fish" src="images/Vegetables.png">
                <span>Buttermilk</span>
            </a>
             
            
        </div>
        
    </section>
    <!--category-end----------------------------------->
    </div>
<!--
    <section>
         
        <h3>Most Selling Products</h3>
        <div class="shop-sec"> 
        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span>2kg</span>
            <span>250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>



        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span>2kg</span>
            <span>250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>

        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span>2kg</span>
            <span>250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>

        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span>2kg</span>
            <span>250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>

        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span>2kg</span>
            <span>250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>

        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span>2kg</span>
            <span>250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>

        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span>2kg</span>
            <span>250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>

        <div class="box-container">
            <div class="box-img">
                <img src="images/pack3.png" alt="">

            </div>
            <strong>Apple</strong>
            <span class="rate">2kg</span>
            <span class="rate">250Rs.</span>
            <div class="btn">
                <a href="#">
                    <i class="fa-solid fa-lock"></i>
                     Add to Card
                </a>
            </div>

        </div>
    </div>
    </section>
	-->
<!-- Clients Feedback -->
<section>
    <p>What Our Client's Say...</p>
    <div class="feedback-sec">
         <div class="msg-box">
            <div class="name-sec"> 
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                </div>
             <div class="name"><strong>IIIeena Dov</strong> </div>
              
            </div>
             <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, laborum dolorem, deserunt eos error enim dolores totam, pariatur maxime soluta aut quis vel dignissimos. Quam vitae libero et soluta omnis, iste ex cupiditate dicta sapiente cum dolor praesentium repudiandae! Soluta.</span>
         </div>

         <div class="msg-box">
            <div class="name-sec"> 
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                </div>
             <div class="name"><strong>IIIeena Dov</strong> </div>
              
            </div>
             <span class="height">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, laborum dolorem, deserunt eos error enim dolores totam, pariatur maxime soluta aut quis vel dignissimos. Quam vitae libero et soluta omnis, iste ex cupiditate dicta sapiente cum dolor praesentium repudiandae! Soluta.</span>
         </div>

         <div class="msg-box">
            <div class="name-sec"> 
                <div class="profile">
                    <i class="fa-solid fa-user"></i>
                </div>
             <div class="name"><strong>Namrata Kapse</strong> </div>
              
            </div>
             <span>Its an amazing website! I just love the quality of products they provide and its a whole healthy website</span>
         </div>

    </div>

    
</section>

<!-- Footer Part -->
<?php include 'footer.php'; ?>
</body>
</html>
         
