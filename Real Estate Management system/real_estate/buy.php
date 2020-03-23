<?php
	require('dbconnection.php');

	require('logged.php');

	// // echo $_SESSION['email'];
	// $que='SELECT * FROM user_test WHERE email="'.$_SESSION['email'].'"';
	// $result=mysqli_query($con,$que);

	// $curtime=time();
	// $minrem=10;
	// $secrem=0;
	// if(mysqli_num_rows($result)>0){
	// 	while($row=mysqli_fetch_assoc($result)){
	// 		$t=strtotime($row['strt']);
	// 		if($row['answers']!=null){
	// 			header('location:aresult.php');
	// 			exit();
	// 		}
	// 		$diff=$curtime-$t;
	// 		// echo intdiv($diff,60);
	// 		if(intdiv($diff,60)>9){
	// 			header('location:aresult.php');
	// 			exit();
	// 		}else{
	// 			$minrem=9-intdiv($diff,60);
	// 			$secrem=59-$diff%60;
	// 		}
	// 	}
	// }else{
	// 	$que='INSERT INTO user_test(email,strt) VALUES("'.$_SESSION['email'].'","'.date('Y-m-d H:i:s',$curtime).'")';
	// 	mysqli_query($con,$que);
	// }




	// $query="SELECT * FROM questions;";

?>

<!DOCTYPE html>
<html>
<head>
	<title>BUY YOUR DREAM APPARTMENT</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
	<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
    <script src="datatable/data_table.min.js"></script>
    <script src="datatable/data_table_bootstrap.min.js"></script>
    <link rel="stylesheet" href="datatable/data_table.min.css">
    
    <style type="text/css">
        body
        {
            background:url(architecture.jpg);
        }
        .container
        {
            background-color:aliceblue;
            opacity: 0.9;
            filter: alpha(opacity=90); /* For IE8 and earlier */
        }
        
    </style>
</head>
<body>
    <?php
    include('navbar.php');
    ?>
		<div class="jumbotron shadow-lg text-left bg-light rounded-0 text-light">
            <h1 style="color:#C8AC7E; font-family: 'ZCOOL XiaoWei', serif;">Move to What Moves You</h1>
		</div>
	<div class="container">
			<div class="row p-3 shadow">
				<!-- WRITE HERE -->
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>BHK</th>
                        <th>Size</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Price(in Rs.)</th>
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
                </table>
			</div>
	</div>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
</body>
</html>