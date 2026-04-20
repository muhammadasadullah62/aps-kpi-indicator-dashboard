@php($hasSpark = ! empty($card['spark_line_path']) && ! empty($card['spark_area_path']))
@php($tr = $card['trend'] ?? 'flat')
@php($cat = $card['category'] ?? 'quantitative')
@php($metricName = $card['metric_name'] ?? ($card['label'] ?? '—'))
@php($catLabel = $card['category_label'] ?? '—')

<div @class([
    'relative flex flex-col rounded-xl border bg-white p-3 shadow-sm transition-all duration-200',
    'border-l-[3px] border-l-emerald-500 border-t-slate-200 border-r-slate-200 border-b-slate-200 hover:border-emerald-300/80 hover:shadow-md hover:shadow-emerald-500/10' => $hasSpark && $tr === 'up',
    'border-l-[3px] border-l-rose-500 border-t-slate-200 border-r-slate-200 border-b-slate-200 hover:border-rose-300/80 hover:shadow-md hover:shadow-rose-500/10' => $hasSpark && $tr === 'down',
    'border-l-[3px] border-l-slate-300 border-t-slate-200 border-r-slate-200 border-b-slate-200 hover:shadow' => $hasSpark && $tr === 'flat',
    'border-slate-200/90 hover:border-slate-300 hover:shadow' => ! $hasSpark,
])>
    <div class="flex items-start justify-between gap-2">
        <div class="min-w-0 flex-1">
            <span @class([
                'mb-1 inline-block rounded px-1.5 py-0.5 text-[8px] font-black uppercase tracking-widest',
                'bg-slate-100 text-slate-600 ring-1 ring-slate-200/80' => $cat === 'overall',
                'bg-emerald-50 text-emerald-800 ring-1 ring-emerald-100' => $cat === 'quantitative',
                'bg-violet-50 text-violet-800 ring-1 ring-violet-100' => $cat === 'qualitative',
            ])>{{ $catLabel }}</span>
            <p class="mt-1 text-[13px] font-bold leading-snug text-slate-800 line-clamp-2">{{ $metricName }}</p>
        </div>
        <div @class([
            'shrink-0 text-xl font-black tabular-nums leading-none tracking-tight',
            'text-emerald-600' => $hasSpark && $tr === 'up',
            'text-rose-600' => $hasSpark && $tr === 'down',
            'text-slate-700' => ! $hasSpark || $tr === 'flat',
        ])>{{ $card['display'] ?? '—' }}</div>
    </div>

    @if ($hasSpark)
        <div @class([
            'relative mt-2.5 overflow-hidden rounded-lg ring-1',
            'bg-gradient-to-b from-emerald-50/90 to-white ring-emerald-100' => $tr === 'up',
            'bg-gradient-to-b from-rose-50/90 to-white ring-rose-100' => $tr === 'down',
            'bg-gradient-to-b from-slate-50 to-slate-100/80 ring-slate-200/90' => $tr === 'flat',
        ])>
            <svg class="pointer-events-none absolute inset-0 h-full w-full text-slate-300/30" viewBox="0 0 100 32" preserveAspectRatio="none" aria-hidden="true">
                <line x1="4" y1="26" x2="96" y2="26" stroke="currentColor" stroke-width="1" vector-effect="non-scaling-stroke" stroke-dasharray="3 5" />
            </svg>
            <svg class="relative block h-10 w-full" viewBox="0 0 100 32" preserveAspectRatio="none" role="img" aria-label="Trend for {{ $metricName }}">
                <defs>
                    <linearGradient id="{{ $gid }}-fill" x1="0" y1="0" x2="0" y2="1">
                        @if ($tr === 'up')
                            <stop offset="0%" stop-color="#059669" stop-opacity="0.35"/>
                            <stop offset="55%" stop-color="#10b981" stop-opacity="0.1"/>
                            <stop offset="100%" stop-color="#059669" stop-opacity="0"/>
                        @elseif ($tr === 'down')
                            <stop offset="0%" stop-color="#e11d48" stop-opacity="0.38"/>
                            <stop offset="50%" stop-color="#fb7185" stop-opacity="0.1"/>
                            <stop offset="100%" stop-color="#e11d48" stop-opacity="0"/>
                        @else
                            <stop offset="0%" stop-color="#64748b" stop-opacity="0.2"/>
                            <stop offset="100%" stop-color="#94a3b8" stop-opacity="0"/>
                        @endif
                    </linearGradient>
                    <linearGradient id="{{ $gid }}-stroke" x1="0" y1="0" x2="1" y2="0">
                        @if ($tr === 'up')
                            <stop offset="0%" stop-color="#047857"/>
                            <stop offset="100%" stop-color="#34d399"/>
                        @elseif ($tr === 'down')
                            <stop offset="0%" stop-color="#9f1239"/>
                            <stop offset="100%" stop-color="#fb7185"/>
                        @else
                            <stop offset="0%" stop-color="#64748b"/>
                            <stop offset="100%" stop-color="#94a3b8"/>
                        @endif
                    </linearGradient>
                    @if ($tr === 'up')
                        <filter id="{{ $gid }}-glow" x="-25%" y="-25%" width="150%" height="150%">
                            <feGaussianBlur stdDeviation="0.65" result="blur"/>
                            <feMerge>
                                <feMergeNode in="blur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    @elseif ($tr === 'down')
                        <filter id="{{ $gid }}-glow-d" x="-25%" y="-25%" width="150%" height="150%">
                            <feGaussianBlur stdDeviation="0.65" result="blur"/>
                            <feMerge>
                                <feMergeNode in="blur"/>
                                <feMergeNode in="SourceGraphic"/>
                            </feMerge>
                        </filter>
                    @endif
                </defs>
                <path d="{{ $card['spark_area_path'] }}" fill="url(#{{ $gid }}-fill)" />
                <path
                    d="{{ $card['spark_line_path'] }}"
                    fill="none"
                    stroke="url(#{{ $gid }}-stroke)"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    @if ($tr === 'up') filter="url(#{{ $gid }}-glow)" @endif
                    @if ($tr === 'down') filter="url(#{{ $gid }}-glow-d)" @endif
                    vector-effect="non-scaling-stroke"
                />
            </svg>
        </div>
    @endif
</div>
