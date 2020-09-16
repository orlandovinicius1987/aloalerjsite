const appName = 'vue-progress'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'
import attachFiles from '../mixins/attach-files'

if (jQuery('#' + appName).length > 0) {
    const app = new Vue({
        el: '#' + appName,
        mixins: [editMixin, helpersMixin, attachFiles],
    })
}
