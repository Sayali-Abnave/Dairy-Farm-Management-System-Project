<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="contact.css">

</head>




<body>
<?php include 'header1.php'; ?>

<div class="contact-container">
<form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
<div class="contact-left-title">
<h2>Get in touch</h2>
<hr>


</div>
 <input type="hidden" name="access_key" value="63325ac0-f285-4460-8326-27dc3a7a24fb">

<input type="text" name="name" placeholder="Your name" class="contact-inputs" required>
<input type="email" name="email" placeholder="Your email" class="contact-inputs" required>
<textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>

<button type="submit">Submit<img src="images/arrow_icon.png" alt=""></button>

</form >
<div class="contact-right">
<img src="images/right_img.png" alt="">
</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
