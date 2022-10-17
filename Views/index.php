<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" type="imagen" href="<?php echo media(); ?>ecommerce/images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo media(); ?>ecommerce/css/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/plugins/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/mainTwo.css">
    <title><?= $data['page_title'] ?></title>
</head>
<body class="animsition">
    
    <header>
        <div class="container-menu-desktop">

            <div class="top-bar">
                <div class="content-topbar container">
                    <div class="left-top-bar">
                        Envios gratis desde $100
                    </div>

                    <div class="right-top-bar">
                        <a href="#" class="">
                            Ayuda / Preguntas frecuentes
                        </a>

                        <a href="#" class="">
                            Iniciar Sesión
                        </a>

                        <span class="">
                            Atención al cliente: 0123456789
                        </span>
                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">
                        
                    <a href="#" class="logo">
                        <img src="<?php echo media(); ?>ecommerce/images/logo_text.png" alt="IMG-LOGO">
                    </a>

                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="active-menu">
                                <a href="index.html">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Homepage 1</a></li>
                                    <li><a href="home-02.html">Homepage 2</a></li>
                                    <li><a href="home-03.html">Homepage 3</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="product.html">Shop</a>
                            </li>

                            <li class="label1" data-label1="hot">
                                <a href="shoping-cart.html">Features</a>
                            </li>

                            <li>
                                <a href="blog.html">Blog</a>
                            </li>

                            <li>
                                <a href="about.html">About</a>
                            </li>

                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>  

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>

                        <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </div>
                </nav>
            </div>  
        </div>
    </header>

    <script src="<?php echo media(); ?>ecommerce/css/plugins/bootstrap/js/popper.js"></script>
    <script src="<?php echo media(); ?>ecommerce/css/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>