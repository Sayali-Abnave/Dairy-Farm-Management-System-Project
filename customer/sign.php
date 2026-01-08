




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order Confirmation</title>
   <style>
      /* CSS styles for the green checkmark */
      body, html {
         height: 100%;
         margin: 0;
         display: flex;
         justify-content: center;
         align-items: center;
         background-color: #f0f0f0; /* Background color of the page */
      }

      .checkmark {
         width: 200px; /* Adjust the size as needed */
         height: 200px; /* Adjust the size as needed */
         display: flex;
         justify-content: center;
         align-items: center;
         background-color: #8BC34A; /* Green color */
         border-radius: 50%; /* Makes the circle */
      }

      .checkmark::before {
         content: '\2714'; /* Unicode character for checkmark */
         font-size: 100px; /* Adjust the size as needed */
         color: #ffffff; /* White color */
      }
   </style>
</head>
<body>
   <!-- Green checkmark symbol -->
   <div class="checkmark"></div>
   
   <?php
   
   
$detail_query = mysqli_query($con, "INSERT INTO cust_order(method, flat, street, city, state, country, pin_code, total_products, total_price,customer_ID, placed_on ) VALUES('$method','$flat','$street','$city','$state','$country','$pin_code','$productQuantity','$price_total','$customer_ID',' $placed_on ')") or die('query failed');

    echo "
      <div class='order-message-container'>
      <div class='message-container'>";
	  
	  
	  if ($method === 'creditcart') {
   
   echo "<h3>Online payment successful! Thank you for shopping, $name!!!</h3>";
} else {
   // Display the default message
   echo "<h3>Thank you for shopping, $name.!!!</h3>";
}
	  
          
     echo "<div class='order-detail'>";
           echo "<span>".$total_product."</span>";
             echo "<span class='total' style='color:yellow;'> total Price : Rs".$price_total."/-  </span>";
          echo "</div>";
          
             echo "<a href='products.php' class='btn' style='color:yellow;'>continue shopping</a>";
            
             echo "<form id='printForm' action='print.php' method='post' style='color:yellow;'>
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
   

  ?>
   
</body>
</html>
