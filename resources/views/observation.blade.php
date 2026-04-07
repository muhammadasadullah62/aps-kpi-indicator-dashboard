<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APS Khanewal | Faculty Observation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; }
        .aps-green { color: #064e3b; }
        .bg-aps-green { background-color: #064e3b; }
        .border-aps-green { border-color: #064e3b; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        
        .modal-active { display: flex !important; animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.98); } to { opacity: 1; transform: scale(1); } }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-900 font-semibold">

    <aside class="hidden lg:flex flex-col w-72 bg-white border-r border-slate-200 h-full">
        <div class="p-8">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-12 h-12 bg-aps-green rounded-xl flex items-center justify-center text-white shadow-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold tracking-tighter aps-green leading-none">APS</h1>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Khanewal</p>
                </div>
            </div>
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-4 px-4 py-3 bg-emerald-50 text-emerald-800 rounded-xl font-bold relative group">
                    <div class="absolute left-0 w-1.5 h-6 bg-aps-green rounded-r-full"></div>
                    <svg class="w-5 h-5 text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Observations
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    Dashboard
                </a>
            </nav>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        <header class="bg-white px-10 py-6 flex items-center justify-between border-b border-slate-200">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase leading-none">Faculty Observations</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-2">Select a faculty member to conduct a performance review</p>
            </div>
            <div class="relative w-72">
                <input type="text" placeholder="Search faculty..." class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs outline-none focus:border-aps-green transition-all">
                <svg class="w-4 h-4 absolute left-3.5 top-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-10 no-scrollbar">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                
                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-xl hover:border-aps-green/20 transition-all group">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 bg-aps-green rounded-3xl flex items-center justify-center text-white text-2xl font-black shadow-lg">RF</div>
                        <div class="flex-1">
                            <h3 class="text-lg font-black text-slate-800 group-hover:text-aps-green transition-colors">Robert Fox</h3>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Mathematics • Wing C</p>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-50">
                        <button onclick="toggleModal('observationModal')" class="w-full py-3 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-lg hover:bg-aps-green transition-all">
                            Add Observation
                        </button>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-xl hover:border-aps-green/20 transition-all group">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 bg-emerald-500 rounded-3xl flex items-center justify-center text-white text-2xl font-black shadow-lg">AA</div>
                        <div class="flex-1">
                            <h3 class="text-lg font-black text-slate-800 group-hover:text-aps-green transition-colors">Asma Ali</h3>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">Class Teacher • Wing A</p>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-50">
                        <button onclick="toggleModal('observationModal')" class="w-full py-3 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-lg hover:bg-aps-green transition-all">
                            Add Observation
                        </button>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] border border-slate-200 shadow-sm hover:shadow-xl hover:border-aps-green/20 transition-all group">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 bg-sky-500 rounded-3xl flex items-center justify-center text-white text-2xl font-black shadow-lg">BS</div>
                        <div class="flex-1">
                            <h3 class="text-lg font-black text-slate-800 group-hover:text-aps-green transition-colors">Bilal S.</h3>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-1">History • Wing B</p>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-slate-50">
                        <button onclick="toggleModal('observationModal')" class="w-full py-3 bg-slate-900 text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-lg hover:bg-aps-green transition-all">
                            Add Observation
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <div id="observationModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-5xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50 items-start">
                <div>
                    <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">Conduct Observation</h3>
                    <p class="text-sm text-slate-400 font-medium mt-2">Faculty: <span class="text-aps-green font-black uppercase">Robert Fox</span></p>
                </div>
                <button onclick="toggleModal('observationModal')" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <div class="p-10 max-h-[70vh] overflow-y-auto no-scrollbar">
                <form action="#" class="space-y-12">
                    
                    <div>
                        <div class="flex items-center gap-4 mb-8">
                            <span class="w-10 h-10 bg-aps-green text-white rounded-xl flex items-center justify-center font-black">01</span>
                            <h4 class="text-xl font-black text-slate-800 uppercase tracking-tight">Quantitative Observations</h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                            <div class="space-y-4">
                                <div class="flex justify-between font-black uppercase tracking-widest text-[10px]">
                                    <label class="text-slate-400">Student Achievement</label>
                                    <span class="text-aps-green bg-emerald-50 px-2 py-0.5 rounded-md" id="val1">75%</span>
                                </div>
                                <input type="range" min="0" max="100" value="75" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-[#064e3b]" oninput="document.getElementById('val1').innerText = this.value + '%'">
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between font-black uppercase tracking-widest text-[10px]">
                                    <label class="text-slate-400">Student Progress</label>
                                    <span class="text-aps-green bg-emerald-50 px-2 py-0.5 rounded-md" id="val2">60%</span>
                                </div>
                                <input type="range" min="0" max="100" value="60" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-[#064e3b]" oninput="document.getElementById('val2').innerText = this.value + '%'">
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between font-black uppercase tracking-widest text-[10px]">
                                    <label class="text-slate-400">Lesson Planning</label>
                                    <span class="text-aps-green bg-emerald-50 px-2 py-0.5 rounded-md" id="val3">90%</span>
                                </div>
                                <input type="range" min="0" max="100" value="90" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-[#064e3b]" oninput="document.getElementById('val3').innerText = this.value + '%'">
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between font-black uppercase tracking-widest text-[10px]">
                                    <label class="text-slate-400">Assessment Quality</label>
                                    <span class="text-aps-green bg-emerald-50 px-2 py-0.5 rounded-md" id="val4">80%</span>
                                </div>
                                <input type="range" min="0" max="100" value="80" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-[#064e3b]" oninput="document.getElementById('val4').innerText = this.value + '%'">
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-slate-100">
                        <div class="flex items-center gap-4 mb-8">
                            <span class="w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center font-black">02</span>
                            <h4 class="text-xl font-black text-slate-800 uppercase tracking-tight">Qualitative Observations</h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
                            <div class="space-y-4">
                                <div class="flex justify-between font-black uppercase tracking-widest text-[10px]">
                                    <label class="text-slate-400">Classroom Culture</label>
                                    <span class="text-slate-900 bg-slate-100 px-2 py-0.5 rounded-md" id="val5">70%</span>
                                </div>
                                <input type="range" min="0" max="100" value="70" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-[#0f172a]" oninput="document.getElementById('val5').innerText = this.value + '%'">
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between font-black uppercase tracking-widest text-[10px]">
                                    <label class="text-slate-400">Student Centricity</label>
                                    <span class="text-slate-900 bg-slate-100 px-2 py-0.5 rounded-md" id="val6">85%</span>
                                </div>
                                <input type="range" min="0" max="100" value="85" class="w-full h-2 bg-slate-100 rounded-lg appearance-none cursor-pointer accent-[#0f172a]" oninput="document.getElementById('val6').innerText = this.value + '%'">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-10 border-t border-slate-100">
                        <button type="button" onclick="toggleModal('observationModal')" class="px-8 py-4 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors">Discard</button>
                        <button type="submit" class="bg-aps-green text-white px-10 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-emerald-900/20 hover:bg-emerald-900 transition-all">Submit Observation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('modal-active');
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('modal-active');
            }
        }
    </script>
</body>
</html>