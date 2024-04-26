<div id="wrapper">
<ul class="navbar-nav sidebar sidebar-dark accordion overflow-y" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">LCM QUOTATION<div>
    </a>

    <hr class="sidebar-divider my-0">
     <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>


    <li class="nav-item dropdown">
        <a class="nav-link" href="" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-bars"></i>
            <span>Quotation</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
            <a class="dropdown-item" href="./manage.php">Manage Quatation</a>
            <a class="dropdown-item" href="./create.php">Create Quatation </a>
        </div>
    </li>

    <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="productDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-toolbox"></i>
        <span>Product</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="productDropdown">
        <a class="dropdown-item" href="./all-product.php">All Products</a>
        <a class="dropdown-item" href="./add-product.php">Add Products</a>
        <a class="dropdown-item" href="./manage-product.php">Manage Products</a>
    </div>
</li>

<!-- <li class="nav-item">
        <a class="nav-link" href="./customer.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer</span></a>
    </li>
</li> -->

<li class="nav-item dropdown">
    <a class="nav-link" href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-user"></i>
        <span>Customer</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="./customer.php">All Customer</a>
        <a class="dropdown-item" href="./add-customer.php">Add Customer</a>
    </div>
</li>

<li class="nav-item dropdown">
    <a class="nav-link" href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-user"></i>
        <span>User</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="./all-user.php">All Users</a>
        <a class="dropdown-item" href="./add-user.php">Add Users</a>
    </div>
</li>


    <a href="logout.php" class="logout-btn ml-3">Logout</a>
</ul>

<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <form
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            </form>

            <ul class="navbar-nav ml-auto bg-white">
            </ul>

        </nav>
      