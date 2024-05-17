<?php
session_start();

require 'db_conn.php';

$select = mysqli_query($conn, "SELECT * FROM users");

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    header('location: all-user.php');
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select_user = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_assoc($select_user);
    $_SESSION['edit_user'] = $user;
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

    <div class="container-product-manage bg-white" id="productContainerManage">
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
                    <form method="POST" action="add.php"> 
                        <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Action</th>                                
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Action</th>     
                                </tr>
                            </tfoot>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM users");

                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>  
                                
                                <th><?php echo $row['id']; ?></th>
                                <th><?php echo $row['name']; ?></th>
                                <th><?php echo $row['user_name']; ?></th>
                                <th>
                                    <a href="edit-user.php?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-block mb-1"> <i class="fas fa-edit"></i> EDIT </a>
                                    <a href="all-user.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-block "> <i class="fas fa-delete"></i> DELETE </a>
                                </th>   
                                <!-- <th>
                                    <a href="admin-update.php?edit=<?php echo $row['id']; ?>" class="btn btn-success btn-block mb-1"> <i class="fas fa-edit"></i> EDIT </a>
                                    <a href="manage-product.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-block "> <i class="fas fa-delete"></i> DELETE </a>
                                </th> -->
                            </tr>
                        <?php
                            }
                        ?>
                        </thead>
                    
                    </form>  
                    
                </div>
            </div>
        </div>  
    </div>    

    <script src="js/user.js"></script>      
</body>
</html>
