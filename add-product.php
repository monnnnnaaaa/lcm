<?php
require 'db_conn.php';

if(isset($_POST['submit'])){

    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['product_category']; 
    $product_img = $_FILES['product_img']['name'];
    $product_img_tmp_name = $_FILES['product_img']['tmp_name'];
    $product_img_folder = 'img/' .$product_img;

    if(empty($product_name) || empty($product_id) || empty($product_price) || empty($product_description) || empty($product_category) || empty($product_img)){
        echo '<script>alert("Please fill out all fields");</script>';
    } else {
        $insert = "INSERT INTO product (product_name, product_id, product_price, product_description, product_category, product_img) 
        VALUES ('$product_name', '$product_id', '$product_price', '$product_description', '$product_category', '$product_img')";
        $upload = mysqli_query($conn, $insert);

        if($upload){
            move_uploaded_file($product_img_tmp_name, $product_img_folder);
            echo '<script>alert("New product added successfully!");</script>';
        } else {
            echo '<script>alert("Could not add the product");</script>';  
        }
    } 
}
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php require 'sidebar.php'; ?>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-h3">Product Information</h3>
                </div>
                <div class="panel-body form-group form-group-sm">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-4 ml-5">
                                <input type="text" class="form-control required" name="product_name" placeholder="Enter Product Name">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_id" placeholder="Enter Product ID#">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_price" placeholder="Enter Product Price">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_description" placeholder="Enter Product Description">
                            </div>

                            <div class="col-xs-4">
                                <select class="form-control required" name="product_category">
                                    <option value="" selected hidden>Select Product Category</option>
                                    <option value="Fire Fighting Equipment">Fire Fighting Equipment</option>
                                    <option value="Fire Fighting Hardware">Fire Fighting Hardware</option>
                                    <option value="Belton Hydraulic Rescue Tools">Belton Hydraulic Rescue Tools</option>
                                    <option value="Hydram Hydraulic Rescue Tools">Hydram Hydraulic Rescue Tools</option>
                                    <option value="Genesis Rescue Equipment">Genesis Rescue Equipment</option>
                                    <option value="Victim Locator Tools">Victim Locator Tools</option>
                                    <option value="ANPEN High Angle Rescue">ANPEN High Angle Rescue</option>
                                    <option value="Rescue Ropes">Rescue Ropes</option>
                                    <option value="PMI Ropes">PMI Ropes</option>
                                    <option value="Water Rescue">Water Rescue</option>
                                    <option value="Emergency Medical Equipment">Emergency Medical Equipment</option>
                                    <option value="Municipal/ Warning Siren">Municipal/ Warning Siren</option>
                                    <option value="Evacuation Tent">Evacuation Tent</option>
                                    <option value="Rescue Equipment For Collapse Structure">Rescue Equipment For Collapse Structure</option>
                                    <option value="Rescue Jump Cushion">Rescue Jump Cushion</option>
                                    <option value="Portable Toilets">Portable Toilets</option>
                                    <option value="Pallet Stacker">Pallet Stacker</option>
                                    <option value="Spill Kit">Spill Kit</option>
                                    <option value="Lighting">Lighting</option>
                                    <option value="Excavator/ Accessories">Excavator/ Accessories</option>
                                    <option value="Mobile Scissor Lift">Mobile Scissor Lift</option>
                                </select>
                            </div>

                            <div class="col-xs-4">
                                <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control required" name="product_img" accept="image/*">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 btn-group">
                                    <input type="submit" name="submit" class="btn btn-success float-right" value="Add Product">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/products.js"></script>
</body>
</html>
