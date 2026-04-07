<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Reports - EduAnalytics</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex h-screen overflow-hidden">

    <aside class="w-64 bg-white border-r border-slate-200 flex-col justify-between hidden lg:flex h-full">
        <div class="p-6">
            <div class="flex items-center gap-2 mb-10 text-xl font-bold text-blue-600">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white text-sm">🎓</div>
                EduAnalytics
            </div>
            
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard Overview
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Teacher Performance
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-600 rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Academic Reports
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Attendance Data
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-lg font-medium transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    System Settings
                </a>
            </nav>
        </div>
        
        <div class="p-6">
            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Plan</p>
                <p class="font-bold text-slate-800 mb-4">Enterprise Suite</p>
                <button class="w-full py-2 bg-white border border-slate-200 rounded-lg text-sm font-medium hover:bg-slate-50 transition">Manage Subscription</button>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden">
        
        <header class="bg-white border-b border-slate-200 px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h1 class="text-2xl font-bold text-slate-800">Academic Reports</h1>
            
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2 px-3 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 bg-white cursor-pointer hover:bg-slate-50 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Fall Semester 2023
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
                <div class="flex items-center gap-3 border-l pl-4 border-slate-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-800">Sarah Jenkins</p>
                        <p class="text-xs text-slate-500">Administrator</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-orange-200 flex items-center justify-center overflow-hidden cursor-pointer hover:ring-2 hover:ring-blue-500 transition">
                        <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=fed7aa&color=c2410c" alt="Profile" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 space-y-6 no-scrollbar">
            
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex gap-2 w-full sm:w-auto overflow-x-auto pb-2 sm:pb-0 no-scrollbar">
                    <select class="text-sm border border-slate-200 rounded-lg px-3 py-2 bg-white text-slate-600 outline-none hover:border-slate-300">
                        <option>All Subjects</option>
                        <option>Mathematics</option>
                        <option>Science</option>
                        <option>Literature</option>
                    </select>
                    <select class="text-sm border border-slate-200 rounded-lg px-3 py-2 bg-white text-slate-600 outline-none hover:border-slate-300">
                        <option>All Grades</option>
                        <option>Grade 9</option>
                        <option>Grade 10</option>
                        <option>Grade 11</option>
                    </select>
                    <select class="text-sm border border-slate-200 rounded-lg px-3 py-2 bg-white text-slate-600 outline-none hover:border-slate-300">
                        <option>Standardized Tests</option>
                        <option>Midterms</option>
                        <option>Finals</option>
                    </select>
                </div>
                <button class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition w-full sm:w-auto justify-center shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Generate Custom Report
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <span class="px-2 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full">+12% YoY</span>
                    </div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Total Assessments</p>
                    <h3 class="text-2xl font-bold text-slate-800">12,450</h3>
                </div>
                
                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <span class="px-2 py-1 bg-green-50 text-green-600 text-xs font-bold rounded-full">+2.4%</span>
                    </div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">District Average Score</p>
                    <div class="flex items-baseline gap-2">
                        <h3 class="text-2xl font-bold text-slate-800">B+</h3>
                        <span class="text-sm font-medium text-slate-500">(86.2%)</span>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Overall Pass Rate</p>
                    <h3 class="text-2xl font-bold text-slate-800">94.8%</h3>
                </div>

                <div class="bg-white p-5 rounded-xl shadow-sm border border-slate-100">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <button class="text-xs text-blue-600 font-medium hover:underline">View List</button>
                    </div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">At-Risk Students</p>
                    <h3 class="text-2xl font-bold text-slate-800">142</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 lg:col-span-2">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">District Grade Distribution</h2>
                            <p class="text-sm text-slate-500">Breakdown of letter grades across all subjects</p>
                        </div>
                        <button class="text-slate-400 hover:text-slate-600">⋮</button>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-8 font-bold text-slate-700 text-right">A</div>
                            <div class="flex-1 bg-slate-100 rounded-full h-4 overflow-hidden">
                                <div class="bg-emerald-500 h-full rounded-full" style="width: 35%"></div>
                            </div>
                            <div class="w-12 text-sm font-medium text-slate-500 text-right">35%</div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 font-bold text-slate-700 text-right">B</div>
                            <div class="flex-1 bg-slate-100 rounded-full h-4 overflow-hidden">
                                <div class="bg-blue-500 h-full rounded-full" style="width: 42%"></div>
                            </div>
                            <div class="w-12 text-sm font-medium text-slate-500 text-right">42%</div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 font-bold text-slate-700 text-right">C</div>
                            <div class="flex-1 bg-slate-100 rounded-full h-4 overflow-hidden">
                                <div class="bg-amber-400 h-full rounded-full" style="width: 15%"></div>
                            </div>
                            <div class="w-12 text-sm font-medium text-slate-500 text-right">15%</div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 font-bold text-slate-700 text-right">D</div>
                            <div class="flex-1 bg-slate-100 rounded-full h-4 overflow-hidden">
                                <div class="bg-orange-500 h-full rounded-full" style="width: 6%"></div>
                            </div>
                            <div class="w-12 text-sm font-medium text-slate-500 text-right">6%</div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-8 font-bold text-slate-700 text-right">F</div>
                            <div class="flex-1 bg-slate-100 rounded-full h-4 overflow-hidden">
                                <div class="bg-rose-500 h-full rounded-full" style="width: 2%"></div>
                            </div>
                            <div class="w-12 text-sm font-medium text-slate-500 text-right">2%</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100">
                    <h2 class="text-lg font-bold text-slate-800 mb-6">Generated Reports</h2>
                    <div class="relative w-40 h-40 mx-auto mb-6">
                        <svg viewBox="0 0 36 36" class="w-full h-full transform -rotate-90">
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-slate-100" stroke-width="4"></circle>
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-blue-600" stroke-width="4" stroke-dasharray="100 100" stroke-dashoffset="0"></circle>
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-emerald-400" stroke-width="4" stroke-dasharray="40 100" stroke-dashoffset="-60"></circle>
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-amber-400" stroke-width="4" stroke-dasharray="15 100" stroke-dashoffset="-100"></circle>
                        </svg>
                        <div class="absolute inset-0 flex flex-col items-center justify-center">
                            <span class="text-2xl font-bold text-slate-800">342</span>
                            <span class="text-xs text-slate-400">Total</span>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-blue-600"></span>Standardized</div>
                            <span class="font-medium text-slate-700">60%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-emerald-400"></span>Class Exams</div>
                            <span class="font-medium text-slate-700">25%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-amber-400"></span>Custom Analytics</div>
                            <span class="font-medium text-slate-700">15%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <h2 class="text-lg font-bold text-slate-800">Recent Reports Library</h2>
                    <div class="relative">
                        <svg class="w-4 h-4 absolute left-3 top-1/2 transform -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input type="text" placeholder="Search reports..." class="pl-9 pr-4 py-2 border border-slate-200 rounded-lg text-sm w-full sm:w-64 outline-none focus:border-blue-500 transition">
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-xs font-bold text-slate-400 uppercase tracking-wider border-b border-slate-100">
                                <th class="px-6 py-4">Report Name</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Target Group</th>
                                <th class="px-6 py-4">Generated Date</th>
                                <th class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-800 text-sm">Fall 2023 District Midterms</p>
                                            <p class="text-xs text-slate-500">PDF Document • 2.4 MB</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded">Standardized</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">All Grades</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Oct 28, 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-slate-400 hover:text-blue-600 transition hover:bg-blue-50 rounded" title="Download">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        </button>
                                        <button class="p-1.5 text-slate-400 hover:text-slate-700 transition hover:bg-slate-100 rounded" title="Options">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded bg-green-50 text-green-600 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-800 text-sm">Grade 10 Mathematics Assessment</p>
                                            <p class="text-xs text-slate-500">Excel Spreadsheet • 1.1 MB</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded">Class Exam</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">Grade 10</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Oct 25, 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-slate-400 hover:text-blue-600 transition hover:bg-blue-50 rounded" title="Download">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        </button>
                                        <button class="p-1.5 text-slate-400 hover:text-slate-700 transition hover:bg-slate-100 rounded" title="Options">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-800 text-sm">Science Department Q3 Overview</p>
                                            <p class="text-xs text-slate-500">PDF Document • 4.5 MB</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-amber-50 text-amber-600 text-xs font-semibold rounded">Custom Analytics</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">Department Level</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Oct 20, 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-slate-400 hover:text-blue-600 transition hover:bg-blue-50 rounded" title="Download">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        </button>
                                        <button class="p-1.5 text-slate-400 hover:text-slate-700 transition hover:bg-slate-100 rounded" title="Options">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="h-6"></div>
        </div>
    </main>
</body>
</html>