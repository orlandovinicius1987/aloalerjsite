@if((strtotime(date('H:i')) > strtotime('09:00') && strtotime(date('H:i')) < strtotime(date('18:00'))))

    <script type='text/javascript' data-cfasync='false'>

        window.purechatApi = { l: [], t: [], on:
                function () {
                    this.l.push(arguments);
                }};

        (function () {
            var done = false;
            var script = document.createElement('script');
            script.async = true;
            script.type = 'text/javascript';
            script.src = '{{env('CHAT_CLIENT_URL')}}';
            document.getElementsByTagName('HEAD').item(0).appendChild(script);
            script.onreadystatechange = script.onload = function (e) {
                if (!done && (!this.readyState || this.readyState == 'loaded'
                    || this.readyState == 'complete')) {

                    var w = new PCWidget({c: '{{ env('CHAT_CLIENT_ID') }}', f: true });
                    done = true;
                }
            };
        })();
    </script>

@else
    @include('partials.form-chat-offline')
@endif
