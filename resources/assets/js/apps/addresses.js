const appName = 'vue-addresses'
import editMixin from '../mixins/edit'
import helpersMixin from '../mixins/helpers'
import zipcodeMixin from '../mixins/zipcode'

Vue.directive('init', {
    bind: function(el, binding, vnode) {
        console.info(binding.arg)
        vnode.context.form[binding.arg] = binding.value
    },
})

if (jQuery('#' + appName).length > 0) {
    const app = new Vue({
        el: '#' + appName,

        mixins: [editMixin, helpersMixin,zipcodeMixin],

        data: {

            pesquisa: '',

        },

        mounted() {
            // this.refresh()
        },
    })
}
