<?php
include 'connect.php';  
session_start();

$user_id = $_SESSION['customer_ID'];
 
if(!isset($user_id)){
   header('location:log.php');
}


// Add code to fetch customer details from the database based on customer_ID
if (isset($_SESSION['customer_ID'])) {
    $customer_ID = $_SESSION['customer_ID'];

    $customer_query = mysqli_query($con, "SELECT * FROM Customer WHERE customer_ID = '$customer_ID'");

    if ($customer_query && mysqli_num_rows($customer_query) > 0) {
        $customer_data = mysqli_fetch_assoc($customer_query);
        $name = $customer_data['name'];
         
        $email = $customer_data['email'];
    }
}

// Check if the form is submitted
if (isset($_POST['submit_review'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Insert data into the database
    $insert_query = "INSERT INTO Review (ratings, reviewText, customer_ID) VALUES ('$rating', '$review', '$customer_ID')";

    if (mysqli_query($con, $insert_query)) {
        echo "<h2>Thank you for your review, $name!</h2>";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
    }
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Review Form</title>
    <style>
         
    .container11 {
    max-width: 90%; /* Adjust the max-width of the container */
    margin: 20px auto; /* Center the container horizontally */
    padding: 20px;
    background-color: #f9f9f9; /* Light background color */
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
}

h1 {
    font-size: 28px; /* Larger font size for headings */
    color: #333;
    margin-bottom: 20px; /* Add some space below the heading */
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px; /* Add some space below each label */
}

input[type="text"],
input[type="email"],
textarea,
input[type="number"],
input[type="submit"] {
    width: calc(100% - 24px); /* Adjust width to accommodate padding and borders */
    padding: 12px;
    margin-bottom: 20px; /* Add some space below each input */
    border: 1px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    font-size: 18px; /* Larger font size for inputs */
	height: 41px;
    width: 576px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s; /* Smooth hover effect */
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.star-rating {
    unicode-bidi: bidi-override;
    direction: rtl;
    text-align: center;
    margin-bottom: 20px; /* Add some space below the star rating */
}

.star-rating > span {
    display: inline-block;
    position: relative;
    width: 1.2em; /* Increase the width a bit */
}

.star-rating > span:before {
    content: "\2605";
    position: absolute;
    color: gold;
}

.review {
    margin-bottom: 20px; /* Add some space below each review */
    padding: 15px; /* Add padding inside each review */
    background-color: #fff; /* White background for reviews */
    border: 1px solid #ccc; /* Add border around each review */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
}

.review h3 {
    margin: 0; /* Remove margin for review headings */
    color: #333;
}

.review p {
    margin-bottom: 10px; /* Add some space below each paragraph */
    font-size: 16px; /* Reduce font size for review content */
    line-height: 1.6; /* Improve readability with increased line height */
}

.review .rating {
    margin-bottom: 10px; /* Add some space below the rating */
}

.review .rating span {
    color: gold; /* Change star color */
}

.review-container {
    background-color: #f9f9f9; /* Light background color */
    border: 1px solid #ccc; /* Add border */
    border-radius: 8px; /* Rounded corners */
    padding: 15px; /* Add padding */
    margin-bottom: 20px; /* Add some space below each review */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
}

.review-container p {
    margin: 5px 0; /* Adjust margin for paragraphs */
}

 
    </style>
</head>
<body>


<?php include 'header1.php'; ?>

    <div class="container11">
        <h1>Customer Review Form</h1>
        <form action="" method="post">
            <label for="name">Your Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
            
            <label for="email">Your Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            
            <label for="rating">Rating (1 to 5):</label><br>
            <input type="number" id="rating" name="rating" min="1" max="5" value="<?php echo isset($_POST['rating']) ? htmlspecialchars($_POST['rating']) : ''; ?>" required><br><br>
            
            <label for="review">Your Review:</label><br>
            <textarea id="review" name="review" rows="4" required><?php echo isset($_POST['review']) ? htmlspecialchars($_POST['review']) : ''; ?></textarea><br><br>
            
            <input type="submit" name="submit_review" value="Submit Review">
        </form>
    <?php
    // Check if the form is submitted
    if (isset($_POST['submit_review'])) {
        // Save the submitted review to a text file
        $file = 'reviews.txt';
        $review = $_POST['name'] . "|" . $_POST['email'] . "|" . $_POST['rating'] . "|" . $_POST['review'] . "\n";
        file_put_contents($file, $review, FILE_APPEND);

        // Display a thank you message
        echo "<h2>Thank you for your review, {$_POST['name']}!</h2>";
    }

    // Display all submitted reviews
    if (file_exists('reviews.txt')) {
        $reviews = file('reviews.txt', FILE_IGNORE_NEW_LINES);
        echo "<h2>All Reviews:</h2>";
        foreach ($reviews as $review) {
    $reviewData = explode('|', $review);
    echo "<div class='review-container'>";
    echo "<p><strong>Name:</strong> {$reviewData[0]}</p>";
    echo "<p><strong>Email:</strong> {$reviewData[1]}</p>";
    echo "<p><strong>Rating:</strong> ";
	
    // Convert rating to stars
    $rating = intval($reviewData[2]);
    for ($i = 0; $i < $rating; $i++) {
        echo "<p style='color:gold;display:flex;'>★</p>";
    }
    echo "</p>";
    echo "<p><strong>Review:</strong> {$reviewData[3]}</p>";
    echo "</div>";
}

        
    } else {
        echo "<p>No reviews yet.</p>";
    }
    ?>
	<?php include 'footer.php'; ?>
</body>
</html>
