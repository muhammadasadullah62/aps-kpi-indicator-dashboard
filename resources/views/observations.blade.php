<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APSACS Khanewal | Advanced Observation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; font-size: 16px; }
        .aps-green { color: #064e3b; }
        .bg-aps-green { background-color: #064e3b; }
        .border-aps-green { border-color: #064e3b; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        
        .modal-active { display: flex !important; animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

        .rating-input:checked + .rating-label {
            background-color: #064e3b;
            color: white;
            border-color: #064e3b;
            box-shadow: 0 10px 15px -3px rgba(6, 78, 59, 0.3);
        }

        .collapse-content { max-height: 0; overflow: hidden; transition: max-height 0.4s ease-out; }
        .collapse-content.active { max-height: 2500px; padding-bottom: 1.5rem; }
        .chevron-icon { transition: transform 0.3s ease; }
        .chevron-active { transform: rotate(180deg); }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-900 font-semibold">

    <aside class="hidden lg:flex flex-col w-80 bg-white border-r border-slate-200 h-full shrink-0">
        <div class="p-8">
            <div class="flex items-center gap-4 mb-12">
                <div class="w-14 h-14 bg-aps-green rounded-2xl flex items-center justify-center text-white shadow-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tighter aps-green leading-none">APSACS</h1>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">Khanewal</p>
                </div>
            </div>
            <nav class="space-y-3">
                <p class="text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-4 mb-2">Main Navigation</p>
                <a href="#" class="flex items-center gap-4 px-5 py-4 bg-emerald-50 text-emerald-800 rounded-2xl font-bold relative group text-lg">
                    <div class="absolute left-0 w-2 h-8 bg-aps-green rounded-r-full"></div>
                    <svg class="w-6 h-6 text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Observations
                </a>
                <a href="/systemsettings" class="flex items-center gap-4 px-5 py-4 text-slate-500 hover:bg-slate-50 rounded-2xl transition-all text-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    Dashboard
                </a>
            </nav>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="bg-white px-10 py-8 flex items-center justify-between border-b border-slate-200 shrink-0">
            <div>
                <h2 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">Faculty Performance Audit</h2>
                <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-3">Aggregate Review Portal: Quantitative (70%) + Qualitative (30%)</p>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-12 no-scrollbar">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mb-12">
                
                <div class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-aps-green rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg">RF</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-aps-green transition-colors leading-none">Robert Fox</h3>
                            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-2">Senior Wing • Physics</p>
                        </div>
                    </div>
                    <div class="mt-10 pt-8 border-t border-slate-50">
                        <button onclick="openAuditPortal('Robert Fox')" class="w-full py-5 bg-slate-900 text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-aps-green transition-all">
                            Open Audit Portal
                        </button>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-emerald-500 rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg">AA</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-aps-green transition-colors leading-none">Asma Ali</h3>
                            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-2">Pre/Junior Wing • Class Teacher</p>
                        </div>
                    </div>
                    <div class="mt-10 pt-8 border-t border-slate-50">
                        <button onclick="openAuditPortal('Asma Ali')" class="w-full py-5 bg-slate-900 text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-aps-green transition-all">
                            Open Audit Portal
                        </button>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-sky-600 rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg">BS</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-aps-green transition-colors leading-none">Bilal S.</h3>
                            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-2">Middle Wing • History</p>
                        </div>
                    </div>
                    <div class="mt-10 pt-8 border-t border-slate-50">
                        <button onclick="openAuditPortal('Bilal S.')" class="w-full py-5 bg-slate-900 text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-aps-green transition-all">
                            Open Audit Portal
                        </button>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-rose-500 rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg">HK</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-aps-green transition-colors leading-none">Hina Khan</h3>
                            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-2">Pre/Junior Wing • Math</p>
                        </div>
                    </div>
                    <div class="mt-10 pt-8 border-t border-slate-50">
                        <button onclick="openAuditPortal('Hina Khan')" class="w-full py-5 bg-slate-900 text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-aps-green transition-all">
                            Open Audit Portal
                        </button>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-indigo-600 rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg">KM</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-aps-green transition-colors leading-none">Kamran M.</h3>
                            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-2">Senior Wing • Physics</p>
                        </div>
                    </div>
                    <div class="mt-10 pt-8 border-t border-slate-50">
                        <button onclick="openAuditPortal('Kamran M.')" class="w-full py-5 bg-slate-900 text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-aps-green transition-all">
                            Open Audit Portal
                        </button>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[3rem] border border-slate-200 shadow-sm hover:shadow-2xl transition-all group">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 bg-amber-500 rounded-[2rem] flex items-center justify-center text-white text-3xl font-black shadow-lg">SU</div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-black text-slate-800 group-hover:text-aps-green transition-colors leading-none">Sara Umar</h3>
                            <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-2">Middle Wing • Biology</p>
                        </div>
                    </div>
                    <div class="mt-10 pt-8 border-t border-slate-50">
                        <button onclick="openAuditPortal('Sara Umar')" class="w-full py-5 bg-slate-900 text-white rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-aps-green transition-all">
                            Open Audit Portal
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <div id="observationModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-6xl rounded-[4rem] shadow-2xl overflow-hidden border border-slate-200 flex flex-col h-[92vh]">
            
            <div class="p-12 border-b border-slate-100 flex justify-between bg-slate-50/50 items-start shrink-0">
                <div>
                    <h3 class="text-4xl font-black text-slate-800 tracking-tight uppercase leading-none">Comprehensive Audit</h3>
                    <p class="text-lg text-slate-400 font-medium mt-3 leading-none">Reviewing Member: <span id="modalFacultyName" class="text-aps-green font-black">Name</span></p>
                </div>
                <button onclick="toggleModal('observationModal')" class="p-3 hover:bg-slate-200 rounded-full text-slate-400 transition-colors"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            <div class="flex-1 overflow-y-auto p-12 space-y-12 no-scrollbar bg-slate-50/30">
                
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

                <div class="flex justify-center pb-12">
                    <button onclick="addNewAudit()" class="group flex items-center gap-6 px-12 py-8 bg-white border-2 border-dashed border-slate-200 rounded-[3rem] hover:border-aps-green transition-all shadow-sm">
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
                <button onclick="toggleModal('observationModal')" class="px-10 py-5 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Discard Review</button>
                <button class="bg-aps-green text-white px-14 py-5 rounded-3xl font-black text-sm uppercase tracking-widest shadow-2xl shadow-emerald-900/30 hover:bg-emerald-900 transition-all">Submit Evaluation</button>
            </div>
        </div>
    </div>

    <template id="audit-entry-template">
        <div class="audit-entry bg-white rounded-[3.5rem] border border-slate-200 shadow-sm overflow-hidden relative">
            <div class="p-8 bg-slate-50 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-5">
                    <div class="audit-number w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center text-lg font-black">1</div>
                    <h5 class="text-xl font-black text-slate-800 uppercase tracking-tight">Observation Session</h5>
                </div>
                <button class="remove-audit text-red-400 hover:text-red-600 text-xs font-black uppercase tracking-widest px-4 py-2 hover:bg-red-50 rounded-xl transition-all">Remove Session</button>
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

    <script>
        let auditCounter = 0;
        const quantMetrics = ["Student Achievement", "Student Progress", "Lesson Planning", "Assessment Quality", "Attendance"];
        const qualMetrics = ["Student-Centricity", "Professional Ethics", "Classroom Culture", "Communication", "Collaboration", "Innovation"];

        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
            modal.classList.toggle('modal-active');
            // Don't auto-add if closing
            if(auditCounter === 0 && modal.classList.contains('modal-active')) addNewAudit();
        }

        function openAuditPortal(name) {
            document.getElementById('modalFacultyName').textContent = name;
            toggleModal('observationModal');
        }

        function addNewAudit() {
            auditCounter++;
            const container = document.getElementById('auditEntriesContainer');
            const template = document.getElementById('audit-entry-template');
            const entryClone = template.content.cloneNode(true);
            
            const entryDiv = entryClone.querySelector('.audit-entry');
            entryDiv.id = `audit-${auditCounter}`;
            entryDiv.querySelector('.audit-number').textContent = auditCounter;

            populateAuditMetrics(entryDiv.querySelector('.quant-metrics-list'), quantMetrics, `audit_${auditCounter}_quant`);
            populateAuditMetrics(entryDiv.querySelector('.qual-metrics-list'), qualMetrics, `audit_${auditCounter}_qual`);

            const triggers = entryDiv.querySelectorAll('.collapse-trigger');
            triggers.forEach(trigger => {
                trigger.onclick = () => {
                    trigger.nextElementSibling.classList.toggle('active');
                    trigger.querySelector('.chevron-icon').classList.toggle('chevron-active');
                };
            });

            entryDiv.querySelector('.remove-audit').onclick = () => {
                entryDiv.remove();
                calculateAggregateScore();
            };

            entryDiv.addEventListener('change', calculateAggregateScore);
            container.appendChild(entryClone);
            calculateAggregateScore();
        }

        function populateAuditMetrics(container, list, groupPrefix) {
            const rowTemplate = document.getElementById('rating-row-template');
            list.forEach(metric => {
                const rowClone = rowTemplate.content.cloneNode(true);
                rowClone.querySelector('.metric-name').textContent = metric;
                const inputs = rowClone.querySelectorAll('input');
                const uniqueName = `${groupPrefix}_${metric.replace(/\s/g, '_').toLowerCase()}`;
                inputs.forEach(input => input.name = uniqueName);
                container.appendChild(rowClone);
            });
        }

        function calculateAggregateScore() {
            const audits = document.querySelectorAll('.audit-entry');
            document.getElementById('auditCount').textContent = audits.length;
            
            if (audits.length === 0) {
                document.getElementById('totalScore').textContent = '0%';
                return;
            }

            let globalSumPercent = 0;
            audits.forEach(audit => {
                let qSum = 0, qCount = 0, lSum = 0, lCount = 0;
                audit.querySelectorAll('.quant-metrics-list input:checked').forEach(i => { qSum += parseInt(i.value); qCount++; });
                audit.querySelectorAll('.qual-metrics-list input:checked').forEach(i => { lSum += parseInt(i.value); lCount++; });
                let qAvg = qCount > 0 ? (qSum / (qCount * 5)) * 100 : 0;
                let lAvg = lCount > 0 ? (lSum / (lCount * 5)) * 100 : 0;
                globalSumPercent += (qAvg * 0.7) + (lAvg * 0.3);
            });

            const finalScore = Math.round(globalSumPercent / audits.length);
            document.getElementById('totalScore').textContent = finalScore + '%';
        }
    </script>
</body>
</html>