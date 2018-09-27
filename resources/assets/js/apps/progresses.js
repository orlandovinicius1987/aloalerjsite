const appName = 'vue-progress'
import helperMixin from '../mixins/helper'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {

        },

        mixins: [helperMixin],

        methods: {

        },
    })
}
