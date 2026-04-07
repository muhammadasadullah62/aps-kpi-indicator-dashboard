<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APS Khanewal | User Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
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
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    User Management
                </a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Academic Reports
                </a>
            </nav>
        </div>

        <div class="p-8 mt-auto">
            <div class="bg-aps-green p-6 rounded-3xl text-white shadow-xl">
                <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-widest mb-1">Current User</p>
                <p class="text-lg font-extrabold mb-4">Super Admin</p>
                <button class="w-full py-3 bg-white text-aps-green rounded-xl text-sm font-bold shadow-lg hover:bg-slate-50 transition-colors">Logout Session</button>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-50">
        
        <header class="bg-white px-8 py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">User Directory</h2>
                <p class="text-xs text-slate-500 font-bold tracking-widest uppercase">Manage Faculty & Staff Accounts</p>
            </div>
            
            <div class="flex items-center gap-4">
                <button class="bg-aps-green text-white px-6 py-2.5 rounded-xl font-bold text-xs shadow-lg hover:bg-emerald-900 transition-all">
                    + Add New Faculty
                </button>
                <div class="h-8 w-px bg-slate-200"></div>
                <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=fdba74&color=9a3412" alt="Avatar" class="w-10 h-10 rounded-xl shadow-md border-2 border-white">
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8 no-scrollbar">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:border-emerald-200 transition-all">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-1">Total Faculty</p>
                    <h3 class="text-3xl font-black text-slate-800 leading-none">124</h3>
                    <p class="text-[10px] text-emerald-600 font-bold mt-2">Active across 8 departments</p>
                </div>
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:border-emerald-200 transition-all">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-1">Permissions Pending</p>
                    <h3 class="text-3xl font-black text-slate-800 leading-none">12</h3>
                    <p class="text-[10px] text-amber-600 font-bold mt-2">Requires admin approval</p>
                </div>
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:border-emerald-200 transition-all">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-1">New Hires</p>
                    <h3 class="text-3xl font-black text-slate-800 leading-none">05</h3>
                    <p class="text-[10px] text-slate-400 font-bold mt-2">Joined in last 30 days</p>
                </div>
                <div class="bg-aps-green p-6 rounded-3xl shadow-xl text-white">
                    <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-[0.2em] mb-1">Average KPI</p>
                    <h3 class="text-3xl font-black leading-none">8.42</h3>
                    <p class="text-[10px] text-emerald-100/60 font-bold mt-2 uppercase tracking-widest leading-none">Institutional Grade</p>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-8 py-6 bg-slate-50/50 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div class="relative w-full lg:w-96">
                        <input type="text" placeholder="Search by name, email, or employee ID..." class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-2xl text-sm font-medium outline-none focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 transition-all">
                        <svg class="w-5 h-5 absolute left-4 top-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    
                    <div class="flex items-center gap-3">
                        <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                            Filter
                        </button>
                        <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Export
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50/50">
                                <th class="px-8 py-5">Full Name & Employee ID</th>
                                <th class="px-8 py-5">Department</th>
                                <th class="px-8 py-5">System Role</th>
                                <th class="px-8 py-5">Access Level</th>
                                <th class="px-8 py-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="group hover:bg-emerald-50/30 transition-colors cursor-default">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-slate-100 rounded-2xl flex-shrink-0 overflow-hidden border border-slate-200">
                                            <img src="https://ui-avatars.com/api/?name=Robert+Fox&background=064e3b&color=fff" alt="User">
                                        </div>
                                        <div>
                                            <p class="text-sm font-extrabold text-slate-900 group-hover:text-aps-green transition-colors">Robert Fox</p>
                                            <p class="text-[11px] text-slate-400 font-bold uppercase tracking-tight">APS-KHN-2023-01</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-xs font-bold text-slate-600">Mathematics & Physics</p>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 bg-slate-100 text-slate-500 text-[10px] font-black rounded-lg uppercase tracking-widest">Faculty Member</span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                                        <span class="text-xs font-bold text-slate-700">Standard Access</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <button class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-xl transition-all"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                                        <button class="p-2 text-slate-400 hover:text-red-600 hover:bg-white rounded-xl transition-all"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="group hover:bg-emerald-50/30 transition-colors cursor-default">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-slate-100 rounded-2xl flex-shrink-0 overflow-hidden border border-slate-200">
                                            <img src="https://ui-avatars.com/api/?name=Esther+Howard&background=064e3b&color=fff" alt="User">
                                        </div>
                                        <div>
                                            <p class="text-sm font-extrabold text-slate-900 group-hover:text-aps-green transition-colors">Esther Howard</p>
                                            <p class="text-[11px] text-slate-400 font-bold uppercase tracking-tight">APS-KHN-2023-44</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-xs font-bold text-slate-600">Administrative Support</p>
                                </td>
                                <td class="px-8 py-6">
                                    <span class="px-3 py-1 bg-aps-green text-white text-[10px] font-black rounded-lg uppercase tracking-widest">Administrator</span>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-aps-green rounded-full shadow-lg"></div>
                                        <span class="text-xs font-bold text-slate-700">Elevated Access</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div class="flex items-center justify-end gap-3">
                                        <button class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-xl transition-all"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                                        <button class="p-2 text-slate-400 hover:text-red-600 hover:bg-white rounded-xl transition-all"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="px-8 py-6 bg-white border-t border-slate-100 flex items-center justify-between">
                    <p class="text-xs font-bold text-slate-400">Showing <span class="text-slate-900">1-10</span> of <span class="text-slate-900">124</span> users</p>
                    <div class="flex items-center gap-2">
                        <button class="px-4 py-2 bg-white border border-slate-200 rounded-xl text-xs font-black text-slate-400 cursor-not-allowed">Previous</button>
                        <button class="px-4 py-2 bg-aps-green text-white border border-aps-green rounded-xl text-xs font-black shadow-md hover:bg-emerald-900 transition-all">Next Page</button>
                    </div>
                </div>
            </div>

            <div class="h-8"></div>
        </div>
    </main>
</body>
</html>