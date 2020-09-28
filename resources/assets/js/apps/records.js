const appName = 'vue-record'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'
import zipcodeMixin from '../mixins/zipcode'
import attachFiles from '../mixins/attach-files'

if (jQuery('#' + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        mixins: [editMixin, helpersMixin, zipcodeMixin, attachFiles],

        data: {
            is_anonymous: false,

            create_address: false,

            toggle_create_address_status: 'btn btn-sm btn-toggle inactive',
        },

        methods: {
            toggleAnonymous(event) {
                this.is_anonymous = !this.is_anonymous

                $('.non-anonymous').prop('disabled', this.is_anonymous)
                $('.non-anonymous').prop('value', '')

                $('#btn_create_address').prop('disabled', this.is_anonymous)
                if (this.is_anonymous) {
                    $('#btn_create_address').prop('checked', !this.is_anonymous)
                    this.create_address = !this.is_anonymous
                    this.toggle_create_address_status =
                        'btn btn-sm btn-toggle inactive'
                    this.clearAddress()
                }
            },

            toggleCreateAddress(event) {
                this.create_address = !this.create_address
                if (this.create_address) {
                    this.toggle_create_address_status =
                        'btn btn-sm btn-toggle active'
                }
                this.clearAddress()
            },
        },
    })
}
