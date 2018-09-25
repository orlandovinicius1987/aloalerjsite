const appName = 'vue-record'
import editMixins from '../mixins/edit-mixins'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        mixins: [editMixins],
        

        methods: {
            changeFormRoute(action){
                form = document.getElementById('formRecords')
                form.action = action
                form.submit()
            },

            copyUrl(url) {
                const copy = require('copy-text-to-clipboard');

                copy(url);
            },

            confirm(action){
                swal({
                    title: "Você tem certeza?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            let $this = this
                            $this.changeFormRoute(action)
                        }
                    });
            }
        },
    })
}
