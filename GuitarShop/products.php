<?php
// Connect to the MySQL database  
include 'includes/dbh.php'; 

//Run a select query to get latest items
$dynamicList = "";
$sql = mysqli_query($conn,"SELECT * FROM product ORDER BY p_id DESC");
$productCount = mysqli_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysqli_fetch_array($sql)){ 
             $id = $row["p_id"];
			 $product_name = $row["p_name"];
			 $price = $row["p_price"];
			 $p_img = $row["p_img"];
			 $dynamicList .= '
                                <div class="card">
                                    <a href="product.php?id='.$id.'"><img src="assets/Products/'.$p_img.'" alt="" class="image-product" /></a>
                                    <a href="product.php?id='.$id.'">
                                    <h4 class="product-heading">'.$product_name.'</h4>
                                    </a>
                                    <p class="price">$'.$price.'</p>
                                    </div>';
                                        }
                        } else {
	                       $dynamicList = "We have no products listed in your store yet";
                        }
    mysqli_close($conn);
?>

<?php
include 'includes/header.php';
?>

<div class="container" id="product-wrapper">
    <h2 style="text-align:center">Products</h2>
    <div class="row">
        <div class="col-md-3">
            <h4 id="products-filter">Filter</h4>

            <!-- Search form -->
            <div class="md-form mt-0" id="products-search">
                <input class="form-control" id="Search" type="search" placeholder="Search" aria-label="Search" onkeyup="searchData()">
            </div>
        </div>

        <div class="col-md-9" id="products-list">
            <?php
        echo $dynamicList;
    ?>
        </div>

    </div>
</div>

<script>
    function searchData() {
        var input = document.getElementById("Search");
        var filter = input.value.toLowerCase();
        var nodes = document.getElementsByClassName("product-heading");
        var full = document.getElementsByClassName("card")

        for (i = 0; i < nodes.length; i++) {
            if (nodes[i].innerText.toLowerCase().includes(filter)) {
                full[i].style.display = "block";
            } else {
                full[i].style.display = "none";
            }
        }
    }

</script>


<?php
include 'includes/footer.php';
?>
