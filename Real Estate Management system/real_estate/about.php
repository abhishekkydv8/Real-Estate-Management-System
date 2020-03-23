<?php
    require('dbconnection.php');
    require('logged.php');
    
    if(isset($_POST['sendBtn'])){
        $email=$_POST['email'];
        $message=$_POST['message'];

        $query='INSERT INTO message(email,message) VALUES ("'.$email.'","'.$message.'");';
		
		if(mysqli_query($con,$query)){
			echo '<script>alert("Messaged successfull");</script>';// when sign up is successfull
		}else{
			echo '<script>alert("Messaged UNsuccessfull");</script>';
		}
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>About us</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
</head>
<body>
<?php
    include('navbar.php');
    ?>
		<div class="jumbotron shadow-lg text-left bg-dark rounded-0 text-light">
			<h1>About Us</h1>
			<p>Contact details : xyz@gmail.com, 7865432578</p>
		</div>
	<div class="container">
			<div class="row shadow">
            <form action="" method="POST" class="m-3">
					
					<div class="form-group signupText">
				    	<label for="email">Email </label>
				    	<input type="email" class="form-control" id="email" name="email">
				    	<!-- <small id="naemerror" class="form-hint text-danger">
      						Must be 4-10 characters long.
    					</small> -->
				  	</div>
					<div class="form-group">
				    	<label for="message">Message</label>
				    	<textarea rows="4" cols="50" class="form-control" id="message" name="message"></textarea>
                        <!-- <small id="contacterror" class="form-hint text-danger">
      						Must be 10 digit long.
    					</small> -->
				  	</div>
				  	<input type="submit" class="btn btn-primary" id="sendBtn" name="sendBtn" value="Send">
				</form>
			</div>
	</div>
</body>
</html>