<?php
    session_start();
    $logout = '<li class="nav-item" role="presentation"><a class="nav-link" href="includes/logout.php" style="color:rgba(255,255,255,0.7);">logout</a></li>';

    if(isset($_SESSION['u_id'])) {

        $profile = "profile";

    } else {
        $profile = "signin";
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guitar shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <section>
        <div>
            <nav class="navbar navbar-light navbar-expand-md">
                <div class="container-fluid"><a class="navbar-brand" href="index.php" style="letter-spacing:2px;font-family:Lobster, cursive;">Rockin'Guitars</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon" style="color:rgba(255,255,255,0.5);background-color:rgba(255,255,255,0.41);"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php" style="color:rgba(255,255,255,0.7);">Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="products.php" style="color:rgba(255,255,255,0.7);">Guitars</a></li>
                             <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgba(255,255,255,0.7);">About</a></li>

                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="products.php">Buy</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo $profile?>.php" style="color:rgba(255,255,255,0.7);"><?php echo $profile 
                            ?></a></li>
                            
                           <?php if($profile == "profile") { 
                            echo $logout;
                       } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
