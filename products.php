<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LCM</title>

    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center mb-1">
                        <h1 class="h3 mb-0 text-primary">Product List</h1>
                        <div class="ml-auto mt-3">
                            <button type="button" class="btn btn-primary mr-2"
                                onclick="toggleContainer('productContainer')">All products</button>
                            <button type="button" class="btn btn-secondary mr-2"
                                onclick="toggleContainer('productContainerAdd')">Add products</button>
                            <button type="button" class="btn btn-success"
                                onclick="toggleContainer('productContainerManage')">Manage products</button>
                        </div>
                    </div>
                </div>

                <div class="container-product bg-white" id="productContainer">
                    <div class="search-box">
                        <select class="category" id="searchDropdown" onchange="filterProducts()">
                            <option value="all">All</option>
                            <option value="category1">Fire Fighting Equipment</option>
                            <option value="category2">Fire Fighting Hardware</option>
                        </select>
                        <input type="text" id="searchInput" placeholder="Search products...">
                    </div>
                    <div class="products">
                        <div class="product category1" id="1212">
                            <div class="product-info">
                                <h2 class="text-3xl font-extrabold text-black">QD YD SR Fire Helmet (China)</h2>
                                <p><i><b>ID# 1212</b></i></p>
                                <p><b>Price: 5,500</b></p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla dolore earum,
                                    reiciendis fuga iste veritatis consequuntur cumque ratione quasi? Vero et accusamus
                                    nobis delectus autem debitis maxime odio dolor at.</p>
                                <br>
                                <button class="copy-btn" onclick="copyContent()">Copy</button>
                            </div>
                            <div class="product-image">
                                <img src="./img/images-products/1211.jpg" alt="QD YD SR Fire Helmet (China)">
                            </div>
                        </div>

                        <div class="product category2" id="2371">
                            <div class="product-info">
                                <h2 class="text-3xl font-extrabold text-black"> QD Fire Fighting Helmet</h2>
                                <p><i><b>ID# 2371</b></i></p>
                                <p><b>Price: 5,500</b></p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident neque placeat
                                    iste eaque, molestias atque, nisi est ab similique et itaque dolorum sapiente quia
                                    voluptate, magni consequuntur eligendi? Eaque, et.</p>
                                <br>
                                <button class="copy-btn" onclick="copyContent()">Copy</button>
                            </div>
                            <div class="product-image">
                                <img src="./img/images-products/2371.webp" alt="QD Fire Fighting Helmet">
                            </div>
                        </div>

                        <div class="product category1" id=" 1211">
                            <div class="product-info">
                                <h2 class="text-3xl font-extrabold text-black">Pacific F6 Fire Helmet, made in New
                                    Zealand</h2>
                                 <p><i><b>ID# 1211</b></i></p>
                                <p><b>Price: 25,900</b></p>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum, laboriosam
                                    veritatis, nulla debitis at id architecto accusantium sunt laudantium quis nostrum,
                                    quaerat amet? Sunt ducimus molestiae id blanditiis eligendi nam!</p>
                                <br>
                                <button class="copy-btn" onclick="copyContent()">Copy</button>
                            </div>
                            <div class="product-image">
                                <img src="./img/images-products/1211.jpg"
                                    alt="Pacific F6 Fire Helmet, made in New Zealand">
                            </div>
                        </div>
                    </div>
                    <div id="noResults" style="display: none; margin: 20px;"> No products found. </div>
                </div>

                <div class="container-product-add bg-white  " id="productContainerAdd" style="display: none;">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-h3">Product Information</h3>
                                </div>
                                <div class="panel-body form-group form-group-sm">
                                    <form method="post" id="products.php">
                                        <input type="hidden" name="action" value="add_product">

                                        <div class="row">
                                            <div class="col-xs-4 ml-5">
                                                <input type="text" class="form-control required" name="name"
                                                    placeholder="Enter Product Name">
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control required" name="product_id"
                                                    placeholder="Enter Product ID#">
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control required" name="price"
                                                    placeholder="Enter Product Price">
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" class="form-control required" name="description"
                                                    placeholder="Enter Product Description">
                                            </div>

                                            <div class="col-xs-4">
                                                <select class="form-control required" name="category" id="categoryDropdown">
                                                    <option value="category1">Fire Fighting Equipment</option>
                                                    <option value="category2">Fire Fighting Hardware</option>
                                                </select>
                                            </div>

                                            <div class="col-xs-4">
                                                <input type="file" class="form-control required" name="image" accept="image/*">
                                            </div>


                                            <div class="row">
                                                <div class="col-xs-12 btn-group ">
                                                    <input type="submit" id="action_add_product" name="add"
                                                        class="btn btn-success float-right" value="Add Product"
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
                   
                    <?php
					include('conn.php');
					$query=mysqli_query($conn,"select * from `products`");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['product_id']; ?></td>
							<td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['description']; ?></td>
							<td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['image_path']; ?></td>
							<td>
								<a href="edit.php?id=<?php echo $row['userid']; ?>">Edit</a>
								<a href="delete.php?id=<?php echo $row['userid']; ?>">Delete</a>
							</td>
						</tr>
						<?php
					}
				   ?>
        </div>

                <div class="container-product-manage bg-white" id="productContainerManage" style="display: none;">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-white">Product Information</h6>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <form method="POST" action="add.php">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Item ID#</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Product</th>
                                            <th>Item ID#</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        include('conn.php');
                                    
                                        $firstname=$_POST['name'];
                                        $lastname=$_POST['product_id'];
                                        $firstname=$_POST['price'];
                                        $lastname=$_POST['description'];
                                        $firstname=$_POST['category'];
                                        $lastname=$_POST['image_path'];
                                        
                                        mysqli_query($conn,"insert into `products` (name,product_id,price,description,category,image_path) values ('$firstname','$lastname')");
                                        // header('location:products.php');
                                    
                                    ?>
                                  </tbody>
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