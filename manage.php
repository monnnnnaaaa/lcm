<?php
require 'db_conn.php';

$select = mysqli_query($conn, "SELECT * FROM quotation_list");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM quotation_list WHERE id = $id");
    header('location: manage.php');
}


$quotationProducts = array();

while ($row = mysqli_fetch_assoc($select)) {
    $quotationNum = $row['quotation_num'];
    
    // Check if this quotation number already exists in the array
    if (!isset($quotationProducts[$quotationNum])) {
        // If not, create a new array for this quotation number
        $quotationProducts[$quotationNum] = array();
    }
    
    // Add the current product to the array for this quotation number
    $quotationProducts[$quotationNum][] = $row;
}

$prevQuotationNum = null;
$prevQuotationFor = null;
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
    <link rel="stylesheet" href="css/button.css">
</head>

<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>       
    
    <div class="container-product-manage bg-white" id="productContainerManage">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-white">Quotation Information</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Quotation num</th>
                                <th>Quotation for</th>
                                <th>Billing Address</th>
                                <th class="th-img">Image</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Item ID#</th>
                                <th>QTY</th>
                                <th>Unit</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                                <th>Sub-Total</th>
                                <th>Vat</th>
                                <th>Charge</th>
                                <th>Grand Total</th>
                                <th>Quotation date</th>
                                <th>Quotation expires</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Quotation num</th>
                                <th>Quotation for</th>
                                <th>Billing Address</th>
                                <th class="th-img">Image</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Item ID#</th>
                                <th>QTY</th>
                                <th>Unit</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                                <th>Sub-Total</th>
                                <th>Vat</th>
                                <th>Charge</th>
                                <th>Grand Total</th>
                                <th>Quotation date</th>
                                <th>Quotation expires</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php 
    // Iterate over $quotationProducts to display products grouped by quotation number
    foreach ($quotationProducts as $quotationNum => $products) {
        foreach ($products as $product) {
?>
            <tr>
                <td><?php echo $quotationNum; ?></td>
                <td><?php echo $product['quotation_for']; ?></td>
                <td><?php echo $product['quotation_billing']; ?></td>
                <td><img src='img/<?php echo $product['quotation_pimage']; ?>' height='100' alt=''></td>
                <td><?php echo $product['quotation_item']; ?></td>
                <td><?php echo $product['quotation_description']; ?></td>
                <td><?php echo $product['quotation_product']; ?></td>
                <td><?php echo $product['quotation_qty']; ?></td>
                <td><?php echo $product['quotation_unit']; ?></td>
                <td><?php echo $product['quotation_uprice']; ?></td>
                <td><?php echo $product['quotation_amount']; ?></td>
                <td><?php echo str_replace('₱', '', $product['quotation_stotal']); ?></td>
                <td><?php echo str_replace('₱', '', $product['quotation_vat']); ?></td>
                <td><?php echo str_replace('₱', '', $product['quotation_charge']); ?></td>
                <td><?php echo str_replace('₱', '', $product['quotation_grandtotal']); ?></td>
                <td><?php echo $product['quotation_date']; ?></td>
                <td><?php echo $product['quotation_expires']; ?></td>
                <td>
                    <a href='update-quotation.php?id=<?php echo $product['id']; ?>' class='btn btn-success btn-block mb-1'><i class='fas fa-edit'></i> EDIT </a>
                    <a href='manage.php?delete=<?php echo $product['id']; ?>' class='btn btn-danger btn-block '><i class='fas fa-trash'></i> DELETE </a>
                    <a href='download-pdf.php?id=<?php echo $product['id']; ?>' class='btn btn-danger btn-block '><i class='fas fa-download'></i> DOWNLOAD </a>
                </td>
            </tr>
<?php 
        }
    }
?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>
</html>
