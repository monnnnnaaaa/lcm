<?php
require 'db_conn.php';

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

if (isset($_POST['save_quotation'])) {
    $quotation_num = $_POST['quotation_num'];
    $quotation_for = $_POST['quotation_for'];
    $quotation_billing = $_POST['quotation_billing'];
    $quotation_stotal = $_POST['quotation_stotal'];
    $quotation_vat = $_POST['quotation_vat'];
    $quotation_charge = $_POST['quotation_charge'];
    $quotation_grandtotal = $_POST['quotation_grandtotal'];
    $quotation_date = $_POST['quotation_date'];
    $quotation_expires = $_POST['quotation_expires'];

    $sql_quotation = "INSERT INTO quotation_list (quotation_num, quotation_for, quotation_billing, quotation_stotal, quotation_vat, quotation_charge, quotation_grandtotal, quotation_date, quotation_expires, quotation_pimage, quotation_product, quotation_description, quotation_item, quotation_qty, quotation_unit, quotation_uprice, quotation_amount) VALUES ";

    foreach ($_POST['quotation_product'] as $key => $product_id) {
        $sql_product = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result_product = mysqli_query($conn, $sql_product);
        $product = mysqli_fetch_assoc($result_product);
    
        $quantity = $_POST['quotation_qty'][$key];
        $unit = $_POST['quotation_unit'][$key];
    
        $total_amount = $quantity * $product['product_price'];
    
        $sql_quotation .= "('$quotation_num', '$quotation_for', '$quotation_billing', '$quotation_stotal', '$quotation_vat', '$quotation_charge', '$quotation_grandtotal', '$quotation_date', '$quotation_expires', '{$product['product_img']}' , '{$product['product_id']}', '{$product['product_description']}', '{$product['product_name']}', '$quantity', '$unit', '{$product['product_price']}', '$total_amount'),";
    }
    
    $sql_quotation = rtrim($sql_quotation, ",");

    mysqli_query($conn, $sql_quotation);

    header('Location: manage.php');
    exit();
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

    <form method="post" id="add_product">
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
                <input type="text" id="bill" name="quotation_billing">
            </div>
            <div class="input-container date-time">
                <label for="q-date-time"><strong>Quotation Expires:</strong></label>
                <input type="date" id="q-date" name="quotation_expires">
            </div>
        </div>

        <hr class="line">

        <div class="input-form">
            <div class="input-form-detail">
                <label for="product">Product</label>
                <select id="product" name="quotation_product">
                    <option value="" disabled selected>Select a product</option>
                    <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row["product_id"] . "' data-description='" . $row["product_description"] . "' data-item='" . $row["product_id"] . "' data-img='" . $row["product_img"] . "' data-price='" . $row["product_price"] . "'>" . $row["product_name"] . "</option>";
                    }
                    
                    mysqli_free_result($result);
                    mysqli_close($conn);
                    ?>
                </select>
            </div>
            <div class="input-form-detail">
                <label for="description">Description</label>
                <input type="text" id="description" name="quotation_description" readonly>
            </div>
            <div class="input-form-detail">
                <label for="item">Item #</label>
                <input type="text" id="item" name="quotation_item" readonly>
            </div>

            <div class="input-form-detail">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quotation_qty">
            </div>
            <div class="input-form-detail">
                <label for="unit">Unit</label>
                <select id="unit" name="quotation_unit">
                    <option value="" disabled selected>Select a unit</option>
                    <option value="pieces">Pieces</option>                  
                </select>
            </div>

            <div class="input-form-detail">
                <button id="addButton" class="button-form">Add</button>
            </div>
        </div>
    
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
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">
            </tbody>
        </table> 

        <div class="container-form">
            <div class="form-group">
                <label for="sub-total"><strong>Sub-total</strong></label>
                <input type="text" name="quotation_stotal" id="subTotalInput" >
            </div>

            <div class="form-group">
                <label for="vat"><strong>VAT(7%)</strong></label>
                <input type="text" name="quotation_vat" id="vatInput" >
            </div>

            <div class="form-group">
                <label for="charge"><strong>Charge</strong></label>
                <input type="text" id="chargeInput" name="quotation_charge">
            </div>

            <div class="form-group">
                <label for="grand-total"><strong>Grand Total</strong></label>
                <input type="text" name="quotation_grandtotal" id="grandTotalInput" >
            </div>
        </div>

        <div class="input-container note">
            <label for="quotationnum"><strong>Notes:</strong></label>
            <input type="text" id="q-num" >
        </div>

        <div class="button-container">
            <button id="addButton" type="submit" name="save_quotation">Save Quotation</button>
        </div>

    </form>
    <script>
    document.getElementById('product').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];
    var description = selectedOption.getAttribute('data-description');
    var item = selectedOption.getAttribute('data-item');
    document.getElementById('description').value = description;
    document.getElementById('item').value = item;
    });

    document.getElementById('addButton').addEventListener('click', function(event) {
    event.preventDefault();

    var quantityValue = document.getElementById('quantity').value;
    var unitValue = document.getElementById('unit').value;
    console.log('Quantity:', quantityValue);
    console.log('Unit:', unitValue);

    var productSelect = document.getElementById('product');
    var selectedOption = productSelect.options[productSelect.selectedIndex];
    var price = parseFloat(selectedOption.getAttribute('data-price'));
    var quantity = parseInt(document.getElementById('quantity').value);
    var unit = document.getElementById('unit').value;
    var amount = quantity * price;

    
    var rowData = {
        productId: selectedOption.value,
        productName: selectedOption.text,
        description: selectedOption.getAttribute('data-description'),
        itemNumber: selectedOption.getAttribute('data-item'),
        quantity: quantity,
        unit: unit,
        unitPrice: price.toFixed(2),
        amount: amount
    };

    // Append hidden input fields to the form to store row data
    appendHiddenInput('quotation_product[]', rowData.productId);
    appendHiddenInput('quotation_description[]', rowData.description);
    appendHiddenInput('quotation_item[]', rowData.itemNumber);
    appendHiddenInput('quotation_qty[]', rowData.quantity);
    appendHiddenInput('quotation_unit[]', rowData.unit);
    appendHiddenInput('quotation_uprice[]', rowData.unitPrice);
    appendHiddenInput('quotation_amount[]', rowData.amount);

    // Create row for the table
    var newRow = document.createElement('tr');
    newRow.innerHTML = "<td><img src='img/"  + selectedOption.getAttribute('data-img') + "' alt='Product Image'></td>" +
        "<td>" + selectedOption.text + "</td>" +
        "<td>" + selectedOption.getAttribute('data-description') + "</td>" +
        "<td>" + selectedOption.getAttribute('data-item') + "</td>" +
        "<td>" + quantity + "</td>" +
        "<td>" + unit + "</td>" +
        "<td>" + price.toFixed(2) + "</td>" +
        "<td class='amount'>" + amount.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' }) + "</td>";

    var tableBody = document.getElementById('tableBody');
    tableBody.appendChild(newRow);

    updateTotals();

    document.getElementById('quantity').value = '';
    document.getElementById('unit').value = '';
    document.getElementById('description').value = '';
    document.getElementById('item').value = '';
    document.getElementById('product').selectedIndex = 0;
    });

    function appendHiddenInput(name, value) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        document.getElementById('add_product').appendChild(input);
    }

    document.getElementById('chargeInput').addEventListener('input', function() {
        updateTotals();
    });



    function updateTotals() {
        var amounts = document.getElementsByClassName('amount');
        var subTotal = 0;

        for (var i = 0; i < amounts.length; i++) {
            var amountText = amounts[i].innerText.replace(/[^\d.-]/g, ''); // Remove any non-numeric characters
            subTotal += parseFloat(amountText);
        }

        var vat = subTotal * 0.07;
        var charge = parseFloat(document.getElementById('chargeInput').value) || 0;
        var grandTotal = subTotal + vat + charge;

        document.getElementById('subTotalInput').value = subTotal.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
        document.getElementById('vatInput').value = vat.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
        // document.getElementById('chargeInput').value = charge.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
        document.getElementById('grandTotalInput').value = grandTotal.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
    }

</script> 
</body>
</html>
 