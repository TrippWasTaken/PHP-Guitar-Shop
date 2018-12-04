<?php
session_start();
if ( isset( $_POST[ 'delete' ] )) {
	$id = $_SESSION[ 'u_id' ];
	include 'dbh.php';
    
    $sql = "SELECT * FROM userdata WHERE username='$id'";
    $result = mysqli_query( $conn, $sql );
		        while($row = mysqli_fetch_array( $result )) {
                    $userid = $row['uid'];
                }
    $asql = "DELETE FROM userdata WHERE uid='$userid';";
    $aresult = mysqli_query($conn, $asql);
	session_unset();
	session_destroy();
    mysqli_close($conn);
    
	header( "Location: ../index.php?delete=success" );
	exit();

} else {
	header( "Location: ../profile.php?delete=error" );
	exit();
}