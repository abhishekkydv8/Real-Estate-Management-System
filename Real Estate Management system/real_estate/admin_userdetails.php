<?php
    require('dbconnection.php');
    require('admin_start.php');

    if(isset($_POST['deleteBtn'])){
        $email=$_POST['email'];
        $que='DELETE FROM users WHERE email="'.$email.'"';
	    $result=mysqli_query($con,$que);
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
    <script src="datatable/data_table.min.js"></script>
    <script src="datatable/data_table_bootstrap.min.js"></script>
    <link rel="stylesheet" href="datatable/data_table.min.css">
    <link rel="stylesheet" href="css/custom_login_css.css">
</head>
<body>
<?php
        include('admin_main_navbar.php');
        include('admin_navbar.php');
    ?>
		<div class="jumbotron shadow-lg text-left bg-dark rounded-0 text-light">
			<h1>User Details</h1>
			<p>User details</p>
		</div>
	<div class="container">
			<div class="row p-3 shadow">
				<!-- WRITE HERE -->
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Name</th>
                        <th>User type</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $que='SELECT * FROM users;';
                    $result=mysqli_query($con,$que);
                    $pr='';

                    if(mysqli_num_rows($result)>0){
                        	while($row=mysqli_fetch_assoc($result)){
                                $pr.='<tr>';
                                $pr.='<td>'.$row['email'].'</td>'.'<td>'.$row['contact_no'].'</td>'.'<td>'.$row['name'].'</td>'.'<td>'.$row['usertype'].'</td>';
                                $pr.='</tr>';
                            }
                            echo $pr;
                        }


                ?>
                </tbody>
                </table>
                <br><br><br>
			</div>
            <form action="" method="POST" style="margin-top:40px;">
					<div class="form-group signupText">
				    	<label for="email">Delete User? (Enter Email id):</label>
				    	<input type="email" class="form-control" id="email" name="email" onkeyup="hideNext(this)">
				    	<small id="emailerror" class="form-hint text-danger">
      						Email not valid
    					</small>
				  	</div>
				  	
				  	<input type="submit" class="btn btn-danger" id="deleteBtn" name="deleteBtn" value="Delete User" onclick="return deleteValidation()">
				</form>
	</div>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );

function deleteValidation(){
    var email = document.getElementById('email');
    var emailerror = document.getElementById('emailerror');

    if(email.value.length<2){
        emailerror.style.visibility='visible';
        console.log('contacterror false');
        return false;
    }
}
    </script>
</body>

<script type="text/javascript" src="./../js/appart.js"></script>
</html>