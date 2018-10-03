const appName = 'vue-progress'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'

import vueDropzone from "vue2-dropzone"

if (jQuery("#" + appName).length > 0) {

    const app = new Vue({
        el: '#' + appName,
        mixins: [editMixin, helpersMixin],

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

            filesJson:JSON.constructor([]),

            currentFile:{
                id: null,
                description:'',
                extension:'',
            },
        },

        computed:{
            filesJsonString(){
                return JSON.stringify(this.filesJson)
            }
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
                this.currentFile.id = response['file_id']
                this.currentFile.extension = response['extension']
            },

            addToFilesArray: function(){
                this.filesJson.push({"file_id":this.currentFile.id, "description":this.currentFile.description, "extension":this.currentFile.extension})

                document.getElementById('drop1').dropzone.removeAllFiles()

                $('#ProgressFilesModal').modal('hide');

                this.currentFile.id = null
                this.currentFile.description = ''
                this.currentFile.extension = ''
            }
        },
    })
}