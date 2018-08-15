const appName = 'vue-progress'

if (jQuery("#" + appName).length > 0) {
    const app = new Vue({
        el: '#'+appName,

        data: {

        },

        methods: {
            changeFormRoute(oi){
                e = document.getElementById('formProgress')
                e.action = oi
                e.submit()
            }
        },


    })
}
