<?php
require 'db_conn.php';

$select = mysqli_query($conn, "SELECT * FROM product");

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LCM</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>

    
                
    <div class="container-product bg-white" id="productContainer">
        <div class="search-box">
            <select class="category" id="searchDropdown" onchange="filterProducts()" name=product_category>
                <option value="all">All</option>
                <option value="category1">Fire Fighting Equipment</option>
                <option value="category2">Fire Fighting Hardware</option>
                <option value="category3">Belton Hydraulic Rescue Tools</option>
                <option value="category4">Hydram Hydraulic Rescue Tools</option>
                <option value="category5">Genesis Rescue Equipment</option>
                <option value="category6">Victim Locator Tools</option>
                <option value="category7">ANPEN High Angle Rescue</option>
                <option value="category8">Rescue Ropes</option>
                <option value="category9">PMI Ropes</option>
                <option value="category10">Water Rescue</option>
                <option value="category11">Emergency Medical Equipment</option>
                <option value="category12">Municipal/ Warning Siren</option>
                <option value="category13">Evacuation Tent</option>
                <option value="category14">Rescue Equipment For Collapse Structure</option>
                <option value="category15">Rescue Jump Cushion</option>
                <option value="category16">Portable Toilets</option>
                <option value="category17">Pallet Stacker</option>
                <option value="category18">Spill Kit</option>
                <option value="category19">Lighting</option>
                <option value="category20">Excavator/ Accessories</option>
                <option value="category21">Mobile Scissor Lift</option>
            </select>
            <input type="text" id="searchInput" placeholder="Search products...">
        </div>
        <div class="products">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM product");

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="product category1 <?php echo $row['product_category']; ?>" >
                <div class="product-info">
                    <h2><?php echo $row['product_name']; ?></h2>
                    <p><i><b><?php echo $row['product_id']; ?></b></i></p>
                    <p><b><?php echo $row['product_price']; ?></b></p>
                    <p><?php echo $row['product_description']; ?></p>
                    <br>
                    <button class="copy-btn" onclick="copyContent()">Copy</button>
                </div>
                <div class="product-image">
                <img src="img/<?php echo $row['product_img'];?>" alt="product_img">
                </div>
            </div>
            <?php
            }
            ?>
        </div>  
            
        <div id="noResults" style="display: none; margin: 20px;"> No products found. </div>
    </div>
    <script src="js/products.js"></script>

</body>
</html>
