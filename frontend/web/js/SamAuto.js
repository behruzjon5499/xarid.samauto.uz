
$(document).ready(function () {

    $('.faqInside .head').click(function () {
        $(this).next().slideToggle(200).toggleClass('shoow');
    });

    $('.send_resume--btn').on('click', function () {
        $('.send_resume--form').fadeIn(200);
    });

    $('.send_resume--close').on('click', function () {
        $('.send_resume--form').fadeOut(200);
    });

    $('.canvasMap--list .t').click(function (e) {
        e.preventDefault();
        if ($(this).hasClass('act')) {
            $(this).next().slideUp();
            $(this).removeClass('act');
        } else {
            $('.canvasMap--list .t').next().slideUp();
            $(this).next().slideDown();
            $('.canvasMap--list .t').removeClass('act');
            $(this).addClass('act');
        }
    });
});


$('.canvasMap .land').click(function () {
    var data_id = $(this).attr('data-id');
    $('.canvasMap--list ul a').each(function () {
        if ($(this).attr('data-id') == data_id) {
            var locale = $(this).attr('href');
            window.location.href = locale;
        }
    });
});

$('.canvasMap--list ul a').hover(function () {
    var data_id = $(this).attr('data-id');
    $('.canvasMap img#' + data_id).addClass('active');
}, function () {
    $('.canvasMap img').removeClass('active');
});

$('.canvasMap svg path').hover(function () {
    var data_id = $(this).attr('data-id');
    $('.canvasMap img#' + data_id).addClass('active');
}, function () {
    $('.canvasMap img').removeClass('active');
});

// Map tooltip
function l_tooltip(target_items, name) {
    $(target_items).each(function (i) {
        $("body").append("<div class='" + name + "' id='" + name + i + "'><p>" + $(this).attr('title') + "</p></div>");
        var tooltip = $("#" + name + i);
        if ($(this).attr("title") != "" && $(this).attr("title") != "undefined") {
            $(this).removeAttr("title").mouseover(function () {
                tooltip.css({
                    display: "none"
                }).fadeIn(30);
            }).mousemove(function (kmouse) {
                tooltip.css({
                    left: kmouse.pageX - 50,
                    top: kmouse.pageY + 15
                });
            }).mouseout(function () {
                tooltip.fadeOut(10);
            });
        }
    });
}

l_tooltip(".canvasMap .land", "tooltip");


/*Add Sticky class to header on scroll*/

if ($('.full-page-definder').is(':hidden') && $('#fsvs-body').length > 0) {
    window.onscroll = function () {
        myFunction()
    };

    var header = $(".fullpage_header");

    function myFunction() {
        if(window.pageYOffset > 2) {
            if(!$('.fullpage_menu').hasClass('active')){
                $('.fullpage_header').addClass('sticky_header');
            }
        } else {
            if(!$('.fullpage_menu').hasClass('active')){
                $('.fullpage_header').removeClass('sticky_header');
            }
        }
    }
}

$('.fullpage_header .search').on('click', function (e) {
    e.preventDefault();
    $('.search_ui').fadeIn(100);
    $('.search_ui input').focus();
});
$('.search_ui input').focusout(function () {
    $('.search_ui').fadeOut(100);
});

if ($('.dillerGallerySlider').length > 0) {
    $('.dillerGallerySlider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        draggable: true,
        autoplay: true,
        autoplaySpeed: 4000,
        adaptiveHeight: true
    });
}

if ($('.logo-partners').length > 0) {
    $('.logo-partners').slick({
        slidesToShow: 8,
        slidesToScroll: 2,
        arrows: false,
        dots: true,
        draggable: false,
        autoplay: true,
        autoplaySpeed: 4000,
    });
}

if ($('.dillerSlider').length > 0) {
    $('.dillerSlider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        draggable: false,
        prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow_red.png" alt="" /></button>',
        nextArrow: '<button class="slick-next"><img src="/images/next-arrow_red.png" alt="" /></button>',
        adaptiveHeight: true
    });
}

if ($('.news-design .row').length > 0) {
    $('.news-design .row').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        draggable: true,
        autoplay: true,
        autoplaySpeed: 12000,
        pauseOnHover: false,
        prevArrow: '<button class="slick-prev" data-aos="zoom-in"><img src="/images/prev-arrow.png" alt="" /></button>',
        nextArrow: '<button class="slick-next" data-aos="zoom-in"><img src="/images/next-arrow.png" alt="" /></button>',
        responsive: [
            {
                breakpoint: 900,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });
}

$(window).on('load', function () {

    // Слидер для ДИЛЕРСКАЯ СЕТЬ
    if ($('.mini-slider').length > 0) {
        setTimeout(function () {
            $('.mini-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow_red.png" alt="" /></button>',
                nextArrow: '<button class="slick-next"><img src="/images/next-arrow_red.png" alt="" /></button>',
            });
        }, 300)
    }

    $('.site_modal .scrollY').overlayScrollbars({});

});


