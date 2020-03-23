<?php
	require('dbconnection.php');
	require('admin_start.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>User's Requests</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
    <script src="datatable/data_table.min.js"></script>
    <script src="datatable/data_table_bootstrap.min.js"></script>
    <link rel="stylesheet" href="datatable/data_table.min.css">
</head>
<body>
<?php
        include('admin_main_navbar.php');
        include('admin_navbar.php');
    ?>
		<div class="jumbotron shadow-lg text-left bg-dark rounded-0 text-light">
			<h1>User requests</h1>
			<p></p>
		</div>
	<div class="container">
			<div class="row p-3 shadow">
				<!-- WRITE HERE -->
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $que='SELECT * FROM sell;';
                    $result=mysqli_query($con,$que);
                    $pr='';

                    if(mysqli_num_rows($result)>0){
                        	while($row=mysqli_fetch_assoc($result)){
                                $pr.='<tr>';
                                $pr.='<td>'.$row['type'].'</td>'.'<td>'.$row['size'].'</td>'.'<td>'.$row['contact'].'</td>'.'<td>'.$row['address'].'</td>'.'<td>'.$row['prize'].'</td>';
                                $pr.='</tr>';
                            }
                            echo $pr;
                        }


                ?>
                </tbody>
			</div>
	</div>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
</body>
</html>