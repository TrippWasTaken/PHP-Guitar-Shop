<?php
session_start();

include_once 'dbh.php';
$id = $_SESSION['u_id'];

if (isset($_POST['submit'])) {

	$file = $_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');
    
	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000) {
				$fileNameNew = "profile-".$id.".".$fileActualExt;
				$fileDest = 'pics/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDest);

				$sql = "UPDATE userdata SET profile_img='$fileNameNew' WHERE username='$id';";
				$result = mysqli_query($conn, $sql);
                
                mysqli_close($conn);
				header("Location: profile.php?uploadsuccess");
			} else {
                header("Location: profile.php?filetoobig");
			}
		} else {
            header("Location: profile.php?uploaderror");
		}
	} else {
        header("Location: profile.php?Cantuploadfile");
	}

}