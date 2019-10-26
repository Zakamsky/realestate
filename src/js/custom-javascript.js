// all your custom scripts here:

// header-fixed size for avoid cover scrollbar
jQuery( document ).ready(function ($) {

    let parallaxWidth = $('.parallax').prop("clientWidth");
    $('#wrapper-navbar').width(parallaxWidth);

    $( window ).resize(function(){
        let parallaxWidth = $('.parallax').prop("clientWidth");
        $('#wrapper-navbar').width(parallaxWidth)
    });

    $('.wp_property_slider-js').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        mobileFirst: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.click-opener-js').click(function () {
        event.preventDefault();
       $('.wpp_search_title--block').toggleClass('active')
       $('.wpp_search_elements').toggleClass('open')
    });

    $('.contact_block--btn').click(function () {
        $('.contact_block').toggleClass('open')
    })

});


