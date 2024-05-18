<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPTOP SHOP</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    </style>
    
    <link rel="icon" href="assets/img/laptop_shop.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/header.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<script src="assets/js/check.js"></script>
<body>
    <header>
        <div class="header-first">
            <div>
                <span style="color: var(--color-5, #a2a6b0);">MON - SAT: </span>
                <span>8:00 AM - 5:30 PM</span>
            </div>

            <div>CALL US: 09 4694 5409</div>
        </div>
        <div class="header-second">
            <div class="menu">
                <a href="http://localhost/laptop_shop/"><img src="assets/img/laptop_shop.png" alt="logo" style="width:150px; height: 70px;" /></a>
                <nav class="nav">
                    <ul><a href="http://localhost/laptop_shop/product_all">LAPTOP</a></ul>
                    <ul class="brand"><a>THƯƠNG HIỆU</a>
                        <div class="content">
                            <?php foreach($data['brand'] as $brand):  extract($brand) ?>
                            <div class="namebrand">
                                <a>
                                    <img src="<?php echo $img_logo ?>" alt="">
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </ul>
                    <ul><a href="">MACBOOK</a></ul>
                    <ul><a href="">GAMING</a></ul>
                    <ul><a href="">MỎNG NHẸ</a></ul>
                    <ul class="deal"><a href="">DEALS SỐC</a></ul>
                </nav>
            </div>
            <div class="scu">
                <div class="search">
                    <input class="input-search" type="text" placeholder="Tìm kiếm" name="search">
                    <button class="btn-search" type="button"><i class="fa-solid fa-search"></i></button>
                </div>

                <div class="cart">
                    <div class="quantity">0</div>
                    <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
                <div class="person"><a><i class="fa-solid fa-circle-user" style="font-size:32px;"></i></a>
                    <div class="content2">
                        <?php
                        if (isset($_SESSION['user'])) {
                            if ($_SESSION['user']['first_name'] === 'admin') {
                                echo '<div class="user-content">
                                    <a id="btn-user" href="http://localhost/laptop_shop/admin">Quản lý</a>
                                </div>';
                                echo '<div class="user-content">
                                <a id="btn-user" href="http://localhost/laptop_shop/profile">Profile</a>
                                </div>
                                <hr>
                                <div class="user-content">
                                    <hr><a id="btn-user" href="http://localhost/laptop_shop/login/logout">Đăng xuất</a>
                                </div>'
                                ;
                            }else{
                                echo '<div class="user-content">
                                <a id="btn-user" href="http://localhost/laptop_shop/profile">Profile</a>
                                </div>
                                <hr>
                                <div class="user-content">
                                    <hr><a id="btn-user" href="http://localhost/laptop_shop/login/logout">Đăng xuất</a>
                                </div>'
                                ;
                            }
                            
                        } else {
                            echo '
                            <div class="user-content">
                                <a id="btn-user" href="http://localhost/laptop_shop/login">Đăng nhập</a>
                            </div>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    

    