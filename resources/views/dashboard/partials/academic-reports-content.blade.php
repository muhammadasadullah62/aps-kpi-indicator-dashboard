            @php
                use App\Enums\Department;
                use App\Enums\ReportAssessmentFilter;
                use App\Enums\ReportGradeFilter;
            @endphp
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div class="flex gap-2 w-full sm:w-auto overflow-x-auto pb-2 sm:pb-0 no-scrollbar">
                    <select class="text-sm border border-slate-200 rounded-lg px-3 py-2 bg-white text-slate-600 outline-none hover:border-slate-300">
                        <option value="">All subjects</option>
                        @foreach (Department::cases() as $dept)
                            <option value="{{ $dept->value }}">{{ $dept->label() }}</option>
                        @endforeach
                    </select>
                    <select class="text-sm border border-slate-200 rounded-lg px-3 py-2 bg-white text-slate-600 outline-none hover:border-slate-300">
                        @foreach (ReportGradeFilter::cases() as $g)
                            <option value="{{ $g->value }}">{{ $g->label() }}</option>
                        @endforeach
                    </select>
                    <select class="text-sm border border-slate-200 rounded-lg px-3 py-2 bg-white text-slate-600 outline-none hover:border-slate-300">
                        @foreach (ReportAssessmentFilter::cases() as $filter)
                            <option value="{{ $filter->value }}">{{ $filter->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="flex items-center gap-2 bg-aps-green text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-emerald-900 transition w-full sm:w-auto justify-center shadow-sm">
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
                        <div class="w-10 h-10 rounded-lg bg-blue-50 text-aps-green flex items-center justify-center">
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
                        <button class="text-xs text-aps-green font-medium hover:underline">View List</button>
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
                            <circle cx="18" cy="18" r="16" fill="none" class="stroke-aps-green" stroke-width="4" stroke-dasharray="100 100" stroke-dashoffset="0"></circle>
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
                            <div class="flex items-center gap-2"><span class="w-3 h-3 rounded-full bg-aps-green"></span>Standardized</div>
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
                        <input type="text" placeholder="Search reports..." class="pl-9 pr-4 py-2 border border-slate-200 rounded-lg text-sm w-full sm:w-64 outline-none focus:border-aps-green transition">
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
                                    <span class="px-2 py-1 bg-emerald-50 text-aps-green text-xs font-semibold rounded">Standardized</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-600">All Grades</td>
                                <td class="px-6 py-4 text-sm text-slate-600">Oct 28, 2023</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button class="p-1.5 text-slate-400 hover:text-aps-green transition hover:bg-emerald-50 rounded" title="Download">
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
                                        <button class="p-1.5 text-slate-400 hover:text-aps-green transition hover:bg-emerald-50 rounded" title="Download">
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
                                        <button class="p-1.5 text-slate-400 hover:text-aps-green transition hover:bg-emerald-50 rounded" title="Download">
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
