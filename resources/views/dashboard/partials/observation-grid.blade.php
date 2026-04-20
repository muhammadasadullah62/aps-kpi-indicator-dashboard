@php
    $accent = ['bg-aps-green', 'bg-emerald-500', 'bg-sky-600', 'bg-rose-500', 'bg-indigo-600', 'bg-amber-500'];
    $summaries = $summaries ?? collect();
    $observationsByObservee = $observationsByObservee ?? collect();
@endphp
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-12">
    @forelse ($observees as $obsUser)
        @php($bg = $accent[$loop->index % count($accent)])
        @php($summary = $summaries->get($obsUser->id))
        @php($records = $observationsByObservee->get($obsUser->id) ?? collect())
        <div id="observee-card-{{ $obsUser->id }}" class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all scroll-mt-28 group">
            <div class="flex items-center gap-6">
                @if($obsUser->avatarUrl())
                    <img src="{{ $obsUser->avatarUrl() }}" alt="" class="w-20 h-20 rounded-[2rem] object-cover shadow-lg border border-slate-100 shrink-0">
                @else
                    <div class="w-20 h-20 {{ $bg }} rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg shrink-0">{{ $obsUser->initials() }}</div>
                @endif
                <div class="flex-1 min-w-0">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">{{ $obsUser->role->label() }}</p>
                    <h3 class="text-2xl font-black text-slate-800 group-hover:text-aps-green transition-colors leading-none truncate">{{ $obsUser->name }}</h3>
                    <p class="text-sm text-slate-500 font-bold mt-2 normal-case leading-snug">
                        @if($obsUser->wing)
                            <span class="uppercase tracking-widest text-slate-400">{{ $obsUser->wing->label() }}</span>
                        @else
                            <span class="uppercase tracking-widest text-slate-400">—</span>
                        @endif
                        @php($deptLine = $obsUser->departmentsLabelForDisplay())
                        @if($deptLine !== '—')
                            <span class="block sm:inline sm:before:content-['_•_'] sm:before:text-slate-300 mt-1 sm:mt-0">{{ $deptLine }}</span>
                        @endif
                    </p>
                </div>
            </div>
            @if ($summary && (int) $summary->observation_count > 0)
                <div class="mt-8 grid grid-cols-2 gap-4">
                    <div class="rounded-[2rem] border border-slate-100 bg-slate-50/80 px-6 py-5">
                        <p class="text-[10px] font-black uppercase tracking-[0.25em] text-slate-400">Avg. score</p>
                        <p class="mt-2 text-3xl font-black text-emerald-700">{{ (int) round((float) $summary->avg_score) }}%</p>
                    </div>
                    <div class="rounded-[2rem] border border-slate-100 bg-slate-50/80 px-6 py-5">
                        <p class="text-[10px] font-black uppercase tracking-[0.25em] text-slate-400">Observations</p>
                        <p class="mt-2 text-3xl font-black text-slate-800">{{ (int) $summary->observation_count }}</p>
                    </div>
                </div>
            @endif
            @if ($records->isNotEmpty())
                <details class="mt-8 rounded-[2rem] border border-slate-100 bg-slate-50/50 group/details">
                    <summary class="cursor-pointer list-none px-6 py-4 text-xs font-black uppercase tracking-[0.2em] text-slate-500 hover:text-slate-800 flex items-center justify-between select-none">
                        <span>Observation records</span>
                        <span class="text-slate-400">{{ $records->count() }}</span>
                    </summary>
                    <ul class="space-y-3 px-6 pb-6 pt-1">
                        @foreach ($records as $rec)
                            <li class="rounded-2xl border border-slate-100 bg-white px-5 py-4 shadow-sm">
                                <div class="flex flex-wrap items-start justify-between gap-3">
                                    <div class="min-w-0 space-y-1">
                                        <p class="text-sm font-black text-slate-800">{{ $rec->created_at->format('M j, Y') }}</p>
                                        <p class="text-xs font-semibold text-slate-500">Observer: {{ $rec->observer->name ?? '—' }}</p>
                                        @if ($rec->observation_wing || $rec->observation_department)
                                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400 mt-2 flex flex-wrap gap-2">
                                                @if ($rec->observation_wing)
                                                    <span class="rounded-lg bg-slate-100 px-2 py-1 text-slate-700">{{ $rec->observation_wing->label() }}</span>
                                                @endif
                                                @if ($rec->observation_department)
                                                    <span class="rounded-lg bg-emerald-50 px-2 py-1 text-emerald-800">{{ $rec->observation_department->label() }}</span>
                                                @endif
                                            </p>
                                        @endif
                                        @if ($rec->notes)
                                            <p class="text-xs text-slate-600 mt-2 line-clamp-3">{{ $rec->notes }}</p>
                                        @endif
                                    </div>
                                    <div class="flex flex-col items-end gap-2 shrink-0">
                                        <span class="rounded-xl bg-emerald-50 px-4 py-2 text-sm font-black text-emerald-800">{{ $rec->aggregate_percent }}%</span>
                                        @if (auth()->user()?->canEditObservation($rec))
                                            @php($editPayload = [
                                                'id' => $rec->id,
                                                'observee_id' => $rec->observee_id,
                                                'observee_name' => $obsUser->name,
                                                'aggregate_percent' => $rec->aggregate_percent,
                                                'sessions_payload' => $rec->sessions_payload,
                                                'notes' => $rec->notes,
                                                'observer_id' => $rec->observer_id,
                                                'observation_wing' => $rec->observation_wing?->value,
                                                'observation_department' => $rec->observation_department?->value,
                                                'observation_department_label' => $rec->observation_department?->label(),
                                                'observee_is_faculty' => $obsUser->isFaculty(),
                                            ])
                                            <button type="button" onclick="openEditObservation(@js($editPayload))" class="text-[10px] font-black uppercase tracking-widest text-aps-green hover:text-emerald-900 transition-colors">
                                                Edit
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </details>
            @endif
            <div class="mt-10 pt-8 border-t border-slate-50">
                <button type="button" onclick="openAuditPortal(@js(['id' => $obsUser->id, 'name' => $obsUser->name, 'observee_is_faculty' => $obsUser->isFaculty()]))" class="w-full py-5 bg-slate-900 text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-aps-green transition-all">
                    Open Audit Portal
                </button>
            </div>
        </div>
    @empty
        <div class="col-span-full rounded-[2rem] border border-slate-200 bg-white p-12 text-center text-slate-500 font-semibold">
            No staff members are available for observation with your current role.
        </div>
    @endforelse
</div>
