export default {
    data() {
        return {
            mode: 'show',
        }
    },   

    methods: {
        copyUrl(url) {
            const copy = require('copy-text-to-clipboard');

            copy(url);
        },

        editButton() {
            this.mode = 'edit'
         },

         cancel() {
            location.reload()
         },

        submitForm(action, formId) {
            let form = document.getElementById(formId)

            form.action = action

            form.submit()
        },

        confirmQuestion() {
            return swal({
                title: "Você tem certeza?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
        },

        confirm(action) {
            this.confirmQuestion()
                .then((confirmed) => {
                    if (confirmed) {
                        window.location.href = action
                    }
                });
        },

        confirmForPost(action, formId) {
            this.confirmQuestion()
                .then((confirmed) => {
                    if (confirmed) {
                        this.submitForm(action, formId)
                    }
                });
        },
    },

    computed: {
        isShowing() {
            return this.mode === 'show'
        },        
        isEditing() {
            return this.mode === 'edit'
        },
        isCreating() {
            return this.mode === 'create'
        },
      }
}
