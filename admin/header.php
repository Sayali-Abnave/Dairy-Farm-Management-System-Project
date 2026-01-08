<header class="header">

   <div class="flex">

      <a href="#" class="logo">Products</a>

      <nav class="navbar">
         <a href="admin.php">add products</a>
         <!--<a href="products.php">view products</a>-->
      </nav>

      <?php
	  
	  
	  @include 'connect.php';
      
      $select_rows = mysqli_query($con, "SELECT * FROM Cart") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>