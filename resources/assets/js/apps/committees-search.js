const appName = 'vue-committees-search'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            tables: {
                committees: null,
            },

            refreshing: false,

            filler: false,

            typeTimeout: null,

            foundByCpfCnpj: null,

            errors: null,

            form: {
                search: null,
            }
        },

        methods: {
            refresh() {
                me = this

                me.refreshing = true

                me.errors = null

                me.tables.committees = null

                axios.post('/api/v1/committees-search', {search: this.form.search})
                    .then(function(response) {
                        me.tables.committees = []
                        me.errors = false

                        if (response.data.success) {
                            me.tables.committees = response.data.data
                            me.errors = response.data.errors
                        }

                        me.refreshing = false
                    })
                    .catch(function(error) {
                        console.log(error)

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

            isSearching() {
                return this.form.search.name || this.form.search.cpf_cnpj
            }
        },

        mounted() {
            this.refresh()

            // this.refreshTable('people')
        },
    })

}
