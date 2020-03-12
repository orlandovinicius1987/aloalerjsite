const appName = 'vue-search'

if (jQuery('#' + appName).length > 0) {
    const app = new Vue({
        el: '#' + appName,

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
            },
        },

        methods: {
            refresh() {
                let $this = this

                $this.refreshing = true

                $this.errors = null

                $this.tables.people = null

                axios
                    .post('/api/v1/search', {
                        api_token: laravel.api_token,
                        search: this.form.search,
                    })
                    .then(function(response) {
                        $this.response = response.data

                        $this.tables.people = []
                        $this.tables.people = $this.response.success
                            ? $this.response.data
                            : []
                        $this.isCpfCnpj = $this.response.is_cpf_cnpj
                        $this.isNumeric = $this.response.is_numeric
                        $this.errors = $this.response.errors

                        $this.refreshing = false
                    })
                    .catch(function(error) {
                        console.log(error)

                        $this.tables.addresses = []

                        $this.refreshing = false
                    })
            },

            typeKeyUp() {
                clearTimeout(this.timeout)

                let $this = this

                this.timeout = setTimeout(function() {
                    $this.refresh()
                }, 500)
            },

            refreshTable(table) {
                let $this = this

                axios
                    .get('/' + table)
                    .then(function(response) {
                        $this.tables[table] = response.data
                    })
                    .catch(function(error) {
                        console.log(error)

                        $this.tables[table] = []
                    })
            },

            isSearching() {
                return (
                    this.form.search.search ||
                    this.form.search.name ||
                    this.form.search.cpf_cnpj
                )
            },

            getName() {
                return !this.isNumeric ? this.form.search.search : ''
            },

            getCpfCnpj() {
                return this.isCpfCnpj ? this.form.search.search : ''
            },

            canCreateNewPerson() {
                return (
                    this.form.search.search &&
                    (!this.isNumeric ||
                        (this.response && this.response.count == 0))
                )
            },
        },

        mounted() {
            this.refresh()

            // this.refreshTable('people')
        },
    })
}
