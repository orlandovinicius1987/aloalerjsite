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

        showAccessCode(accessCode, route, has_email)
        {           
           
            if(has_email){
                return swal({
                    title: 'Enviar o código de acesso para os e-mails cadastrados do cidadão?',
                    icon: "warning",
                    buttons: {
                        cancel: 'Cancelar',
                        confirm: "Confirmar",
                    },
                    dangerMode: true,
                    }).then((response)=> { 
                        if(response){
                        axios.get(route)
                            .then((response) => {
                                swal({
                                title: 'Código de acesso:   ' + accessCode,
                                icon: "success",
                                confirmButton: true,
                                dangerMode: false,
                                text: 'Código enviado para o(s) e-mail(s) cadastrado(s)'
                                })
                            })
                        }
                    })

            }else{
                swal({
                    title: 'O usuário não possui e-mails válidos para envio da chave de acesso',
                    icon: "warning",
                    buttons: {
                        confirm: "OK",
                    },
                    dangerMode: true,
                    text:'A chave de acesso é: ' + accessCode,

                })
            }
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

