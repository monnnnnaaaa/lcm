<?php
session_start();
require 'db_conn.php';

if (!isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}

$user_name = $_SESSION['name'];

$product_count_query = "SELECT COUNT(*) AS total_products FROM product";
$product_count_result = mysqli_query($conn, $product_count_query);
$total_products = 0;
if ($product_count_result) {
    $product_count_row = mysqli_fetch_assoc($product_count_result);
    $total_products = $product_count_row['total_products'];
}

$customer_count_query = "SELECT COUNT(*) AS total_customers FROM customer";
$customer_count_result = mysqli_query($conn, $customer_count_query);
$total_customers = 0;
if ($customer_count_result) {
    $customer_count_row = mysqli_fetch_assoc($customer_count_result);
    $total_customers = $customer_count_row['total_customers'];
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php
    include './sidebar.php';
    ?>

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center  mb-1 ">
            <h1 class="h3 mb-0 text-primary ">Dashboard </h1> <br>
            <h6 class="h6-back">Welcome back, <?php echo $user_name;?> </h6>

        </div>

        <div class="row mb-3 mt-1">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-70 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-3x text-black-300 mt-2"></i>
                            </div>
                            <div class="col  mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> </div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        TOTAL QUOTATION
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-70 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-3x text-black-300 mt-2"></i>
                            </div>
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_products; ?></div>
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        TOTAL PRODUCTS
                                    </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-70 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <i class="fas fa-comments fa-3x text-black-300 mt-2"></i>
                            </div>
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_customers; ?> </div>
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        TOTAL CUSTOMER
                                    </div>                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>
</html>