<?php

    session_start();
    include_once 'includes/dbh.php';
if (isset($_SESSION['u_id'])) {
    if(isset($_POST['submit'])) {
    
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $uid = $_SESSION['u_id'];
        
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            
            if(empty($address)) {
                header("Lcation: product.php?empty");
                exit();
            } else {
                $sql = "SELECT * FROM userdata WHERE username='$uid'";
                $result = mysqli_query( $conn, $sql );
		        while($row = mysqli_fetch_array( $result )) {
                    $userid = $row['uid'];
                }
              $ordersql = "INSERT INTO orders (user_id, product_id) VALUES ('$userid', '$id');";
                $orderreslut = mysqli_query($conn, $ordersql);
                $asql = "UPDATE userdata SET address='$address' WHERE username='$uid';";
                $aresult = mysqli_query($conn, $asql);
                mysqli_close($conn);
                header("Location: product.php?buysuccess");
                exit();
                
            } 
            
            
        } else{
            header("Location: product.php?hiddenfail");
            exit();
        }
        
    } else {
         header("Location: product.php?buyfail");
            exit();
    }
}else{
        header("Location: signin.php");
        exit();
}
    
?>
