<?php

session_start();
	if(isset($_SESSION['isloggedin'])){
		if($_SESSION['isloggedin']==true){
			header('location:buy.php');
		}
	}
?>