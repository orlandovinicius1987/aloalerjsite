<div class="mt-4" id="vue-advanced-search">


    <div class="row mt-5 mb-4 align-items-center">
        <div class="col-12 col-md-8 pl-5">
            <h3>
                <i class="fas fa-list-ol"></i> Protocolos

                @if (isset($onlyNonResolved))
                    Não Resolvidos
                @endif
                ({{$records->total()}} encontrados)
            </h3>
        </div>

        @if(isset($mode) && $mode == 'advanced-search')
            <div class="col-12 col-md-8 pr-5 text-right d-print-none">
                <strong>
                    Resultados por página:
                </strong>
                <select @change="changePerPage" id="paginate">
                    @foreach($pageSizes as $pageSize)
                        <option value="{{$pageSize['value']}}" @if ($per_page == $pageSize['value']) selected @endif>{{$pageSize['label']}}</option>
                    @endforeach
                </select>

            </div>
        @endIf

        <div class="col-10 offset-1 offset-md-0 col-md-4 text-right">
            @if(isset($person))
                <a id="button-novo-protocolo"
                   href="{{ route('records.create',['person_id'=>$person->id]) }}"
                   class="btn btn-primary btn-sm btn-block pull-right"
                >
                    <i class="fa fa-plus"></i>
                    Novo Protocolo
                </a>
            @endif
        </div>
    </div>




    <!------------- VISIVEL APENAS NO DESKTOP ------------->
    <div class="search-results-list d-none d-sm-none d-md-none d-print-none d-lg-block">


        @forelse ($records as $record)

            <div class="row linha-item ml-4 mr-4 mb-2" v-on:click='detail("{{route('records.show', ['id' => $record->id])}}")' style="cursor: pointer; border: 1px solid rgba(0, 0, 0, .2);">

                <div class="col-lg-9 px-0 border-right">

                    <div class="row bg-info m-0 btlf-1">

                        <div class="col-4 py-4">
                            <p class="pl-4 ">
                                <span class="titulo-bold">Protocolo:</span><br>
                                {{ $record->protocol }} <br>

                                @if($record->resolved_at)
                                    <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">Finalizado</span>
                            @else
                                            {{--<span class="badge badge-success">Em aberto</span>--}}
                                            <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">Em Aberto</span></span></span>
                                @endIf
                            </p>
                            @if(!isset($person)) {{-- Apenas para Protocolos não resolvidos:: http://aloalerj.com/callcenter/records/non-resolved  --}}
                        </div>
                        <div class="col-4 py-4">
                            <p class="pl-3">
                                <span class="titulo-bold">Nome:</span><br>
                                <a href="{{ route('people.show',['person_id' => $record->person->id]) }}" >{{ $record->person->name }}</a>
                            </p>
                        </div>
                        <div class="col-4 py-4">
                            <p class="pl-3">
                                <span class="titulo-bold">Contatos:</span><br>
                                @foreach($record->person->contacts()->limit(10)->get() as $contact)
                                    {{ $contact->contact }} <br>
                                @endForEach
                            </p>
                            @endif
                        </div>
                    </div>

                    <div class="row m-0">
                        <div class="col-lg-12 py-4 px-4 border-right ">
                            <div style="overflow-y: auto;  !important;">
                                {{ $record->first_progress_original ?? '' }}
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 p-0 bg-info">
                    <p class="py-4 pl-3 pr-4 btlr-1">
                        <span class="titulo-bold">Assunto:</span><br>
                        {{ $record->area->name ?? '' }}
                    </p>
                    <p class="py-2 pr-4 pl-3">
                        <span class="titulo-bold">Departamento de Origem:</span><br>
                        {{ $record->origin_committee->name ?? '' }}
                    </p>
                    <p class="py-2 pr-4 pl-3">
                        <span class="titulo-bold">Departamento:</span><br>
                        {{ $record->committee->name ?? '' }}
                    </p>
                    <p class="py-2 pr-4 pl-3">
                        <span class="titulo-bold">Tipo de Protocolo:</span><br>
                        {{ $record->recordType->name ?? '' }}
                    </p>

                    <p class="py-2 pr-4 pl-3">
                        <span class="titulo-bold">Criado em:</span><br>
                        {{ $record->created_at_formatted ?? '' }}
                    </p>
                </div>

            </div>
        @empty
            <p>Nenhum Protocolo encontrado</p>
        @endforelse
    </div>



    <!-------------------- Start of MOBILE VERSION -------------------->

    <div class="card-body" >

        <div class="d-print-table d-block d-sm-block d-md-block d-lg-none" style="width: 100%">
            @forelse ($records as $record)
                <div class="mobile-tables " v-on:click='detail("{{route('records.show', ['id' => $record->id])}}")' style="cursor: pointer; border: 1px solid rgba(0, 0, 0, .2);"  >
                    <div class="contact-line"><span class="mobile-label">Protocolo Nº</span>{{ $record->protocol }}</div>
                    @if(!isset($person)) {{-- Apenas para Protocolos não resolvidos:: http://aloalerj.com/callcenter/records/non-resolved  --}}
                    <div class="contact-line"><span class="mobile-label">Nome : </span> <a href="{{ route('people.show',['person_id' => $record->person->id]) }}" >{{ $record->person->name }}</a> </div>
                    <div class="contact-line"><span class="mobile-label">Contatos : </span>
                        @foreach($record->person->contacts()->limit(10)->get() as $contact)

                            {{ $contact->contact }}
                            <br/>
                        @endForEach
                    </div>
                    @endif
                    <div class="contact-line" ><span class="mobile-label">Solicitação : </span>{{ $record->first_progress_original ?? '' }} </div>
                    <div class="contact-line"><span class="mobile-label">Departamento de Origem: </span>{{ $record->origin_committee->name ?? '' }} </div>
                    <div class="contact-line"><span class="mobile-label">Departamento : </span>{{ $record->committee->name ?? '' }} </div>
                    <div class="contact-line"><span class="mobile-label">Tipo de Protocolo : </span>{{ $record->recordType->name ?? '' }} </div>
                    <div class="contact-line"><span class="mobile-label">Assunto : </span>{{ $record->area->name ?? '' }} </div>
                    <div class="contact-line">
                        <span class="mobile-label">Situação : </span>
                        @if($record->resolved_at)
                            <span class="label-group"><span class="label label-danger"><i class="fas fa-times-circle"></i></span><span class="label label-danger ng-binding">Finalizado</span></span>
                        @else
                            <span class="label-group"><span class="label label-primary"><i class="fas fa-folder-open"></i></span><span class="label label-primary ng-binding">Em Aberto</span></span>
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



    <div class="d-flex justify-content-center d-print-none">
        {{ $records->appends(Request::except('page'))->links() }}
    </div>

</div>

