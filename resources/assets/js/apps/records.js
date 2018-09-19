const appName = 'vue-record'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {

        },

        methods: {
            changeFormRoute(action){
                form = document.getElementById('formRecords')
                form.action = action
                form.submit()
            }
        },


    })
}
