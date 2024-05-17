<?php
require 'db_conn.php';

$result = mysqli_query($conn, "SELECT * FROM product");
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST['submit'])) {
    $quotation_num = $_POST['quotation_num'];
    $quotation_for = $_POST['quotation_for'];
    $quotation_date = $_POST['quotation_date'];
    $quotation_expires = $_POST['quotation_expires'];
    $q_img = $_POST['q_img'];
    $bill_add = $_POST['bill_add'];
    $p_name = $_POST['p_name'];
    $p_description = $_POST['p_description'];
    $item_num = $_POST['item_num'];
    $qty = $_POST['qty'];
    $unit = $_POST['unit'];
    $unit_price = $_POST['unit_price'];
    $amount = $_POST['amount'];
    $sub_total = $_POST['sub_total'];
    $vat = $_POST['vat'];
    $charge = $_POST['charge'];
    $delivery_fee = ($charge === 'labor_install') ? NULL : $_POST['delivery_fee'];
    $grand_total = $_POST['grand_total'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["q_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["q_img"]["tmp_name"], $target_file)) {
        $q_img = basename($_FILES["q_img"]["name"]);
    } else {
        $uploadOk = 0;
        echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
    }

    if (empty($quotation_num) || empty($quotation_for) || empty($quotation_date) || empty($quotation_expires) || empty($bill_add) || empty($p_name) || empty($p_description) || empty($item_num) || empty($qty) || empty($unit) || empty($unit_price) || empty($amount) || empty($sub_total) || empty($vat) || empty($charge) || $uploadOk == 0) {
        echo '<script>alert("Please fill out all fields");</script>';
    } else {
        $insert = "INSERT INTO quotation (quotation_num, quotation_for, quotation_date, quotation_expires, bill_add, q_img, p_name, p_description, item_num, qty, unit, unit_price, amount, sub_total, vat, delivery_fee, labor_install, grand_total) 
                   VALUES ('$quotation_num', '$quotation_for', '$quotation_date', '$quotation_expires', '$bill_add', '$q_img', '$p_name', '$p_description', '$item_num', '$qty', '$unit', '$unit_price', '$amount', '$sub_total', '$vat', '$delivery_fee', '$charge', '$grand_total')";
        $upload = mysqli_query($conn, $insert);

        if ($upload) {
            echo '<script>alert("New quotation added successfully!!");</script>';
        } else {
            echo '<script>alert("Could not add the quotation");</script>';
            error_log("Error: " . $conn->error);
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
    <title>Quotation | Create</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/quotation.css">
    <script src="js/quotation.js"></script>
</head>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>

    <div class="container-quotation">
        <h3>Create New Quotation</h3>
    </div>

    <form method="post" id="add_product" enctype="multipart/form-data">
        <div class="input-container num">
            <label for="quotationnum"><strong>Quotation no.</strong></label>
            <input type="text" id="q-num" name="quotation_num">
        </div>

        <hr class="line">

        <div class="input-group">
            <div class="input-container for">
                <label for="q-for"><strong>Quotation for</strong></label>
                <input type="text" id="qfor" name="quotation_for">
            </div>
            <div class="input-container date-time">
                <label for="q-date-time"><strong>Quotation Date:</strong></label>
                <input type="date" id="q-date" name="quotation_date">
            </div>  
        </div>

        <div class="input-group bil">
            <div class="input-container for">
                <label for="bill-add"><strong>Billing Address </strong></label>
                <input type="text" id="bill" name="bill_add">
            </div>
            <div class="input-container date-time">
                <label for="q-date-time"><strong>Quotation Expires:</strong></label>
                <input type="date" id="q-date" name="quotation_expires">
            </div>
        </div>

        <hr class="line">
        
        <table>
            <thead>
                <tr>
                    <th>
                        <!-- <input type="checkbox" class="expand-row-btn" id="selectAllCheckbox"> -->
                    </th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Item #</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr id="newProductRow">   
                    
                    <td class="expand-btn">
                        <input type="checkbox" class="expand-row-btn" id="checkboxId">
                    </td>
                    <td contenteditable="true">
                        <label for="file-upload" class="custom-file-upload">
                            <img src="img/img-add.png" alt="Upload Icon" height="100">
                        </label>
                        <input type="file" id="file-upload" name="q_img">
                    </td>
                    <td>
                        <input type="text" class="product-input" placeholder="Enter product name">
                        <a href="#" class="existing-product-link" data-row-index="0">or existing product</a>
                    </td>
                    <td contenteditable="true" class="product-desc">
                        <input type="text" name="p_description" placeholder="Product Description">
                    </td>
                    <td contenteditable="true">
                        <input type="text" name="item_num" placeholder="Item Number">
                    </td>
                    <td contenteditable="true" class="small-qty">
                        <input type="number" class="editable" name="qty" value="1">
                    </td>
                    <td contenteditable="true">
                        <select name="unit" class="unit-select">
                            <option value="pcs">pcs</option>
                            <option value="kg">kg</option>
                            <option value="box">box</option>
                        </select>
                    </td>
                    <td contenteditable="true">
                        <input type="number" name="unit_price" class="editable" value="0.00">
                    </td>
                    <td contenteditable="false" name="amount">0.00</td>
                </tr>
            </tbody>
        </table>

        <div class="button-container">
             <button id="addButton" type="button">Add Product</button> 
            <button id="deleteButton" type="button">Delete Product</button>
        </div>

        <div class="container-form">
            <div class="form-group">
                <label for="sub-total"><strong>Sub-total</strong></label>
                <input type="text" name="sub_total" id="subTotalInput">
            </div>

        <div class="form-group">
            <label for="vat"><strong>VAT(7%)</strong></label>
            <input type="text" name="vat">
        </div>

        <div class="form-group">
            <select id="chargesSelect" name="charge">
                <option value="" class="title-chrg" disabled selected>Charges</option>
                <option value="delivery_fee" name="delivery_fee">Delivery Charge</option>
                <option value="labor_install" name="labor_install">Labor Installation</option>
            </select>
            <input type="text" id="chargeInput" name="charge">
        </div>

  
        <div class="form-group">
            <label for="grand-total"><strong>Grand Total</strong></label>
            <input type="text" name="grand_total">
        </div>
        </div>

        <div class="input-container note">
            <label for="quotationnum"><strong>Notes:</strong></label>
            <input type="text" id="q-num" >
        </div>



        <div class="button-container">
            <button id="addButton" type="submit" name="submit">Save Quotation</button>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="selected-product">
                    <div class="search-box-customer d-flex align-items-center">
                        <input type="text" class="mr-2" id="searchInput" placeholder="Search product..." onkeyup="searchProduct()">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Item Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="productTableBody">
                            <?php foreach ($products as $product): ?>
                                <tr class="selectable-product">
                                    <td><img src="img/<?php echo $product['product_img']; ?>" height="100" alt=""></td>
                                    <td><?php echo $product['product_name']; ?></td>
                                    <td><?php echo $product['product_description']; ?></td>
                                    <td><?php echo $product['product_id']; ?></td>
                                    <td><button type="button" class="select-product" data-product='<?php echo json_encode($product); ?>'>Select</button></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <script src="./js/quotation.js"></script>
</body>
</html>