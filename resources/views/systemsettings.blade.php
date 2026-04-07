<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APS Khanewal | System Settings Dashboard</title>
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

        /* Modal Animation */
        .modal-active { display: flex !important; animation: fadeIn 0.3s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
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

            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 px-4">User Management</p>
            <nav class="space-y-2">
                <a href="/sechead" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    SecHead Management
                </a>
                <a href="/teachermanagement" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Faculty Management
                </a>
            </nav>
        </div>

        <div class="p-8 mt-auto">
            <div class="bg-aps-green p-6 rounded-3xl text-white shadow-xl">
                <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-widest mb-1">Account Level</p>
                <p class="text-lg font-extrabold mb-4">Super Admin</p>
                <button class="w-full py-3 bg-white text-aps-green rounded-xl text-sm font-bold shadow-lg hover:bg-slate-50 transition-colors">Security Audit</button>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-100">
        <header class="bg-white px-8 py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">System Dashboard</h2>
                <p class="text-xs text-slate-500 font-bold tracking-widest uppercase">Admin Overview & Statistics</p>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="relative">
                    <div class="flex items-center gap-3 cursor-pointer group" id="profileMenuButton">
                        <div class="text-right">
                            <p class="text-sm font-bold text-slate-900 leading-none text-center">Sarah Jenkins</p>
                            <p class="text-[10px] font-bold text-slate-400 uppercase mt-1">Admin</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=fdba74&color=9a3412" alt="Avatar" class="w-10 h-10 rounded-xl shadow-md border-2 border-white group-hover:border-aps-green transition-all">
                    </div>

                    <div id="profileDropdown" class="hidden absolute right-0 mt-3 w-72 bg-white border border-slate-200 rounded-[2rem] shadow-2xl py-4 z-50 transform origin-top-right transition-all">
                        <div class="px-6 py-4 border-b border-slate-100 mb-2 text-center">
                            <p class="text-sm font-black text-slate-900 leading-none">Sarah Jenkins</p>
                        </div>
                        <div class="p-2 space-y-1">
                            <p class="px-4 py-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Portal Access</p>
                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-emerald-50 hover:text-aps-green rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                                Dashboard Overview
                            </a>
                            <a href="#" class="flex items-center gap-3 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-emerald-50 hover:text-aps-green rounded-xl transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"></path></svg>
                                Teacher Performance
                            </a>
                        </div>
                        <div class="h-px bg-slate-100 my-2"></div>
                        <div class="p-2 text-center font-black text-red-500 text-xs uppercase cursor-pointer py-2 hover:bg-red-50 rounded-xl transition-all">Logout Session</div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8 no-scrollbar">

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-aps-green p-8 rounded-[2rem] text-white shadow-xl relative overflow-hidden group">
                    <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-widest mb-1 relative z-10">Total Users</p>
                    <h3 class="text-5xl font-black relative z-10">148</h3>
                    <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-all"></div>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Section Heads</p>
                    <h3 class="text-5xl font-black text-slate-800">08</h3>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Teachers</p>
                    <h3 class="text-5xl font-black text-slate-800">124</h3>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Deleted</p>
                    <h3 class="text-5xl font-black text-red-600">16</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Recently Created Users</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <tbody class="divide-y divide-slate-50">
                                <tr class="group hover:bg-emerald-50/30 transition-colors">
                                    <td class="px-8 py-5 flex items-center gap-4 font-semibold">
                                        <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500 font-black text-xs uppercase">MK</div>
                                        <div><p class="text-sm text-slate-800 leading-none">M. Kamran</p><p class="text-[10px] text-slate-400 mt-1 uppercase tracking-wider">Wing C • Physics</p></div>
                                    </td>
                                    <td class="px-8 py-5 text-right"><span class="text-[10px] font-black text-aps-green bg-emerald-50 px-3 py-1 rounded-full uppercase tracking-wider">Onboarded 2h ago</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden border-b-4 border-emerald-500 flex flex-col justify-center">
                    <h4 class="text-2xl font-black mb-4 tracking-tight uppercase relative z-10">Security Protocol</h4>
                    <p class="text-sm text-slate-400 leading-relaxed italic relative z-10">Institutional access is restricted to verified credentials. Log entries are permanent.</p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-4 px-2">
                    <div class="h-px bg-slate-200 flex-1"></div>
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em]">Wing-wise Faculty Directory</h3>
                    <div class="h-px bg-slate-200 flex-1"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm flex flex-col h-[420px]">
                        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                            <h4 class="text-lg font-black text-slate-800">Senior Wing</h4>
                            <span class="bg-emerald-50 text-aps-green text-[10px] font-black px-2.5 py-1 rounded-lg uppercase">42 Members</span>
                        </div>
                        <div class="flex-1 overflow-y-auto p-6 space-y-4">
                            <div class="flex items-center justify-between p-3 hover:bg-slate-50 rounded-2xl transition-all group/row font-semibold">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Asma+Ali&background=10b981&color=fff" class="w-8 h-8 rounded-lg shadow-sm">
                                    <div class="leading-none"><p class="text-xs font-black text-slate-800">Asma Ali</p><p class="text-[9px] text-slate-400 uppercase mt-1">Class Teacher</p></div>
                                </div>
                                <div class="flex items-center gap-1">
                                    <button onclick="toggleModal('viewUserModal')" class="p-1.5 text-slate-300 hover:text-aps-green transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                                    <button onclick="toggleModal('editUserModal')" class="p-1.5 text-slate-300 hover:text-aps-green transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                                    <button onclick="toggleModal('deleteUserModal')" class="p-1.5 text-slate-300 hover:text-red-500 transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm flex flex-col h-[420px]">
                        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                            <h4 class="text-lg font-black text-slate-800">Middle Wing</h4>
                            <span class="bg-emerald-50 text-aps-green text-[10px] font-black px-2.5 py-1 rounded-lg uppercase">56 Members</span>
                        </div>
                        <div class="flex-1 overflow-y-auto p-6 space-y-4">
                            <div class="flex items-center justify-between p-3 hover:bg-slate-50 rounded-2xl transition-all group/row font-semibold">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Bilal+S&background=064e3b&color=fff" class="w-8 h-8 rounded-lg shadow-sm">
                                    <div class="leading-none"><p class="text-xs font-black text-slate-800">Bilal S.</p><p class="text-[9px] text-slate-400 uppercase mt-1">History Dept.</p></div>
                                </div>
                                <div class="flex items-center gap-1">
                                    <button onclick="toggleModal('viewUserModal')" class="p-1.5 text-slate-300 hover:text-aps-green transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                                    <button onclick="toggleModal('editUserModal')" class="p-1.5 text-slate-300 hover:text-aps-green transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                                    <button onclick="toggleModal('deleteUserModal')" class="p-1.5 text-slate-300 hover:text-red-500 transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm flex flex-col h-[420px]">
                        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                            <h4 class="text-lg font-black text-slate-800">Pre/Junior Wing</h4>
                            <span class="bg-emerald-50 text-aps-green text-[10px] font-black px-2.5 py-1 rounded-lg uppercase">50 Members</span>
                        </div>
                        <div class="flex-1 overflow-y-auto p-6 space-y-4">
                            <div class="flex items-center justify-between p-3 hover:bg-slate-50 rounded-2xl transition-all group/row font-semibold">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Kamran+M&background=0284c7&color=fff" class="w-8 h-8 rounded-lg shadow-sm">
                                    <div class="leading-none"><p class="text-xs font-black text-slate-800">Kamran M.</p><p class="text-[9px] text-slate-400 uppercase mt-1">Head of Physics</p></div>
                                </div>
                                <div class="flex items-center gap-1">
                                    <button onclick="toggleModal('viewUserModal')" class="p-1.5 text-slate-300 hover:text-aps-green transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                                    <button onclick="toggleModal('editUserModal')" class="p-1.5 text-slate-300 hover:text-aps-green transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                                    <button onclick="toggleModal('deleteUserModal')" class="p-1.5 text-slate-300 hover:text-red-500 transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="viewUserModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-3xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50 items-center">
                <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase">User Profile</h3>
                <button onclick="toggleModal('viewUserModal')" class="text-slate-400 hover:text-slate-600"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-12 space-y-12">
                <div class="flex items-center gap-12">
                    <div class="w-32 h-32 bg-aps-green rounded-[2.5rem] flex items-center justify-center text-white text-5xl font-black shadow-xl">AA</div>
                    <div class="grid grid-cols-2 gap-x-12 gap-y-6 flex-1 font-semibold text-left">
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Full Name</p><p class="text-lg font-black text-slate-800 mt-1">Asma Ali</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Employee ID</p><p class="text-lg font-black text-slate-800 mt-1">APS-KHN-FT-09</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Official Email</p><p class="text-lg font-black text-aps-green mt-1">asma.ali@aps.edu</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Assigned Wing</p><p class="text-lg font-black text-slate-800 mt-1">Wing A (Junior)</p></div>
                    </div>
                </div>
                <div class="flex justify-end pt-8 border-t border-slate-100">
                    <button onclick="toggleModal('viewUserModal')" class="bg-slate-900 text-white px-12 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Close Overview</button>
                </div>
            </div>
        </div>
    </div>

    <div id="editUserModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50 items-center">
                <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">Modify Account</h3>
                <button onclick="toggleModal('editUserModal')" class="text-slate-400 hover:text-slate-600"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-10 space-y-8 overflow-y-auto max-h-[75vh] no-scrollbar">
                <div class="flex justify-center">
                    <div class="relative group">
                        <div class="w-32 h-32 relative rounded-full shadow-lg border-4 border-white overflow-hidden bg-aps-green flex items-center justify-center text-white font-black text-5xl" id="eInitials">AA</div>
                        <img id="eAvatarPreview" class="absolute inset-0 w-full h-full object-cover hidden rounded-full">
                        <button onclick="document.getElementById('eAvatar').click()" class="absolute right-0 -bottom-2 w-10 h-10 bg-slate-900 text-white rounded-full flex items-center justify-center border-2 border-white shadow-xl hover:bg-aps-green transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                        <input type="file" id="eAvatar" class="hidden" accept="image/*" onchange="previewImage(this, 'eAvatarPreview', 'eInitials')">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div><label class="text-[10px] font-black text-slate-400 uppercase mb-2 block px-1">Institutional Name</label><input type="text" value="Asma Ali" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none focus:border-aps-green"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase mb-2 block px-1">Employee ID</label><input type="text" value="APS-KHN-FT-09" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none focus:border-aps-green"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase mb-2 block px-1">Update Wing</label><select class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none appearance-none font-bold"><option selected>Wing A</option><option>Wing B</option><option>Wing C</option></select></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div><label class="text-[10px] font-black text-slate-400 uppercase mb-2 block px-1">Email Address</label><input type="email" value="asma.ali@aps.edu" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none focus:border-aps-green"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase mb-2 block px-1">Password</label><input type="password" placeholder="Modify only if necessary" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none focus:border-aps-green"></div>
                </div>
                <div class="flex justify-end gap-4 border-t border-slate-100 pt-8">
                    <button onclick="toggleModal('editUserModal')" class="px-8 py-4 text-sm font-bold text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors font-black">Discard</button>
                    <button class="bg-aps-green text-white px-10 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-emerald-900/20 hover:bg-emerald-900 transition-all font-black">Save Profile Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteUserModal" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-md rounded-[3rem] shadow-2xl p-12 text-center border-4 border-red-50">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></div>
            <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tight leading-none">Terminate Access?</h3>
            <p class="text-slate-400 font-medium mt-4">This action will permanently remove the user and all associated performance data from the system.</p>
            <div class="mt-10 space-y-3">
                <button class="w-full bg-red-500 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-red-200 hover:bg-red-600 font-black">Delete Account</button>
                <button onclick="toggleModal('deleteUserModal')" class="w-full py-4 text-sm font-black text-slate-400 uppercase tracking-widest hover:text-slate-600 transition-colors font-black">Discard Action</button>
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

        function previewImage(input, previewId, placeholderId) {
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById(placeholderId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        const profileBtn = document.getElementById('profileMenuButton');
        const dropdown = document.getElementById('profileDropdown');
        profileBtn.addEventListener('click', (e) => { e.stopPropagation(); dropdown.classList.toggle('hidden'); });
        document.addEventListener('click', (e) => { if (dropdown && !dropdown.contains(e.target) && !profileBtn.contains(e.target)) dropdown.classList.add('hidden'); });
    </script>
</body>
</html>