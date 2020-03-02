const appName = 'vue-committee-services'
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
            tables: {
              committeeServices:[],
            },
            form: {
                phone: null,
            }
        },

        methods: {
        },


    })
}
