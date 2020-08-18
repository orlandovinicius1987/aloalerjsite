<div class="card mt-4"  id="vue-record">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-7 col-md-4">
                <h3>
                    <i class="fas fa-list-ol"></i> Protocolos

                    @if (isset($onlyNonResolved))
                        Não Resolvidos
                    @endif
                    ({{$records->total()}} encontrados)
                </h3>
            </div>

            <div class="col-5 col-md-8 text-right">
                <font size="5">
                    Resultados por página:
                </font>
                <select id="paginate">
                    <option value="5" @if ($paginate == 5) selected @endif>5</option>
                    <option value="10"@if ($paginate == 10) selected @endif>10</option>
                    <option value="15"@if ($paginate == 15) selected @endif>15</option>
                    <option value="25"@if ($paginate == 25) selected @endif>25</option>
                    <option value="50"@if ($paginate == 50) selected @endif>50</option>
                    <option value="100"@if ($paginate == 100) selected @endif>100</option>
                    <option value="250"@if ($paginate == 250) selected @endif>250</option>
                    <option value="all"@if ($paginate == 'all') selected @endif>TODOS</option>
                </select>
            </div>

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
            </script>

            <script>
                $(document).ready(function(){
                    $('#paginate').on('change',function (){
                        $('#formRecords').submit(function(eventObj) {
                            var qtdpages = document.getElementById("paginate").value;
                            $(this).append('<input id="paginate" type="hidden" name="paginate" value='+qtdpages+' /> ');
                            return true;
                        });
                        $("#search_button").click()
                    })
                })
            </script>

            <div class="col-5 col-md-8 text-right">
                @if(isset($person))
                    <a id="button-novo-protocolo"
                       href="{{ route('records.create',['person_id'=>$person->id]) }}"
                       class="btn btn-primary btn-sm pull-right"
                    >
                        <i class="fa fa-plus"></i>
                        Novo Protocolo
                    </a>
                @endif
            </div>
        </div>
    </div>


    <div class="card-body d-none d-sm-block d-print-none">
        <table id="recordsTable" class="table table-striped table-hover" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Protocolos</th>
                @if(!isset($person)) {{-- Apenas para Protocolos não resolvidos:: http://aloalerj.com/callcenter/records/non-resolved  --}}
                <th>Nome</th>
                <th>Contatos</th>
                @endif
                <th>Solicitação</th>
                <th>Departamento</th>
                <th>Tipo de Protocolo</th>
                <th>Assunto</th>
                <th>Situação</th>
                <th>Criado em</th>
            </tr>
            </thead>

            @forelse ($records as $record)
                <tr v-on:click='detail("{{route('records.show', ['id' => $record->id])}}")' style="cursor: pointer;">
                    <td style="width: 10%">{{ $record->protocol }}</td>

                    @if(!isset($person)) {{-- Apenas para Protocolos não resolvidos:: http://aloalerj.com/callcenter/records/non-resolved  --}}
                        <td style="width: 5%">
                            <a href="{{ route('people.show',['id' => $record->person->id]) }}" >{{ $record->person->name }}</a>
                        </td>
                        <td style="width: 10%">
                            @foreach($record->person->contacts as $contact)
                                <p>
                                    {{ $contact->contact }}
                                </p>
                            @endForEach
                        </td>
                    @endif

                    <td style="word-wrap: break-word; width: 40%; max-width: 20px;">{{ $record->first_progress_original ?? '' }}</td>

                    <td style="width: 10%">{{ $record->committee->name ?? '' }}</td>

                    <td style="width: 5%">{{ $record->recordType->name ?? '' }}</td>

                    <td style="width: 5%">{{ $record->area->name ?? '' }}</td>

                    <td style="width: 5%">

                            @if($record->resolved_at)

                            <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">Finalizado</span>

                            @else
                                {{--<span class="badge badge-success">Em aberto</span>--}}
                            <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">Em Aberto</span>

                            @endIf

                    </td>

                    <td style="width: 5%">{{ $record->created_at_formatted ?? '' }}</td>
                </tr>
            @empty
                <p>Nenhum Protocolo encontrado</p>
            @endforelse
        </table>


    </div>

    <!-------------------- Start of MOBILE VERSION -------------------->

    <div class="card-body" >

        <div class="d-print-table d-block d-sm-none" style="width: 100%">
            @forelse ($records as $record)
                <div class="mobile-tables " v-on:click='detail("{{route('records.show', ['id' => $record->id])}}")' style="cursor: pointer; border: 1px solid rgba(0, 0, 0, .2);"  >
                    <div class="contact-line"><span class="mobile-label">Protocolo Nº</span>{{ $record->protocol }}</div>
                    @if(!isset($person)) {{-- Apenas para Protocolos não resolvidos:: http://aloalerj.com/callcenter/records/non-resolved  --}}
                        <div class="contact-line"><span class="mobile-label">Nome : </span> <a href="{{ route('people.show',['id' => $record->person->id]) }}" >{{ $record->person->name }}</a> </div>
                        <div class="contact-line"><span class="mobile-label">Contatos : </span>
                            @foreach($record->person->contacts as $contact)

                                    {{ $contact->contact }}
                                <br/>
                            @endForEach
                        </div>
                    @endif
                    <div class="contact-line" ><span class="mobile-label">Solicitação : </span>{{ $record->first_progress_original ?? '' }} </div>
                    <div class="contact-line"><span class="mobile-label">Departamento : </span>{{ $record->committee->name ?? '' }} </div>
                    <div class="contact-line"><span class="mobile-label">Tipo de Protocolo : </span>{{ $record->recordType->name ?? '' }} </div>
                    <div class="contact-line"><span class="mobile-label">Assunto : </span>{{ $record->area->name ?? '' }} </div>
                    <div class="contact-line">
                        <span class="mobile-label">Situação : </span>
                        @if($record->resolved_at)
                            <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">Finalizado</span>
                                @else
                                    <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">Em Aberto</span>
                            @endIf
                    </div>
                    <div class="contact-line"><span class="mobile-label">Criado em : </span> {{ $record->created_at_formatted ?? '' }} </div>
                </div>
            @empty
                <p>Nenhum Protocolo encontrado</p>
            @endforelse
        </div>

    </div>

    <!-------------------- END of MOBILE VERSION -------------------->

    <div class="d-flex justify-content-center">
        {{ $records->appends(Request::except('page'))->links() }}
    </div>

</div>

