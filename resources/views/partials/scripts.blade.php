<script>
    var isShowing = false;

    jQuery(function()
    {
        jQuery('#btn-telefones-uteis').click(function()
        {
            if ( ! isShowing)
            {
                jQuery('#agenda-tel-uteis').show(function()
                {
                    isShowing = true;
                });
            }
        });

        jQuery(document).click(function(evt)
        {
            if(jQuery(evt.target).closest('.agenda-tel-uteis').length)
            {
                return;
            }

            if(jQuery(evt.target).closest('.indice').length)
            {
                return;
            }

            if (isShowing)
            {
                jQuery('#agenda-tel-uteis').hide();

                isShowing = false;
            }
        });
    });
</script>

<script language="javascript">
    $('#collapseOne').on('show.bs.collapse', function () {
        $('.panel-heading').animate({}, 500);
        $('.panel-heading').addClass('dropdown');
        $('.panel-heading').removeClass('dropup');
    })
    $('#collapseOne').on('hide.bs.collapse', function () {
        $('.panel-heading').animate({}, 500);
        $('.panel-heading').addClass('dropup');
        $('.panel-heading').removeClass('dropdown');

    })
</script>

{{--<script type="text/javascript">--}}
    {{--jQuery(document).ready(function()--}}
    {{--{--}}
        {{--jQuery('.slider').slick({--}}
            {{--dots: true,--}}
            {{--infinite: true,--}}
            {{--speed: 500,--}}
            {{--//fade: true,--}}
            {{--cssEase: 'linear',--}}
            {{--slidesToScroll: 1,--}}
            {{--autoplay: true,--}}
            {{--autoplaySpeed: 2000,--}}
            {{--arrows: true,--}}
            {{--draggable:true,--}}
            {{--mobileFirst:true,--}}
            {{--pauseOnDotsHover:true,--}}
            {{--swipe: true--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}

<script language="javascript">
$(document).ready(function() {

$("#owl-example").owlCarousel({

    // Most important owl features
    items : 1,
    itemsCustom : false,
    itemsDesktop : [1199,1],
    itemsDesktopSmall : [980,1],
    itemsTablet: [768,1],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : true,
    itemsScaleUp : true,
    //Basic Speeds
    slideSpeed : 200,
    paginationSpeed : 800,
    rewindSpeed : 1000,
    //Autoplay
    autoPlay : true,
    stopOnHover : false,
    // Navigation
    navigation : false,
    rewindNav : true,
    scrollPerPage : false,
    // Responsive
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window,
    //Auto height
    autoHeight : true
    }
);

});
</script>