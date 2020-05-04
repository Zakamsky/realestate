/*parallax*/
function parallax() {
    window.onscroll = function() {
        let parallax_background = document.querySelector('.parallax__layer--back'),
            parallax_foreground = document.querySelector('.parallax__layer--base');

        let speed = 3,
            speed2 = 2;

        parallax_background.style.top = (window.pageYOffset / speed) + 'px';
        parallax_foreground.style.top = (window.pageYOffset / speed2) + 'px';


    }
}


jQuery( document ).ready(function ($) {
    //parallax
    if($('.parallax__layer--back').length){
        if ($(window).width() >= 768){
            parallax();
        }else{
            $(window).resize( function(){
                if ($(window).width() >= 768) {
                    parallax();
                }
            });
        }
    }

    /*parallax end*/
// slider featured property
//     $('.wp_property_slider-js').slick({
//     $('.wp_property_slider-js').slick(setting);
    	const slickSetting = {
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
    };
	$('.wp_property_slider-js').slick( slickSetting );
	$('.reviews__list_slider-js').slick( slickSetting );

	//  );
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


