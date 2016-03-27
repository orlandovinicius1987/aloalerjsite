@if (isset($offline) && $offline)
    @include('partials.form-chat-offline')
@else
    @include('partials.form-chat-online')
@endif
