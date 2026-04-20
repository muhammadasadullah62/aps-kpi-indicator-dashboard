@extends('layouts.app')

@section('title', 'APSACS Khanewal | Qualitative Observations')

@section('header')
    <x-dashboard.page-header variant="session" title="Qualitative Results" subtitle="Behavioral Indicators" chip="Session: 2023-24" />
@endsection

@section('content')
            @php
                $qual = $qualitative ?? [];
                $qv = fn (string $name) => isset($qual[$name]) && is_numeric($qual[$name]) ? (float) $qual[$name] : null;
                $qualPct = fn (?float $s) => $s === null ? null : min(100, max(0, ($s / 5) * 100));
                $qualFillClass = fn (?float $s) => match (true) {
                    $s === null => '',
                    $s < 2 => 'bg-rose-500',
                    $s < 3 => 'bg-amber-400',
                    $s < 4 => 'bg-emerald-500',
                    default => 'bg-aps-green',
                };
            @endphp
            <div class="bg-aps-green p-10 rounded-[2.5rem] shadow-xl text-white relative overflow-hidden group">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8">
                    <div class="text-center md:text-left">
                        <p class="text-xs font-bold text-emerald-300 uppercase tracking-[0.3em] mb-2">Aggregate Qualitative Weight</p>
                        <h3 class="text-6xl font-black leading-none">{{ isset($aggregateQualitativePercent) && $aggregateQualitativePercent !== null ? $aggregateQualitativePercent.'%' : '—' }}</h3>
                        <p class="mt-4 text-sm text-emerald-100/80 max-w-sm">Institutional analysis based on student interaction, professional ethics, and innovation.</p>
                    </div>
                </div>
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/5 rounded-full blur-3xl group-hover:bg-white/10 transition-all duration-700"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-10 rounded-[2.5rem] border border-slate-200 shadow-sm space-y-10 font-semibold">
                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <h4 class="text-lg font-black text-slate-800">Student-Centricity</h4>
                                <p class="text-xs text-slate-400 font-medium italic">Addresses individual learning needs</p>
                            </div>
                            <span class="text-xl font-black text-aps-green">{{ $qv('Student-Centricity') !== null ? number_format($qv('Student-Centricity'), 2) : '—' }}</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-100">
                            @php($s = $qv('Student-Centricity'))
                            @if ($s !== null)
                                <div class="h-full rounded-full transition-all {{ $qualFillClass($s) }}" style="width: {{ $qualPct($s) }}%"></div>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <h4 class="text-lg font-black text-slate-800">Professional Ethics</h4>
                                <p class="text-xs text-slate-400 font-medium italic">Integrity & APS compliance</p>
                            </div>
                            <span class="text-xl font-black text-aps-green">{{ $qv('Professional Ethics') !== null ? number_format($qv('Professional Ethics'), 2) : '—' }}</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-100">
                            @php($s = $qv('Professional Ethics'))
                            @if ($s !== null)
                                <div class="h-full rounded-full transition-all {{ $qualFillClass($s) }}" style="width: {{ $qualPct($s) }}%"></div>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <h4 class="text-lg font-black text-slate-800">Classroom Culture</h4>
                                <p class="text-xs text-slate-400 font-medium italic">Positive learning environment</p>
                            </div>
                            <span class="text-xl font-black text-aps-green">{{ $qv('Classroom Culture') !== null ? number_format($qv('Classroom Culture'), 2) : '—' }}</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-100">
                            @php($s = $qv('Classroom Culture'))
                            @if ($s !== null)
                                <div class="h-full rounded-full transition-all {{ $qualFillClass($s) }}" style="width: {{ $qualPct($s) }}%"></div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[2.5rem] border border-slate-200 shadow-sm space-y-10 font-semibold">
                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <h4 class="text-lg font-black text-slate-800">Communication</h4>
                                <p class="text-xs text-slate-400 font-medium italic">Parent & student communication</p>
                            </div>
                            <span class="text-xl font-black text-aps-green">{{ $qv('Communication') !== null ? number_format($qv('Communication'), 2) : '—' }}</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-100">
                            @php($s = $qv('Communication'))
                            @if ($s !== null)
                                <div class="h-full rounded-full transition-all {{ $qualFillClass($s) }}" style="width: {{ $qualPct($s) }}%"></div>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <h4 class="text-lg font-black text-slate-800">Collaboration</h4>
                                <p class="text-xs text-slate-400 font-medium italic">Team collaboration</p>
                            </div>
                            <span class="text-xl font-black text-aps-green">{{ $qv('Collaboration') !== null ? number_format($qv('Collaboration'), 2) : '—' }}</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-100">
                            @php($s = $qv('Collaboration'))
                            @if ($s !== null)
                                <div class="h-full rounded-full transition-all {{ $qualFillClass($s) }}" style="width: {{ $qualPct($s) }}%"></div>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-end">
                            <div>
                                <h4 class="text-lg font-black text-slate-800">Innovation</h4>
                                <p class="text-xs text-slate-400 font-medium italic">Active & experiential learning</p>
                            </div>
                            <span class="text-xl font-black text-aps-green">{{ $qv('Innovation') !== null ? number_format($qv('Innovation'), 2) : '—' }}</span>
                        </div>
                        <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-100">
                            @php($s = $qv('Innovation'))
                            @if ($s !== null)
                                <div class="h-full rounded-full transition-all {{ $qualFillClass($s) }}" style="width: {{ $qualPct($s) }}%"></div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-8 shrink-0"></div>
@endsection
