<div v-if="chatOnline">
    <img src="/templates/mv/svg/balao-chat.svg" class="balao-chat" />
</div>

<div v-if="! chatOnline">
    <img src="/templates/mv/svg/balao-chat.svg" class="balao-chat offline" />
</div>
