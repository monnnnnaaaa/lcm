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

</head>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
<body id="page-top">
    <?php
    require 'sidebar.php';
    ?>

    
    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-h3">Create New Quotation</h3>
                </div>
                <div class="panel-body form-group form-group-sm">
                    <form method="post" id="add_product">
                        <input type="hidden" name="action" value="add_product">

                        <div class="row">
                            <div class="col-xs-4 ml-5">
                                <input type="text" class="form-control required" name="product_name" placeholder="Enter Product Name">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_desc" placeholder="Enter Product ID#">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_desc" placeholder="Enter Product Description">
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="product_desc" placeholder="Enter Product Description">
                            </div>
                            <div class="col-xs-4">
                                <input type="date" name="start_date" id="">
                            </div>
                            <div class="col-xs-4">
                                <input type="date" name="due_date" id="">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 btn-group">
                                    <input type="submit" id="action_add_product" class="btn btn-success float-right" value="Add Product" data-loading-text="Adding...">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
    </div>

    
    <script src="js/products.js"></script>
    
</body>
</html>
