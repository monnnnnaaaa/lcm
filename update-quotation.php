<?php
require 'db_conn.php';

$id = $_GET['id'];
$query = "SELECT * FROM quotation_list WHERE id = $id";
$result = mysqli_query($conn, $query);
$quotation = mysqli_fetch_assoc($result);

$product_query = "SELECT *, 1 AS quantity, 'pieces' AS unit FROM product"; // Replace '1' and 'pieces' with actual default values or adjust as needed
$product_result = mysqli_query($conn, $product_query);

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

    $sql_quotation = "UPDATE quotation_list SET 
        quotation_num='$quotation_num', 
        quotation_for='$quotation_for', 
        quotation_billing='$quotation_billing', 
        quotation_stotal='$quotation_stotal', 
        quotation_vat='$quotation_vat', 
        quotation_charge='$quotation_charge', 
        quotation_grandtotal='$quotation_grandtotal', 
        quotation_date='$quotation_date', 
        quotation_expires='$quotation_expires' 
        WHERE id=$id";

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
    <title>Quotation | Update</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/quotation.css">
</head> 
<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>

    <div class="container-quotation">
        <h3>Update Quotation Information</h3>
    </div>
    <form method="post" id="add_product" action="">
        <input type="hidden" name="id" value="<?php echo $quotation['id']; ?>">

        <div class="input-container num">
            <label for="quotationnum"><strong>Quotation no.</strong></label>
            <input type="text" id="q-num" name="quotation_num" value="<?php echo $quotation['quotation_num']; ?>">
        </div>

        <div class="input-container for">
            <label for="q-for"><strong>Quotation for</strong></label>
            <input type="text" id="qfor" name="quotation_for" value="<?php echo $quotation['quotation_for']; ?>">
        </div>
        <div class="input-container date-time">
            <label for="q-date-time"><strong>Quotation Date:</strong></label>
            <input type="date" id="q-date" name="quotation_date" value="<?php echo $quotation['quotation_date']; ?>">
        </div>
        <div class="input-container bil">
            <label for="bill-add"><strong>Billing Address </strong></label>
            <input type="text" id="bill" name="quotation_billing" value="<?php echo $quotation['quotation_billing']; ?>">
        </div>
        <div class="input-container date-time">
            <label for="q-date-time"><strong>Quotation Expires:</strong></label>
            <input type="date" id="q-date" name="quotation_expires" value="<?php echo $quotation['quotation_expires']; ?>">
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
                <input type="text" name="quotation_stotal" id="subTotalInput" value="<?php echo $quotation['quotation_stotal']; ?>">
            </div>
            <div class="form-group">
                <label for="vat"><strong>VAT(7%)</strong></label>
                <input type="text" name="quotation_vat" id="vatInput" value="<?php echo $quotation['quotation_vat']; ?>">
            </div>
            <div class="form-group">
                <label for="charge"><strong>Charge</strong></label>
                <input type="text" id="chargeInput" name="quotation_charge" value="<?php echo $quotation['quotation_charge']; ?>">
            </div>
            <div class="form-group">
                <label for="grand-total"><strong>Grand Total</strong></label>
                <input type="text" name="quotation_grandtotal" id="grandTotalInput" value="<?php echo $quotation['quotation_grandtotal']; ?>">
            </div>
        </div>

        <div class="button-container">
            <button id="addButton" type="submit" name="save_quotation">Save Quotation</button>
        </div>
    </form>

    <script>
        document.getElementById('productSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var description = selectedOption.getAttribute('data-description');
            var item = selectedOption.getAttribute('data-item');
            document.getElementById('description').value = description;
            document.getElementById('item').value = item;
        });

        var tableRows = document.querySelectorAll("#tableBody tr");

        tableRows.forEach(function(row) {
            row.addEventListener("click", function() {
                // Get data from cells in the clicked row
                var cells = row.cells;
                var productName = cells[1].textContent;
                var description = cells[2].textContent;
                var itemNumber = cells[3].textContent;
                var quantity = cells[4].textContent;
                var unit = cells[5].textContent;

                // Set data to the input fields above the form
                document.getElementById("productSelect").value = productName;
                document.getElementById("description").value = description;
                document.getElementById("item").value = itemNumber;
                document.getElementById("quantity").value = quantity;
                document.getElementById("unitSelect").value = unit;
            });
        });

        function addRow() {
            var selectedRow = document.querySelector("#tableBody .selected");

            if (selectedRow) {
                var cells = selectedRow.cells;
                cells[1].innerText = document.getElementById("productSelect").value;
                cells[2].innerText = document.getElementById("description").value;
                cells[3].innerText = document.getElementById("item").value;
                cells[4].innerText = document.getElementById("quantity").value;
                cells[5].innerText = document.getElementById("unitSelect").value;

                document.getElementById("productSelect").value = "";
                document.getElementById("description").value = "";
                document.getElementById("item").value = "";
                document.getElementById("quantity").value = "";
                document.getElementById("unitSelect").value = "";

                selectedRow.classList.remove("selected");
            } else {
                var productSelect = document.getElementById("productSelect");
                var selectedOption = productSelect.options[productSelect.selectedIndex];
                var description = selectedOption.getAttribute("data-description");
                var item = selectedOption.getAttribute("data-item");
                var quantityInput = document.getElementById("quantity").value;
                var unit = document.getElementById("unitSelect").value;

                var newRow = "<tr>" +
                                "<td></td>" +
                                "<td>" + selectedOption.text + "</td>" +
                                "<td><input type='text' name='quotation_description[]' value='" + description + "' readonly></td>" +
                                "<td><input type='text' name='quotation_item[]' value='" + item + "' readonly></td>" +
                                "<td><input type='number' name='quotation_qty[]' value='" + quantityInput + "'></td>" +
                                "<td><input type='text' name='quotation_unit[]' value='" + unit + "' readonly></td>" +
                                "<td></td>" +
                                "<td></td>" +
                                "<td><img src='https://img.icons8.com/ios/50/000000/delete.png' alt='Delete Icon' style='width: 20px; height: 20px; text-align:center;' onclick='deleteRow(this)'></td>" +
                            "</tr>";

                document.getElementById("tableBody").innerHTML += newRow;
            }
        }
    </script>



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

            appendHiddenInput('quotation_product[]', rowData.productId);
            appendHiddenInput('quotation_description[]', rowData.description);
            appendHiddenInput('quotation_item[]', rowData.itemNumber);
            appendHiddenInput('quotation_qty[]', rowData.quantity);
            appendHiddenInput('quotation_unit[]', rowData.unit);
            appendHiddenInput('quotation_uprice[]', rowData.unitPrice);
            appendHiddenInput('quotation_amount[]', rowData.amount);

            var newRow = document.createElement('tr');
            newRow.innerHTML = "<td><img src='img/" + selectedOption.getAttribute('data-img') + "' alt='Product Image'></td>" +
                "<td>" + selectedOption.text + "</td>" +
                "<td>" + selectedOption.getAttribute('data-description') + "</td>" +
                "<td>" + selectedOption.getAttribute('data-item') + "</td>" +
                "<td>" + quantity + "</td>" +
                "<td>" + unit + "</td>" +
                "<td>" + price.toFixed(2) + "</td>" +
                "<td class='amount'>" + amount.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' }) + "</td>" +
                "<td><img src='https://img.icons8.com/ios/50/000000/delete.png' alt='Delete Icon' style='width: 20px; height: 20px; text-align:center;' onclick='deleteRow(this)'></td>";


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

        function deleteRow(imgElement) {
            var row = imgElement.parentNode.parentNode;
            row.parentNode.removeChild(row);
            updateTotals();
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
            document.getElementById('grandTotalInput').value = grandTotal.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
        }
    </script>
</body>
</html>
