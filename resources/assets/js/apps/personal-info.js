const appName = 'vue-personal-info'

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
