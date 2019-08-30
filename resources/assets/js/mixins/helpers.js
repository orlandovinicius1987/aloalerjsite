export default {
    data() {
        return {
            key: 'value',
        }
    },

    methods: {
        detail(router) {
            window.location = router;
        },

        copyUrl(url) {
            const copy = require('copy-text-to-clipboard');

            copy(url);
        },
    }
}
