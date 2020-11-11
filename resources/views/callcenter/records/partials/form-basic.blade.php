
<div class="form-group row">
    @if (isset($record) and is_null($record->id))
        <div class="col-md-4">
            <label for="origin_id" class="col-form-label">Origem</label>
            <select id="origin_id" class="form-control{{ $errors->getBag('validation')->has('origin_id') ? ' is-invalid' : '' }} select2" name="origin_id" value="{{is_null(old('origin_id')) ? $record->origin_id : old('origin_id') }}" required autofocus>
                <option value="">SELECIONE</option>
                @foreach ($origins as $key => $origin)
                    @if(((!is_null($record->id)) && (!is_null($record->origin_id) && $record->origin_id === $origin->id) || (!is_null(old('origin_id'))) && old('origin_id') == $origin->id))
                        <option value="{{ $origin->id }}" selected="selected">{{ $origin->name }}</option>
                    @else
                        <option value="{{ $origin->id }}">{{ $origin->name }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->getBag('validation')->has('origin_id'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('origin_id') }}</strong></span>
            @endif
        </div>
    @endIf

    <div class="col-md-4">
        <label for="committee_id" class="col-form-label">Departamento</label>
        <select id="committee_id" class="form-control{{ $errors->getBag('validation')->has('committee_id') ? ' is-invalid' : '' }} select2" name="committee_id" value="{{is_null(old('committee_id')) ? $record->committee_id : old('committee_id') }}" required autofocus @include('partials.disabled',['model'=>$record])>
            <option value="">SELECIONE</option>
            @foreach ($committees as $key => $committe)
                @if(((!is_null($record->id)) && (!is_null($record->committee_id) && $record->committee_id === $committe->id) || (!is_null(old('committee_id'))) && old('committee_id') == $committe->id))
                    <option value="{{ $committe->id }}" selected="selected">{{ $committe->name }}</option>
                @else
                    <option value="{{ $committe->id }}">{{ $committe->name }}</option>
                @endif
            @endforeach
        </select>
        @if ($errors->getBag('validation')->has('committee_id'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('committee_id') }}</strong></span>
        @endif
    </div>

    <div class="col-md-4">
        <label for="record_type_id" class="col-form-label">Tipo</label>
        <select id="record_type_id" class="form-control{{ $errors->getBag('validation')->has('record_type_id') ? ' is-invalid' : '' }} select2" name="record_type_id" value="{{is_null(old('record_type_id')) ? $record->record_type_id : old('record_type_id') }}" required autofocus @include('partials.disabled',['model'=>$record])>
            <option value="">SELECIONE</option>
            @foreach ($recordTypes as $key => $recordType)
                @if(((!is_null($record->id)) && (!is_null($record->record_type_id) && $record->record_type_id === $recordType->id) || (!is_null(old('record_type_id'))) && old('record_type_id') == $recordType->id))
                    <option value="{{ $recordType->id }}" selected="selected">{{ $recordType->name }}</option>
                @else
                    <option value="{{ $recordType->id }}">{{ $recordType->name }}</option>
                @endif
            @endforeach
        </select>
        @if ($errors->getBag('validation')->has('record_type_id'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('record_type_id') }}</strong>M/span>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        <label for="area_id" class="col-form-label">Assunto</label>
        <select id="area_id" type="area_id" class="form-control{{ $errors->getBag('validation')->has('area_id') ? ' is-invalid' : '' }} select2" name="area_id" value="{{is_null(old('area_id')) ? $record->area_id : old('area_id') }}" required autofocus @include('partials.disabled',['model'=>$record])>
            <option value="">SELECIONE</option>
            @foreach ($areas as $key => $area)
                @if(((!is_null($record->id)) && (!is_null($record->area_id) && $record->area_id === $area->id) || (!is_null(old('area_id'))) && old('area_id') == $area->id))
                    <option value="{{ $area->id }}" selected="selected">{{ $area->name }}</option>
                @else
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endif
            @endforeach
        </select>
        @if ($errors->getBag('validation')->has('area_id'))
            <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('area_id') }}</strong></span>
        @endif
    </div>

    <div class="col-md-3">
        <label for="send_answer_by_email_checkbox" class="col-form-label">Resposta por e-mail</label>
        {{--<p class="form-twolines">--}}
        {{--<button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" aria-pressed="true" autocomplete="não" @include('partials.disabled',['model'=>$record])>--}}
        {{--<div class="handle"></div>--}}
        {{--</button>--}}
        {{--</p>--}}

        <p class="checkbox">
            <input id="send_answer_by_email" type="hidden" name="send_answer_by_email" value="0">
            <input id="send_answer_by_email_checkbox" type="checkbox" name="send_answer_by_email" {{old('send_answer_by_email')
                                || $record->send_answer_by_email ? 'checked="checked"' : ''}}>
        </p>
    </div>
</div>

<div class="form-group row">
    @if (isset($record) and is_null($record->id))
        <div class="col-md-12">
            <label for="original" class="col-form-label">Solicitação</label>
            <textarea id="original" class="form-control{{ $errors->getBag('validation')->has('original') ? ' is-invalid' : '' }}" name="original" required rows="15">{{is_null(old('original')) ? $record->original : old('original') }}</textarea>
            @if ($errors->getBag('validation')->has('original'))
                <span class="invalid-feedback" role="alert"><strong>{{ $errors->getBag('validation')->first('original') }}</strong></span>
            @endif
        </div>
    @endif
</div>

