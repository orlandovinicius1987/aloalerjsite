const appName = 'vue-progress'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {

        },

        methods: {
            changeFormRoute(action){
                form = document.getElementById('formProgress')
                form.action = action
                form.submit()
            }
        },


    })
}
