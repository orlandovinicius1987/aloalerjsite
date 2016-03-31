<div v-if="chatOnline">
    @include('partials.form-chat-online')
</div>

<div v-if="! chatOnline">
    @include('partials.form-chat-offline')
</div>
