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
            currentContactType: laravel.length == 0 ? '' : laravel.contact.contact_type_id ,
            currentContact:  laravel.length == 0 ? '' : laravel.contact.contact,
            contactTypesArray: [],
            refreshing: false,
        },

        computed: {
            mask: function () {
                let mask = "*".repeat(255)

                switch (this.currentContactTypeName) {
                    case 'mobile' :
                    case 'whatsapp' :
                        mask = ["(##) ####-####", "(##) #-####-####"];
                        break;
                    case 'phone':
                        mask = '(##) ####-####';
                        break;
                }

                return mask
            },

            masked() {
                return true
            },

            currentContactTypeName: function () {
                return this.contactTypesArray[this.currentContactType]
            },

            tokens() {
                return {
                    '*': {pattern: /.*/},
                    '#': {pattern: /\d/},
                    'X': {pattern: /[0-9a-zA-Z]/},
                    'S': {pattern: /[a-zA-Z]/},
                    'A': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleUpperCase()},
                    'a': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleLowerCase()},
                    '!': {escape: true}
                }
            }
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
            }
        },

        beforeMount() {
            this.refresh()
        },
    })
}
