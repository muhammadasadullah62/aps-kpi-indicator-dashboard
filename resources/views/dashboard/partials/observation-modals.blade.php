    <div id="observationModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <form id="observationStoreForm" method="post" action="{{ route('observations.store') }}" class="bg-white w-full max-w-6xl rounded-[4rem] shadow-2xl overflow-hidden border border-slate-200 flex flex-col h-[92vh]" data-store-url="{{ route('observations.store') }}" data-update-url-prefix="{{ url('/observations') }}">
            @csrf
            <span id="observation-method-spoof"></span>
            <input type="hidden" name="observee_id" id="store_observee_id" value="">
            <input type="hidden" name="aggregate_percent" id="store_aggregate_percent" value="0">
            <input type="hidden" name="sessions_payload" id="store_sessions_payload" value="[]">
            <div class="p-12 border-b border-slate-100 flex justify-between bg-slate-50/50 items-start shrink-0">
                <div>
                    <p id="observation_modal_mode" class="text-[10px] font-black uppercase tracking-[0.35em] text-slate-400 mb-2">New observation</p>
                    <h3 class="text-4xl font-black text-slate-800 tracking-tight uppercase leading-none">Comprehensive Audit</h3>
                    <p class="text-lg text-slate-400 font-medium mt-3 leading-none">Reviewing Member: <span id="modalFacultyName" class="text-aps-green font-black">Name</span></p>
                </div>
                <button type="button" onclick="toggleModal('observationModal')" class="p-3 hover:bg-slate-200 rounded-full text-slate-400 transition-colors"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="flex-1 overflow-y-auto p-12 space-y-12 no-scrollbar bg-slate-50/30">
                @auth
                    @if(auth()->user()->canAccessObservations())
                        <div id="observationContextCard" class="bg-white rounded-[3rem] border border-slate-200 p-10 shadow-sm">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.35em] mb-6">
                                Observation context <span id="observationContextRequiredMark" class="text-red-500">*</span>
                            </p>
                            <p class="text-sm text-slate-500 font-semibold mb-8"><strong>Required</strong> when the person observed is a <strong>section head</strong>. For <strong>faculty</strong> (teachers) only, these fields stay hidden. Department options come from SectionHead Hub assignments; if none yet, all departments appear.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div>
                                    <label for="observation_context_wing" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Wing</label>
                                    <select name="observation_wing" id="observation_context_wing" class="w-full rounded-[2rem] border border-slate-200 bg-slate-50/80 px-6 py-4 text-sm font-bold text-slate-800 outline-none focus:border-aps-green focus:ring-2 focus:ring-emerald-500/20">
                                        <option value="">Select wing</option>
                                        @foreach (\App\Enums\Wing::cases() as $w)
                                            <option value="{{ $w->value }}">{{ $w->label() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="observation_context_department" class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Department</label>
                                    <select name="observation_department" id="observation_context_department" class="w-full rounded-[2rem] border border-slate-200 bg-slate-50/80 px-6 py-4 text-sm font-bold text-slate-800 outline-none focus:border-aps-green focus:ring-2 focus:ring-emerald-500/20">
                                        <option value="">Select department</option>
                                        @foreach ($observationDepartments as $d)
                                            <option value="{{ $d->value }}">{{ $d->label() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="observation_wing" id="observation_wing_null" value="" disabled>
                        <input type="hidden" name="observation_department" id="observation_department_null" value="" disabled>
                    @else
                        <input type="hidden" name="observation_wing" id="observation_context_wing" value="">
                        <input type="hidden" name="observation_department" id="observation_context_department" value="">
                    @endif
                @endauth

                <div class="bg-slate-900 rounded-[3rem] p-10 text-white shadow-2xl flex flex-col md:flex-row items-center justify-between gap-10 border-b-8 border-emerald-500">
                    <div>
                        <h4 class="text-sm font-black text-emerald-400 uppercase tracking-[0.3em] mb-2">Final Summative Result</h4>
                        <p class="text-base text-slate-400 italic">Cumulative weighted average across all sessions</p>
                    </div>
                    <div class="flex items-center gap-12">
                        <div class="text-center">
                            <p class="text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Sessions</p>
                            <p id="auditCount" class="text-5xl font-black">0</p>
                        </div>
                        <div class="h-16 w-px bg-white/10"></div>
                        <div class="text-right">
                            <p class="text-xs font-black text-emerald-500 uppercase tracking-widest mb-2">Aggregate Score</p>
                            <p id="totalScore" class="text-7xl font-black text-emerald-400">0%</p>
                        </div>
                    </div>
                </div>

                <div id="auditEntriesContainer" class="space-y-16"></div>

                <div class="bg-white rounded-[3rem] border border-slate-200 p-10 shadow-sm mx-0">
                    <label for="observation_overall_notes" class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.35em] mb-4">Overall observation notes</label>
                    <textarea id="observation_overall_notes" name="notes" rows="5" placeholder="Summarize themes, follow-up actions, or context for this submission…" class="w-full rounded-[2rem] border border-slate-200 bg-slate-50/80 px-6 py-5 text-sm font-semibold text-slate-800 placeholder:text-slate-400 focus:border-aps-green focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all resize-y min-h-[120px]"></textarea>
                </div>

                <div class="flex justify-center pb-12">
                    <button type="button" onclick="addNewAudit()" class="group flex items-center gap-6 px-12 py-8 bg-white border-2 border-dashed border-slate-200 rounded-[3rem] hover:border-aps-green transition-all shadow-sm">
                        <div class="w-14 h-14 bg-slate-100 group-hover:bg-aps-green group-hover:text-white rounded-2xl flex items-center justify-center transition-all text-slate-400">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <div class="text-left leading-none">
                            <p class="text-xl font-black text-slate-800 uppercase tracking-tight">Add New Audit Entry</p>
                            <p class="text-sm text-slate-400 font-bold uppercase mt-2">Initialize an additional observation session</p>
                        </div>
                    </button>
                </div>
            </div>

            <div class="p-10 border-t border-slate-100 bg-white flex justify-end gap-6 shrink-0">
                <button type="button" onclick="toggleModal('observationModal')" class="px-10 py-5 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Discard Review</button>
                <button type="button" id="observation_submit_btn" onclick="submitObservationForm()" class="bg-aps-green text-white px-14 py-5 rounded-3xl font-black text-sm uppercase tracking-widest shadow-2xl shadow-emerald-900/30 hover:bg-emerald-900 transition-all">Submit Evaluation</button>
            </div>
        </form>
    </div>

    <template id="audit-entry-template">
        <div class="audit-entry bg-white rounded-[3.5rem] border border-slate-200 shadow-sm overflow-hidden relative">
            <div class="p-8 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-5">
                    <div class="audit-number w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center text-lg font-black">1</div>
                    <h5 class="text-xl font-black text-slate-800 uppercase tracking-tight">Observation Session</h5>
                </div>
                <button type="button" class="remove-audit text-red-400 hover:text-red-600 text-xs font-black uppercase tracking-widest px-4 py-2 hover:bg-red-50 rounded-xl transition-all">Remove Session</button>
            </div>
            <div class="p-10 space-y-8">
                <div class="border border-slate-100 rounded-[2.5rem] overflow-hidden">
                    <button type="button" class="collapse-trigger w-full p-8 flex justify-between items-center bg-emerald-50/40">
                        <p class="text-base font-black text-aps-green uppercase tracking-widest">Quantitative Metrics (70%)</p>
                        <svg class="w-6 h-6 text-aps-green chevron-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="collapse-content active p-8 space-y-4 quant-metrics-list"></div>
                </div>
                <div class="border border-slate-100 rounded-[2.5rem] overflow-hidden">
                    <button type="button" class="collapse-trigger w-full p-8 flex justify-between items-center bg-slate-100/40">
                        <p class="text-base font-black text-slate-600 uppercase tracking-widest">Qualitative Metrics (30%)</p>
                        <svg class="w-6 h-6 text-slate-400 chevron-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="collapse-content p-8 space-y-4 qual-metrics-list"></div>
                </div>
                <div class="px-10 pb-10 border-t border-slate-50">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.35em] mb-3">Remarks</label>
                    <textarea rows="3" class="session-notes-input w-full rounded-[2rem] border border-slate-200 bg-slate-50/80 px-6 py-4 text-sm font-semibold text-slate-800 placeholder:text-slate-400 focus:border-aps-green focus:ring-2 focus:ring-emerald-500/20 outline-none transition-all resize-y" placeholder="Optional remarks for this session…"></textarea>
                </div>
            </div>
        </div>
    </template>

    <template id="rating-row-template">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 p-6 border border-slate-50 rounded-3xl hover:bg-slate-50/80 transition-all">
            <p class="text-base font-black text-slate-700 uppercase tracking-wide metric-name"></p>
            <div class="flex gap-2">
                <label class="flex flex-col items-center gap-2 cursor-pointer">
                    <input type="radio" value="1" class="hidden rating-input">
                    <div class="w-14 h-14 rounded-2xl border-2 border-slate-200 rating-label flex items-center justify-center font-black text-base transition-all bg-white">1</div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">V. Poor</span>
                </label>
                <label class="flex flex-col items-center gap-2 cursor-pointer">
                    <input type="radio" value="2" class="hidden rating-input">
                    <div class="w-14 h-14 rounded-2xl border-2 border-slate-200 rating-label flex items-center justify-center font-black text-base transition-all bg-white">2</div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">Poor</span>
                </label>
                <label class="flex flex-col items-center gap-2 cursor-pointer">
                    <input type="radio" value="3" class="hidden rating-input">
                    <div class="w-14 h-14 rounded-2xl border-2 border-slate-200 rating-label flex items-center justify-center font-black text-base transition-all bg-white">3</div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">Average</span>
                </label>
                <label class="flex flex-col items-center gap-2 cursor-pointer">
                    <input type="radio" value="4" class="hidden rating-input">
                    <div class="w-14 h-14 rounded-2xl border-2 border-slate-200 rating-label flex items-center justify-center font-black text-base transition-all bg-white">4</div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">Good</span>
                </label>
                <label class="flex flex-col items-center gap-2 cursor-pointer">
                    <input type="radio" value="5" class="hidden rating-input">
                    <div class="w-14 h-14 rounded-2xl border-2 border-slate-200 rating-label flex items-center justify-center font-black text-base transition-all bg-white">5</div>
                    <span class="text-[9px] text-slate-400 font-bold uppercase tracking-tighter">Excel</span>
                </label>
            </div>
        </div>
    </template>
