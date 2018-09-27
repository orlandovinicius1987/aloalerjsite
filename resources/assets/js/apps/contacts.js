const appName = 'vue-contacts'
import helperMixin from '../mixins/helper'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            form: {

            }
        },

        methods: {
        },

        mixins: [helperMixin],
    })
}
