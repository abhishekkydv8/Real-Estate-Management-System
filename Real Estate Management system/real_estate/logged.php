<?php

session_start();
	if(!isset($_SESSION['isloggedin'])){
        header('location:index.php');
	}else{
        if($_SESSION['isloggedin']==false){
			header('location:index.php');
		}
    }
?>