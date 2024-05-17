<?php

require 'db_conn.php';

session_start();

if (!isset($_GET['edit'])) {
    echo "User ID is not provided.";
    exit;
}

$id = $_GET['edit'];

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $select_user = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $user = mysqli_fetch_assoc($select_user);
    $_SESSION['edit_user'] = $user;

    var_dump($_SESSION['edit_user']);
}


if (isset($_POST['update_user'])) {

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    if (empty($user_name) || empty($password) || empty($name)) {
        echo '<script>alert("Please fill out all fields");</script>';
    } else {

        $update = "UPDATE users SET user_name='$user_name', password='$password', name='$name' WHERE id = $id";

        $upload = mysqli_query($conn, $update);

        if ($upload) {
            header('location: all-user.php');
            exit;
        } else {
            echo '<script>alert("Could not update the user");</script>';
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
    
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-h3">User Information</h3>
                </div>
                <div class="panel-body form-group form-group-sm">
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?edit=' . $id; ?>" method="post" id="add_product">
                        <input type="hidden" name="action" value="add_product">

                        <div class="row">
                            <div class="col-xs-4 ml-5">
                                <h6>Enter Name</h6>
                                <input type="text" class="form-control required"  name="name" value="<?php echo $user['name']; ?>"
                                    placeholder="Enter Name" >
                            </div>
                            <div class="col-xs-4">
                                <h6>Enter Username</h6>
                                <input type="text" class="form-control required" name="user_name" value="<?php echo $user['user_name']; ?>"
                                    placeholder="Enter Username">
                            </div>
                            <div class="col-xs-4 ml-1">
                                <h6>Enter Password</h6>
                                <input type="password" class="form-control required" name="password" value="<?php echo $user['password']; ?>"
                                    placeholder="Enter Password">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 btn-group ">
                                    <input type="submit" id="action_add_product" name="update_user" class="btn btn-success float-right mr-2" value="Update Product" data-loading-text="Adding...">
                                    <a href="all-user.php" class="btn btn-primary float-right">Go Back</a>
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
