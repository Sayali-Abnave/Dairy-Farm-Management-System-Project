<?php
@include 'connect.php';

session_start();

// Add code to fetch customer details from the database based on customer_ID
if (isset($_SESSION['customer_ID'])) {
   $customer_ID = $_SESSION['customer_ID'];

   $customer_query = mysqli_query($con, "SELECT * FROM Customer WHERE customer_ID = '$customer_ID'");
   
   if ($customer_query && mysqli_num_rows($customer_query) > 0) {
       $customer_data = mysqli_fetch_assoc($customer_query);
       $name = $customer_data['name'];
       $number = $customer_data['contact_no'];
       $email = $customer_data['email'];
   }
}



 if(isset($_POST['order_btn'])){

   
   /*$name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];*/
   
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $customer_ID = $_SESSION['customer_ID'];
   $placed_on = date('d-M-Y');
   

   $cart_query = mysqli_query($con, "SELECT * FROM Cart");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
        
      };
   };

   
$total_product = implode(',',$product_name);


$productParts = explode('(', $total_product);

$productQuantity = (int) trim($productParts[1], ' )'); // Extract quantity and convert to integer




 
$detail_query = mysqli_query($con, "INSERT INTO cust_order(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price,customer_ID, placed_on ) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$productQuantity','$price_total','$customer_ID',' $placed_on ')") or die('query failed');

/*
$detail_query = mysqli_query($con, "INSERT INTO cust_order(method, flat, street, city, state, country, pin_code, total_products, total_price,customer_ID, placed_on ) VALUES('$method','$flat','$street','$city','$state','$country','$pin_code','$productQuantity','$price_total','$customer_ID',' $placed_on ')") or die('query failed');
*/

   if($cart_query && $detail_query){
      $order_id = mysqli_insert_id($con);
	  
      // Store the order ID in the session
      $_SESSION['order_id'] = $order_id;

      // Insert order details into the bill table
      $insert_bill_query = mysqli_query($con, "INSERT INTO Bill(payment_mode, quantity, total_price, order_id) VALUES ('$method', '$productQuantity', '$price_total', '$order_id')");

      echo "
      <div class='order-message-container'>
      <div class='message-container'>";
	  
      
	    echo '<p style="font-size: 100px;"><i class="fa-sharp fa-solid fa-circle-check" style="color: green;"></i></p>';

	  
	  if ($method === 'creditcart') {
   
   echo "<h3>Online payment successful! Thank you for shopping, $name!!!</h3>";
} else {
	
   // Display the default message
   echo "<h3>Thank you for shopping, $name.!!!</h3>";
}
	  
          
     echo "<div class='order-detail'>";
           echo "<span>".$total_product."</span>";
             echo "<span class='total'> total Price : Rs".$price_total."/-  </span>";
          echo "</div>";
          
             echo "<a href='products.php' class='btn'>continue shopping</a>";
            
             echo "<form id='printForm' action='print.php' method='post'>
            <!-- Your other form fields here -->
            <input type='hidden' name='method' value='$method'> <!-- Add hidden field for method -->
            <input type='hidden' name='total_quantity' value='$productQuantity'> <!-- Add hidden field for total_quantity -->
            <input type='hidden' name='grand_total' value='$price_total'> <!-- Add hidden field for grand_total -->
            <input type='submit' value='Print' name='print_btn' class='btn'>
        </form>";
     echo "</div>";
 echo "</div>";

echo "<script>
    // Function to submit the form and redirect
    function submitAndRedirect() {
        // Submit the form
        document.getElementById('printForm').submit();
        // Redirect to the desired page
        window.location.href = 'print.php'; 
    }
</script>
            
         </div>
      </div>
      ";
   }

  
   
   
   //$delete_query = mysqli_query($con, "DELETE FROM Cart");
  
   
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="stylep.css">

</head>
<body>

<?php include 'header2.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($con, "SELECT * FROM Cart");
         $total = 0;
         $grand_total = 0;
		 
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total = $total += $total_price;
      ?>
	  
      
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo 'Rs'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : Rs<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required value="<?php echo $name; ?>">
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required value="<?php echo $number; ?>">
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required value="<?php echo $email; ?>">
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method"  id="selectBox1" onchange="changeFunc1();" required>
    <option value="cash on delivery" selected>cash on delivery</option>
    <option value="creditcart">credit card</option>
</select>
			<div id="creditCardFormContainer"></div>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. mumbai" name="city" required>
         </div>
         <div class="inputBox">
            <span>state</span>
            <input type="text" placeholder="e.g. maharashtra" name="state" required>
         </div>
         <div class="inputBox">
            <span>country</span>
            <input type="text" placeholder="e.g. india" name="country" required>
         </div>
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
      
      
     
   </form>

</section>

</div>

<!-- custom js file link  -->
<script>
    // Function to handle the payment success message
    document.getElementById("checkoutForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Simulate online payment success (replace this with your actual payment processing logic)
        var paymentSuccess = true;

        if (paymentSuccess) {
            // Display a popup message indicating successful payment
            alert("Online payment successful! Your order has been placed.");
        } else {
            // Display a popup message indicating payment failure
            alert("Online payment failed. Please try again.");
        }
    });

    // Function to handle the change in payment method
    function changeFunc1() {
        var status = document.getElementById('selectBox1').value;

        if (status === 'creditcart') {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'credit_card_form.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('creditCardFormContainer').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else {
            document.getElementById('creditCardFormContainer').innerHTML = '';
        }
    }
</script>

<?php include 'footer.php'; ?>
</body>
</html>