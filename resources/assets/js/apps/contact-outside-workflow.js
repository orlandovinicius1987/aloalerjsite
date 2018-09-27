const appName = 'vue-contact-outside-workflow'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        mixins: [editMixin, helpersMixin],

        data: {
            laravel: laravel,
            currentContactType: '' ,
            currentContact:  '',
            contactTypesArray: [],
            refreshing: false,
        },

        mixins: [helpersMixin],

        computed: {
            mask: function () {
                let mask = "*".repeat(255)

                switch (this.currentContactTypeName) {
                    case 'mobile' :
                        mask = ['(##) #####-####'];
                        break;
                    case 'whatsapp' :
                        mask = ['(##) #####-####'];
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
                let $this = this

                $this.refreshing = true

                axios.get('/callcenter/contact_types/array')
                    .then(function(response) {
                        $this.contactTypesArray = response.data

                        $this.refreshing = false
                    })
                    .catch(function(error) {
                        console.log(error)

                        $this.contactTypesArray = []

                        $this.refreshing = false
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

            let $this = this

            $("#contact_type_id").on('change', function () {
                e = document.getElementById("contact_type_id")
                $this.currentContactType = e.options[e.selectedIndex].value
            })
        }

    })
}
