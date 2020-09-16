import vueDropzone from 'vue2-dropzone'

export default {
    components: {
        vueDropzone,
    },

    data: {
        dropOptions: {
            url: laravel.files_upload_url,
            maxFiles: 1,
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('[name=csrf-token]')
                    .content,
            },
        },

        filesJson: JSON.constructor([]),

        currentFile: {
            id: null,
            description: '',
            extension: '',
            icon: '',
            refreshing: false,
        },

        errors: null,
    },

    computed: {
        filesJsonString() {
            return JSON.stringify(this.filesJson)
        },
    },

    methods: {
        fileUploaded: function(file, response) {
            this.currentFile.id = response['file_id']
            this.currentFile.extension = response['extension']
        },

        resetFile() {
            this.currentFile.id = null
            this.currentFile.description = ''
            this.currentFile.extension = ''
            this.currentFile.icon = ''
        },

        addToFilesArray: function() {
            this.refreshIconAndPushArray()

            document.getElementById('drop1').dropzone.removeAllFiles()

            $('#ProgressFilesModal').modal('hide')
        },

        cancelModal: function() {
            document.getElementById('drop1').dropzone.removeAllFiles()

            $('#ProgressFilesModal').modal('hide')

            this.resetFile()
        },

        refreshIconAndPushArray() {
            let $this = this

            $this.errors = null

            axios
                .post('/api/v1/convert-extension-to-icon', {
                    api_token: laravel.api_token,
                    extension: $this.currentFile.extension,
                })
                .then(function(response) {
                    console.log(response)

                    if (response.data.success) {
                        $this.filesJson.push({
                            file_id: $this.currentFile.id,
                            description: $this.currentFile.description,
                            extension: $this.currentFile.extension,
                            icon: response.data.iconClass,
                        })

                        $this.errors = response.data.errors
                    }
                })
                .then(function() {
                    $this.resetFile()
                })
                .catch(function(error) {
                    console.log(error)
                })
        },
    },
}
