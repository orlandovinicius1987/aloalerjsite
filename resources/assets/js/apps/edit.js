const appName = 'vue-editButton'

if (jQuery("#" + appName).length > 0) {

    const app = new Vue({
        el: '#'+appName,
            methods: {
                editButton(){
                    alert('edit!!')
                },
            },

        mounted() {
          aler('mounted')
        },
    })

}