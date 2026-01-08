
<?php
   @include 'connect.php';
   session_start();
   ?>






<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="stylep.css">
   
   <style>
      .products {
         display: flex;
         flex-wrap: wrap;
         justify-content: space-between; /* Distributes items evenly */
      }

      .product {
         width: calc(33.33% - 20px); /* Adjust width and margin as needed */
         margin-bottom: 20px;
         border: 1px solid #ccc;
         border-radius: 5px;
         padding: 10px;
         box-sizing: border-box;
      }

      .product img {
         width: 100%;
         height: auto;
      }

      .product h3 {
         font-size: 18px;
         margin-top: 10px;
         height:auto;
      }

      .price {
         font-size: 16px;
         font-weight: bold;
         margin-top: 10px;
      }

      .btn {
         display: block;
         width: 100%;
         padding: 10px;
         margin-top: 10px;
         background-color: #007bff;
         color: #fff;
         border: none;
         border-radius: 5px;
         cursor: pointer;
      }

      .btn:hover {
         background-color: #0056b3;
      }

      .box-container{
	      height:auto;
      }
   </style>

</head>
<body>
   <?php include 'header.php'; ?>
   
   <?php
   /*
   @include 'connect.php';
   session_start();
   */
   
   if(isset($_POST['add_to_cart'])){

      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_quantity = 1;
      $customer_ID = $_SESSION['customer_ID'];

      $select_cart = mysqli_query($con, "SELECT * FROM Cart WHERE name = '$product_name'");

      if(mysqli_num_rows($select_cart) > 0){
         $message[] = 'product already added to cart';
      }else{
         $insert_product = mysqli_query($con, "INSERT INTO Cart(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
         $message[] = 'product added to cart successfully';
      }
   }
   ?>

   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
      }
   }
   ?>




 <?php
   
    // for filter product

   // Check if a search query is submitted
   if(isset($_POST['search'])){
      $search_query = $_POST['search'];
      // Modify the SQL query to filter products based on the search query
      $select_products = mysqli_query($con, "SELECT * FROM Product WHERE product_name LIKE '%$search_query%'");
   } else {
      // If no search query, select all products
      $select_products = mysqli_query($con, "SELECT * FROM Product");
   }
?>





   <h1 class="heading">Latest Products</h1>

  
<div class="container">
    <section class="products">
        <?php
        if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>
                <div class="product">
                    <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                    <h3><?php echo $fetch_product['product_name']; ?></h3>
                    <div class="price">Rs.<?php echo $fetch_product['price']; ?>/-</div>
                    <form action="" method="post">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
						
                        <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
            <?php
            }
        } else {
            echo "<p style='font-size:30px;'>No products found</p>";
        }
        ?>
    </section>
</div>
 

   <?php include 'footer.php'; ?>
   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>
</html>
