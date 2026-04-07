<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APS Khanewal | Teacher KPI Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; }
        .aps-green { color: #064e3b; }
        .bg-aps-green { background-color: #064e3b; }
        .border-aps-green { border-color: #064e3b; }
        /* Custom scrollbar for clean look */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
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
                <a href="#" class="flex items-center gap-4 px-4 py-3 bg-emerald-50 text-emerald-800 rounded-xl font-bold relative group">
                    <div class="absolute left-0 w-1.5 h-6 bg-aps-green rounded-r-full"></div>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard Overview
                </a>
                <a href='/quantitative-observations' class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Quantitative Observations
                </a>
                <a href='/qualitative-observations' class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Qualitative Observations
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Attendance Data
                </a>
            </nav>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-100">
        <header class="bg-white px-8 py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200">
            <h2 class="text-2xl font-black text-slate-800 tracking-tight">Teacher KPI Dashboard</h2>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-3 px-4 py-2 border border-slate-200 rounded-xl bg-slate-50 text-slate-600 font-bold text-xs cursor-pointer">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Oct 1 - Oct 31, 2023
                    <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
                
                <div class="relative">
                    <div class="flex items-center gap-3 cursor-pointer group" id="profileMenuButton">
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-900">Ms Irum Syed</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase">Admin</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=fdba74&color=9a3412" alt="Avatar" class="w-10 h-10 rounded-xl shadow-md border-2 border-white group-hover:border-aps-green transition-all">
                    </div>

                    <div id="profileDropdown" class="hidden absolute right-0 mt-3 w-64 bg-white border border-slate-200 rounded-[1.5rem] shadow-2xl py-2 z-50 transform origin-top-right transition-all">
                        <div class="px-6 py-4 border-b border-slate-100">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Signed in as</p>
                            <p class="text-sm font-black text-slate-900 leading-none">Ms Irum Syed</p>
                            <p class="text-[11px] text-emerald-600 font-bold mt-1">Irum.syed@aps-khanewal.edu</p>
                        </div>
                        <div class="p-2 space-y-1">
                            <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-emerald-50 hover:text-aps-green rounded-xl transition-all group">
                                <svg class="w-4 h-4 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                My Profile
                            </a>
                            <a href="/systemsettings" class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-emerald-50 hover:text-aps-green rounded-xl transition-all group">
                                <svg class="w-4 h-4 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                                System Settings
                            </a>
                        </div>
                        <div class="h-px bg-slate-100 my-2"></div>
                        <div class="p-2">
                            <button class="w-full flex items-center gap-3 px-4 py-2.5 text-sm font-bold text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Sign Out
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8 no-scrollbar">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm relative overflow-hidden group hover:shadow-md transition-shadow">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Avg. Test Score</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-800">44.5</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-600">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            +4.5%
                        </div>
                    </div>
                    <svg class="w-full h-8 mt-4 text-emerald-500 opacity-50" viewBox="0 0 100 20"><path d="M0 15 Q 25 5, 50 15 T 100 5" fill="none" stroke="currentColor" stroke-width="2" /></svg>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Curriculum Progress</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-800">38%</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-600">+4.5%</div>
                    </div>
                    <svg class="w-full h-8 mt-4 text-emerald-500 opacity-50" viewBox="0 0 100 20"><path d="M0 18 Q 20 18, 40 10 T 80 5 T 100 12" fill="none" stroke="currentColor" stroke-width="2" /></svg>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Student Engagement</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-800">42%</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-600">+3.9%</div>
                    </div>
                    <svg class="w-full h-8 mt-4 text-emerald-500 opacity-50" viewBox="0 0 100 20"><path d="M0 15 L 20 12 L 40 16 L 60 8 L 80 12 L 100 5" fill="none" stroke="currentColor" stroke-width="2" /></svg>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Peer Review Score</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-800">72</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-600">+4.5%</div>
                    </div>
                    <svg class="w-full h-8 mt-4 text-emerald-500 opacity-50" viewBox="0 0 100 20"><path d="M0 10 Q 50 20, 100 5" fill="none" stroke="currentColor" stroke-width="2" /></svg>
                </div>

                <div class="bg-aps-green p-6 rounded-3xl shadow-xl lg:col-span-1 text-white">
                    <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-widest mb-1">Attendance</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black">98.9%</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-300">+1.4%</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Management Rate</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-800">66</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-600">+1.2%</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Attendance Rate</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-800">24%</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-600">+0.6%</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Avg. Kumar</p>
                    <div class="flex items-end justify-between">
                        <h3 class="text-3xl font-black text-slate-800">200</h3>
                        <div class="flex items-center gap-1 text-xs font-bold text-emerald-600">+1.0%</div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                    <h3 class="text-xl font-black text-slate-800">Teacher Leaderboard</h3>
                    <div class="relative hidden sm:block">
                        <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 border border-emerald-100 rounded-full text-sm outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500">
                        <svg class="w-4 h-4 absolute left-3.5 top-2.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-[10px] font-bold text-slate-400 uppercase tracking-widest bg-slate-50/50">
                                <th class="px-8 py-4">Rank</th>
                                <th class="px-8 py-4">Instructor</th>
                                <th class="px-8 py-4">Subject</th>
                                <th class="px-8 py-4">Student Success Rate</th>
                                <th class="px-8 py-4 text-right">Overall KPI</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr class="group hover:bg-emerald-50/30 transition-colors">
                                <td class="px-8 py-6">
                                    <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center text-amber-700 font-black text-xs border border-amber-200">#1</div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=10b981&color=fff" class="w-9 h-9 rounded-lg" alt="Avatar">
                                        <span class="font-bold text-slate-800">Ms Irum Syed</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 bg-slate-100 rounded-lg text-[10px] font-bold text-slate-500 uppercase">Mathematics</span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden flex">
                                        <div class="bg-aps-green h-full w-[98%] rounded-full shadow-lg"></div>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <span class="text-lg font-black text-emerald-600 italic">9.8</span><span class="text-xs text-slate-400 font-bold ml-1">/ 10</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <h3 class="text-lg font-black text-slate-800 mb-8">Qualitative (30% Weight)</h3>
                    <div class="space-y-6">
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs font-bold"><span class="text-slate-600">Student-Centricity</span><span class="text-aps-green">0.20</span></div>
                            <div class="flex-1 grid grid-cols-4 gap-1 h-3">
                                <div class="bg-aps-green rounded-l-full"></div><div class="bg-aps-green"></div><div class="bg-aps-green"></div><div class="bg-aps-green rounded-r-full"></div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs font-bold"><span class="text-slate-600">Classroom Culture</span><span class="text-aps-green">0.20</span></div>
                            <div class="flex-1 grid grid-cols-4 gap-1 h-3">
                                <div class="bg-aps-green rounded-l-full"></div><div class="bg-aps-green"></div><div class="bg-aps-green"></div><div class="bg-slate-200 rounded-r-full"></div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs font-bold"><span class="text-slate-600">Professional Ethics</span><span class="text-aps-green">0.15</span></div>
                            <div class="flex-1 grid grid-cols-4 gap-1 h-3">
                                <div class="bg-aps-green rounded-l-full"></div><div class="bg-aps-green"></div><div class="bg-slate-200"></div><div class="bg-slate-200 rounded-r-full"></div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center text-xs font-bold"><span class="text-slate-600">Innovation</span><span class="text-aps-green">0.15</span></div>
                            <div class="flex-1 grid grid-cols-4 gap-1 h-3">
                                <div class="bg-aps-green rounded-l-full"></div><div class="bg-aps-green"></div><div class="bg-slate-200"></div><div class="bg-slate-200 rounded-r-full"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-900 p-8 rounded-[2rem] text-white flex flex-col gap-6 relative overflow-hidden group">
                    <div class="z-10">
                        <h3 class="text-lg font-black mb-2 uppercase tracking-widest text-emerald-400">Quantitative Summary</h3>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="bg-white/5 p-4 rounded-2xl border border-white/10">
                                <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Student Achievement</p>
                                <p class="text-2xl font-black text-white">75%</p>
                            </div>
                            <div class="bg-white/5 p-4 rounded-2xl border border-white/10">
                                <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Teacher Attendance</p>
                                <p class="text-2xl font-black text-white">98%</p>
                            </div>
                            <div class="bg-white/5 p-4 rounded-2xl border border-white/10">
                                <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Syllabus Compliance</p>
                                <p class="text-2xl font-black text-white">100%</p>
                            </div>
                            <div class="bg-white/5 p-4 rounded-2xl border border-white/10">
                                <p class="text-[10px] font-bold text-slate-400 uppercase mb-1">Academic Growth</p>
                                <p class="text-2xl font-black text-white">1.0</p>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -right-8 -bottom-8 w-48 h-48 bg-emerald-500/10 rounded-full blur-3xl"></div>
                </div>
            </div>

            <div class="h-8"></div>
        </div>
    </main>

    <script>
        const profileBtn = document.getElementById('profileMenuButton');
        const dropdown = document.getElementById('profileDropdown');

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target) && !profileBtn.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>