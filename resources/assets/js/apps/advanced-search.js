const appName = 'vue-advanced-search'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'

if (jQuery('#' + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        mixins: [editMixin, helpersMixin],

        data: {},

        methods: {
            changePerPage($event) {
                const pageSize = $event.srcElement.value

                $('#formRecords').submit(function() {
                    $(this).append(
                        '<input id="per_page" type="hidden" name="per_page" value=' +
                            pageSize +
                            ' /> ',
                    )
                    $(this).append(
                        '<input id="page" type="hidden" name="page" value="1" /> ',
                    )
                    return true
                })
                $('#search_button').click()
            },
        },
    })
}
