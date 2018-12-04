<?php
	
	session_start();

	if ( isset( $_POST[ 'signin' ] ) ) {

		include 'dbh.php';

		$uid = mysqli_real_escape_string( $conn, $_POST['uid'] );
		$pwd = mysqli_real_escape_string( $conn, $_POST['pwd'] );

		//Error handlers
		if ( empty( $uid ) || empty( $pwd ) ) {
		header( "Location: ../signin.php?login=empty" );
		exit();
	} else {
		$sql = "SELECT * FROM userdata WHERE username='$uid'";
		$result = mysqli_query( $conn, $sql );
		$resultCheck = mysqli_num_rows( $result );

		if ( $resultCheck < 1 ) {
			header( "Location: ../signin.php?login=usernotfound" );
			exit();
		} else {

			if ( $row = mysqli_fetch_assoc( $result ) ) {
				//de-hashing the password
				echo $row['username'];
				$hashedPwdCheck = password_verify( $pwd, $row['pwd'] );

				if ( $hashedPwdCheck == false ) {
					header( "Location: ../signin.php?login=pwderror" );
					exit();
				} elseif ( $hashedPwdCheck == true ) {
					//Log in the user here
					$_SESSION['u_id'] = $row['username'];
                    
                    mysqli_close($conn);
					header( "Location: ../index.php?login=success" );
					exit();

				}
			}
		}
	}
} else {
    mysqli_close($conn);
	header( "Location: ../signin.php?login=error" );
	exit();
}