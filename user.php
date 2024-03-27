<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>System User</title>
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
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center mb-1">
                        <h1 class="h3 mb-0 text-primary">System User</h1>
                        <div class="ml-auto mt-3">
                            <button type="button" class="btn btn-secondary mr-2"
                                onclick="toggleContainer('productContainerAdd')">Add User</button>
                            <button type="button" class="btn btn-success"
                                onclick="toggleContainer('productContainerManage')">Manage Users</button>
                        </div>
                    </div>
                </div>
</div>

                

                <div class="container-product-add bg-white  " id="productContainerAdd" style="display: none;">
                    <!-- Product content goes here -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-h3">User Information</h3>
                                </div>
                                <div class="panel-body form-group form-group-sm">
                                    <form method="post" id="add_product">
                                        <input type="hidden" name="action" value="add_product">

                                        <div class="row">
                                            <div class="col-xs-4 ml-5">
                                                <input type="text" class="form-control required"  name="product_name"
                                                    placeholder="Enter First Name" >
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control required" name="product_desc"
                                                    placeholder="Enter Last Name">
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control required" name="product_desc"
                                                    placeholder="Enter Username">
                                            </div>
                                            <div class="col-xs-4 ml-1">
                                                <input type="text" class="form-control required" name="product_desc"
                                                    placeholder="Enter Password">
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12 btn-group ml-2 ">
                                                    <input type="submit" id="action_add_product"
                                                        class="btn btn-success float-right " value="Add User"
                                                        data-loading-text="Adding...">
                                                </div>
                                            </div>
                                        </div>                                
                                    </form>
                                </div>
                            </div>
                        </div>
                    <div>
                </div>
            </div> 
        </div>

                <div class="container-product-manage bg-white" id="productContainerManage" style="display: none;">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-white">User Information</h6>
                            <div class="search-box-customer d-flex align-items-center ">
                                <input type="text" class="mr-2" id="searchInputUser" placeholder="Search user..." onkeyup="searchUser()">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Melanie Lopez</td>
                                            <td>09123457910</td>
                                            <td>lopez.m</td>
                                            <td>melanie@gmail.com</td>
                                            <td>**********</td>
                                            <td> <div> <u>Edit</u> </div>
                                                <div> <u>Delete</u> </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Monica</td>
                                            <td>09003457910</td>
                                            <td>ocampo.m</td>
                                            <td>monica@gmail.com</td>
                                            <td>**********</td>
                                            <td> <div> <u>Edit</u> </div>
                                                <div> <u>Delete</u> </div>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>    

                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/products.js"></script>      
</body>
</html>