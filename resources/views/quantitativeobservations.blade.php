<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APS Khanewal | Quantitative Observations</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; }
        .aps-green { color: #064e3b; }
        .bg-aps-green { background-color: #064e3b; }
        .border-aps-green { border-color: #064e3b; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-900">

    <aside class="hidden lg:flex flex-col w-72 bg-white border-r border-slate-200 h-full">
        <div class="p-8">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-12 h-12 bg-aps-green rounded-xl flex items-center justify-center text-white shadow-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold tracking-tighter aps-green leading-none">APS</h1>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Khanewal</p>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="/" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard Overview
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 bg-emerald-50 text-emerald-800 rounded-xl font-bold relative group">
                    <div class="absolute left-0 w-1.5 h-6 bg-aps-green rounded-r-full"></div>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"></path></svg>
                    Quant. Observations
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Academic Reports
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Attendance Data
                </a>
            </nav>
        </div>

        <div class="p-8 mt-auto">
            <div class="bg-aps-green p-6 rounded-3xl text-white shadow-xl">
                <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-widest mb-1">Subscription Plan</p>
                <p class="text-lg font-extrabold mb-4">Enterprise Suite</p>
                <button class="w-full py-3 bg-white text-aps-green rounded-xl text-sm font-bold shadow-lg hover:bg-slate-50 transition-colors">Manage Subscription</button>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-100">
        
        <header class="bg-white px-8 py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">Quantitative Observations</h2>
                <p class="text-xs text-slate-500 font-bold tracking-widest uppercase">Statistical Faculty Metrics</p>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 px-4 py-2 border border-slate-200 rounded-xl bg-slate-50 text-slate-600 font-bold text-xs cursor-pointer">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Session: 2023-24
                </div>
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=fdba74&color=9a3412" alt="Avatar" class="w-10 h-10 rounded-xl shadow-md border-2 border-white">
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8 no-scrollbar">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">Student Achievement</p>
                    <div class="flex items-baseline gap-2">
                        <h3 class="text-4xl font-black text-slate-800 leading-none">75%</h3>
                        <span class="text-xs font-bold text-slate-400">Benchmarks Met</span>
                    </div>
                    <div class="mt-4 w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-aps-green h-full w-[75%]"></div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">Teacher Attendance</p>
                    <h3 class="text-4xl font-black text-slate-800 leading-none">98%</h3>
                    <div class="mt-4 flex items-center gap-2 text-emerald-600 font-bold text-xs">
                        <span class="bg-emerald-50 px-2 py-1 rounded-lg">High Reliability Rating</span>
                    </div>
                </div>

                <div class="bg-aps-green p-8 rounded-[2rem] shadow-xl text-white">
                    <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-[0.2em] mb-2">Student Progress</p>
                    <div class="flex items-baseline gap-2">
                        <h3 class="text-4xl font-black leading-none">1.0</h3>
                        <span class="text-xs font-bold text-emerald-200 uppercase">Growth Index</span>
                    </div>
                    <p class="mt-4 text-[10px] font-bold text-emerald-200/60 uppercase">Value-added academic growth</p>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 bg-slate-50/50 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="text-lg font-black text-slate-800">Quantitative Summary Table</h3>
                    <div class="px-4 py-1.5 bg-aps-green rounded-full">
                        <span class="text-[10px] font-black text-white uppercase">Avg. Perf: 93.3%</span>
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
                                <td class="px-8 py-6 font-black text-slate-900">75</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-aps-green h-full w-[75%]"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Student Progress</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Value-added academic growth</td>
                                <td class="px-8 py-6 font-black text-slate-900">1.0</td>
                                <td class="px-8 py-6 text-right font-bold text-emerald-600 text-xs">Target Met</td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Lesson Planning</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Lesson plans uploaded (%)</td>
                                <td class="px-8 py-6 font-black text-slate-900">100</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-aps-green h-full w-[100%]"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Assessment Quality</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Assessment compliance (%)</td>
                                <td class="px-8 py-6 font-black text-slate-900">100</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-aps-green h-full w-[100%]"></div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-8 py-6 font-bold text-slate-700">Attendance</td>
                                <td class="px-8 py-6 text-sm text-slate-500">Teacher attendance (%)</td>
                                <td class="px-8 py-6 font-black text-slate-900">98</td>
                                <td class="px-8 py-6">
                                    <div class="w-32 ml-auto bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                        <div class="bg-aps-green h-full w-[98%]"></div>
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
                            <p class="text-sm text-slate-300">Perfect compliance in **Lesson Planning** and **Assessment Quality** demonstrates high administrative discipline.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 mt-1.5"></div>
                            <p class="text-sm text-slate-300">**Teacher Attendance** is exceptional at 98%, ensuring consistent classroom availability.</p>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm flex flex-col justify-center">
                    <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Overall Institutional KPI</p>
                    <div class="flex items-center gap-4">
                        <div class="text-5xl font-black text-aps-green italic">9.3</div>
                        <div>
                            <p class="text-xs font-bold text-slate-600">Calculated Average</p>
                            <p class="text-[10px] text-slate-400">Based on 5 quantitative markers</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-8"></div>
        </div>
    </main>
</body>
</html>