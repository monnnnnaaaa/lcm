var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

function openModal(product) {
    modal.style.display = "block";
    var modalContent = modal.querySelector(".selected-product tbody");

    modalContent.innerHTML = "";

    var newRow = document.createElement("tr");
    newRow.innerHTML = `
        <td><img src="img/${product.product_img}" alt="Product Image"></td>
        <td>${product.product_name}</td>
        <td>${product.product_id}</td>
        <td>${product.product_description}</td>
    `;
    modalContent.appendChild(newRow);
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var selectButtons = document.querySelectorAll(".select-product");
selectButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        var product = JSON.parse(this.getAttribute("data-product"));
        openModal(product);
    });
});

    // button
    document.getElementById("addButton").addEventListener("click", function() {
        var newRow = document.querySelector("tbody tr").cloneNode(true);
        newRow.querySelectorAll("input[type='text']").forEach(function(input) {
            input.value = "";
        });
        newRow.querySelector("input[type='number']").value = "1";   
        document.querySelector("tbody").appendChild(newRow);
    }); 


    // computation


    document.addEventListener('DOMContentLoaded', function() {
    var selectButtons = document.querySelectorAll('.select-product');
    var table = document.querySelector('table');
    var existingProductLink = document.querySelector('.existing-product-link');
    var modal = document.getElementById('myModal');
    var closeButton = modal.querySelector('.close');
    var subTotalInput = document.getElementById('subTotalInput');
    var vatInput = document.querySelector('input[name="vat"]');
    var chargesSelect = document.getElementById('chargesSelect');
    var chargeInput = document.getElementById('chargeInput');
    var grandTotalInput = document.querySelector('input[name="grand_total"]');



    existingProductLink.addEventListener('click', function(event) {
    event.preventDefault();
    modal.style.display = 'block';
    });

    closeButton.addEventListener('click', function() {
    modal.style.display = 'none';
    });

    function formatNumber(number) {
    return number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    function calculateAmount(row) {
    var quantity = parseFloat(row.querySelector('[name="qty"] input').value);
    var unitPrice = parseFloat(row.querySelector('[name="unit_price"] input').value);
    var amount = quantity * unitPrice;
    row.querySelector('[name="amount"]').textContent = formatNumber(amount);
    updateSubTotal();
    }

    function updateSubTotal() {
    var total = 0;
    var amountFields = document.querySelectorAll('[name="amount"]');
    amountFields.forEach(function(amountField) {
        total += parseFloat(amountField.textContent.replace(/,/g, ''));
    });
    subTotalInput.value = formatNumber(total);
    calculateVAT();
    calculateGrandTotal();
    }

    function calculateVAT() {
    var subTotal = parseFloat(subTotalInput.value.replace(/,/g, ''));
    if (!isNaN(subTotal)) {
        var vat = subTotal * 0.07;
        vatInput.value = formatNumber(vat);
    } else {
        vatInput.value = '';
    }
    }

    function calculateGrandTotal() {
    var subTotal = parseFloat(subTotalInput.value.replace(/,/g, ''));
    var vat = parseFloat(vatInput.value.replace(/,/g, ''));
    var charges = parseFloat(chargeInput.value.replace(/,/g, ''));
    var grandTotal = subTotal + vat + charges;
    grandTotalInput.value = formatNumber(grandTotal);
    }

    subTotalInput.addEventListener('input', function() {
    calculateVAT();
    calculateGrandTotal();
    });

    chargeInput.addEventListener('input', function() {
    calculateGrandTotal();
    });

    chargesSelect.addEventListener('change', function() {
    if (this.value === 'delivery_fee') {
        chargeInput.value = '5,000.00';
    } else if (this.value === 'labor_install') {
        var subTotal = parseFloat(subTotalInput.value.replace(/,/g, ''));
        var laborInstallation = subTotal * 0.2; // Calculate labor installation as 20% of sub-total
        chargeInput.value = formatNumber(laborInstallation);
    } else {
        chargeInput.value = '';
    }
    calculateGrandTotal();
    });


    selectButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        var productData = JSON.parse(button.dataset.product);
        var newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="checkbox" class="expand-row-btn" id="checkboxId"></td>
            <td><img src="img/${productData.product_img}" alt="Product Image"></td>
            <td>${productData.product_name}</td>
            <td>${productData.product_description}</td>
            <td>${productData.product_id}</td>
            <td contenteditable="true" class="small-qty" name="qty"><input type="number" class="editable" value="1"></td>
            <td contenteditable="true" name="unit">
                <select class="unit-select">
                    <option value="pcs">pcs</option>
                    <option value="kg">kg</option>
                    <option value="box">box</option>
                </select>
            </td>
            <td contenteditable="true" name="unit_price"><input type="number" name="unit_price" class="editable" value="${productData.product_price}"></td>
            <td contenteditable="false" class="unit-price" name="amount">0.00</td>
        `;
        newRow.querySelector('[name="qty"] input').addEventListener('input', function() {
            calculateAmount(newRow);
        });
        var tableBody = table.querySelector('tbody');
        tableBody.parentNode.insertBefore(newRow, tableBody.nextSibling);
        modal.style.display = 'none';
        calculateAmount(newRow);
    });
    });

    closeButton.addEventListener('click', function() {
    modal.style.display = 'none';
    });

    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
    }
    });


    function searchProduct() {
    var input, filter, table, tr, tdName, tdId, i, txtValueName, txtValueId;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("productTableBody");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
    tdName = tr[i].getElementsByTagName("td")[1]; // Index 1 for product name
    tdId = tr[i].getElementsByTagName("td")[3]; // Index 3 for product ID
    if (tdName && tdId) {
        txtValueName = tdName.textContent || tdName.innerText;
        txtValueId = tdId.textContent || tdId.innerText;
        if (txtValueName.toUpperCase().indexOf(filter) > -1 || txtValueId.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
    }
    }