const appName = 'vue-home'

if (jQuery('#' + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        data: {},

        methods: {
            __showMessage: function () {
                let content = document.createElement('div')
                content.innerHTML = laravel.config.mix_message_home
                swal({
                    title: 'Atenção',
                    content: content,
                    icon: 'warning',
                })
            },
            // var content = document.createElement('div');
            // content.innerHTML = 'Oi';
            //
            // $(window).on('load',function(){
            //
            // });
        },
        mounted() {
            this.__showMessage()
        },
    })
}
