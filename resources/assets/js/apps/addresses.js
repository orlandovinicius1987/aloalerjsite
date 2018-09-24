const appName = 'vue-addresses'
import editMixins from '../mixins/edit-mixins'


Vue.directive('init', {
    bind: function(el, binding, vnode) {
        vnode.context.form[binding.arg] = binding.value;
    }
})

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        mixins: [editMixins],

        data: {
            tables: {
                addresses: [],
            },

            pesquisa: '',

            refreshing: false,

            filler: false,

            typeTimeout: null,

            form: {
                zipcode: null,
                street: null,
                neighbourhood: null,
                city: null,
                state: null,
            }
        },

        methods: {
            refresh() {
                me = this

                me.refreshing = true

                axios.get('/api/v1/zipcode/'+this.form.zipcode)
                .then(function(response) {
                    me.tables.addresses = response.data

                    if (response.data.addresses[0].street_name) {
                        me.form.zipcode = response.data.addresses[0].zip
                        me.form.street = response.data.addresses[0].street_name
                        me.form.neighbourhood = response.data.addresses[0].neighborhood
                        me.form.city = response.data.addresses[0].city
                        me.form.state = response.data.addresses[0].state_id
                        me.form.country = 'Brasil'
                        document.getElementById("number").focus();
                    }

                    me.refreshing = false
                })
                .catch(function(error) {
                    console.log(error)

                    me.tables.addresses = []

                    me.refreshing = false
                })
            },

            typeKeyUp() {
                clearTimeout(this.timeout)

                me = this

                this.timeout = setTimeout(function () { me.refresh() }, 500)
            },

            isNumber: function(evt) {
                evt = (evt) ? evt : window.event;
                charCode = (evt.which) ? evt.which : evt.keyCode;
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    evt.preventDefault();;
                } else {
                    return true;
                }
            }
        },

        mounted() {
            // this.refresh()            
        },
    })
}
