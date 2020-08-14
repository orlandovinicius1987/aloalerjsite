const appName = 'vue-record'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'

if (jQuery("#" + appName).length > 0) {
    new Vue({
        el: '#'+appName,

        mixins: [editMixin, helpersMixin],

        data:{
            is_anonymous: false
        },
        methods:{
            toggleAnonymous(event){
                console.log(event)
                this.is_anonymous = !this.is_anonymous
                console.log(this.is_anonymous)
                $('#cpf_cnpj').prop('disabled', this.is_anonymous)
                $('#name').prop('disabled', this.is_anonymous)
                $('#mobile').prop('disabled', this.is_anonymous)
                $('#whatsapp').prop('disabled', this.is_anonymous)
                $('#email').prop('disabled', this.is_anonymous)
                $('#phone').prop('disabled', this.is_anonymous)


            }
        },

    })
}
