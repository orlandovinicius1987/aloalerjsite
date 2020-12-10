<table id="areasTable" class="table table-striped table-hover" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Ativo?</th>
    </tr>
    </thead>

    @foreach($areas as $area)
        <tr>
            <td><a :href="'/callcenter/committees/'">{{$area->name}}</a></td>
            @if($area->is_active  == true)
                <td>Sim</td>
            @elseif($area->is_active  == false)
                <td>Não</td>
            @endif
        </tr>
    @endforeach
</table>
