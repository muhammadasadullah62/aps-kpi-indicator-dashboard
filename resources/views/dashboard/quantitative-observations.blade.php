@extends('layouts.app')

@section('title', 'APSACS Khanewal | Quantitative Observations')

@section('header')
    <x-dashboard.page-header variant="session" title="Quantitative Observations" subtitle="Statistical Faculty Metrics" chip="Session: 2023-24" />
@endsection

@section('content')
            @php
                $q = $quantitative ?? [];
                $m = fn (string $name) => isset($q[$name]) && is_numeric($q[$name]) ? (float) $q[$name] : null;
                $rubPct = fn (?float $s) => $s === null ? null : (int) round(min(100, max(0, ($s / 5) * 100)), 0);
                $sa = $m('Student Achievement');
                $att = $m('Attendance');
                $sp = $m('Student Progress');
                $lp = $m('Lesson Planning');
                $aq = $m('Assessment Quality');
            @endphp
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">Student Achievement</p>
                    <div class="flex items-baseline gap-2">
                        <h3 class="text-4xl font-black text-slate-800 leading-none">{{ $rubPct($sa) !== null ? $rubPct($sa).'%' : '—' }}</h3>
                        <span class="text-xs font-bold text-slate-400">Benchmarks Met</span>
                    </div>
                    <div class="mt-4 w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        @if ($rubPct($sa) !== null)
                            <div class="bg-aps-green h-full" style="width: {{ $rubPct($sa) }}%"></div>
                        @endif
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">Teacher Attendance</p>
                    <h3 class="text-4xl font-black text-slate-800 leading-none">{{ $rubPct($att) !== null ? $rubPct($att).'%' : '—' }}</h3>
                    <div class="mt-4 flex items-center gap-2 text-emerald-600 font-bold text-xs">
                        <span class="bg-emerald-50 px-2 py-1 rounded-lg">High Reliability Rating</span>
                    </div>
                </div>

                <div class="bg-aps-green p-8 rounded-[2rem] shadow-xl text-white">
                    <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-[0.2em] mb-2">Student Progress</p>
                    <div class="flex items-baseline gap-2">
                        <h3 class="text-4xl font-black leading-none">{{ $sp !== null ? number_format($sp, 1) : '—' }}</h3>
                        <span class="text-xs font-bold text-emerald-200 uppercase">Growth Index</span>
                    </div>
                    <p class="mt-4 text-[10px] font-bold text-emerald-200/60 uppercase">Value-added academic growth</p>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 bg-slate-50/50 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="text-lg font-black text-slate-800">Quantitative Summary Table</h3>
                    <div class="px-4 py-1.5 bg-aps-green rounded-full">
                        <span class="text-[10px] font-black text-white uppercase">Avg. Perf: {{ isset($avgPerfPercent) && $avgPerfPercent !== null ? $avgPerfPercent.'%' : '—' }}</span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-slate-50/30">
                                <th class="px-8 py-4">Metric Category</th>
                                <th class="px-8 py-4">Metric Definition</th>
                                <th class="px-8 py-4">Value (%)</th>
                                <th class="px-8 py-4 text-right">Progress Bar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Student Achievement</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Students meeting benchmarks (%)</td>
                                <td class="px-8 py-6 font-black text-slate-900">{{ $rubPct($sa) !== null ? $rubPct($sa) : '—' }}</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        @if ($rubPct($sa) !== null)
                                            <div class="bg-aps-green h-full" style="width: {{ $rubPct($sa) }}%"></div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Student Progress</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Value-added academic growth</td>
                                <td class="px-8 py-6 font-black text-slate-900">{{ $sp !== null ? number_format($sp, 1) : '—' }}</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        @if ($rubPct($sp) !== null)
                                            <div class="bg-aps-green h-full" style="width: {{ $rubPct($sp) }}%"></div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Lesson Planning</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Lesson plans uploaded (%)</td>
                                <td class="px-8 py-6 font-black text-slate-900">{{ $rubPct($lp) !== null ? $rubPct($lp) : '—' }}</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        @if ($rubPct($lp) !== null)
                                            <div class="bg-aps-green h-full" style="width: {{ $rubPct($lp) }}%"></div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Assessment Quality</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Assessment compliance (%)</td>
                                <td class="px-8 py-6 font-black text-slate-900">{{ $rubPct($aq) !== null ? $rubPct($aq) : '—' }}</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        @if ($rubPct($aq) !== null)
                                            <div class="bg-aps-green h-full" style="width: {{ $rubPct($aq) }}%"></div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Attendance</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Teacher attendance (%)</td>
                                <td class="px-8 py-6 font-black text-slate-900">{{ $rubPct($att) !== null ? $rubPct($att) : '—' }}</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        @if ($rubPct($att) !== null)
                                            <div class="bg-aps-green h-full" style="width: {{ $rubPct($att) }}%"></div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-slate-900 p-8 rounded-[2rem] text-white">
                    <h4 class="text-sm font-bold text-emerald-400 uppercase tracking-widest mb-4">Observation Insights</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 mt-1.5"></div>
                            <p class="text-sm text-slate-300">Perfect compliance in <strong class="text-white">Lesson Planning</strong> and <strong class="text-white">Assessment Quality</strong> demonstrates high administrative discipline.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 mt-1.5"></div>
                            <p class="text-sm text-slate-300"><strong class="text-white">Teacher Attendance</strong> is exceptional at 98%, ensuring consistent classroom availability.</p>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm flex flex-col justify-center">
                    <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Overall Institutional KPI</p>
                    <div class="flex items-center gap-4">
                        <div class="text-5xl font-black text-aps-green italic">{{ isset($overallQuantKpi) && $overallQuantKpi !== null ? number_format($overallQuantKpi, 1) : '—' }}</div>
                        <div>
                            <p class="text-xs font-bold text-slate-600">Calculated Average</p>
                            <p class="text-[10px] text-slate-400">Based on 5 quantitative markers</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-8"></div>
@endsection
