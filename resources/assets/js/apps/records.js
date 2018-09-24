const appName = 'vue-record'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data:{
            disabled : true
        },

        methods: {
            changeFormRoute(action){
                form = document.getElementById('formRecords')
                form.action = action
                form.submit()
            },

            copyUrl(url) {
                const copy = require('copy-text-to-clipboard');

                copy(url);
            },

            
            editButton(event){                    
               this.disabled = !this.disabled                           
                
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
        
        mounted() {
            form = document.getElementById('formRecords')           
            
        },
        
        computed: {
            isDisabled() {
                return this.disabled;
            }
          }
    
    })
}
