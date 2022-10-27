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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet"> 
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/plugins/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo media(); ?>ecommerce/plugins/fontawesome/css/all.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/plugins/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/plugins/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/plugins/splide/css/splide.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/normalize.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/mainUtils.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>ecommerce/css/main.css">
    <!--===============================================================================================-->

    <title><?= $data['page_title'] ?></title>
</head>
<body class="animsition">
    
    <header>
        <div class="container-menu-desktop">

            <div class="top-bar">
                <div class="content-topbar c-full container">
                    <div class="left-top-bar">
                        <i class="fa-solid fa-truck mr-2"></i>
                        Envios gratis desde $100
                    </div>

                    <div class="right-top-bar h-full d-flex flex-wrap">
                        <a href="#" class="c-full tx-none">
                            <i class="fa-solid fa-question mr-2"></i>
                            Help & FAQs
                        </a>

                        <a href="#" class="c-full tx-none">
                            <i class="fa-solid fa-user mr-2"></i>
                            Iniciar Sesión
                        </a>

                        <span class="c-full tx-none">
                            <i class="fa-solid fa-phone-volume mr-2"></i>
                            Atención al cliente: 0123456789
                        </span>
                    </div>
                </div>
            </div>

            <div class="wrap-nav-desktop">
                <nav class="container-nav-desktop container">
                        
                    <a href="<?= base_url(); ?>" class="logo animate__animated animate__backInLeft">
                        <img src="<?= media(); ?>ecommerce/images/logo_text.png" alt="Logo - Creditos Guaman">
                    </a>

                    <div class="nav-desktop">
                        <ul class="main-nav">
                            <li class="active-nav animate__animated animate__fadeInDown">
                                <a href="<?= base_url(); ?>" class="tx-none">Inicio</a>
                            </li>

                            <li class="animate__animated animate__fadeInDown time-one">
                                <a href="<?= base_url(); ?>tienda" class="tx-none">Tienda</a>
                            </li>

                            <li class="animate__animated animate__fadeInDown time-two">
                                <a href="<?= base_url(); ?>carrito" class="tx-none">Carrito</a>
                            </li>
                            
                            <li class="animate__animated animate__fadeInDown time-three">
                                <a href="<?= base_url(); ?>contacto" class="tx-none">Contacto</a>
                            </li>
                        </ul>
                    </div>  

                    <div class="cont-icon-nav">
                        <div class="icon-nav">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>

                        <div class="icon-nav" >
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                </nav>

                <div class="wrap-menu-desktop container">
                    <?php
                        require_once 'Models/CategoriasModel.php';
                        $objCategorias = new CategoriasModel();
                        $request = $objCategorias->menuCategorias();
                        if (count($request) > 0) {
                            echo '<ul class="menu-desktop">';
                                levelFirst($request);
                            echo '</ul>';
                        }

                        function levelFirst($dataCtg)
                        {
                            foreach ($dataCtg as $key => $value) {
                                if($value['categoria_father_id'] == "" && $value['status'] == 1){
                                    echo '<li class="item-menu-desktop">';
                                        echo '<a href="" class="tx-none"> <div><img src="'.media().'images/uploads/'.$value['icon_category_father'].'" alt=""></div> <span>'.$value["nombre"].'</span></a>';
                                            echo '<ul class="submenu-desktop">';
                                                levelSecond($dataCtg, $value['idcategoria']);
                                            echo '</ul>';
                                    echo  '</li>';
                                }
                            }
                        }

                        function levelSecond($dataCtg, $fatherId)
                        {
                            foreach ($dataCtg as $key => $value) {
                                if ($value['categoria_father_id'] == $fatherId) {
                                    echo '<li class="item-submenu-desktop">';
                                        echo '<a href="" class="tx-none scale-link">'.$value['nombre'].'</a>';
                                        echo '<ul class="next-sub-desktop">';
                                            levelThird($dataCtg, $value['idcategoria']);
                                        echo '</ul>';
                                    echo '</li>';
                                }        
                            }       
                        }

                        function levelThird($dataCtg, $fatherId)
                        {
                            foreach ($dataCtg as $key => $value) {
                                if ($value['categoria_father_id'] == $fatherId) {
                                    echo '<li class="item-nextSub-desktop">';
                                        echo '<a href="" class="tx-none scale-link">'.$value['nombre'].'</a>';
                                    echo '</li>';
                                }        
                            }   
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <section class="section-slide">
        <div class="wrap-splide1">
            <div class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        <img src="<?= media(); ?>ecommerce/images/arrow-left.png">
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <img src="<?= media(); ?>ecommerce/images/arrow-right.png">
                    </button>
                </div>

                <div class="splide__track">
                    <ul class="splide__list">
                        <div class="splide__slide item-splide1 slider-one">
                            <img class="img-slide-global" src="<?= media(); ?>ecommerce/images/slider-one-global.png">
                            <img class="img-slide-small" src="<?= media(); ?>ecommerce/images/slider-one-small.png">
                            <div class="layer-container">
                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__fadeInDown" data-delay="0">
                                    <h2 class="text-layer text01">Lleva la fiesta a todas partes</h2>
                                </div>

                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__fadeInUp" data-delay="800">
                                    <img class="marc-slider text-layer" src="<?= media(); ?>ecommerce/images/sony-logo.png">
                                </div>

                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__zoomIn" data-delay="1600">
                                    <span class="text-layer text02">Speaker de 15"<br>Potencia 75000W<br>USB<br>Bluetooth<br>MicroSD<br>Control Remoto<br> FM</span>
                                </div>
                            </div>
                        </div>

                        <div class="splide__slide item-splide1 slider-two">
                            <img class="img-slide-global" src="<?= media(); ?>ecommerce/images/slider-two-global.png">
                            <img class="img-slide-small" src="<?= media(); ?>ecommerce/images/slider-two-small.png">
                            <div class="layer-container">
                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__lightSpeedInLeft" data-delay="0">
                                    <h2 class="text-layer text01">Apoya a la Tri en 4k</h2>
                                </div>

                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__rollIn" data-delay="800">
                                    <img class="text-layer marc-slider" src="<?= media(); ?>ecommerce/images/riviera-logo.png">
                                </div>

                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__zoomIn" data-delay="1600">
                                    <span class="text-layer text02">Bluetooth®<br>Dolby Vision<br>Natural Colour Enhancer<br>DTS Studio Sound<br>Audio equalizer<br>Google Assistant</span>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container-pages">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    </section>

    <footer></footer>

    <script src="<?= media(); ?>ecommerce/plugins/jquery/jquery.min.js"></script>
    <!--===============================================================================================-->
     <script src="<?= media(); ?>ecommerce/plugins/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= media(); ?>ecommerce/plugins/bootstrap/js/popper.js"></script>
    <script src="<?= media(); ?>ecommerce/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= media(); ?>ecommerce/plugins/splide/js/splide.min.js"></script>
    <script src="<?= media(); ?>ecommerce/js/splide-custom.js"></script>
    <!--===============================================================================================-->
    <script src="<?= media(); ?>ecommerce/js/main.js"></script>

</body>
</html>