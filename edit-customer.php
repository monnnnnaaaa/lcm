<?php

require 'db_conn.php';

session_start();

if (!isset($_GET['edit'])) {
    echo "Customer ID is not provided.";
    exit;
}

$id = $_GET['edit'];

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select_customer = mysqli_query($conn, "SELECT * FROM customer WHERE id = $id");
    $customer = mysqli_fetch_assoc($select_customer);
    $_SESSION['edit_customer'] = $customer;

    var_dump($_SESSION['edit_customer']);
}


if (isset($_POST['update_customer'])) {

    $customer_name = $_POST['customer_name'];
    $customer_num = $_POST['customer_num'];
    $address = $_POST['address'];

    if (empty($customer_name) || empty($customer_num) || empty($address)) {
        echo '<script>alert("Please fill out all fields");</script>';
    } else {

        $update = "UPDATE customer SET customer_name='$customer_name', customer_num='$customer_num', address='$address' WHERE id = $id";

        $upload = mysqli_query($conn, $update);

        if ($upload) {
            header('location: customer.php');
            exit;
        } else {
            echo '<script>alert("Could not update the customer");</script>';
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

    <title>Add Customer</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-h3">Customer Information</h3>
                </div>
                <div class="panel-body form-group form-group-sm">
                <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $id; ?>" method="post" id="add_product">
                        <input type="hidden" name="action" value="add_product">

                        <div class="row">
                            <div class="col-xs-4 ml-5">
                                <input type="text" class="form-control required"  name="customer_name" value="<?php echo $customer['customer_name']; ?>"
                                    placeholder="Enter Customer Name" >
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="customer_num" value="<?php echo $customer['customer_num']; ?>"
                                    placeholder="Enter Customer Number">
                            </div>
                            <div class="col-xs-4 ml-1">
                                <input type="text" class="form-control required" name="address" value="<?php echo $customer['address']; ?>"
                                    placeholder="Enter Customer Address">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 btn-group ">
                                    <input type="submit" id="action_add_product" name="update_customer" class="btn btn-success float-right mr-2" value="Update Product" data-loading-text="Adding...">
                                    <a href="customer.php" class="btn btn-primary float-right">Go Back</a>
                                </div>
                            </div>
                        </div>                                
                    </form>
                </div>
            </div>
        </div>
    <div>
    <script src="js/user.js"></script>      
    
</body>
</html>