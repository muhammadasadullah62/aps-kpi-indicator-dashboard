@extends('layouts.app')

@section('title', 'APSACS Khanewal | Faculty Management')

@push('styles')
<style>.modal-active { align-items: center; justify-content: center; }</style>
@endpush

@section('header')
    <x-dashboard.page-header title="Faculty Hub">
        <x-slot name="actions">
            @if(auth()->user()->isAdmin() || auth()->user()->isPrincipal() || auth()->user()->isSectionHead())
            @php($shCanRegister = auth()->user()->isAdmin() || auth()->user()->isPrincipal() || (auth()->user()->isSectionHead() && auth()->user()->wing))
            <button type="button"
                @if($shCanRegister) onclick="toggleModal('createFacultyModal')" @endif
                @unless($shCanRegister) disabled @endunless
                title="{{ auth()->user()->isSectionHead() && !auth()->user()->wing ? 'Your profile must have a wing assigned before you can register teachers.' : '' }}"
                class="bg-aps-green text-white px-6 py-2.5 rounded-xl font-black text-xs shadow-lg shadow-emerald-900/20 hover:bg-emerald-900 transition-all flex items-center gap-2 uppercase tracking-widest disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-aps-green">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Register Teacher
            </button>
            @endif
        </x-slot>
    </x-dashboard.page-header>
@endsection

@section('content')
            @if (session('status'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-900">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ $errors->first() }}</div>
            @endif

            <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm overflow-hidden font-semibold">
                <div class="p-8 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="text-xl font-black text-slate-800 uppercase tracking-tight">Active Faculty Directory</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50/30">
                                <th class="px-10 py-5">Instructor</th>
                                <th class="px-10 py-5">Department</th>
                                <th class="px-10 py-5 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($facultyMembers as $row)
                            <tr class="group hover:bg-emerald-50/30 transition-colors">
                                <td class="px-10 py-6 flex items-center gap-4">
                                    @if($row->avatarUrl())
                                        <img src="{{ $row->avatarUrl() }}" alt="" class="w-12 h-12 rounded-2xl object-cover shadow-sm border border-slate-100">
                                    @else
                                        <div class="w-12 h-12 bg-emerald-500 rounded-2xl flex items-center justify-center text-white font-black text-lg shadow-sm">{{ $row->initials() }}</div>
                                    @endif
                                    <div><p class="font-black text-slate-800 leading-none">{{ $row->name }}</p><p class="text-[10px] text-slate-400 font-bold uppercase mt-2">{{ $row->employee_id }}</p></div>
                                </td>
                                <td class="px-10 py-6">
                                    @if($row->department)
                                        <span class="px-4 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black rounded-lg uppercase tracking-widest">{{ $row->department->label() }}</span>
                                        @if($row->wing)
                                            <p class="text-[10px] text-slate-400 font-bold mt-1 uppercase">{{ $row->wing->label() }}</p>
                                        @endif
                                    @else
                                        <span class="text-slate-400 text-xs">—</span>
                                    @endif
                                </td>
                                <td class="px-10 py-6 text-right">
                                    @if(auth()->user()->isAdmin() || auth()->user()->isPrincipal() || auth()->user()->isSectionHead())
                                    <div class="flex justify-end gap-3 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button type="button" onclick="openFacultyView(@js(['name' => $row->name,'employee_id' => $row->employee_id,'email' => $row->email,'department_label' => $row->department?->label(),'wing_label' => $row->wing?->label(),'avatar' => $row->avatarUrl(),'initials' => $row->initials()]))" class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-xl transition-all shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                                        <button type="button" onclick="openFacultyEdit(@js(['updateUrl' => route('faculty.update', $row),'name' => $row->name,'employee_id' => $row->employee_id,'email' => $row->email,'wing' => $row->wing?->value,'department' => $row->department?->value,'title' => $row->title]))" class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-xl transition-all shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                                        <button type="button" onclick="openFacultyDelete(@js(['destroyUrl' => route('faculty.destroy', $row),'name' => $row->name]))" class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-xl transition-all shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                    </div>
                                    @else
                                    <span class="text-[10px] font-bold text-slate-300 uppercase">View only</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-10 py-12 text-center text-slate-400 font-semibold">No faculty members registered yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection

@push('modals')
@include('faculty.partials.modals')
@endpush

@push('scripts')
<script>
function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.toggle('hidden');
    modal.classList.toggle('modal-active');
    if (modalId === 'createFacultyModal' && !modal.classList.contains('hidden')) {
        updateCreateFacultyIdPreview();
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
function openFacultyView(data) {
    document.getElementById('viewFaName').textContent = data.name;
    document.getElementById('viewFaEmp').textContent = data.employee_id;
    document.getElementById('viewFaEmail').textContent = data.email;
    document.getElementById('viewFaDept').textContent = data.department_label ? (data.department_label + (data.wing_label ? ' (' + data.wing_label + ')' : '')) : '—';
    const img = document.getElementById('viewFaAvatar');
    const initialsEl = document.getElementById('viewFaInitials');
    if (data.avatar) {
        img.src = data.avatar;
        img.classList.remove('hidden');
        initialsEl.classList.add('hidden');
    } else {
        img.classList.add('hidden');
        initialsEl.textContent = data.initials;
        initialsEl.classList.remove('hidden');
    }
    toggleModal('viewFacultyModal');
}
function openFacultyEdit(data) {
    document.getElementById('editFacultyForm').action = data.updateUrl;
    document.getElementById('edit_fa_name').value = data.name;
    document.getElementById('edit_fa_employee_id_display').textContent = data.employee_id || '—';
    document.getElementById('edit_fa_email').value = data.email;
    var wingSel = document.getElementById('edit_fa_wing');
    if (wingSel) wingSel.value = data.wing || '';
    document.getElementById('edit_fa_department').value = data.department || '';
    document.getElementById('edit_fa_title').value = data.title || '';
    document.getElementById('edit_fa_password').value = '';
    document.getElementById('editFaAvatar').value = '';
    document.getElementById('editFaAvatarPreview').classList.add('hidden');
    document.getElementById('eInitials').textContent = data.name.split(/\s+/).filter(Boolean).slice(0, 2).map(function (p) { return p[0]; }).join('').toUpperCase();
    document.getElementById('eInitials').classList.remove('hidden');
    toggleModal('editFacultyModal');
}
function openFacultyDelete(data) {
    document.getElementById('deleteFacultyForm').action = data.destroyUrl;
    document.getElementById('deleteFacultyName').textContent = data.name;
    toggleModal('deleteFacultyModal');
}
var INSTITUTIONAL_WING_PREFIX = { pre_junior: 'PRE', middle: 'M', senior: 'SE' };
function updateCreateFacultyIdPreview() {
    var modal = document.getElementById('createFacultyModal');
    var el = modal ? modal.querySelector('.js-create-faculty-id-preview') : null;
    if (!el) return;
    var wingVal = '';
    if (modal && modal.dataset.shWing) {
        wingVal = modal.dataset.shWing;
    } else {
        var sel = document.getElementById('createFacultyWing');
        wingVal = sel ? sel.value : '';
    }
    if (!wingVal || !INSTITUTIONAL_WING_PREFIX[wingVal]) {
        el.textContent = '—';
        return;
    }
    el.textContent = INSTITUTIONAL_WING_PREFIX[wingVal] + '-TE-0001';
}
document.addEventListener('DOMContentLoaded', function () {
    var sel = document.getElementById('createFacultyWing');
    if (sel) sel.addEventListener('change', updateCreateFacultyIdPreview);
    updateCreateFacultyIdPreview();
});
</script>
@endpush
