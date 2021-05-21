
@if ($alerts = session('alerts'))

    @foreach($alerts as $alert)
        <div class="alert alert-{{ $alert['type'] }}">
            {{ $alert['message'] }}
        </div>
    @endforeach
@endif
