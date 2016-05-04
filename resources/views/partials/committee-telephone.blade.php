<div class="sidebar-content boxshadow">
    <div class="infos">
        <p class="titulo-comissao">{{ $title }}</p>
        <div class="linha-info"></div>
        <div class="tel-comissao"><a href="tel:{{ $telephone }}" class="tel-comissao-link">{{ $telephone }}</a></div>
        <div class="linha-info"></div>
        {!! isset($site) ? $site : '' !!}
        <p class="outras-info text-center">
            @if (! isset($hours))
                Atendimento das @include('partials.horario')
            @else
               {{ $hours }}
            @endif
        </p>
    </div>
</div>

