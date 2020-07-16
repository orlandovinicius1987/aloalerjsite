@foreach($committeeServices as $committeService)
    <p><a href="{{ route('services.show', ['id'=>$committeService->id]) }}">{{$committeService->link_caption}}</a></p>
@endforeach

