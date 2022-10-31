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
    // HEADER FIXED DESKTOP
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

    // MENU MOBILE

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

});
