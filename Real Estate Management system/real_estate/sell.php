<?php
	require('dbconnection.php');
    require('logged.php');
	
	if(isset($_POST['sellBtn'])){
		$type=$_POST['type'];
		$size=$_POST['size'];
		$prize=$_POST['prize'];
		$contact= $_POST['contact'];
		$address = $_POST['address'];

		$query='INSERT INTO sell(type,size,prize,contact,address) VALUES ("'.$type.'","'.$size.'","'.$prize.'","'.$contact.'","'.$address.'");';
		
		if(mysqli_query($con,$query)){
			echo '<script>alert("Apartment Added");</script>';// when sign up is successfull
		}else{
			echo '<script>alert("Sell UNsuccessfull");</script>';
			// echo '<script>document.getElementById("signuperror").style.visibility="visible";</script>'; //this will display error
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sell</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/custom_login_css.css">
</head>
<body>
<?php
    include('navbar.php');
    ?>
	<div class="row">
		<div class="col-lg-7 border bgSet">
            <img src="unsplash.jpg" width="904" height="672">
			<!-- <img src="images/loginImage.png"> -->
		</div>
		<div class="col-lg-5 border p-2 p-sm-2 bgGradient">
			<div class="container-fluid p-lg-3">

				<h1 class="mt-lg-5 m-3">Sell Apartment</h1>
				<form action="" method="POST">
					<div class="form-group signupText">
				    	<label for="type">Department Type</label>
				    	<select class="form-control signupText" id="type" name="type">
					    	<option value="1">1 BHK</option>
					    	<option value="2">2 BHK</option>
					    	<option value="3">3 BHK</option>
					  	</select>
                        <small id="typeerror" class="form-hint text-danger">
      						Type not valid
    					</small>
				  	</div>
					<div class="form-group signupText">
				    	<label for="size">Size(in sq. ft)</label>
				    	<input type="text" class="form-control" id="size" name="size" onkeyup="hideNext(this)">
				    	<small id="sizeerror" class="form-hint text-danger">
      						Must be 4 characters long.
    					</small>
				  	</div>
					<div class="form-group signupText">
				    	<label for="prize">Price</label>
				    	<input type="text" class="form-control" id="prize" name="prize" onkeyup="hideNext(this)">
				    	<small id="prizeerror" class="form-hint text-danger">
      						Must be 3 digit or more long.
    					</small>
				  	</div>
				  	<div class="form-group signupText">
				    	<label for="contact">Contact</label>
				    	<input type="text" class="form-control" id="contact" name="contact" onkeyup="hideNext(this)">
				    	<small id="contacterror" class="form-hint text-danger">
      						Must be 10 digit long.
    					</small>
				  	</div>
				  	<div class="form-group signupText">
				    	<label for="address">Address</label>
				    	<input type="text" class="form-control" id="address" name="address" onkeyup="hideNext(this)">
				    	<small id="addresserror" class="form-hint text-danger">
      						Must be 8 characters or more long.
    					</small>
				  	</div>
				  	<input type="submit" class="btn btn-primary" id="sellBtn" name="sellBtn" value="Sell" onclick="return formValidation()">
				</form>
			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="js/appart.js"></script>
</html>