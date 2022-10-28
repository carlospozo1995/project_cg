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
        $('.menu-mobile').slideToggle();
    });
});
