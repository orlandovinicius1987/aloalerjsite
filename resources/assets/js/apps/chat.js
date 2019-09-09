const appName = 'vue-chat'

if (jQuery("#" + appName).length > 0) {
    new Vue({
        el: '#' + appName,

        data: {
            chatOnline: false,

            clientChatSocket: null,
        },

        methods: {
            __checkOnline: function () {
                let url = laravel.chat.client.base_url + '/api/v1/chat/client/operators/online/for/client/' + laravel.chat.client.id;

                console.log('looking for online users...');

                let self = this;

                jQuery.ajax({
                    url: url,

                    jsonp: "callback",

                    dataType: "jsonp",

                    success: function (response) {
                        console.log(response.length);
                        self.chatOnline = response.length > 0;
                    }
                });
            },

            __bootSocketListeners: function () {
                this.clientChatSocket.on('chat-channel:UserAuthenticated', function (data) {
                    this.__checkOnlineInAWhile();
                }.bind(this));

                this.clientChatSocket.on('chat-channel:UserLoggedOut', function (data) {
                    this.__checkOnlineInAWhile();
                }.bind(this));
            },

            __checkOnlineInAWhile: function () {
                setTimeout(function () {
                    this.__checkOnline();
                }.bind(this), 1500);
            },

            __instantiateIO() {
                this.clientChatSocket = io(laravel.chat.client.socket_url)
            },

            __boot() {
                this.__checkOnline();

                this.__bootSocketListeners();

                setInterval(function () {
                    this.__checkOnline();
                }.bind(this), 40 * 1000);
            }
        },

        mounted() {
            this.__instantiateIO()

            this.__boot()
        },
    })
}
