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
            },


        __instatiatePurechat() {

                const $this = this
            window.purechatApi = { l: [], t: [], on:
                    function () {
                        this.l.push(arguments);
                    }};

            var f = (function () {
                var done = false;
                var script = document.createElement('script');
                script.async = true;
                script.type = 'text/javascript';
                script.src =laravel.chat.client.url;
                document.getElementsByTagName('HEAD').item(0).appendChild(script);
                script.onreadystatechange = script.onload = function (e) {
                    if (!done && (!this.readyState || this.readyState == 'loaded'
                        || this.readyState == 'complete')) {

                        var w = new PCWidget({c: laravel.chat.client.id, f: true });
                        done = true;
                    }
                };
            })();



            purechatApi.on('chatbox.available:change', function (args) {
                console.log(args.available)
                $this.chatOnline = args.available
            });
        },
        },
        mounted() {
            this.__instatiatePurechat()
            //this.__instantiateIO()

           // this.__boot()

        },
    })
}
