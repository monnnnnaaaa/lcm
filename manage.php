<?php
require 'db_conn.php';

$select = mysqli_query($conn, "SELECT * FROM quotation_list");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM quotation_list WHERE id = $id");
    header('location: manage.php');
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
                            while ($row = mysqli_fetch_assoc($select)) {
                                if ($row['quotation_num'] !== $prevQuotationNum || $row['quotation_for'] !== $prevQuotationFor) {
                                    echo "<tr>";
                                    echo "<td>{$row['quotation_num']}</td>";
                                    echo "<td>{$row['quotation_for']}</td>";
                                    echo "<td>{$row['quotation_billing']}</td>";
                                    echo "<td><img src='img/{$row['quotation_pimage']}' height='100' alt=''></td>";
                                    echo "<td>{$row['quotation_product']}</td>";
                                    echo "<td>{$row['quotation_description']}</td>";
                                    echo "<td>{$row['quotation_item']}</td>";
                                    echo "<td>{$row['quotation_qty']}</td>";
                                    echo "<td>{$row['quotation_unit']}</td>";
                                    echo "<td>{$row['quotation_uprice']}</td>";
                                    echo "<td>{$row['quotation_amount']}</td>";
                                    echo "<td>{$row['quotation_stotal']}</td>";
                                    echo "<td>{$row['quotation_vat']}</td>";
                                    echo "<td>{$row['quotation_charge']}</td>";
                                    echo "<td>{$row['quotation_grandtotal']}</td>";
                                    echo "<td>{$row['quotation_date']}</td>";
                                    echo "<td>{$row['quotation_expires']}</td>";
                                    echo "<td>";
                                    echo "<a href='update-quotation.php?id={$row['id']}' class='btn btn-success btn-block mb-1'><i class='fas fa-edit'></i> EDIT </a>";
                                    echo "<a href='manage.php?delete={$row['id']}' class='btn btn-danger btn-block '><i class='fas fa-trash'></i> DELETE </a>";
                                    echo "</td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr>";
                                    echo "<td colspan='3'></td>"; 
                                    echo "<td><img src='img/{$row['quotation_pimage']}' height='100' alt=''></td>";
                                    echo "<td>{$row['quotation_product']}</td>";
                                    echo "<td>{$row['quotation_description']}</td>";
                                    echo "<td>{$row['quotation_item']}</td>";
                                    echo "<td>{$row['quotation_qty']}</td>";
                                    echo "<td>{$row['quotation_unit']}</td>";
                                    echo "<td>{$row['quotation_uprice']}</td>";
                                    echo "<td>{$row['quotation_amount']}</td>";
                                    echo "<td>{$row['quotation_stotal']}</td>";
                                    echo "<td>{$row['quotation_vat']}</td>";
                                    echo "<td>{$row['quotation_charge']}</td>";
                                    echo "<td>{$row['quotation_grandtotal']}</td>";
                                    echo "<td>{$row['quotation_date']}</td>";
                                    echo "<td>{$row['quotation_expires']}</td>";
                                    echo "<td colspan='7'></td>"; 
                                }
                                
                                $prevQuotationNum = $row['quotation_num'];
                                $prevQuotationFor = $row['quotation_for'];
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
