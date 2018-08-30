const appName = 'vue-contact-outside-workflow'

Vue.directive('init', {
    bind: function(el, binding, vnode) {
        console.info(binding.arg);
        vnode.context.form[binding.arg] = binding.value;
    }
})

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            laravel: laravel,
            currentContactType: '' ,
            currentContact:  '',
            contactTypesArray: [],
            refreshing: false,
        },

        computed: {
            currentContactTypeName: function () {
                return this.contactTypesArray[this.currentContactType]
            },

            mobileSelected: function () {
                return (this.currentContactTypeName == 'mobile')
            },

            whatsappSelected: function () {
                return (this.currentContactTypeName == 'whatsapp')
            },

            emailSelected: function () {
                return (this.currentContactTypeName == 'email')
            },

            phoneSelected: function () {
                return (this.currentContactTypeName == 'phone')
            },

            facebookSelected: function () {
                return (this.currentContactTypeName == 'facebook')
            },

            twitterSelected: function () {
                return (this.currentContactTypeName == 'twitter')
            },

            instagramSelected: function () {
                return (this.currentContactTypeName == 'instagram')
            },
        },

        methods: {
            refresh() {
                this.refreshContactTypesArray()
            },

            refreshContactTypesArray() {
                me = this

                me.refreshing = true

                axios.get('/callcenter/contact_types/array')
                    .then(function(response) {
                        me.contactTypesArray = response.data

                        me.refreshing = false
                    })
                    .catch(function(error) {
                        console.log(error)

                        me.contactTypesArray = []

                        me.refreshing = false
                    })
            },

            initializeCurrents() {
                this.currentContactType = laravel.length == 0 ? '' : laravel.contact.contact_type_id
                if(laravel.length == 0) {
                    this.currentContact = ''
                } else {
                    if(laravel.old.contact != null) {
                        this.currentContact = laravel.old.contact
                    } else {
                        this.currentContact = laravel.contact.contact
                    }
                }

            }
        },

        beforeMount() {
            this.refresh()
        },

        mounted() {
            this.initializeCurrents()
        }

    })
}
