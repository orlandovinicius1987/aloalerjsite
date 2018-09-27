const appName = 'vue-record'
import helperMixin from '../mixins/helper'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        mixins: [helperMixin],

        methods: {
            copyUrl(url) {
                const copy = require('copy-text-to-clipboard');

                copy(url);
            },
        },
    })
}
