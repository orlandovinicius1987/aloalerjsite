const appName = 'vue-committees'
import editMixin from '../mixins/edit'

Vue.directive('init', {
    bind: function(el, binding, vnode) {
        console.info(binding.arg);
        vnode.context.form[binding.arg] = binding.value;
    }
})

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,
        mixins: [editMixin],

        data: {
            form: {
                phone: null,
            }
        },

        methods: {
        },


    })
}
