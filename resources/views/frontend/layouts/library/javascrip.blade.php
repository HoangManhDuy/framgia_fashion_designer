{{ Html::script('/bower_components/jquery/dist/jquery.min.js', ['type' => 'text/javascript']) }}
{{ Html::script('/bower_components/owl.carousel/dist/owl.carousel.js') }}
{{ Html::script('/bower_components/bootstrap/dist/js/bootstrap.min.js', ['type' => 'text/javascript']) }}
{{ Html::script('/bower_components/magnific-popup/dist/jquery.magnific-popup.js', ['type' => 'text/javascript']) }}
{{ Html::script('/bower_components/ResponsiveSlides/responsiveslides.min.js') }}
{{ Html::script('/js/jquery.flipster.js') }}
{{ Html::script('/bower_components/ui-to-top/js/jquery.ui.totop.js', ['type' => 'text/javascript']) }}
{{--{{ Html::script('/bower_components/starrr/starrr.js', ['type' => 'text/javascript']) }}--}}
{{ Html::script('/bower_components/jquery-easing/jquery.easing.js', ['type' => 'text/javascript']) }}

<script>
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
        window.scrollTo(0, 1);
    }

   // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: false,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

        $(".flipster").flipster({style: 'carousel', start: 0});

        $("#owl-demo").owlCarousel({
            items: 1,
            lazyLoad: true,
            autoPlay: true,
            navigation: false,
            navigationText: false,
            pagination: true,
        });


        $(".scroll").on('click', function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
        $("span.menu").on('click', function () {
            $(".top-nav ul").slideToggle("slow", function () {
            });
        });
        $('.adsense_btn_close').on('click', function () {
            $(this).closest('.adsense_fixed').css('display', 'none');
        });
        $('.adsense_btn_info').on('click', function () {
            if ($('.adsense_info_content').is(':visible')) {
                $('.adsense_info_content').css('display', 'none');
            } else {
                $('.adsense_info_content').css('display', 'block');
            }
        });

        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
