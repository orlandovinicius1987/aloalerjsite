const appName = 'vue-editButton'

if (jQuery("#" + appName).length > 0) {

    const app = new Vue({
        el: '#'+appName,
            methods: {
                editButton: function (event){
                    alert('edit!!')
                },
            },

        mounted() {
          alert('mounted')
        },
    })

}