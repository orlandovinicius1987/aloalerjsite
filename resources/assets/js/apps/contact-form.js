const appName = 'vue-contact-form'

if (jQuery('#' + appName).length > 0) {
    const app = new Vue({
        el: '#' + appName,

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
            },
        },

        methods: {
            refresh() {
                let $this = this

                $this.refreshing = true

                axios
                    .get('/api/v1/zipcode/' + this.form.cep, {
                        params: {
                            api_token: laravel.api_token,
                        },
                    })
                    .then(function(response) {
                        $this.tables.addresses = response.data

                        if (response.data.addresses[0].street_name) {
                            $this.form.cep = response.data.addresses[0].zip
                            $this.form.rua =
                                response.data.addresses[0].street_name
                            $this.form.bairro =
                                response.data.addresses[0].neighborhood
                            $this.form.cidade = response.data.addresses[0].city
                            $this.form.country = 'Brasil'
                            document.getElementById('number').focus()
                        }

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
        },

        mounted() {
            // this.refresh()
        },
    })
}
