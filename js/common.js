$(function () {
    $('a[href="#"]').click(function (e) {
        e.preventDefault();
    });

    var click = 0;
    function NAVBAR_CLICK() {
        $(".hd_barbtn>button").click(function () {
            if (click == 0) {
                $(".hd_wrap").addClass("hd_active");
                $(".nav_wrap").fadeIn();
                click = 1;
            } else if (click == 1) {
                $(".hd_wrap").removeClass("hd_active");
                $(".nav_wrap").fadeOut();
                click = 0;
            }
        });

        $(".nav_box>li>a").click(function () {
            $(".nav_box>li>a").removeClass("active");
            $(this).addClass("active");
        });
    }
    NAVBAR_CLICK();

    $(".nav_box>li>a").click(function () {
        $(".hd_wrap").removeClass("hd_active");
        $(".nav_wrap").fadeOut();
        click = 0;
    });

    function VIEWMORE() {
        $("#sec2_view_btn").click(function () {
            $(this).hide();
            $(".main_authors_txt").hide();
            $("#sec2_view_txt").fadeIn();
        });

        $("#sec4_view_btn").click(function () {
            $(this).hide();
            $(".main_network_txt").hide();
            $("#sec4_view_txt").fadeIn();
            $(".network_img_01").hide();
            $(".network_img_02").fadeIn();
        });

        $("#sec2_close_btn").click(function () {
            $("#sec2_view_txt").hide();
            $("#sec2_view_btn").fadeIn();
            $(".main_authors_txt").fadeIn();
        });

        $("#sec4_close_btn").click(function () {
            $("#sec4_view_txt").hide();
            $("#sec4_view_btn").fadeIn();
            $(".main_network_txt").fadeIn();
            $(".network_img_01").fadeIn();
            $(".network_img_02").hide();
        });
    }
    VIEWMORE();

    $('#fullpage').fullpage({
        anchors: [
            'page0',
            'page1',
            'page2',
            'page3',
            'page4',
            'page5',
            'page6',
            'page7',
            'page8',
            'page9',
            'page10'
        ],
        menu: '#myMenu',
        navigation: false,
        continuousVertical: false,
        controlArrows: false,
        slidesNavigation: false,
        css3: true,
        verticalCentered: false,
        scrollOverflow: true,
        scrollBar: false,
        keyboardScrolling: true,
        responsiveWidth: 1025,
        onLeave: function () {
            $('.section [data-aos]').removeClass("aos-animate");
        },
        onSlideLeave: function () {
            $('.slide [data-aos]').removeClass("aos-animate");
        },
        afterSlideLoad: function () {
            $('.slide.active [data-aos]').addClass("aos-animate");
        },
        afterLoad: function () {
            $('.section.active [data-aos]').addClass("aos-animate");
        }
    });

    function MUNHAK_SLIDER() {
        $(".munhak_sliders").slick({
            autoplay: true,
            autoplaySpeed: 10000,
            speed: 600,
            slidesToShow: 1,
            slidesToScroll: 1,
            pauseOnHover: false,
            dots: true,
            cssEase: 'linear',
            arrows: true,
            prevArrow: $('#munhak_prev'),
            nextArrow: $('#munhak_next'),
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        arrows: false,
                        adaptiveHeight: true
                    }
                }
            ]
        });
    }
    MUNHAK_SLIDER();

    function PUBLISH_SLIDER() {
        $("#publish_sliders").slick({
            autoplay: true,
            autoplaySpeed: 10000,
            speed: 600,
            slidesToShow: 2,
            slidesToScroll: 2,
            pauseOnHover: false,
            dots: true,
            cssEase: 'linear',
            arrows: true,
            prevArrow: $('#publish_prev'),
            nextArrow: $('#publish_next'),
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 886,
                    settings: {
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        adaptiveHeight: true,
                        dots: false,
                    }
                }
            ]
        });
    }
    PUBLISH_SLIDER();

    function AUTHOR_SLIDER() {
        $("#author_sliders").slick({
            autoplay: true,
            autoplaySpeed: 10000,
            speed: 600,
            slidesToShow: 2,
            slidesToScroll: 2,
            pauseOnHover: false,
            dots: true,
            cssEase: 'linear',
            arrows: true,
            prevArrow: $('#author_prev'),
            nextArrow: $('#author_next'),
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        arrows: false,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 886,
                    settings: {
                        arrows: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        adaptiveHeight: true,
                        dots: false,
                    }
                }
            ]
        });
    }
    AUTHOR_SLIDER();

    let scrollRef = 0;

    window.addEventListener('scroll', function () {
        scrollRef <= 5
            ? scrollRef++
            : AOS.refresh();
    });

    AOS.init({
        once: false,
        duration: 600,
        easing: 'ease-in-out',
        offset: -200,
        disable: function () {
            var desktop = 885;
            return window.innerWidth < desktop;
        }
    });
});