export default {
    data() {
        return {
            mode: laravel.mode,
        }
    },   

    methods: {
        editButton() {
            this.mode = 'edit'
         },

         cancel() {
            location.reload()
         },

        submitForm(action, formId) {
            console.log('submitForm');

            let form = document.getElementById(formId)

            form.action = action

            form.submit()
        },

        confirmQuestion() {
            console.log('confirmQuestion');

            return swal({
                title: "Você tem certeza?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
        },



        confirm(action) {
            console.log('confirm');
            this.confirmQuestion()
                .then((confirmed) => {
                    if (confirmed) {
                        window.location = action
                    }
                });
        },

        showAccessCode(accessCode, action)
        {
           
            return swal({
                title: 'Tem certeza que quer recuperar o código de acesso?',
                icon: "warning",
                buttons: true,
                dangerMode: true,
                
                
            }).then(()=>{
                return swal({
                    title: 'Código de acesso: ' + accessCode,
                    icon: "success",
                    confirmButton: true,
                    dangerMode: false,
                    text: 'Código enviado para o email cadastrado'
                    })
                }).then((confirmed) => {
                    if (confirmed) {
                        window.location = action
                    }
                });
        },

        confirmForPost(action, formId) {
            console.log('confirmForPost');

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

