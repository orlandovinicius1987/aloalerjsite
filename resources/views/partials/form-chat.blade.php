<div class="boxshadow" id="vue-chat">
    <div v-show="chatOnline" style="display: none">
        @include('partials.form-chat-online')
    </div>

    <div v-show="! chatOnline">
        @include('partials.form-chat-offline')
    </div>
</div>
