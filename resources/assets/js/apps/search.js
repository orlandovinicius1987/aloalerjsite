const appName = 'vue-search'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            tables: {
                people: null,
            },

            response: null,

            refreshing: false,

            filler: false,

            typeTimeout: null,

            isCpfCnpj: false,

            isNumeric: false,

            errors: null,

            form: {
                search: {

                    search: '',
                    name: '',
                    cpf_cnpj: null,
                },
            }
        },

        methods: {
            refresh() {
                me = this

                me.refreshing = true

                me.errors = null

                me.tables.people = null

                axios.post('/api/v1/search', {search: this.form.search})
                .then(function(response) {
                    me.response = response.data

                    me.tables.people = []
                    me.errors = false
                    me.isCpfCnpj = false
                    me.isNumeric = false

                    if (response.data.success) {
                        me.tables.people = response.data.data
                        me.errors = response.data.errors
                        me.isCpfCnpj = response.data.is_cpf_cnpj
                        me.isNumeric = response.data.is_numeric
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
                return this.form.search.search || this.form.search.name || this.form.search.cpf_cnpj
            },

            getName() {
                return !this.isNumeric ? this.form.search.search : ''
            },

            getCpfCnpj() {
                return this.isCpfCnpj ? this.form.search.search : ''
            },

            canCreateNewPerson() {
                return this.form.search.search && (!this.isNumeric || (this.response.count == 0))
            }
        },

        mounted() {
            console.log('mounted');

            this.refresh()

            // this.refreshTable('people')
        },
    })

}
