<script>
    var isShowing = false;

    jQuery(function () {
        jQuery('#btn-telefones-uteis').click(function () {
            if (!isShowing) {
                jQuery('#agenda-tel-uteis').show(function () {
                    isShowing = true;
                });
            }
        });

        jQuery(document).click(function (evt) {
            if (jQuery(evt.target).closest('.agenda-tel-uteis').length) {
                return;
            }

            if (jQuery(evt.target).closest('.indice').length) {
                return;
            }

            if (isShowing) {
                jQuery('#agenda-tel-uteis').hide();

                isShowing = false;
            }
        });
    });
</script>

<!--<script>-->
<!--jQuery(function() {-->
<!--jQuery('a[href*=#]:not([href=#])').click(function() {-->
<!--if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {-->
<!--var target = jQuery(this.hash);-->
<!--target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');-->
<!--console.log(target);-->
<!--if (target.length) {-->
<!--jQuery(jQuery(target).parent()).animate({-->
<!--scrollTop: target.offset().top-->
<!--}, 1500);-->
<!--return false;-->
<!--}-->
<!--}-->
<!--});-->
<!--});-->
<!--</script>-->
