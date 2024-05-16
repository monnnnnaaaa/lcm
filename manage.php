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
    <style>
    button {
       
        padding: 7px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    th.number-column, td.number-column {
        width: 70%; /* Adjust this value as needed */
    }

    
</style>
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
                                <th>Name</th>
                                <th class="number-column">Number</th> <!-- Add class to target this column -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td rowspan="3">Monica</td>
                            <td class="number-column">1</td> <!-- Add class to target this column -->
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>
                        <tr>
                            <td class="number-column">2</td> <!-- Add class to target this column -->
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>
                        <tr>
                            <td class="number-column">3</td> <!-- Add class to target this column -->
                            <td><button>Edit</button> <button>Delete</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="js/products.js"></script>
    
</body>
</html>
