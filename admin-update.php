<?php

require 'db_conn.php';

if (!isset($_GET['edit'])) {
    echo "Product ID is not provided.";
    exit;
}

$id = $_GET['edit'];

$select = mysqli_query($conn, "SELECT * FROM product WHERE id = $id");
$product = mysqli_fetch_assoc($select);

if (!$product) {
    echo "Product not found.";
    exit;
}

if (isset($_POST['update_product'])) {

    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['product_category'];

    if (empty($product_name) || empty($product_id) || empty($product_price) || empty($product_description) || empty($product_category)) {
        echo '<script>alert("Please fill out all fields");</script>';
    } else {

        $update = "UPDATE product SET product_name='$product_name', product_id='$product_id', product_price='$product_price', product_description='$product_description', product_category='$product_category'";
        
        if (!empty($_FILES['product_img']['name'])) {
            $product_img = $_FILES['product_img']['name'];
            $product_img_tmp_name = $_FILES['product_img']['tmp_name'];
            $product_img_folder = 'img/' . $product_img;
            
            $update .= ", product_img='$product_img'";
            move_uploaded_file($product_img_tmp_name, $product_img_folder);
        }
        
        $update .= " WHERE id = $id";

        $upload = mysqli_query($conn, $update);

        if ($upload) {
            header('location: manage-product.php');
            exit;
        } else {
            echo '<script>alert("Could not update the product");</script>';
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
                    <h3 class="panel-h3">Update Product Information</h3>
                </div>
                <div class="panel-body form-group form-group-sm">
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $id; ?>" method="post" id="products.php" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_product">
                        <div class="row">
                            <div class="col-xs-4 ml-5">
                                <input type="text" class="form-control required" name="product_name" placeholder="Enter Product Name" value="<?php echo $product['product_name']; ?>">
                            </div>
                            <div class="col-xs-4">
                                <input type="number" class="form-control required" name="product_id" placeholder="Enter Product ID#" value="<?php echo $product['product_id']; ?>">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_price" placeholder="Enter Product Price" value="<?php echo $product['product_price']; ?>">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_description" placeholder="Enter Product Description" value="<?php echo $product['product_description']; ?>">
                            </div>

                            <div class="col-xs-4">
                                <select class="form-control required" name="product_category" id="categoryDropdown">
                                    <option value="" selected hidden>Select Product Category</option>
                                    <?php
                                    $categories = ["Fire Fighting Equipment", "Fire Fighting Hardware", "Belton Hydraulic Rescue Tools", "Hydram Hydraulic Rescue Tools", "Genesis Rescue Equipment", "Victim Locator Tools", "ANPEN High Angle Rescue", "Rescue Ropes", "PMI Ropes", "Water Rescue", "Emergency Medical Equipment", "Municipal/ Warning Siren", "Evacuation Tent", "Rescue Equipment For Collapse Structure", "Rescue Jump Cushion", "Portable Toilets", "Pallet Stacker", "Spill Kit", "Lighting", "Excavator/ Accessories", "Mobile Scissor Lift"];
                                    foreach ($categories as $category) {
                                        echo "<option value=\"$category\"";
                                        if ($product['product_category'] == $category) {
                                            echo " selected";
                                        }
                                        echo ">$category</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-xs-4">
                                <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" name="product_img">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 btn-group ">
                                    <input type="submit" id="action_add_product" name="update_product" class="btn btn-success float-right mr-2" value="Update Product" data-loading-text="Adding...">
                                    <a href="manage-product.php" class="btn btn-primary float-right">Go Back</a>
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
