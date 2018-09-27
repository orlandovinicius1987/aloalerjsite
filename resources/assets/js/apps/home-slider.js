const appName = 'vue-home-slide'

if (jQuery("#" + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        computed: {
            slideWidth() { return jQuery('#slider ul li').width() },

            slideCount() { return jQuery('#slider ul li').length },

            slideHeight() { return jQuery('#slider ul li').height() },

            sliderUlWidth() { return this.slideCount * this.slideWidth },
        },

        methods: {
            __bootSlider() {
                const $this = this

                setInterval(function () {
                    $this.moveRight();
                }, 3000);

                jQuery('#slider').css({ width: this.slideWidth, height: this.slideHeight });

                jQuery('#slider ul').css({ width: this.sliderUlWidth, marginLeft: - this.slideWidth });

                jQuery('#slider ul li:last-child').prependTo('#slider ul');

                jQuery('a.control_prev').click(function () {
                    $this.moveLeft();
                })
            },

            moveLeft() {
                jQuery('#slider ul').animate({
                    left: + this.slideWidth
                }, 200, function () {
                    jQuery('#slider ul li:last-child').prependTo('#slider ul');
                    jQuery('#slider ul').css('left', '');
                });
            },

            moveRight() {
                jQuery('#slider ul').animate({
                    left: - this.slideWidth
                }, 200, function () {
                    jQuery('#slider ul li:first-child').appendTo('#slider ul');

                    jQuery('#slider ul').css('left', '');
                });
            },
        },

        mounted() {
            // this.__bootSlider()
        }
    })
}
