const appName = 'vue-progress'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'

import vueDropzone from "vue2-dropzone"

if (jQuery("#" + appName).length > 0) {

    const app = new Vue({
        el: '#' + appName,
        mixins: [editMixins, helpersMixin],

        components: {
            vueDropzone
        },

        data: {
            dropOptions: {
                url: laravel.files_upload_url,
                maxFiles: 1,
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                }
            },

            filesArray:[],

            file_id:null,
            description:'',
        },

        methods: {
            changeFormRoute(action) {
                form = document.getElementById('formProgress')
                form.action = action
                form.submit()
            },

            confirm(action) {
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
            },

            'fileUploaded': function (file, response){
                this.file_id = response['file_id']
                console.info(response)
            },

            addToFilesArray: function(){
                var arrayItem = {file_id:this.file_id, description:this.description}
                this.filesArray.push(arrayItem)

                document.getElementById('drop1').dropzone.removeAllFiles()

                $('#ProgressFilesModal').modal('hide');

                this.file_id = null
                this.description = ''
            }
        },
    })
}