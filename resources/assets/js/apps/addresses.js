const appName = 'vue-addresses'

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
                zipcode: null,
            }
        },

        methods: {
            refresh() {
                me = this

                me.refreshing = true
                
                axios.get('/zipcode', {
                    params: {
                        search: this.zipcode,
                        filter: this.form
                    }
                })
                .then(function(response) {
                    me.tables.addresses = response.data

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

            refreshTable(table) {
                axios.get('/'+table)
                    .then(function(response) {
                        me.tables[table] = response.data
                    })
                    .catch(function(error) {
                        console.log(error)

                        me.tables[table] = []
                    })
            },
        },

        mounted() {
            this.refresh()

            this.refreshTable('addresses')

        },
    })

}