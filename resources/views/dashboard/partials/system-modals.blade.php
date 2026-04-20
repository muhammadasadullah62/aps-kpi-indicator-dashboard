<div id="overviewUserModal" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[100] items-center justify-center p-6">
    <div class="bg-white w-full max-w-3xl rounded-[3rem] shadow-2xl overflow-hidden border border-slate-200">
        <div class="p-10 border-b border-slate-100 flex justify-between bg-slate-50/50 items-center">
            <h3 class="text-3xl font-black text-slate-800 tracking-tight uppercase">User profile</h3>
            <button type="button" onclick="toggleModal('overviewUserModal')" class="text-slate-400 hover:text-slate-600"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg></button>
        </div>
        <div class="p-12 space-y-12">
            <div class="flex items-center gap-12">
                <div class="relative shrink-0">
                    <img id="overviewUserAvatar" src="" alt="" class="w-32 h-32 rounded-[2.5rem] object-cover shadow-md border border-slate-100 hidden">
                    <div id="overviewUserInitials" class="w-32 h-32 bg-aps-green rounded-[2.5rem] flex items-center justify-center text-white text-5xl font-black"></div>
                </div>
                <div class="grid grid-cols-2 gap-x-12 gap-y-6 flex-1 font-semibold text-left">
                    <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Full name</p><p id="overviewUserName" class="text-lg font-black text-slate-800 mt-1"></p></div>
                    <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Employee ID</p><p id="overviewUserEmp" class="text-lg font-black text-slate-800 mt-1"></p></div>
                    <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Email</p><p id="overviewUserEmail" class="text-lg font-black text-aps-green mt-1"></p></div>
                    <div><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Role</p><p id="overviewUserRole" class="text-lg font-black text-slate-800 mt-1"></p></div>
                    <div class="col-span-2"><p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Wing &amp; department</p><p id="overviewUserWingDept" class="text-lg font-black text-slate-800 mt-1"></p></div>
                </div>
            </div>
            <div class="flex justify-end pt-8 border-t border-slate-100">
                <button type="button" onclick="toggleModal('overviewUserModal')" class="bg-slate-900 text-white px-12 py-4 rounded-2xl font-black text-sm uppercase tracking-widest shadow-xl">Close</button>
            </div>
        </div>
    </div>
</div>
