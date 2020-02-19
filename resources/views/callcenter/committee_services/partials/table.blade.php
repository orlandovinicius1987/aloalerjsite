
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



<!-------------------- Start of MOBILE VERSION -------------------->

{{--<div class="mobile-tables d-block d-sm-none" v-for="committee in tables.committees" >--}}

{{--    <div class="contact-line"><span class="mobile-label">Nome :</span>--}}
{{--        <a :href="'/callcenter/committees/show/' + committee.id">@{{ committee.name }}</a>--}}

{{--    </div>--}}
{{--    <div class="contact-line"><span class="mobile-label">Nome Resumido :</span>--}}
{{--        @{{ committee.short_name  }}--}}
{{--    </div>--}}
{{--    <div class="contact-line"><span class="mobile-label">Telefone :</span>--}}
{{--        @{{ committee.phone  }}--}}
{{--    </div>--}}
{{--    <div class="contact-line"><span class="mobile-label">Telefone Gabinete :</span>--}}
{{--        @{{ committee.office_phone  }}--}}
{{--    </div>--}}
{{--    <div class="contact-line"><span class="mobile-label">Presidente :</span>--}}
{{--        @{{ committee.president  }}--}}
{{--    </div>--}}
{{--    <div class="contact-line"><span class="mobile-label">Vice-Presidente :</span>--}}
{{--        @{{ committee.vice_president  }}--}}
{{--    </div>--}}
{{--    <div class="contact-line"><span class="mobile-label">Criado em :</span>--}}
{{--        @{{ committee.created_at  }}--}}
{{--    </div>--}}



{{--</div>--}}

{{--<!-------------------- END of MOBILE VERSION -------------------->--}}
</div>
