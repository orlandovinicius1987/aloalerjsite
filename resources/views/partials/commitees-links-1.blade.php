@foreach($committeeServices as $committeService)
    <p><a href="/comissoes/{{$committeService->committee_id}}">{{$committeService->link_caption}}</a></p>
@endforeach