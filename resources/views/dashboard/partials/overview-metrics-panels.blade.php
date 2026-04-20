@php
    use App\Support\ObservationAnalytics;
    $quantRaw = $metrics['quantitative'] ?? [];
    $qualRaw = $metrics['qualitative'] ?? [];
    $maxScale = 5;
    $pct = fn ($score) => min(100, max(0, ((float) $score / $maxScale) * 100));
    $aggregatedSessions = (int) ($aggregatedSessions ?? 0);
    $hasQualScore = collect(ObservationAnalytics::QUAL_METRICS)
        ->contains(fn (string $n) => isset($qualRaw[$n]) && is_numeric($qualRaw[$n]));
    $hasQuantScore = collect(ObservationAnalytics::QUANT_METRICS)
        ->contains(fn (string $n) => isset($quantRaw[$n]) && is_numeric($quantRaw[$n]));
    $hasAnyScore = $hasQualScore || $hasQuantScore;
@endphp
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
        <h3 class="text-lg font-black text-slate-800 mb-8">Qualitative <span class="text-slate-400 font-bold text-xs">(avg. rubric 1–{{ $maxScale }})</span></h3>
        <div class="space-y-6">
            @foreach (ObservationAnalytics::QUAL_METRICS as $name)
                @php($score = $qualRaw[$name] ?? null)
                @php($score = is_numeric($score) ? (float) $score : null)
                <div class="space-y-2">
                    <div class="flex justify-between items-center text-xs font-bold gap-4">
                        <span class="text-slate-600">{{ $name }}</span>
                        <span class="text-aps-green shrink-0">{{ $score !== null ? number_format($score, 2) : '—' }}</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                        @if ($score !== null)
                            <div class="bg-aps-green h-full rounded-full transition-all" style="width: {{ $pct($score) }}%"></div>
                        @else
                            <div class="bg-transparent h-full"></div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-slate-900 p-8 rounded-[2rem] text-white flex flex-col gap-6 relative overflow-hidden">
        <div class="z-10">
            <h3 class="text-lg font-black mb-2 uppercase tracking-widest text-emerald-400">Quantitative <span class="text-slate-500 font-bold text-xs normal-case">(avg. rubric 1–{{ $maxScale }})</span></h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                @foreach (ObservationAnalytics::QUANT_METRICS as $name)
                    @php($score = $quantRaw[$name] ?? null)
                    @php($score = is_numeric($score) ? (float) $score : null)
                    <div class="bg-white/5 p-4 rounded-2xl border border-white/10">
                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-1 line-clamp-2">{{ $name }}</p>
                        <p class="text-2xl font-black text-white">{{ $score !== null ? number_format($score, 2) : '—' }}</p>
                        <div class="mt-2 w-full bg-white/10 h-1.5 rounded-full overflow-hidden">
                            @if ($score !== null)
                                <div class="bg-emerald-400 h-full rounded-full" style="width: {{ $pct($score) }}%"></div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="absolute -right-8 -bottom-8 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl"></div>
    </div>
</div>
@if (! $hasAnyScore && $aggregatedSessions > 0)
    <div class="mt-6 rounded-2xl border border-amber-200 bg-amber-50 px-5 py-4 text-sm font-semibold text-amber-900">
        {{ (int) $aggregatedSessions }} audit {{ $aggregatedSessions === 1 ? 'session is' : 'sessions are' }} on file, but no rubric scores were found. Open the observation in the audit portal and make sure each session has quantitative and qualitative ratings saved.
    </div>
@endif
