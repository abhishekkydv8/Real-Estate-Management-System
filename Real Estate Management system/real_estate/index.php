<?php
	require('dbconnection.php');
	require('start.php');

	if(isset($_POST['loginBtn'])){
		$email=$_POST['lemail'];
		$pwd=$_POST['lpwd'];

		$query='SELECT * FROM users WHERE email="'.$email.'" AND pwd="'.$pwd.'";';

		$result=mysqli_query($con,$query);

		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$_SESSION['isloggedin']=true;
				$_SESSION['email']=$row['email'];
				$_SESSION['usertype']=$row['usertype'];
			}
			header('location:buy.php');
			exit();
		}else{
			echo '<script>alert("Wrong email or password");</script>';
		}
	}

    if(isset($_POST['adminloginBtn'])){
		$email=$_POST['lemail'];
		$pwd=$_POST['lpwd'];

		$query='SELECT * FROM admin WHERE email="'.$email.'" AND pwd="'.$pwd.'";';

		$result=mysqli_query($con,$query);

		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$_SESSION['isloggedin']=true;
				$_SESSION['email']=$row['email'];
				$_SESSION['usertype']=$row['usertype'];
			}
			header('location:admin_userdetails.php');
			exit();
		}else{
			echo '<script>alert("Wrong email or password");</script>';
		}
	}

	if(isset($_POST['signupBtn']))
    {
		$email=$_POST['email'];
		$pwd=$_POST['pwd'];
		$name=$_POST['name'];
		$contact= $_POST['contact'];
		$usertype = $_POST['usertype'];
		$address = $_POST['address'];
        
        if($usertype == "buyer")
        {
		  $query='INSERT INTO users(email,contact_no,name,pwd,usertype) VALUES ("'.$email.'","'.$contact.'","'.$name.'","'.$pwd.'","'.$usertype.'");';
            
          $query1='INSERT INTO customer(email,contact_no,name,pwd,address) VALUES 
          ("'.$email.'","'.$contact.'","'.$name.'","'.$pwd.'","'.$address.'");';
        }
        
        if($usertype=="seller")
        {
		  $query='INSERT INTO users(email,contact_no,name,pwd,usertype) VALUES ("'.$email.'","'.$contact.'","'.$name.'","'.$pwd.'","'.$usertype.'");';
            
          $query1='INSERT INTO owner(email,contact_no,name,pwd,address) VALUES 
          ("'.$email.'","'.$contact.'","'.$name.'","'.$pwd.'","'.$address.'");';
        }
		
		if(mysqli_query($con,$query)){
			echo '<script>alert("Sign up successfull");</script>';// when sign up is successfull
		}else{
			echo '<script>alert("Sign up Unsuccessfull");</script>';
			// echo '<script>document.getElementById("signuperror").style.visibility="visible";</script>'; //this will display error
		}
        
        if(mysqli_query($con,$query1)){
			echo '<script>alert("Sign up successfull");</script>';// when sign up is successfull
		}else{
			echo '<script>alert("Sign up Unsuccessfull");</script>';
			// echo '<script>document.getElementById("signuperror").style.visibility="visible";</script>'; //this will display error
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Dream Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="./css/custom_login_css.css">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
    <style>
        .navbar-custom
        {
            background-color: #22295B;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-custom">
        <a class="navbar-brand" href="#" style="color: #9EAADE; font-family: 'ZCOOL XiaoWei', serif; font-size:250%">Dream Home</a>
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
            <form class="form-inline" action="" method="POST"> <!-- LOGIN FORM -->
			    <div class="input-group mr-2 mb-2" float="right">
			      	<div class="input-group-prepend">
			        	<span class="input-group-text">@</span>
			      	</div>
			      	<input type="text" class="form-control" id="lemail" name="lemail" placeholder="Email">
			    </div>
			    <div class="input-group mr-2 mb-2">
			      	<div class="input-group-prepend">
			        	<span class="input-group-text">&nbsp;*&nbsp;</span>
			      	</div>
			      	<input type="Password" class="form-control" id="lpwd" name="lpwd" placeholder="Password">
			    </div>
			    <div class="input-group mr-2 mb-2">
			      	<input type="submit" class="btn btn-success" name="loginBtn" value="LOG IN"  onclick="return loginValidation()" >
			    </div>
                <div class="input-group mr-2 mb-2">
			      	<input type="submit" class="btn btn-success" name="adminloginBtn" value="ADMIN LOG IN"  onclick="return loginValidation()" >
			    </div>
			</form><!-- Login form ends here-->
        </ul>
        <small id="loginerror" class="form-hint text-danger">
      		username or password incorrect.
    	</small>
    </nav>
	<div class="row">
		<div class="col-lg-7 border bgSet">
			 <img src="architecture.jpg" width="904" height="780"> 
		</div>
		<div class="col-lg-5 border p-2 p-sm-2 bgGradient">
            <div>
            
			<div class="container-fluid p-lg-3">

				<h1 class="mt-lg-5 m-3">Sign Up</h1>
				<form action="" method="POST">
					<div class="form-group signupText">
				    	<label for="email">Email address:</label>
				    	<input type="email" class="form-control" id="email" name="email" onkeyup="hideNext(this)">
				    	<small id="emailerror" class="form-hint text-danger">
      						Email not valid
    					</small>
				  	</div>
					<div class="form-group signupText">
				    	<label for="name">Name</label>
				    	<input type="text" class="form-control" id="name" name="name" onkeyup="hideNext(this)">
				    	<small id="nameerror" class="form-hint text-danger">
      						Must be 3 characters long.
    					</small>
				  	</div>
					<div class="form-group signupText">
				    	<label for="contact">Contact no:</label>
				    	<input type="text" class="form-control" id="contact" name="contact" onkeyup="hideNext(this)">
				    	<small id="contacterror" class="form-hint text-danger">
      						Must be 10 digit long.
    					</small>
				  	</div>
                    
                    <div class="form-group signupText">
				    	<label for="name">User</label>
				    	<input type="text" class="form-control" id="usertype" name="usertype" onkeyup="hideNext(this)" placeholder="buyer/seller">
				    	<small id="nameerror" class="form-hint text-danger">
      						Must be 3 characters long.
    					</small>
				  	</div>
                    
					<div class="form-group signupText">
				    	<label for="name">Address</label>
				    	<input type="text" class="form-control" id="address" name="address" onkeyup="hideNext(this)" >
				    	<small id="nameerror" class="form-hint text-danger">
      						Must be 3 characters long.
    					</small>
				  	</div>

				  	<div class="form-group signupText">
				    	<label for="pwd">Password:</label>
				    	<input type="password" class="form-control" id="pwd" name="pwd" onkeyup="hideNext(this)">
				    	<small id="pwderror" class="form-hint text-danger">
      						Must be 8-20 characters long.
    					</small>
				  	</div>
				  	<div class="form-group signupText">
				    	<label for="cpwd">Confirm Password:</label>
				    	<input type="password" class="form-control" id="cpwd" name="cpwd" onkeyup="hideNext(this)">
				    	<small id="cpwderror" class="form-hint text-danger">
      						Password not Matching
    					</small>
				  	</div>
				  	<input type="submit" class="btn btn-primary" onclick="return signupValidation()"  id="signupBtn" name="signupBtn" value="Sign Up">
					  <small id="signuperror" class="form-hint text-danger">
      						Sign up not Successful (may be email id is already registered)
    					</small>
				</form>


			</div>
		</div>
	</div>

</body>
<script type="text/javascript" src="js/custom.js"></script>
</html>