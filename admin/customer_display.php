  
<?php

include 'connect.php';
?>
 
<!DOCTYPE html>
<html lang="en">
   
      <style>
	  button{
		  margin:30px;
		  background-color: #9BCF53;
		  height: 32px;
    width: 129px;
    border-radius: 23px;
}
	  
	  a{
		  text-decoration:none;
		  color:black;
	  }
	  </style>
	  
     
	<head>
	    <title>login data</title>
	</head>
	
	<body>
	<h2>login data</h2>
	<div class="container">
	 
	<table class="table" border=2px width=70%>
  <thead>
    <tr>
       
      <th>Name</th>
      <th>Email</th>
      <th>contact_no</th>
	  <th>Password</th>
	  
    </tr>
  </thead>
  <tbody>
  
  
   
  <?php
  $sql = "select * from Customer";
  $result = mysqli_query($con,$sql);
  
  if($result)
  { 
	  
	 
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $contact_no = $row['contact_no'];
            $password = $row['password'];

            echo '<tr><td>' . $name . '</td><td>' . $email . '</td><td>' . $contact_no . '</td>
			<td>' . $password . '</td></tr>';
			  
			 
        }
  }
  ?>
  
  
  
  </tbody>
</table>

	
	 
	</div>
	</body>
	
	</html>
	
 
 
 
 
 
 
  