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


</head>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>

    <div class="container-quotation">
        <h3>Create New Quotation</h3>
    </div>

    <div class="input-container num">
        <label for="quotationnum"><strong>Quotation no.</strong></label>
        <input type="text" id="q-num" name="quotation-num">
    </div>

<hr class="line">

<div class="input-group">
    <div class="input-container for">
        <label for="q-for"><strong>Quotation for</strong></label>
        <input type="text" id="qfor" name="quotation-for">
    </div>
    <div class="input-container date-time">
        <label for="q-date-time"><strong>Quotation Date:</strong></label>
        <input type="date" id="q-date" name="quotation-date">
    </div>  
</div>

<div class="input-group bil">
    <div class="input-container for">
        <label for="bill-add"><strong>Billing Address </strong></label>
        <input type="text" id="bill" name="bill-add">
    </div>
    <div class="input-container date-time">
        <label for="q-date-time"><strong>Quotation Expires:</strong></label>
        <input type="date" id="q-date" name="quotation-expires">
    </div>
</div>

<hr class="line">



<table>
    <thead>
        <tr>
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
        <tr>
            <td contenteditable="true"><img src="./img/1211.jpg" alt="Product Image"></td>
            <td>
                <input type="text" class="product-input" placeholder="Enter product name">
                <a href="#" class="existing-product-link">or existing product</a>
            </td>
            <td contenteditable="true">Product Description</td>
            <td contenteditable="true">Item Number</td>
            <td contenteditable="true" class="small-qty"><input type="number" class="editable" value="1"></td>
            <td contenteditable="true">
                <select class="unit-select">
                    <option value="pcs">pcs</option>
                    <option value="kg">kg</option>
                    <option value="box">box</option>
                    <!-- Add more options as needed -->
                </select>
            </td>
            <td contenteditable="true"><input type="number" class="editable" value="0.00"></td>
            <td contenteditable="false" class="unit-price">0.00</td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

<div class="button-container">
  <button id="addButton" type="button">Add Product</button>
  <button id="deleteButton" type="button">Delete Product</button>
</div>

<div class="container-form">
  <div class="form-group">
    <label for="sub-total"><strong>Sub-total</strong></label>
    <input type="text" name="sub-total">
  </div>

  <div class="form-group">
    <label for="vat"><strong>VAT(7%)</strong></label>
    <input type="text" name="vat">
  </div>

  <div class="form-group">
    <select id="Charges" name="Charges">
      <option value="" class="title-chrg" disabled selected>Charges</option>
      <option value="option1">Delivery Charge</option>
      <option value="option2">Labor Installation</option>
    </select>
    <input type="text" name="charge">
  </div>

  <div class="form-group">
    <label for="grand-total"><strong>Grand Total</strong></label>
    <input type="text" name="grand-total">
  </div>
</div>


    <div class="input-container note">
        <label for="quotationnum"><strong>Notes:</strong></label>
        <input type="text" id="q-num" name="quotation-num">
    </div>

    <!-- for modal -->

   <div class="selected-product">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Item #</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td contenteditable="true"><img src="./img/1211.jpg" alt="Product Image"></td>
                <td>
                    <input type="text" class="product-input" placeholder="Enter product name">
                    <a href="#" class="existing-product-link">or existing product</a>
                </td>
                <td>Item Number</td>
                <td>Product Description</td>
            </tr>
        </tbody>
    </table>
   </div>

    


    <script src="js/quotation.js"></script>
    
     
</body>
</html>
