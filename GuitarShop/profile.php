<?php	
	include_once 'includes/header.php';
	include_once 'includes/dbh.php';

	if (isset($_SESSION['u_id'])) {
		$id = $_SESSION['u_id'];
		
		$sql = mysqli_query($conn,"SELECT * FROM userdata WHERE username='$id'");
		while ($row = mysqli_fetch_array($sql)) {
			$profile_img = $row['profile_img'];
		}
        
        //Run a select query to get latest items
        $dynamicList = "";
        $sql = mysqli_query($conn, "SELECT * FROM userdata JOIN orders on userdata.uid = orders.user_id JOIN product on orders.product_id = product.p_id WHERE username = '$id' ORDER BY order_id DESC");
        $productCount = mysqli_num_rows($sql); // count the output amount
        if ($productCount > 0) {
	   while($row = mysqli_fetch_array($sql)){ 
             $id = $row["p_id"];
			 $product_name = $row["p_name"];
			 $price = $row["p_price"];
			 $p_img = $row["p_img"];
            $order_id = $row["order_id"];
			 $dynamicList .= '
     <div class="card">
                <a href="product.php?id='.$id.'"><img src="assets/Products/'.$p_img.'" alt="" class="image-product" /></a>
                <a href="product.php?id='.$id.'">
                    <h4 class="product-heading">'.$product_name.'</h4>
                </a>
                <p class="price">$'.$price.'<br>
                    order#: '.$order_id.'</p>
            </div>';
                                        }
                        } else {
	                       $dynamicList = "You havent made any orders yet";
                        }
    mysqli_close($conn);

			
	} else {
		header("Location: signin.php?Mustsignin");
	}
?>

<div class="container" id="Profile-cont">
    <div class="row">
        <div class="col-md-3 profile-pic">
            <h1>Welcome
                <?php echo $_SESSION['u_id'] ?>
            </h1>
            <div class="text-center">
                <img src="pics/<?php echo $profile_img; ?>" class="avatar" alt="img not found" style="width:250px;height:250px;">
                <div class="form-wrapper">
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <input class="file-btn" type="file" name="file" class="form-control-file" id="Profile-pic-upload">
                        <button class="btn btn-primary" type="submit" name="submit">UPLOAD</button>
                    </form>
                    <br>
                    <form class="login-form" action="includes/delete.php" method="POST">
                        <button class="btn" type="submit" name="delete">Delete my Account</button>

                        <?php
            		$full ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

					if ( strpos( $full, "profile.php?uploadsuccess" ) !== false ) {
					echo "<p class='error' >Upload was successful</p>";

					}elseif ( strpos( $full, "profile.php?filetoobig" ) !== false ) {
					echo "<p class='error' >File size too large</p>";
                        
					}elseif ( strpos( $full, "profile.php?uploaderror" ) !== false ) {
					echo "<p class='error' >Error uploading file make sure it is a jpg file</p>";
                        
					}elseif ( strpos( $full, "profile.php?Cantuploadfile" ) !== false ) {
					echo "<p class='error' >Error no file selected</p>";
                        
                    }

            	?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9 orders">
            <h1>Orders</h1>
            <?php echo $dynamicList; ?>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
