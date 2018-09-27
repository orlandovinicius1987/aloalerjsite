const appName = 'vue-contacts'
import helpersMixin from '../mixins/helpers'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            form: {

            }
        },

        methods: {
        },

        mixins: [helpersMixin],
    })
}