$(document).ready(function () {

    var title = 0;
    $(".contact-row .info").each(function () {
        var h_block = parseInt($(this).height());
        if (h_block > title) {
            title = h_block;
        }
    });
    $(".contact-row .info").height(title);


    // menuBar click
    $('.menuBar').on('click', function () {
        if ($('.fullpage_header').hasClass('page_header')) {
            $('.fullpage_header').toggleClass('bgWhite');
            $('.fullpage_menu').fadeToggle().toggleClass('active');
            $(this).toggleClass('active');
        }
    });

    // menuBar Close
    $('.fullpage_menu .overlayClose').on('click', function () {
        $('.menuBar').click();
    });

    // index page sliders

    if ($('.sliderMain .sliderFor').length > 0) {
        $('.sliderMain .sliderFor').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            draggable: false,
            asNavFor: '.sliderMain .sliderNav',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        draggable: false,
                        swipe: false,
                        swipeToSlide: false,
                        touchMove: false,
                        draggable: false,
                        accessibility: false,
                        adaptiveHeight: true,
                    }
                }
            ]
        });
    }

    if ($('.sliderMain .sliderNav').length > 0) {
        $('.sliderMain .sliderNav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.sliderMain .sliderFor',
            dots: true,
            centerMode: true,
            focusOnSelect: true,
            prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow.png" alt="" /></button>',
            nextArrow: '<button class="slick-next"><img src="/images/next-arrow.png" alt="" /></button>',
        });

        function randomInteger(min, max) {
            var rand = min + Math.random() * (max + 1 - min);
            rand = Math.floor(rand);
            return rand;
        }

        $('.sliderMain .sliderNav .slick-slide').eq(randomInteger(0, 2)).click();
    }

    if ($('.section--5 .sliderFor').length > 0) {
        $('.section--5 .sliderFor').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.section--5 .sliderNav',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        adaptiveHeight: true,
                    }
                }
            ]
        });
    }

    if ($('.section--5 .sliderNav').length > 0) {
        $('.section--5 .sliderNav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.section--5 .sliderFor',
            dots: true,
            centerMode: true,
            focusOnSelect: true,
            prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow.png" alt="" /></button>',
            nextArrow: '<button class="slick-next"><img src="/images/next-arrow.png" alt="" /></button>',
            responsive: [
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        });
    }

    // documents slider
    if ($('.documents .slider').length > 0) {
        $('.documents .slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow.png" alt="" /></button>',
            nextArrow: '<button class="slick-next"><img src="/images/next-arrow.png" alt="" /></button>',
            responsive: [
                {
                    breakpoint: 1050,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        adaptiveHeight: true
                    }
                }
            ]
        });
    }

    // mission slider
    if ($('.missionInside .textBox').length > 0) {
        $('.missionInside .textBox').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<button class="slick-prev" style="left:-55px;"><img src="/images/prev-arrow-white.png" alt="" /></button>',
            nextArrow: '<button class="slick-next" style="right:-55px;"><img src="/images/next-arrow-white.png" alt="" /></button>',
            responsive: [
                {
                    breakpoint: 960,
                    settings: {
                        adaptiveHeight: true
                    }
                }
            ]
        });
    }

    /*if ($('.archive_slider').length > 0) {
        var archive = $('.archive_slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            touchThreshold: 100,
            autoplay: true,
            draggable: false,
            autoplaySpeed: 1500,
            focusOnSelect: false,
            speed: 3000,
            pauseOnHover: false,
            prevArrow: '<button class="slick-prev" style="left:-55px;"><img src="/images/prev-arrow-white.png" alt="" /></button>',
            nextArrow: '<button class="slick-next" style="right:-55px;"><img src="/images/next-arrow-white.png" alt="" /></button>',
            responsive: [
                {
                    breakpoint: 990,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 2,
                        draggable: true,
                        speed: 1000,
                        autoplaySpeed: 500,
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        draggable: true,
                        autoplay: false,
                        speed: 500,
                    }
                }
            ]
        });
        $(window).on('DOMMouseScroll mousewheel', function (event) {
            if (event.originalEvent.detail > 0 || event.originalEvent.wheelDelta < 0) {
                archive.slick('slickNext');
            }
            else {
                archive.slick('slickPrev');
            }

        });
    }*/

    if ($('.dillerListSlider').length > 0) {
        $('.dillerListSlider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow.png" alt="" /></button>',
            nextArrow: '<button class="slick-next"><img src="/images/next-arrow.png" alt="" /></button>',
            responsive: [
                {
                    breakpoint: 960,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        adaptiveHeight: true
                    }
                }
            ]
        });
    }

    if ($('.newInside .sliderFor').length > 0) {
        $('.newInside .sliderFor').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.newInside .sliderNav',
        });
    }

    if ($('.newInside .sliderNav').length > 0) {
        $('.newInside .sliderNav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.newInside .sliderFor',
            focusOnSelect: true
        });
    }

    if ($('.gallerySlider').length > 0) {
        $('.gallerySlider .wrap').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            draggable: false,
            prevArrow: '<button class="slick-prev"><img src="/images/prev-arrow_red.png" alt="" /></button>',
            nextArrow: '<button class="slick-next"><img src="/images/next-arrow_red.png" alt="" /></button>',
            responsive: [
                {
                    breakpoint: 1153,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        adaptiveHeight: true
                    }
                }
            ]
        });
    }


    // site modal close
    $('.site_modal .overlayClose').on('click', function () {
        $(this).parent().removeClass('shoow').delay(500).fadeOut();
    });
    $('.site_modal .closeBtn').on('click', function () {
        $(this).parent().parent().parent().removeClass('shoow').delay(500).fadeOut();
    });

    $('.downloadPrice').on('click', function (e) {
        e.preventDefault();
        $('.modalPriceList').fadeIn().addClass('shoow');
    });
});


// All overlayScrollBars
$(window).on('load', function () {
    if ($('.scrollYAll').length > 0) {
        $('.scrollYAll').overlayScrollbars({});
        $('.scrollYAll').css({
            'pointer-events': 'auto'
        });
    }
});

