@php
    $quantCards = $kpiQuantCards ?? [];
    $qualCards = $kpiQualCards ?? [];
    $principalCards = $kpiCards ?? [];
    $isPrincipalStrip = ($overviewVariant ?? '') === 'principal';
    $nObs = (int) ($kpiObservationCount ?? 0);
@endphp
<div class="mb-8">
    @if ($nObs > 0)
        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-3">Based on <span class="text-slate-600">{{ $nObs }}</span> observation {{ $nObs === 1 ? 'visit' : 'visits' }} · trend compares latest visit to earliest in range</p>
    @else
        <p class="text-[11px] font-bold text-amber-700/80 uppercase tracking-widest mb-3 rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 inline-block">No observations yet — KPI tiles will populate after leadership audits are recorded.</p>
    @endif

    @if ($isPrincipalStrip)
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-5">
            @foreach ($principalCards as $card)
                @include('dashboard.partials.overview-kpi-metric-card', [
                    'card' => $card,
                    'gid' => 'kpi-p-'.$loop->index,
                ])
            @endforeach
        </div>
    @else
        <div class="mb-6">
            <h3 class="text-sm font-bold text-slate-700 mb-3">Quantitative observations</h3>
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-5">
                @foreach ($quantCards as $card)
                    @include('dashboard.partials.overview-kpi-metric-card', [
                        'card' => $card,
                        'gid' => 'kpi-q-'.$loop->index,
                    ])
                @endforeach
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold text-slate-700 mb-3">Qualitative observations</h3>
            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-5">
                @foreach ($qualCards as $card)
                    @include('dashboard.partials.overview-kpi-metric-card', [
                        'card' => $card,
                        'gid' => 'kpi-l-'.$loop->index,
                    ])
                @endforeach
            </div>
        </div>
    @endif
</div>
