<?php
	

	 
		//unset($_SESSION['u_id']);
		session_start();
		session_unset();
		session_destroy();
		header("Location:../index.php?loggedout");

		//else {
		//header("Location:../index.php");
	//}