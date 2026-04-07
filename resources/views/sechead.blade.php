<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APS Khanewal | Section Heads Management</title>
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
        @keyframes fadeIn { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-900">

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
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 px-4">User Management</p>
            <nav class="space-y-2">
                <a href="#" class="flex items-center gap-4 px-4 py-3 bg-emerald-50 text-emerald-800 rounded-xl font-bold relative group">
                    <div class="absolute left-0 w-1.5 h-6 bg-aps-green rounded-r-full"></div>
                    <svg class="w-5 h-5 text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Section Heads Management
                </a>
                <a href="/teachermanagement" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 rounded-xl font-semibold transition-all group">
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-aps-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Faculty Management
                </a>
            </nav>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full overflow-hidden bg-slate-100">
        <header class="bg-white px-8 py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200">
            <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">SectionHead Hub</h2>
            <button onclick="toggleModal('createSecHeadModal')" class="bg-aps-green text-white px-6 py-2.5 rounded-xl font-black text-xs shadow-lg shadow-emerald-900/20 hover:bg-emerald-900 transition-all flex items-center gap-2 uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Register SectionHead
            </button>
        </header>

        <div class="flex-1 overflow-y-auto p-8 space-y-8 no-scrollbar">
            <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden font-semibold">
                <div class="p-8 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Active Profiles</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50/30">
                                <th class="px-10 py-5">SecHead</th>
                                <th class="px-10 py-5">Wing Assignment</th>
                                <th class="px-10 py-5 text-right">Directory Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="group hover:bg-emerald-50/30 transition-colors">
                                <td class="px-10 py-6 flex items-center gap-4">
                                    <div class="w-12 h-12 bg-aps-green rounded-2xl flex items-center justify-center text-white font-black text-lg shadow-sm">AR</div>
                                    <div><p class="font-black text-slate-800 leading-none">Ali Raza</p><p class="text-[10px] text-slate-400 font-bold uppercase mt-2">APS-KHN-SH-04</p></div>
                                </td>
                                <td class="px-10 py-6"><span class="px-4 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black rounded-lg uppercase tracking-widest">Wing C (Senior)</span></td>
                                <td class="px-10 py-6 text-right">
                                    <div class="flex justify-end gap-3 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button onclick="toggleModal('viewSecHeadModal')" class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                                        <button onclick="toggleModal('editSecHeadModal')" class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                                        <button onclick="toggleModal('deleteSecHeadModal')" class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div id="createSecHeadModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50">
                <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">Register SectionHead</h3>
                <button onclick="toggleModal('createSecHeadModal')" class="text-slate-400"><svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-10 space-y-10">
                <div class="flex justify-center">
                    <div class="relative group">
                        <div class="w-32 h-32 relative rounded-full shadow-lg border-4 border-white overflow-hidden bg-aps-green flex items-center justify-center text-white font-black text-5xl" id="createInitials">NEW</div>
                        <img id="createAvatarPreview" class="absolute inset-0 w-full h-full object-cover hidden rounded-full">
                        <button onclick="document.getElementById('createAvatar').click()" class="absolute right-0 -bottom-2 w-10 h-10 bg-slate-900 text-white rounded-full flex items-center justify-center border-2 border-white shadow-xl"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                        <input type="file" id="createAvatar" class="hidden" accept="image/*" onchange="previewImage(this, 'createAvatarPreview', 'createInitials')">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Full Name</label><input type="text" placeholder="Zain Ahmed" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold outline-none focus:border-aps-green"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Employee ID</label><input type="text" placeholder="APS-KHN-SH-01" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold outline-none focus:border-aps-green"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Assigned Wing</label><select class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold outline-none appearance-none"><option>Wing A</option><option>Wing B</option><option>Wing C</option></select></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Institutional Email</label><input type="email" placeholder="sh.admin@aps-khanewal.edu" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold outline-none focus:border-aps-green"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2">Institutional Password</label><input type="password" placeholder="••••••••" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-semibold outline-none focus:border-aps-green"></div>
                </div>
                <div class="flex justify-end gap-4 border-t border-slate-100 pt-8">
                    <button onclick="toggleModal('createSecHeadModal')" class="px-8 py-4 text-sm font-bold text-slate-400 uppercase tracking-widest">Cancel</button>
                    <button class="bg-aps-green text-white px-10 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Create Profile</button>
                </div>
            </div>
        </div>
    </div>

    <div id="viewSecHeadModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-3xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50">
                <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">SecHead Profile</h3>
                <button onclick="toggleModal('viewSecHeadModal')" class="text-slate-400"><svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-12 space-y-10">
                <div class="flex items-center gap-10">
                    <div class="w-32 h-32 bg-aps-green rounded-[2.5rem] flex items-center justify-center text-white text-5xl font-black shadow-xl">AR</div>
                    <div class="grid grid-cols-2 gap-x-12 gap-y-6 flex-1">
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Name</p><p class="text-lg font-black text-slate-800 leading-none mt-1">Ali Raza</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Employee ID</p><p class="text-lg font-black text-slate-800 leading-none mt-1">APS-KHN-SH-04</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</p><p class="text-lg font-black text-aps-green leading-none mt-1">araza@aps.edu</p></div>
                        <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Wing</p><p class="text-lg font-black text-slate-800 leading-none mt-1">Wing C (Senior)</p></div>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-slate-100 flex justify-end">
                    <button onclick="toggleModal('viewSecHeadModal')" class="bg-slate-900 text-white px-12 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="editSecHeadModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-4xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
            <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50">
                <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">Update Profile</h3>
                <button onclick="toggleModal('editSecHeadModal')" class="text-slate-400"><svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>
            <div class="p-10 space-y-10">
                <div class="flex justify-center">
                    <div class="relative group">
                        <div class="w-32 h-32 relative rounded-full shadow-lg border-4 border-white overflow-hidden bg-aps-green flex items-center justify-center text-white font-black text-5xl" id="editInitials">AR</div>
                        <img id="editAvatarPreview" class="absolute inset-0 w-full h-full object-cover hidden rounded-full">
                        <button onclick="document.getElementById('editAvatar').click()" class="absolute right-0 -bottom-2 w-10 h-10 bg-slate-900 text-white rounded-full flex items-center justify-center border-2 border-white shadow-xl hover:bg-aps-green transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                        <input type="file" id="editAvatar" class="hidden" accept="image/*" onchange="previewImage(this, 'editAvatarPreview', 'editInitials')">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 px-1">Institutional Name</label><input type="text" value="Ali Raza" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 px-1">Employee ID</label><input type="text" value="APS-KHN-SH-04" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 px-1">Wing</label><select class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none"><option selected>Wing C</option><option>Wing A</option></select></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 px-1">Update Email</label><input type="email" value="araza@aps.edu" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none"></div>
                    <div><label class="text-[10px] font-black text-slate-400 uppercase tracking-widest block mb-2 px-1">Change Password</label><input type="password" placeholder="Leave blank to keep same" class="w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-sm font-black outline-none"></div>
                </div>
                <div class="flex justify-end gap-4 border-t border-slate-100 pt-8">
                    <button onclick="toggleModal('editSecHeadModal')" class="px-8 py-4 text-sm font-bold text-slate-400 uppercase tracking-widest">Cancel</button>
                    <button class="bg-aps-green text-white px-10 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteSecHeadModal" class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-[100] items-center justify-center p-6">
        <div class="bg-white w-full max-w-md rounded-[3rem] shadow-2xl p-12 text-center border-4 border-red-50">
            <div class="w-20 h-20 bg-red-50 text-red-500 rounded-full flex items-center justify-center mx-auto mb-6"><svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></div>
            <h3 class="text-2xl font-black text-slate-800 uppercase tracking-tight">Revoke Access?</h3>
            <p class="text-slate-400 font-medium mt-4 leading-relaxed">This will permanently remove Ali Raza's administrative profile and wing data.</p>
            <div class="mt-10 space-y-3">
                <button class="w-full bg-red-500 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Yes, Delete Profile</button>
                <button onclick="toggleModal('deleteSecHeadModal')" class="w-full py-4 text-sm font-black text-slate-400 uppercase tracking-widest">Keep Profile</button>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
            modal.classList.toggle('modal-active');
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
    </script>
</body>
</html>