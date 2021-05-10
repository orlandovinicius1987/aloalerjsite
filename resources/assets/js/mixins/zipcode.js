export default {
    data: {
        refreshing: false,

        filler: false,

        typeTimeout: null,

        tables: {
            addresses: [],
        },

        address: {
            zipcode: null,
            street: null,
            neighbourhood: null,
            city: null,
            state: null,
        },
    },

    methods: {
        refresh() {
            let $this = this

            $this.refreshing = true

            axios
                .get('/api/v1/zipcode/' + this.address.zipcode, {
                    params: {
                        api_token: laravel.api_token,
                    },
                })
                .then(function (response) {
                    $this.tables.addresses = response.data

                    if (response.data.logradouro) {
                        $this.address.zipcode = response.data.cep
                        $this.address.street = response.data.logradouro
                        $this.address.neighbourhood = response.data.bairro
                        $this.address.city = response.data.localidade
                        $this.address.state = response.data.uf
                        $this.address.country = 'Brasil'
                        document.getElementById('number').focus()
                    }

                    $this.refreshing = false
                })
                .catch(function (error) {
                    console.log(error)

                    $this.tables.addresses = []

                    $this.refreshing = false
                })
        },

        typeKeyUp() {
            clearTimeout(this.timeout)

            const $this = this

            this.timeout = setTimeout(function () {
                $this.refresh()
            }, 500)
        },

        isNumber: function (evt) {
            evt = evt ? evt : window.event
            charCode = evt.which ? evt.which : evt.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46) {
                evt.preventDefault()
            } else {
                return true
            }
        },

        clearAddress() {
            this.address.zipcode = ''
            ;(this.address.street = ''),
                (this.address.neighbourhood = ''),
                (this.address.city = ''),
                (this.address.state = '')
        },
    },
}
