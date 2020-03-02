
<table id="committeesServiceTable" class="table table-striped table-hover d-none d-sm-block" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Serviço</th>
            <th>Aberto ao Público</th>
        </tr>
    </thead>

    @foreach($committeeServices as $committeeService)
        <tr>
            <td><a href="{{route('committee_services.details',['id'=>$committeeService->id])}}">{{ $committeeService->short_name }}</a></td>
            <td>{{ $committeeService->public == 0 ? 'Não' : 'Sim' }}</td>
        </tr>
    @endforeach
</table>
