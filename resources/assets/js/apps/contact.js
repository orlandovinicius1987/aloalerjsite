const appName = 'vue-contact'

Vue.directive('init', {
    bind: function(el, binding, vnode) {
        vnode.context.form[binding.arg] = binding.value;
    }
})

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            tables: {
                addresses: [],
            },

            pesquisa: '',

            refreshing: false,

            filler: false,

            typeTimeout: null,

            form: {
                cep: null,
                rua: null,
                bairro: null,
                cidade: null,
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
                        me.form.cep = response.data.addresses[0].zip
                        me.form.rua = response.data.addresses[0].street_name
                        me.form.bairro = response.data.addresses[0].neighborhood
                        me.form.cidade = response.data.addresses[0].city
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
        },

        mounted() {
            // this.refresh()
        },
    })
}
