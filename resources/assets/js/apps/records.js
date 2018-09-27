const appName = 'vue-record'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'

if (jQuery("#" + appName).length > 0) {
    new Vue({
        el: '#'+appName,

        mixins: [editMixin, helpersMixin],
    })
}
