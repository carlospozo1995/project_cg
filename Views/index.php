<?php headerStore($data); ?>

    <section class="section-slide">
        <div class="wrap-splide1">
            <div class="splide" id="slider1">
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
                    <!-- <div class="splide__slide item-splide1 slider-one">
                            <img class="img-slide-global" src="<?= media(); ?>ecommerce/images/slider-one-global.png">
                            <img class="img-slide-small" src="<?= media(); ?>ecommerce/images/slider-one-small.png">

                            <div class="layer-container">

                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__fadeInDown" data-delay="0">
                                    <img class="img-text-slider-one" src="<?= media(); ?>ecommerce/images/text-slider-one.png">
                                </div>

                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__zoomIn" data-delay="800">
                                    <img class="img-text-slider-two" src="<?= media(); ?>ecommerce/images/desc-slider-one.png">
                                </div>

                                <div class="layer-splide1 animate__animated visible-false view-product" data-appear="animate__backInUp" data-delay="1600">
                                    <a href="">VER PRODUCTO</a>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="splide__slide item-splide1 slider-two">
                            <img class="img-slide-global" src="<?= media(); ?>ecommerce/images/slider-two-global.png">
                            <img class="img-slide-small" src="<?= media(); ?>ecommerce/images/slider-two-small.png">
                            <div class="layer-container">
                                
                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__lightSpeedInLeft" data-delay="0">
                                    <img class="img-text-slider-one" src="<?= media(); ?>ecommerce/images/text-slider-two.png">
                                </div>

                                <div class="layer-splide1 animate__animated visible-false" data-appear="animate__zoomIn" data-delay="800">
                                    <img class="img-text-slider-two" src="<?= media(); ?>ecommerce/images/desc-slider-two.png">
                                </div>

                                <div class="layer-splide1 animate__animated visible-false view-product" data-appear="animate__backInUp" data-delay="1600">
                                    <a href="">VER PRODUCTO</a>
                                </div>

                            </div>
                        </div> -->

                        
                    <?php
                    if ($data['sliderCtg'] != "") {
                        
                        for ($i=0; $i < count($data['sliderCtg']); $i++) { 
                    ?>  
                            <div class="splide__slide item-splide1">
                                <img class="img-slide-global" src="<?= $data['sliderCtg'][$i]['sliderDesktop'] ?>">
                                <img class="img-slide-small" src="<?= $data['sliderCtg'][$i]['sliderMobile'] ?>">
                                
                                <div class="layer-container">

                                    <div class="layer-splide1 animate__animated visible-false" data-appear="animate__lightSpeedInLeft" data-delay="0">
                                        <p><?= $data['sliderCtg'][$i]['sliderDscOne'] ?></p>
                                    </div>

                                    <?php
                                    if (!empty($data['sliderCtg'][$i]['sliderDscTwo'])) {
                                    ?>
                                        <div class="layer-splide1 animate__animated visible-false" data-appear="animate__zoomIn" data-delay="800">
                                            <p><?= $data['sliderCtg'][$i]['sliderDscTwo'] ?></p> 
                                        </div>

                                        <div class="layer-splide1 animate__animated visible-false" data-appear="animate__backInUp" data-delay="1600">
                                            <a href="">VISITAR</a>
                                        </div>
                                    <?php
                                    }else{
                                    ?>
                                        <div class="layer-splide1 animate__animated visible-false" data-appear="animate__backInUp" data-delay="800">
                                            <a href="">VISITAR</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                    <?php
                        }
                    }
                    ?>

                    <?php
                    if ($data['sliderProd'] != "") {
                        
                        for ($i=0; $i < count($data['sliderProd']); $i++) { 
                    ?>  
                            <div class="splide__slide item-splide1">
                                <img class="img-slide-global" src="<?= $data['sliderProd'][$i]['sliderDesktop'] ?>">
                                <img class="img-slide-small" src="<?= $data['sliderProd'][$i]['sliderMobile'] ?>">

                                <div class="layer-container">

                                    <div class="layer-splide1 animate__animated visible-false" data-appear="animate__fadeInDown" data-delay="0">
                                        <p><?= $data['sliderProd'][$i]['sliderDscOne'] ?></p>
                                    </div>

                                    <?php
                                    if (!empty($data['sliderProd'][$i]['sliderDscTwo'])) {
                                    ?>
                                        <div class="layer-splide1 animate__animated visible-false" data-appear="animate__zoomIn" data-delay="800">
                                            <p><?= $data['sliderProd'][$i]['sliderDscTwo'] ?></p> 
                                        </div>

                                        <div class="layer-splide1 animate__animated visible-false" data-appear="animate__backInUp" data-delay="1600">
                                            <a href="">VER PRODUCTO</a>
                                        </div>
                                    <?php
                                    }else{
                                    ?>
                                        <div class="layer-splide1 animate__animated visible-false" data-appear="animate__backInUp" data-delay="800">
                                            <a href="">VER PRODUCTO</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                        
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
        <!-- 
        <section class="section-category">
           <div class="splide" id="slider2" role="group" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <div class="splide__list center">
                        <?php                
                            require_once 'Models/CategoriasModel.php';
                            $objCategorias = new CategoriasModel();
                            $request = $objCategorias->menuCategorias();

                            foreach ($request as $key => $value) {
                                if($value['categoria_father_id'] == "" && $value['status'] == 1){
                                    echo '<div class="splide__slide text-center slide-item-category">';
                                        echo '<a href="">';
                                            echo '<img src="'.media().'images/uploads/'.$value['imgcategoria'].'">';
                                            echo '<p>'.$value['nombre'].'</p>';
                                        echo '</a>';
                                    echo '</div>';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section> -->

    </section>

<?php footerStore($data); ?>