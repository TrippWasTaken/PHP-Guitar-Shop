<?php

if ( isset( $_POST[ 'signup' ] ) ) {

	include_once 'dbh.inc.php';

    $user_fullname = mysqli_real_escape_string( $conn, $_POST['user_fullname'] );
    $user_username = mysqli_real_escape_string( $conn, $_POST['user_username'] );
	$user_email = mysqli_real_escape_string( $conn, $_POST[ 'user_email' ] );
	$user_pwd = mysqli_real_escape_string( $conn, $_POST[ 'user_pwd' ] );
	$user_repwd = mysqli_real_escape_string( $conn, $_POST[ 'user_repwd' ] );

	   //error checking
		if ( !preg_match( "/^[A-Za-z].*[0-9]*$/", $user_username ) ) {
			header( "Location: ../Signup.php?signup=invalidinput" );
			exit();
		} else {
			if ( !filter_var( $user_email, FILTER_VALIDATE_EMAIL ) ) {
				header( "Location: ../Signup.php?signup=invalidemail" );
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_username= '$user_username'";
				$result = mysqli_query( $conn, $sql );
				$resultCheck = mysqli_num_rows( $result );

				if ( $resultCheck > 0 ) {
					header( "Location: ../Signup.php?signup=usertaken" );
					exit();
				} else {
					if ( $user_pwd != $user_repwd ) {
						header( "Location: ../Signup.php?signup=pwdnomatch" );
						exit();
					} else {
						$hashedPwd = password_hash( $user_pwd, PASSWORD_DEFAULT );
						$sql = "INSERT INTO users (user_fullname, user_username, user_email, hashedpwd) VALUES ('$user_fullname','$user_username', '$user_email', '$hashedPwd');";
						$result = mysqli_query( $conn, $sql );

						header( "Location: ../Signup.php?signup=success" );
						exit();
					}
				}
			}
		}
	}
else {
	header( "Location: ../signup.php" );
	exit();
}