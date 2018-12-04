<?php

if ( isset($_POST[ 'Signup'])) {

	include_once 'dbh.php';

	$uid = mysqli_real_escape_string( $conn, $_POST[ 'uid']);
	$fullname =  mysqli_real_escape_string( $conn, $_POST['fullname']);
	$email =  mysqli_real_escape_string( $conn, $_POST[ 'email' ]);
	$pwd =  mysqli_real_escape_string( $conn, $_POST[ 'pwd' ]);
	$repwd =  mysqli_real_escape_string( $conn, $_POST[ 'repwd' ]);

		//error checking
	if ( empty( $uid ) || empty( $email ) || empty( $pwd ) || empty( $repwd ) ) {
		header( "Location: ../signup.php?signup=empty" );
		exit();
	} else {
		if ( !preg_match( "/^[A-Za-z].*[0-9]*$/", $uid ) ) {
			header( "Location: ../signup.php?signup=invalidinput" );
			exit();
		} else {
			if ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
				header( "Location: ../signup.php?signup=invalidemail" );
				exit();
			} else {
				$sql = "SELECT * FROM userdata WHERE username = '$uid'";
				$result = mysqli_query( $conn, $sql );
				$resultCheck = mysqli_num_rows( $result );

				if ( $resultCheck > 0 ) {
					header( "Location: ../signup.php?signup=usertaken" );
					exit();
				} else {
					if ( $pwd != $repwd ) {
						header( "Location: ../signup.php?signup=pwdnomatch" );
						exit();
					} else {				
						
	
						$hashedPwd = password_hash( $pwd, PASSWORD_DEFAULT );
						$sql = "INSERT INTO userdata (username, fullname, email, pwd) VALUES ('$uid', '$fullname', '$email', '$hashedPwd');";
							$result = mysqli_query($conn, $sql);

							         mysqli_close($conn);
									header( "Location: ../signup.php?signup=success" );
									exit();
									
                    }	
				}
			}
		}
	
	}
} else {
	header( "Location: ../signup.php" );
	exit();
}