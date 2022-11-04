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
                        <div class="splide__slide item-splide1 slider-one">
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
                        </div>

                        <div class="splide__slide item-splide1 slider-two">
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
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container-pages">
        
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
                                        echo '<a href="'.base_url().'tienda">';
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
        </section>

    </section>
<?php footerStore($data); ?>