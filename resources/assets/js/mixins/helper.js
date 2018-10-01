export default {
    data() {
        return {
            key: 'value',
        }
    },

    methods: {
        detail(router){
            window.location.href = router;
        },

        changeFormRoute(action, formId){
            let form = document.getElementById(formId)
            form.action = action
            form.submit()
        },

        confirm(action, formId){
            swal({
                title: " Você tem certeza? ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let $this = this
                        $this.changeFormRoute(action, formId)
                    }
                });
        },
    }
}
