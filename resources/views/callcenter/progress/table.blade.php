                <div class="card">
                    <div class="card-header">{{ __('Andamentos') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if(session()->has('warning'))
                        <div class="alert alert-warning">
                            {{ session()->get('warning') }}
                        </div>
                        @endif

                        <div class="col-xs-8 col-md-10">
                            <h4>
                                {{--<a href="{{ route('progresses.create') }}">Novo</a>--}}
                            </h4>
                        </div>

                        <table id="progressesTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Origem</th>
                                <th>Tipo</th>
                                <th>Área</th>
                                <th>Tipo de Andamento</th>
                                <th>Solicitação</th>
                            </tr>
                            </thead>

                            @forelse ($progresses as $progress)
                                <tr>
                                    <td>
                                        <a href="{{ route('progresses.show', ['id' => $progress->id]) }}">{{ $progress->origin_id }}</a>
                                    </td>
                                    <td>
                                        @if(is_null($progress->recordType))
                                            N/C
                                        @else
                                            {{$progress->recordType->name}}
                                        @endIf
                                    </td>
                                    <td>
                                        @if(is_null($progress->area))
                                            N/C
                                        @else
                                            {{$progress->area->name}}
                                        @endIf
                                    </td>
                                    <td>
                                        @if(is_null($progress->progressType))
                                            N/C
                                        @else
                                            {{$progress->progressType->name}}
                                        @endIf
                                    </td>
                                    <td>
                                        {{$progress->original}}
                                    </td>
                                </tr>
                            @empty
                                <p>Nenhum andamento encontrado.</p>
                            @endforelse
                        </table>
                    </div>
                </div>
