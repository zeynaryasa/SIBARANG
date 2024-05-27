<?php require_once 'auth_conf.php' ?>
<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $nameApp; ?> </title>
    <link rel="stylesheet" href="src/main.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <style>
        * {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        #scroll-table {
            max-height: 400px;
            overflow-y: auto;
            display: block;
        }

        .f-small {
            font-size: smaller;
        }
    </style>
</head>

<body>
    <!-- profile -->
    <nav class="navbar  bg-primary">
        <h4 class="text-light text-center mx-auto my-auto fw-bold"><?= $nameApp ?></h4>
    </nav>
    <!-- end Profile -->

    <div class="container-fluid">
        <!-- body -->
        <div class="row">
            <!-- navbar -->
            <div class="col-2">
                <div class="card mt-2">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="dashboard.php" class="text-decoration-none text-black"><i class="bi bi-house-fill me-1"></i>Dashboard &raquo;</a></li>
                            <li class="list-group-item"><a href="barang.php" class="text-decoration-none text-black"><i class="bi bi-shop me-1"></i>Barang &raquo;</a></li>
                            <li class="list-group-item"><a href="peminjaman.php" class="text-decoration-none text-black"><i class="bi bi-card-list me-1"></i>Peminjaman &raquo;</a></li>
                            <li class="list-group-item"><a href="admin.php" class="text-decoration-none text-black"><i class="bi bi-person-fill-gear me-1"></i>Admin &raquo;</a></li>
                            <li class="list-group-item"><a href="karyawan.php" class="text-decoration-none text-black"><i class="bi bi-people-fill me-1"></i>Karyawan &raquo;</a></li>
                            <li class="list-group-item"><a href="profile.php" class="text-decoration-none text-black"><i class="bi bi-gear-fill me-1"></i>Profile Sistem &raquo;</a></li>
                            <li class="list-group-item"><a href="profileMe.php" class="text-decoration-none text-black"><i class="bi bi-person-fill-gear me-1"></i>Profile &raquo;</a></li>
                            <li class="list-group-item"><a href="logout.php" class="text-decoration-none text-black"><i class="bi bi-power me-1"></i>Logout &raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end Navbar -->

            <!-- body full -->
            <div class="col-9 mt-2 ">
                <div class="card py-0">
                    <!-- card container -->
                    <div class="card-body ">

                        <!-- template -->
                        <div class="row ">
                            <div class="col-3 fw-bold text-danger">
                                <strong class="badge text-bg-primary"><?= $companyName; ?></strong>
                            </div>
                            <div class="col-6">
                                <!-- 
                                    ..... 
                                 -->
                            </div>

                            <!-- date & clock -->
                            <div class="col-3">
                                <div class="card border border-danger bg-primary">
                                    <div class="card-body text-center text-white">
                                        <?= date('d F Y'); ?>
                                    </div>
                                </div>
                                <div class="card border mt-1 border-primary bg-danger">
                                    <div class="card-body text-center text-white">
                                        <div id="clock"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end date & clock -->
                        </div>
                        <!-- end template -->

                        <!-- content -->

                        <!-- end content -->