export default {
    data() {
        return {
            mode: 'show',
        }
    },   

    methods: {       

        editButton(event){
            this.mode = 'edit'
         },

         cancel(event){
            location.reload()
         },
    },

    computed: {
        isShowing() {
            return this.mode === 'show'
        },        
        isEditing() {
            return this.mode === 'edit'
        },
        isCreating() {
            return this.mode === 'create'
        },
      }

    
}
