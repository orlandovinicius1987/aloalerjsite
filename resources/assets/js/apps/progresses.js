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

            file_id:null,
            description:'',
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
                this.file_id = response['file_id']
                console.info(response)
            },

            addToFilesArray: function(){
                this.filesJson.push({"file_id":this.file_id, "description":this.description})

                // console.log(this.filesArray)
                // var aux = JSON.parse(this.filesArray)
                // console.log('j1 = ' + j1)
                // aux.push({"file_id":this.file_id, "description":this.description})
                // console.log('j1 = ' + j1)
                // this.filesArray = JSON.stringify(aux)
                // console.log('j3 = ' + j3)

                document.getElementById('drop1').dropzone.removeAllFiles()

                $('#ProgressFilesModal').modal('hide');

                this.file_id = null
                this.description = ''
            }
        },
    })
}