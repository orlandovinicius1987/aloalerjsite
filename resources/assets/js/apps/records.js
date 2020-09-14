const appName = 'vue-record'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'

if (jQuery('#' + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        mixins: [editMixin, helpersMixin],

        data: {

            tables: {
                addresses: [],
            },

            is_anonymous: false,

            create_address: false,

            toggle_create_address_status: 'btn btn-sm btn-toggle inactive',

            refreshing: false,

            filler: false,

            typeTimeout: null,

            form: {
                zipcode: null,
                street: null,
                neighbourhood: null,
                city: null,
                state: null,
            },
        },
        methods: {
            toggleAnonymous(event) {
                this.is_anonymous = !this.is_anonymous

                $('.non-anonymous').prop('disabled', this.is_anonymous)
                $('.non-anonymous').prop('value','')

                $('#btn_create_address').prop('disabled', this.is_anonymous)
                if(this.is_anonymous) {
                    $('#btn_create_address').prop('checked', !this.is_anonymous)
                    this.create_address = !this.is_anonymous
                    this.toggle_create_address_status = 'btn btn-sm btn-toggle inactive'
                }

            },

            toggleCreateAddress(event){
                this.create_address = !this.create_address
                if(this.create_address){
                    this.toggle_create_address_status = 'btn btn-sm btn-toggle active'
                }
            },

            refresh() {
                let $this = this

                $this.refreshing = true

                console.log('form.zipcode: '+ this.form.zipcode)
                axios
                    .get('/api/v1/zipcode/' + this.form.zipcode, {
                        params: {
                            api_token: laravel.api_token,
                        },
                    })
                    .then(function(response) {
                        $this.tables.addresses = response.data
                        console.log(response.data)
                        if (response.data.addresses[0].street_name) {
                            $this.form.zipcode = response.data.addresses[0].zip
                            $this.form.street =
                                response.data.addresses[0].street_name
                            $this.form.neighbourhood =
                                response.data.addresses[0].neighborhood
                            $this.form.city = response.data.addresses[0].city
                            $this.form.state =
                                response.data.addresses[0].state_id
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

                const $this = this

                this.timeout = setTimeout(function() {
                    $this.refresh()
                }, 500)
            },

            isNumber: function(evt) {
                evt = evt ? evt : window.event
                charCode = evt.which ? evt.which : evt.keyCode
                if (
                    charCode > 31 &&
                    (charCode < 48 || charCode > 57) &&
                    charCode !== 46
                ) {
                    evt.preventDefault()
                } else {
                    return true
                }
            },
        },
    })
}
