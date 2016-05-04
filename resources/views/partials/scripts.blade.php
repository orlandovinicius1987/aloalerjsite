<script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/vue/1.0.20/vue.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.min.js"></script>

<script>
    var isShowing = false;

    jQuery(function()
    {
        jQuery('#btn-telefones-uteis').click(function()
        {
            if ( ! isShowing)
            {
                jQuery('#agenda-tel-uteis').show(function()
                {
                    isShowing = true;
                });
            }
        });

        jQuery(document).click(function(evt)
        {
            if(jQuery(evt.target).closest('.agenda-tel-uteis').length)
            {
                return;
            }

            if(jQuery(evt.target).closest('.indice').length)
            {
                return;
            }

            if (isShowing)
            {
                jQuery('#agenda-tel-uteis').hide();

                isShowing = false;
            }
        });
    });
</script>


<script>
    $('#collapseOne').on('chatOnline.bs.collapse', function () {
        $('.panel-heading').animate({}, 500);
        $('.panel-heading').addClass('dropdown');
        $('.panel-heading').removeClass('dropup');
    })
    $('#collapseOne').on('hide.bs.collapse', function () {
        $('.panel-heading').animate({}, 500);
        $('.panel-heading').addClass('dropup');
        $('.panel-heading').removeClass('dropdown');

    })
</script>

<script>
    jQuery(document).ready(function ($) {
        setInterval(function () {
            moveRight();
        }, 3000);

        var slideCount = $('#slider ul li').length;
        var slideWidth = $('#slider ul li').width();
        var slideHeight = $('#slider ul li').height();
        var sliderUlWidth = slideCount * slideWidth;

        $('#slider').css({ width: slideWidth, height: slideHeight });

        $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });

        $('#slider ul li:last-child').prependTo('#slider ul');

        function moveLeft() {
            $('#slider ul').animate({
                left: + slideWidth
            }, 200, function () {
                $('#slider ul li:last-child').prependTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        function moveRight() {
            $('#slider ul').animate({
                left: - slideWidth
            }, 200, function () {
                $('#slider ul li:first-child').appendTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        $('a.control_prev').click(function () {
            moveLeft();
        });
    });
</script>

<script>
    jQuery(function()
    {
        var clientChatSocket = io('{{ config('env.socket_url') }}');

        new Vue({
            el: '#vue-app',

            data: {
                message: 'Hello Vue.js!',
                chatOnline: false,
            },

            methods: {
                __checkOnline: function () {
                    var url = '{{ env("CHAT_CLIENT_BASE_URL") }}/api/v1/chat/client/operators/online/for/client/{{ env('CHAT_CLIENT_ID') }}';

                    console.log('looking for online users...');

                    var self = this;

                    jQuery.ajax({
                        url: url,

                        jsonp: "callback",

                        dataType: "jsonp",

                        success: function (response) {
                            console.log(response.length); // server response
                            self.chatOnline = response.length > 0;
                        }
                    });
                },

                __bootSocketListeners: function()
                {
                    clientChatSocket.on('chat-channel:UserAuthenticated', function(data)
                    {
                        this.__checkOnlineInAWhile();
                    }.bind(this));

                    clientChatSocket.on('chat-channel:UserLoggedOut', function(data)
                    {
                        this.__checkOnlineInAWhile();
                    }.bind(this));
                },

                __checkOnlineInAWhile: function ()
                {
                    setTimeout(function ()
                    {
                        this.__checkOnline();
                    }.bind(this), 1500);
                }
            },

            ready: function ()
            {
                this.__checkOnline();

                this.__bootSocketListeners();

                setInterval(function ()
                {
                    this.__checkOnline();
                }.bind(this), 40 * 1000);
            }
        });
    });
</script>


<!-- Plugin JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="/templates/mv/js/classie.js"></script>
<script src="/templates/mv/js/cbpAnimatedHeader.js"></script>

