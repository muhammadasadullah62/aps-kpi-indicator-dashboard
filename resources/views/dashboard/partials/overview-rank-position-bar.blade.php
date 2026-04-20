@php
    $title = $title ?? '';
    $rank = isset($rank) ? (int) $rank : null;
    $total = max(0, (int) ($total ?? 0));
    $pct = ($rank !== null && $total > 1)
        ? (($rank - 1) / ($total - 1)) * 100
        : (($rank !== null && $total === 1) ? 0.0 : 50.0);
@endphp
<div class="space-y-2">
    <div class="flex items-baseline justify-between gap-2">
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $title }}</span>
        @if ($rank !== null && $total > 0)
            <span class="text-xs font-black text-slate-700 tabular-nums">#{{ $rank }} <span class="text-slate-400 font-bold">/</span> {{ $total }}</span>
        @else
            <span class="text-xs font-bold text-slate-400">—</span>
        @endif
    </div>
    @if ($rank !== null && $total > 0)
        <div class="relative h-4 rounded-full bg-slate-100 ring-1 ring-inset ring-slate-200/80 overflow-visible" aria-hidden="true">
            <span class="absolute left-2 top-1/2 -translate-y-1/2 text-[8px] font-black text-slate-300 uppercase pointer-events-none">1</span>
            <span class="absolute right-2 top-1/2 -translate-y-1/2 text-[8px] font-black text-slate-300 uppercase pointer-events-none">{{ $total }}</span>
            <span
                class="absolute top-1/2 z-[1] h-4 w-4 -translate-x-1/2 -translate-y-1/2 rounded-full border-[3px] border-white bg-emerald-500 shadow-md shadow-emerald-600/25 ring-2 ring-emerald-600/20"
                style="left: {{ round($pct, 3) }}%"
                title="Rank {{ $rank }} of {{ $total }}"
            ></span>
        </div>
        <p class="text-[10px] font-semibold text-slate-400">Higher rank is left · dot is you</p>
    @else
        <p class="text-xs font-semibold text-slate-400">Not placed yet — needs observation data.</p>
    @endif
</div>
