<?php
session_start();
	if(!isset($_SESSION['isloggedin'])){
		if($_SESSION['usertype']!='admin')
			header('location: buy.php');
		else
			header('location: index.php');
	}else{
		if($_SESSION['isloggedin']==false)
			header('location: index.php');	
	}
?>