$(document).ready(function() {
	$(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });

    // ============================================== //
    // ---------- HEADER FIXED DESKTOP ---------- //
    var headerDesktop = $('.container-menu-desktop');
    var navDesktop = $('.wrap-nav-desktop');

    if($('.top-bar').length > 0) {
        var topBarDesktop = $('.top-bar').height();
    }
    else {
        var topBarDesktop = 0;
    }
    
    if($(window).scrollTop() > topBarDesktop) {
        $(headerDesktop).addClass('fix-nav-desktop');
        $(navDesktop).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-nav-desktop');
        $(navDesktop).css('top',topBarDesktop - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > topBarDesktop) {
            $(headerDesktop).addClass('fix-nav-desktop');
            $(navDesktop).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-nav-desktop');
            $(navDesktop).css('top',topBarDesktop - $(this).scrollTop()); 
        } 
    });
    // ============================================== //

    // ---------- MENU MOBILE ---------- //

    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.wrap-nav-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.submenu-mobile').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    var arrowMainSubmenu = $('.arrow-main-submenu-m');

    for(var i=0; i<arrowMainSubmenu.length; i++){
        $(arrowMainSubmenu[i]).on('click', function(){
            $(this).parent().find('.next-sub-mobile').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 1101){
            if($('.wrap-nav-mobile').css('display') == 'block') {
                $('.wrap-nav-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.submenu-mobile').each(function(){
                if($(this).css('display') == 'block') {
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });

            $('.next-sub-mobile').each(function(){
                if($(this).css('display') == 'block') {
                    $(this).css('display','none');
                    $(arrowMainSubmenu).removeClass('turn-arrow-main-menu-m');
                }
            });  
        }
    });

    // ------------ MODAL SEARCH ------------ //

    // *Disable and enable scroll
    var keys = {37: 1, 38: 1, 39: 1, 40: 1};

    function preventDefault(e) {
      e.preventDefault();
    }

    function preventDefaultForScrollKeys(e) {
      if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
      }
    }

    // modern Chrome requires { passive: false } when adding event
    var supportsPassive = false;
    try {
      window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
        get: function () { supportsPassive = true; } 
      }));
    } catch(e) {}

    var wheelOpt = supportsPassive ? { passive: false } : false;
    var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

    // call this to Disable
    function disableScroll() {
      window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
      window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
      window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
      window.addEventListener('keydown', preventDefaultForScrollKeys, false);
    }

    // call this to Enable
    function enableScroll() {
      window.removeEventListener('DOMMouseScroll', preventDefault, false);
      window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
      window.removeEventListener('touchmove', preventDefault, wheelOpt);
      window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
    }

    // *Show modal search
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
        disableScroll();
        $('body').addClass('scrollDisable');
    })

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
        $('.searchInput').val('');
        enableScroll();
        $('body').removeClass('scrollDisable');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });
    

    // ------------ MODAL CART ------------ //
    $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
        disableScroll();
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
        enableScroll();
    });

    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });

    // ----------- BACK TO TOP ----------- //
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    // -------- RESPONSIVE ADAPTATION PAGE-------- //

    // Slider layer

    if ($(window).width() <= 600) {
        $('.layer-cut a').text("VER");
        $('.setTimeLayer').attr("data-delay", "1600");
    }

    $(window).resize(function() {
        if ($(window).width() <= 600) {
            $('.layer-cut a').text("VER");
        }
        else {
            $('.layer-cut a').text("VER PRODUCTO");
        }
    });
    
    
});
