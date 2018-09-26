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
                let $this = this

                $this.refreshing = true

                $this.errors = null

                $this.tables.committees = null

                axios.post('/api/v1/committees-search', {search: this.form.search})
                    .then(function(response) {
                        $this.tables.committees = []
                        $this.errors = false

                        if (response.data.success) {
                            $this.tables.committees = response.data.data
                            $this.errors = response.data.errors
                        }

                        $this.refreshing = false
                    })
                    .catch(function(error) {
                        console.log(error)

                        $this.refreshing = false
                    })
            },

            typeKeyUp() {
                clearTimeout(this.timeout)

                let $this = this

                this.timeout = setTimeout(function () { $this.refresh() }, 500)
            },

            refreshTable(table) {
                axios.get('/'+table)
                    .then(function(response) {
                        $this.tables[table] = response.data
                    })
                    .catch(function(error) {
                        console.log(error)

                        $this.tables[table] = []
                    })
            },

            isSearching() {
                return this.form.search.name || this.form.search.cpf_cnpj
            }
        },

        mounted() {
            console.log('mounted');

            this.refresh()

            // this.refreshTable('people')
        },
    })

}
