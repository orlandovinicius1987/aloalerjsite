const appName = 'vue-progress'

import vueDropzone from "vue2-dropzone"

if (jQuery("#" + appName).length > 0) {

    const app = new Vue({
        el: '#'+appName,

        components: {
            vueDropzone
        },

        data: {
            dropOptions: {
                url: laravel.files_upload_url
            }
        },

        methods: {
            changeFormRoute(action){
                form = document.getElementById('formProgress')
                form.action = action
                form.submit()
            },

            confirm(action){
                swal({
                    title: " Você tem certeza? ",
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