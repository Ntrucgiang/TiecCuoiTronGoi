<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="hinh/logott.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Material Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
        <title>Dịch vụ tiệc cưới trọn gói TG</title>
    </head>
    <body>
        <style>
            .header{
                background:url("hinh/trang_chu/nen-header.png");
            }
            .header-text{
                font-weight: bold;
                color: #F8F8FF;
                padding:0px 20px 0px 20px;
                border-right: 1px solid #F8F8FF;
            }
        </style>

        <div class="container">
            <!-- Header -->
            <div class="row header align-items-center">
                <!-- Logo -->
                <div class="col-sm-12 col-md-4">
                    <div class="d-flex justify-content-center">
                        <img src="hinh/trang_chu/logo_header.png" width="180" />
                    </div>
                    
                </div>
                <!-- Navbar -->
                <div class="col-sm-12 col-md-8">
                    <div class="d-flex">
                        <a class="nav-link header-text" href="index.php">Trang chủ</a>
                        <?php
                        if (isAdmin()) {
                        ?>
                            <a class="nav-link header-text" href="quan-ly-don-dat-hang.php">Xem đơn đặt hàng</a>
                            <a class="nav-link header-text" href="danh-gia.php">Xem phản hồi</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link header-text" href="hoa-don.php">Hóa đơn</a>
                            <a class="nav-link header-text" href="tra-cuu-hoa-don.php">Tra cứu hóa đơn</a>
                            <a class="nav-link header-text" href="danh-gia.php">Đánh giá</a>
                        <?php
                        }
                        ?>
                        <?php
                        if (isAdmin()) {
                        ?>
                            <a class="nav-link header-text" href="actions/action-dang-xuat.php".php">Đăng xuất</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link header-text" href="dang-nhap.php">Đăng nhập</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>