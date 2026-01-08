<?php
session_start();
@include 'connect.php';

// Check if the order ID is set in the session
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Retrieve order details
    $order_query = mysqli_query($con, "SELECT * FROM cust_order WHERE order_id = '$order_id'");
    if ($order_query && mysqli_num_rows($order_query) > 0) {
        $order_details = mysqli_fetch_assoc($order_query);

        // Retrieve customer details
        $customer_ID = $order_details['customer_ID'];
        $customer_query = mysqli_query($con, "SELECT * FROM Customer WHERE customer_ID = '$customer_ID'");
        if ($customer_query && mysqli_num_rows($customer_query) > 0) {
            $customer_details = mysqli_fetch_assoc($customer_query);

            // Retrieve product details
            $product_query = mysqli_query($con, "SELECT * FROM Cart");
        } else {
            echo "Customer details not found.";
            exit();
        }
    } else {
        echo "Order details not found.";
        exit();
    }
} else {
    // Redirect to checkout page if order ID is not set
    header("Location: checkout.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Invoice</title>
   <style>
      table {
         border-collapse: collapse;
         width: 100%;
      }

      th, td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
      }

      th {
         background-color: #f2f2f2;
      }

      .invoice-container {
         max-width: 800px;
         margin: 0 auto;
         padding: 20px;
         position: relative;
      }

      .invoice-container h1 {
         text-align: center;
      }

      .customer-details, .product-details, .total {
         margin-bottom: 20px;
      }

      .order-details {
         position: right;
         top: 0;
         right: 0;
      }

      button {
         padding: 10px 20px;
         background-color: #4CAF50;
         color: white;
         border: none;
         cursor: pointer;
         border-radius: 5px;
      }

      button:hover {
         background-color: #45a049;
      }
   </style>
</head>
<body>
   <div class="invoice-container">
      <h1>Invoice</h1>
      <div class="customer-details">
         <h2>Customer Details</h2>
         <p><strong>Name:</strong> <?= isset($customer_details['name']) ? $customer_details['name'] : ''; ?></p>
         <p><strong>Email:</strong> <?= isset($customer_details['email']) ? $customer_details['email'] : ''; ?></p>
         <p><strong>Phone:</strong> <?= isset($customer_details['contact_no']) ? $customer_details['contact_no'] : ''; ?></p>
         <!-- Add more customer details as needed -->
      </div>
      <div class="order-details">
         <h2>Order Details</h2>
         <p><strong>Order ID:</strong> <?= isset($order_details['order_id']) ? $order_details['order_id'] : ''; ?></p>
         <p><strong>payment_method:</strong> <?= isset($order_details['method']) ? $order_details['method'] : ''; ?></p>
         <p><strong>placed on:</strong> <?= isset($order_details['placed_on']) ? $order_details['placed_on'] : ''; ?></p>
      </div>
      <div class="product-details">
         <h2>Product Details</h2>
         <table>
            <thead>
               <tr>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Price</th>
               </tr>
            </thead>
            <tbody>
               <?php 
               if ($product_query && mysqli_num_rows($product_query) > 0) {
                   while ($product = mysqli_fetch_assoc($product_query)) :
               ?>
                  <tr>
                     <td><?= $product['name']; ?></td>
                     <td><?= $product['quantity']; ?></td>
                     <td>Rs<?= $product['price']; ?></td>
                  </tr>
               <?php endwhile; ?>
               <?php } else { ?>
                  <tr><td colspan="3">No products found</td></tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
      <div class="total">
         <h2>Total</h2>
         <p><strong>Total Price:</strong> Rs.<?= isset($order_details['total_price']) ? $order_details['total_price'] : ''; ?></p>
         <!-- Add more total details as needed -->
      </div>
      <button onclick="window.print()">Print</button>
   </div>
</body>
</html>
