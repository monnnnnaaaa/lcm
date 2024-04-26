<?php
require 'db_conn.php';

if(isset($_POST['submit'])){
    $customer_name = $_POST['customer_name'];
    $customer_num = $_POST['customer_num'];
    $address = $_POST['address'];
    
    if(empty($customer_name) || empty($customer_num) || empty($customer_num)){
        echo '<script>alert("Please fill out all fields");</script>';
    }else{
        $insert = "INSERT INTO customer (customer_name, customer_num, address) 
        VALUES ('$customer_name', '$customer_num', '$address')";
        $upload = mysqli_query($conn, $insert);

        if($upload){
            echo '<script>alert("New customer added successfully!!");</script>';
        }else{
            echo '<script>alert("Could not add the customer");</script>';  
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
                    <form method="post" id="add_product">
                        <input type="hidden" name="action" value="add_product">

                        <div class="row">
                            <div class="col-xs-4 ml-5">
                                <input type="text" class="form-control required"  name="customer_name"
                                    placeholder="Enter Customer Name" >
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="customer_num"
                                    placeholder="Enter Customer Number">
                            </div>
                            <div class="col-xs-4 ml-1">
                                <input type="text" class="form-control required" name="address"
                                    placeholder="Enter Customer Address">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 btn-group ml-2 ">
                                    <input type="submit" id="action_add_product" 
                                        class="btn btn-success float-right" name="submit" value="Add Customer"
                                        data-loading-text="Adding...">
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