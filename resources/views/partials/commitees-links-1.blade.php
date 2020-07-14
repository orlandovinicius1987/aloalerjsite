@foreach($committeeServices as $committeService)
    <p><a href="/services/{{$committeService->id}}">{{$committeService->link_caption}}</a></p>
@endforeach