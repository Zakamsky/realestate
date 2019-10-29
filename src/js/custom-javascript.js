// all your custom scripts here:

// header-fixed size for avoid cover scrollbar
jQuery( document ).ready(function ($) {
//parallax header correction
    let parallaxWidth = $('.parallax').prop("clientWidth");
    $('#wrapper-navbar').width(parallaxWidth);

    $( window ).resize(function(){
        let parallaxWidth = $('.parallax').prop("clientWidth");
        $('#wrapper-navbar').width(parallaxWidth)
    });
// slider featured property
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
//property search filter
    $('.click-opener-js').click(function () {
        event.preventDefault();
        if ($(window).width() < 992) {
            if ( $('.wpp_search_title--block').hasClass('active')){
                $('.wpp_search_title--block').removeClass('active');
            }
            $('.wpp_shortcode_search_form').toggleClass('open');
        }else{
            if ( $('.wpp_shortcode_search_form').hasClass('open')){
                $('.wpp_shortcode_search_form').removeClass('open');
            }
            $('.wpp_search_title--block').toggleClass('active');
        }

    });

// contacts block
    $('.contact_block--btn').click(function () {
        $('.contact_block').toggleClass('open')
    })

});


