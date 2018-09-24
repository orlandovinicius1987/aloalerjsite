export default {
    data() {
        return {
            disabled: true,
        }
    },   

    methods: {
        example() {
            console.log('hello from example mixin!')
        },

        editButton(event){
            this.disabled = !this.disabled
         },
    },

    computed: {
        isDisabled() {
            return this.disabled;
        }
      }

    
}
