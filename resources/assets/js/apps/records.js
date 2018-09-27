const appName = 'vue-record'
import editMixins from '../mixins/edit-mixins'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        mixins: [editMixins],
        

        methods: {
            changeFormRoute(action){
                document.getElementById('formRecords').action = action
                document.getElementById('formRecords').submit()
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
