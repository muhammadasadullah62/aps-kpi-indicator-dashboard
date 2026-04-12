<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APSACS Khanewal | System Settings Dashboard</title>
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
<body class="flex h-screen overflow-hidden text-slate-900 font-semibold">

    <aside class="hidden lg:flex flex-col w-72 bg-white border-r border-slate-200 h-full shrink-0">
        <div class="p-8">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-12 h-12 bg-aps-green rounded-xl flex items-center justify-center text-white shadow-lg">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold tracking-tighter aps-green leading-none">APSACS</h1>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Khanewal</p>
                </div>
            </div>

            <nav class="space-y-1 mb-8">
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-aps-green rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    Dashboard Overview
                </a>
            </nav>

            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 px-4">User Management</p>
            <nav class="space-y-2">
                <a href="/sechead" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    SecHead Management
                </a>
                <a href="/faculty" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Faculty Management
                </a>
                <a href="/observations" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Observations
                </a>
            </nav>
        </div>

        <div class="p-8 mt-auto">
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-100">
        <header class="bg-white px-8 py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase leading-none">System Dashboard</h2>
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mt-2">Admin Overview & Statistics</p>
            </div>
            <div class="flex items-center gap-6">
                <div class="text-right leading-none hidden sm:block"><p class="text-sm font-bold text-slate-900">Sarah Jenkins</p><p class="text-[10px] font-bold text-slate-400 uppercase mt-1">Institutional Admin</p></div>
                <img src="https://ui-avatars.com/api/?name=Sarah+Jenkins&background=fdba74&color=9a3412" alt="Avatar" class="w-10 h-10 rounded-xl shadow-md border-2 border-white">
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8 no-scrollbar">

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-aps-green p-8 rounded-[2rem] text-white shadow-xl relative overflow-hidden group">
                    <p class="text-[10px] font-bold text-emerald-300 uppercase tracking-widest mb-1 relative z-10">Total Users</p>
                    <h3 class="text-5xl font-black relative z-10">148</h3>
                    <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-all"></div>
                </div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm"><p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Section Heads</p><h3 class="text-5xl font-black text-slate-800">08</h3></div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm"><p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Teachers</p><h3 class="text-5xl font-black text-slate-800">124</h3></div>
                <div class="bg-white p-8 rounded-[2rem] border border-slate-200 shadow-sm"><p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Deleted</p><h3 class="text-5xl font-black text-red-600">16</h3></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-8 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Recently Onboarded</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <tbody class="divide-y divide-slate-100">
                                <tr class="group hover:bg-emerald-50/30 transition-colors">
                                    <td class="px-8 py-5 flex items-center gap-4">
                                        <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-500 font-black text-xs">MK</div>
                                        <div><p class="text-sm text-slate-800 leading-none">M. Kamran</p><p class="text-[10px] text-slate-400 mt-1 uppercase tracking-wider">Senior Wing • Physics</p></div>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <button onclick="toggleModal('viewUserModal')" class="p-2 text-slate-300 hover:text-aps-green hover:bg-white border border-transparent hover:border-slate-100 rounded-xl transition-all"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="bg-slate-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden border-b-4 border-emerald-500 flex flex-col justify-center text-center">
                    <h4 class="text-2xl font-black mb-4 tracking-tight uppercase">Security Protocol</h4>
                    <p class="text-sm text-slate-400 italic">User data modifications are restricted and logged by institutional governance.</p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-4 px-2">
                    <div class="h-px bg-slate-200 flex-1"></div>
                    <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.4em]">Faculty Directory by Wing</h3>
                    <div class="h-px bg-slate-200 flex-1"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm flex flex-col h-[420px]">
                        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                            <h4 class="text-lg font-black text-slate-800 uppercase">Senior Wing</h4>
                            <span class="bg-emerald-50 text-aps-green text-[10px] font-black px-2.5 py-1 rounded-lg uppercase">42 Members</span>
                        </div>
                        <div class="flex-1 overflow-y-auto p-6 space-y-4 no-scrollbar">
                            <div class="flex items-center justify-between p-3 hover:bg-slate-50 rounded-2xl transition-all group/row font-semibold">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Ali+Raza&background=064e3b&color=fff" class="w-8 h-8 rounded-lg shadow-sm">
                                    <div class="leading-none"><p class="text-xs font-black text-slate-800">Ali Raza</p><p class="text-[9px] text-slate-400 uppercase mt-1">Physics</p></div>
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
                            <h4 class="text-lg font-black text-slate-800 uppercase">Middle Wing</h4>
                            <span class="bg-emerald-50 text-aps-green text-[10px] font-black px-2.5 py-1 rounded-lg uppercase">56 Members</span>
                        </div>
                        <div class="flex-1 overflow-y-auto p-6 space-y-4 no-scrollbar">
                            <div class="flex items-center justify-between p-3 hover:bg-slate-50 rounded-2xl transition-all group/row font-semibold text-slate-400">Directory logic active...</div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm flex flex-col h-[420px]">
                        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
                            <h4 class="text-lg font-black text-slate-800 uppercase">Pre/Junior Wing</h4>
                            <span class="bg-emerald-50 text-aps-green text-[10px] font-black px-2.5 py-1 rounded-lg uppercase">50 Members</span>
                        </div>
                        <div class="flex-1 overflow-y-auto p-6 space-y-4 no-scrollbar">
                            <div class="flex items-center justify-between p-3 hover:bg-slate-50 rounded-2xl transition-all group/row font-semibold text-slate-400">Directory logic active...</div>
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
                <button onclick="toggleModal('viewUserModal')" class="text-slate-400"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-12 space-y-12">
                <div class="flex items-center gap-12">
                    <div class="w-32 h-32 bg-aps-green rounded-[2.5rem] flex items-center justify-center text-white text-5xl font-black">AR</div>
                    <div class="grid grid-cols-2 gap-x-12 gap-y-6 flex-1 font-semibold text-left">
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Full Name</p><p class="text-lg font-black text-slate-800 mt-1">Ali Raza</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Employee ID</p><p class="text-lg font-black text-slate-800 mt-1">APS-KHN-SH-04</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</p><p class="text-lg font-black text-aps-green mt-1">araza@aps.edu</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Wing</p><p class="text-lg font-black text-slate-800 mt-1">Senior Wing</p></div>
                    </div>
                </div>
                <div class="flex justify-end pt-8 border-t border-slate-100">
                    <button onclick="toggleModal('viewUserModal')" class="bg-slate-900 text-white px-12 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="editUserModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50 items-center">
                <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">Modify Profile</h3>
                <button onclick="toggleModal('editUserModal')" class="text-slate-400"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-10 space-y-10">
                <div class="flex justify-center">
                    <div class="w-24 h-24 bg-slate-50 rounded-full border-4 border-white shadow-lg overflow-hidden flex items-center justify-center text-aps-green font-black">Edit Pic</div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                    <div><label class="text-[10px] font-black text-slate-400 uppercase mb-2 block px-1 tracking-widest">Name</label><input type="text" value="Ali Raza" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none focus:border-aps-green"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase mb-2 block px-1 tracking-widest">Wing</label><select class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none appearance-none"><option>Senior Wing</option><option>Middle Wing</option><option>Pre/Junior Wing</option></select></div>
                </div>
                <div class="flex justify-end gap-4 border-t border-slate-100 pt-8">
                    <button onclick="toggleModal('editUserModal')" class="px-8 py-4 text-sm font-bold text-slate-400 uppercase tracking-widest">Discard</button>
                    <button class="bg-aps-green text-white px-10 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl shadow-emerald-900/20 hover:bg-emerald-900 transition-all">Save Profile Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteUserModal" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-md rounded-[3rem] shadow-2xl p-12 text-center border-4 border-red-50">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></div>
            <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tight leading-none">Revoke Access?</h3>
            <p class="text-slate-400 font-medium mt-4">This action will permanently remove the profile and performance history from the institutional board.</p>
            <div class="mt-10 space-y-3">
                <button class="w-full bg-red-500 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Yes, Delete Account</button>
                <button onclick="toggleModal('deleteUserModal')" class="w-full py-4 text-sm font-black text-slate-400 uppercase tracking-widest">Discard Action</button>
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

        const profileBtn = document.getElementById('profileMenuButton');
        const dropdown = document.getElementById('profileDropdown');
        if (profileBtn) {
            profileBtn.addEventListener('click', (e) => { e.stopPropagation(); dropdown.classList.toggle('hidden'); });
        }
        document.addEventListener('click', (e) => { if (dropdown && !dropdown.contains(e.target) && !profileBtn.contains(e.target)) dropdown.classList.add('hidden'); });
    </script>
</body>
</html>