<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quotation | Manage</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>
            
     <div class="container-product-manage bg-white" id="productContainerManage">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-1 font-weight-bold text-white">Manage Quotation</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Region team</th>
                                <th>Item #</th>
                                <th>Description</th>
                                <th>QTY</th>
                                <th>Unit</th>
                                <th>Unite Price</th>
                                <th>Amount</th>
                                <th>Total</th>
                                
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php
                            include 'db_operations.php';
                            
                            $quotations = getAllQuotations();
                            
                        
                            foreach ($quotations as $quotation) {
                                echo "<tr>";
                                echo "<td>{$quotation['quotation_id']}</td>";
                                echo "<td>{$quotation['customer_id']}</td>";
                              
                                echo "<td>{$quotation['issue_date']}</td>";
                                echo "<td>{$quotation['due_date']}</td>";
                                echo "<td>{$quotation['status']}</td>";
                                echo "<td>";
                                echo "<div><u>Edit</u></div>";
                                echo "<div><u>Delete</u></div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="js/products.js"></script>
    
</body>
</html>
