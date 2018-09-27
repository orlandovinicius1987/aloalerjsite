const appName = 'vue-record'
import editMixins from '../mixins/edit-mixins'

if (jQuery("#" + appName).length > 0) {
    new Vue({
        el: '#'+appName,

        mixins: [editMixins],
    })
}
