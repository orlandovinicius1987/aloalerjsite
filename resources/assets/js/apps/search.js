const appName = 'vue-search'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            tables: {
                people: null,
            },

            refreshing: false,

            filler: false,

            typeTimeout: null,

            foundBy: null,

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

                me.tables.people = null

                axios.post('/api/v1/search', {search: this.form.search})
                .then(function(response) {
                    if (response.data.success) {
                        me.tables.people = response.data.data
                        me.foundBy = response.data.foundBy
                    } else {
                        me.tables.people = []
                        me.errors = response.data.errors
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
        },

        mounted() {
            console.log('mounted');

            this.refresh()

            // this.refreshTable('people')
        },
    })

}
