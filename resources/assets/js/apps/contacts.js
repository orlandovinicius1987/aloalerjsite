const appName = 'vue-contacts'

Vue.directive('init', {
    bind: function(el, binding, vnode) {
        console.info(binding.arg);
        vnode.context.form[binding.arg] = binding.value;
    }
})

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {
            form: {
                mobile: null,
                whatsapp: null,
                phone: null,
            }
        },

        methods: {
        },
    })
}
