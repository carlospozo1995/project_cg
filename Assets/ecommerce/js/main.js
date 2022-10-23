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

    console.log($('header').height());

    $(window).on('scroll',function(){
    	let limiteScroll = $('.limiter-fixed-scroll').offset().top;
     	if($(this).scrollTop() > limiteScroll) {
     		$('.wrap-nav-desktop').addClass('menu-fixed');
     		$('.container-nav-desktop').addClass('top');
     	}else{
    		$('.wrap-nav-desktop').removeClass('menu-fixed');
 			$('.container-nav-desktop').removeClass('top');
     	}	
    })

});