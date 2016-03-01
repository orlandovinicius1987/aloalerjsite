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
    jQuery('#collapseOne').on('show.bs.collapse', function () {
        jQuery('.panel-heading').animate({}, 500);
        jQuery('.panel-heading').addClass('dropdown');
        jQuery('.panel-heading').removeClass('dropup');
    })
    jQuery('#collapseOne').on('hide.bs.collapse', function () {
        jQuery('.panel-heading').animate({}, 500);
        jQuery('.panel-heading').addClass('dropup');
        jQuery('.panel-heading').removeClass('dropdown');

    })
</script>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        jQuery('.slider').slick({
            dots: true,
            infinite: true,
            speed: 500,
            //fade: true,
            cssEase: 'linear',
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            draggable:true,
            mobileFirst:true,
            pauseOnDotsHover:true,
            swipe: true
        });
    });
</script>
