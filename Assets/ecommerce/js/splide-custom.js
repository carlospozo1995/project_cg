$(document).ready(function() {

                // --------- SPLIDE (BANNER AND TEXT BANNER) --------- //
    $('.wrap-splide1').each(function(){
        var splide = $(this).find('#slider1');

        var itemSplide1 = $(splide).find('.item-splide1');
        var layerSplide1 = $(splide).find('.layer-splide1');
        var actionSplide1 = [];

        $(splide).init(function () {
            var layerCurrentItem = $(itemSplide1[0]).find('.layer-splide1');

            for(var i=0; i<actionSplide1.length; i++) {
                clearTimeout(actionSplide1[i]);
            }

            $(layerSplide1).each(function(){
                $(this).removeClass($(this).data('appear') + ' visible-true');
            });

            for(var i=0; i<layerCurrentItem.length; i++) {
                actionSplide1[i] = setTimeout(function(index) {
                    $(layerCurrentItem[index]).addClass($(layerCurrentItem[index]).data('appear') + ' visible-true');
                },$(layerCurrentItem[i]).data('delay'),i); 
            }
        })        

        var banner = new Splide('#slider1', {
            type    : 'loop',
            perPage : 1,
            autoplay: true,
            pauseOnFocus: false,
            focus:false,
            pauseOnHover: false,
            drag: false,
            interval: 6000,
            pagination: false,
        });

        banner.mount();

        banner.on('visible', function (element) {
            var indexSlider = element['index'];
            var layerCurrentItem = $(itemSplide1[indexSlider]).find('.layer-splide1');
            
            for(var i=0; i<actionSplide1.length; i++) {
                clearTimeout(actionSplide1[i]);
            }

            $(layerSplide1).each(function(){
                $(this).removeClass($(this).data('appear') + ' visible-true');
            });

            for(var i=0; i<layerCurrentItem.length; i++) {
                actionSplide1[i] = setTimeout(function(index) {
                    $(layerCurrentItem[index]).addClass($(layerCurrentItem[index]).data('appear') + ' visible-true');
                },$(layerCurrentItem[i]).data('delay'),i); 
            }
        });
    
    });


                    // --------- SPLIDE (CATEGORY) --------- //

    var category = new Splide( '#slider2', {
        type   : 'loop',
        perPage: 6,
        perMove: 1,
        breakpoints: {
            1200: {
                perPage: 5,
            },
            1000: {
                perPage: 4,
            },
            800: {
                perPage: 3,
            },
            600: {
                perPage: 2,
            },
        }
    });

    category.mount();

});