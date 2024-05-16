<?php
require 'db_conn.php';

$select = mysqli_query($conn, "SELECT * FROM product");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM product WHERE id = $id");
    header('location: manage-product.php');
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
                <h6 class="m-1 font-weight-bold text-white">Product Information</h6>
            </div>
            <div class="card-body">

                <div class="table-responsive" >
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <form method="POST" action="add.php">
                        <thead>
                            <tr>
                                <th class="th-img">Image</th>
                                <th>Product Name</th>
                                <th>Item ID#</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Item ID#</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <?php
                            $result = mysqli_query($conn, "SELECT * FROM product");

                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>  
                                <th><img src="img/<?php echo $row['product_img'];?>" height=100 alt=""></th>
                                <th><?php echo $row['product_name']; ?></th>
                                <th><?php echo $row['product_id']; ?></th>
                                <th><?php echo $row['product_price']; ?></th>
                                <th><?php echo $row['product_description']; ?></th>
                                <th><?php echo $row['product_category']; ?></th>
                                <th>
                                    <a href="admin-update.php?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-block mb-1"> <i class="fas fa-edit"></i> EDIT </a>
                                    <a href="manage-product.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-block "> <i class="fas fa-delete"></i> DELETE </a>
                                </th>
                            </tr>
                        <?php
                            }
                        ?>
                    </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="js/products.js"></script>
</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              