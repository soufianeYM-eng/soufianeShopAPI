<?php session_start()


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soufiane Shop | Woocommerce API</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <div class="form-inline" style="text-align:right;">
                <form method="POST" action="indexproduct.php" class="form-group" style="float:right;">
                    <div class="col-auto">
                        <input id="id" type="text" name="ID" class="form-control mr-2" placeholder="Entrer ID du produit" />
                        <button class="btn btn-primary" name="search" style="float:right;" type="submit">Chercher</button>
                    </div>
                </form>
            </div>
            <div class="form-inline" style="margin:auto;float:right;">
                <a href="../../models/close.php"><button class="btn btn-outline-danger">Fermer la session</button></a>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../../images/SoufSHOP.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;height: 20px;">
                <span class="brand-text font-weight-light">Soufiane Shop</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Soufiane Yousfi Mghari</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="http://localhost:8070/soufianeShopAPI/views/products/index.php" class="nav-link">
                                <i class="fas fa-archive"></i>
                                <p>
                                    Produits
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost:8070/soufianeShopAPI/views/categories/index.php" class="nav-link">
                                <i class="fas fa-stream"></i>
                                <p>
                                    Catégories
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost:8060/soufianeShopAPI/views/commandes/index.php" class="nav-link">
                                <i class="fas fa-shopping-basket"></i>
                                <p>
                                    Commandes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost:8070/soufianeShopAPI/views/avis/index.php" class="nav-link">
                                <i class="fas fa-star"></i>
                                <p>
                                    Avis
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) --
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">