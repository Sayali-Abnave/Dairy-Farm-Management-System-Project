<?php
session_start();
@include 'connect.php';

// Retrieve invoice details
$invoice_query = mysqli_query($con, "SELECT cust_order.*, Customer.name AS customer_name FROM cust_order JOIN Customer ON cust_order.customer_ID = Customer.customer_ID");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>
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
   </style>
</head>
<body>
   <h1>Admin Dashboard</h1>
   <h2>Invoice Details</h2>
   <table>
      <thead>
         <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Payment Method</th>
            <th>Total Price</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php 
         if ($invoice_query && mysqli_num_rows($invoice_query) > 0) {
             while ($invoice = mysqli_fetch_assoc($invoice_query)) :
         ?>
            <tr>
               <td><?= $invoice['order_id']; ?></td>
               <td><?= $invoice['customer_name']; ?></td>
               <td><?= $invoice['method']; ?></td>
               <td>Rs.<?= $invoice['total_price']; ?></td>
               <td>
    <form action="view_invoice.php" method="GET">
        <input type="hidden" name="order_id" value="<?= $invoice['order_id']; ?>">
        <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 5px 10px; border-radius: 5px;">View Invoice</button>
    </form>
</td>

    </form>
</td>

            </tr>
         <?php endwhile; ?>
         <?php } else { ?>
            <tr><td colspan="5">No invoices found</td></tr>
         <?php } ?>
      </tbody>
   </table>
</body>
</html>
