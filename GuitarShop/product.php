<?php
if(isset($_GET['id'])){
     // Connect to the MySQL database  
    include 'includes/dbh.php'; 
    $id = $_GET['id'];
    //Run a select query to get latest items
    $dynamicProduct = "";
    $sql = mysqli_query($conn,"SELECT * FROM product WHERE p_id='$id'");
    while($row = mysqli_fetch_array($sql)){ 
            $id = $row["p_id"];
            $product_name = $row["p_name"];
            $price = $row["p_price"];
            $p_img = $row["p_img"];
            $p_about = $row["p_about"];
            $p_availibility = $row["p_avalibility"];
            
        }
    mysqli_close($conn);  
}
else{
    header('Location: products.php');
}
?>

<?php
include 'includes/header.php';
?>

<div class="container" id="products-detail">
    <h1 id=details-title>
        <?php echo $product_name; ?>
    </h1>
    <p id="product-model">Model#:
        <?php echo $id; ?>
    </p>

    <div class="row">
        <div class="col-md-8">
            <div id="demo" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#" data-slide-to="0" class="active"></li>
                    <li data-target="#" data-slide-to="1"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/Products/<?php echo $p_img; ?>" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/Products/<?php echo $p_img; ?>.img2.jpg" alt="">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <h4 id="details-price">$
                <?php echo $price; ?>
            </h4>
            <h4 id="details-availability">
                <?php echo $p_availibility; ?>
            </h4>
            <h4><a href="#product-features" id="features-link">Features</a></h4>
            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#BuyNow">Buy Now</button>
        </div>


        <!-- The Modal -->
        <div class="modal fade" id="BuyNow">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="color: black;">Fill out details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="buy.php" method="POST">
                    <input type="text" id="login-field" name="address" placeholder="address" required>
                    <input type='hidden' name='id' value='<?php echo "$id";?>' />
                            <br>
                            <br>
                    <button class="btn btn-danger" type="submit" name="submit">
                        Buy</button>

                </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <?php echo $p_about; ?>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
