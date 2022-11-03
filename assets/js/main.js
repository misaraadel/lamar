$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 700) {
            $(".scroll-top-button").fadeIn();
        } else {
            $(".scroll-top-button").fadeOut();
        }
    });

    $(function () {
        $(document).scroll(function () {
            var $nav = $(".navbar");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });

    $(".scroll-top-button").on('click', function () {
        $('html , body').animate({
            scrollTop: 0
        }, 100);
    });

    $('.hamburger').click(function(){
        $('.hamburger').toggleClass('active');
        $('.data-contain').toggleClass('active-nav');
        $('body').toggleClass('overflowNone')
    });

    $('.navbar-nav .nav-item .nav-link').click(function(){
        $('.hamburger').removeClass('active');
        $('.data-contain').removeClass('active-nav');
        $('body').removeClass('overflowNone')
    });

    $('.owl-partners').owlCarousel({
        rtl: true,
        loop:true,
        margin: 20,
        nav:false,
        dots: true,
        // autoplay: true,
        touchDrag  : true,
		mouseDrag  : true,
		autoWidth: false,
		animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplayTimeout: 6000,
		smartSpeed: 2000,
		dragEndSpeed: 2000,
		slidSpeed: 900,
        paginationSpeed: 900,
        autoplayHoverPause: true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items: 6
            }
        }
    });

    $('[data-toggle="tooltip"]').tooltip();
    $('body').scrollspy({ target: '#navbar' })
});