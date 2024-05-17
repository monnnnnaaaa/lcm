<?php
require 'db_conn.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    
    if(empty($name) || empty($user_name) || empty($password)){
        echo '<script>alert("Please fill out all fields");</script>';
    }else{
        $insert = "INSERT INTO users (name, user_name, password) 
        VALUES ('$name', '$user_name', '$password')";
        $upload = mysqli_query($conn, $insert);

        if($upload){
            echo '<script>alert("New user added successfully!!");</script>';
        }else{
            echo '<script>alert("Could not add the user");</script>';  
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
                    <form method="post" id="add_product">
                        <input type="hidden" name="action" value="add_product">

                        <div class="row">
                            <div class="col-xs-4 ml-5">
                                <input type="text" class="form-control required"  name="name"
                                    placeholder="Enter Name" >
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control required" name="user_name"
                                    placeholder="Enter Username">
                            </div>
                            <div class="col-xs-4 ml-1">
                                <input type="password" class="form-control required" name="password"
                                    placeholder="Enter Password">
                            </div>

                            <div class="row">
                                <div class="col-xs-12 btn-group ml-2 ">
                                    <input type="submit" id="action_add_product" 
                                        class="btn btn-success float-right" name="submit" value="Add User"
                                        data-loading-text="Adding...">
                                        <a href="all-user.php"></a>
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