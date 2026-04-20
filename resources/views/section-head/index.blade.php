@extends('layouts.app')

@section('title', 'APSACS Khanewal | Section Heads Management')

@push('styles')
<style>
    .modal-active { align-items: center; justify-content: center; }
</style>
@endpush

@section('header')
    <x-dashboard.page-header title="SectionHead Hub">
        <x-slot name="actions">
            @if(auth()->user()->isAdmin() || auth()->user()->isPrincipal())
            <button type="button"
                @if($canRegisterSectionHead) onclick="toggleModal('createSecHeadModal')" @endif
                @disabled(! $canRegisterSectionHead)
                title="{{ $canRegisterSectionHead ? '' : 'Every wing already has a section head.' }}"
                class="bg-aps-green text-white px-6 py-2.5 rounded-xl font-black text-xs shadow-lg shadow-emerald-900/20 hover:bg-emerald-900 transition-all flex items-center gap-2 uppercase tracking-widest disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-aps-green">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Register SectionHead
            </button>
            @endif
        </x-slot>
    </x-dashboard.page-header>
@endsection

@section('content')
@php
    use App\Enums\Department;
    use App\Enums\Wing;
    $sectionHeadOtherDeptValue = Department::Other->value;
@endphp
            @if (session('status'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-900">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ $errors->first() }}</div>
            @endif

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
                                <th class="px-10 py-5">Departments</th>
                                <th class="px-10 py-5 text-right">Directory Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse ($sectionHeads as $row)
                            @php
                                $takenWingValuesByOthers = $sectionHeads->where('id', '!=', $row->id)->pluck('wing')->filter()->map(fn ($w) => $w->value)->all();
                                $allowedWingsForRow = collect(Wing::cases())->filter(function (Wing $w) use ($takenWingValuesByOthers, $row) {
                                    if (in_array($w->value, $takenWingValuesByOthers, true)) {
                                        return $row->wing && $row->wing->value === $w->value;
                                    }

                                    return true;
                                })->values()->map(fn (Wing $w) => ['value' => $w->value, 'label' => $w->label()])->all();
                                $deptLabelsForRow = collect($row->departments ?? [])->map(function ($v) use ($row) {
                                    if (! is_string($v)) {
                                        return null;
                                    }
                                    if ($v === Department::Other->value) {
                                        return filled($row->other_department_label)
                                            ? 'Other ('.$row->other_department_label.')'
                                            : 'Other';
                                    }

                                    return Department::tryFrom($v)?->label();
                                })->filter()->values();
                            @endphp
                            <tr class="group hover:bg-emerald-50/30 transition-colors">
                                <td class="px-10 py-6 flex items-center gap-4">
                                    @if($row->avatarUrl())
                                        <img src="{{ $row->avatarUrl() }}" alt="" class="w-12 h-12 rounded-2xl object-cover shadow-sm border border-slate-100">
                                    @else
                                        <div class="w-12 h-12 bg-aps-green rounded-2xl flex items-center justify-center text-white font-black text-lg shadow-sm">{{ $row->initials() }}</div>
                                    @endif
                                    <div><p class="font-black text-slate-800 leading-none">{{ $row->name }}</p><p class="text-[10px] text-slate-400 font-bold uppercase mt-2">{{ $row->employee_id }}</p></div>
                                </td>
                                <td class="px-10 py-6">
                                    @if($row->wing)
                                        <span class="px-4 py-1.5 bg-slate-100 text-slate-600 text-[10px] font-black rounded-lg uppercase tracking-widest">{{ $row->wing->label() }}</span>
                                    @else
                                        <span class="text-slate-400 text-xs">—</span>
                                    @endif
                                </td>
                                <td class="px-10 py-6 align-top">
                                    @if($deptLabelsForRow->isNotEmpty())
                                        <div class="flex flex-wrap gap-2 max-w-md">
                                            @foreach ($deptLabelsForRow as $lbl)
                                                <span class="px-3 py-1 bg-emerald-50 text-aps-green text-[10px] font-black rounded-lg border border-emerald-100/80">{{ $lbl }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="text-slate-400 text-xs">—</span>
                                    @endif
                                </td>
                                <td class="px-10 py-6 text-right">
                                    <div class="flex justify-end gap-3 opacity-60 group-hover:opacity-100 transition-opacity">
                                        <button type="button" onclick="openSecHeadView(@js(['name' => $row->name,'employee_id' => $row->employee_id,'email' => $row->email,'wing_label' => $row->wing?->label(),'departments_display' => $deptLabelsForRow->implode(', ') ?: '—','avatar' => $row->avatarUrl(),'initials' => $row->initials()]))" class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                                        @if(auth()->user()->isAdmin() || auth()->user()->isPrincipal())
                                        <button type="button" onclick="openSecHeadEdit(@js(['updateUrl' => route('section-heads.update', $row),'name' => $row->name,'employee_id' => $row->employee_id,'email' => $row->email,'wing' => $row->wing?->value,'title' => $row->title,'departments' => array_values(array_filter(array_map(fn ($v) => is_string($v) ? $v : null, $row->departments ?? []))),'other_department_label' => $row->other_department_label,'allowedWings' => $allowedWingsForRow]))" class="p-2 text-slate-400 hover:text-aps-green hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
                                        <button type="button" onclick="openSecHeadDelete(@js(['destroyUrl' => route('section-heads.destroy', $row),'name' => $row->name]))" class="p-2 text-slate-400 hover:text-red-500 hover:bg-white rounded-lg shadow-sm border border-transparent hover:border-slate-100"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-10 py-12 text-center text-slate-400 font-semibold">No section heads registered yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
@endsection

@push('modals')
@include('section-head.partials.modals')
@endpush

@push('scripts')
<script>
var SECTION_HEAD_OTHER_DEPT = @json($sectionHeadOtherDeptValue);
function syncCreateOtherDeptWrap() {
    var wrap = document.getElementById('createOtherDeptWrap');
    if (!wrap) return;
    var cb = document.querySelector('#createSecHeadModal input[name="departments[]"][value="' + SECTION_HEAD_OTHER_DEPT + '"]');
    if (cb && cb.checked) wrap.classList.remove('hidden');
    else wrap.classList.add('hidden');
}
function syncEditOtherDeptWrap() {
    var wrap = document.getElementById('editOtherDeptWrap');
    if (!wrap) return;
    var cb = document.querySelector('#editSecHeadForm input[name="departments[]"][value="' + SECTION_HEAD_OTHER_DEPT + '"]');
    if (cb && cb.checked) wrap.classList.remove('hidden');
    else wrap.classList.add('hidden');
}
function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.toggle('hidden');
    modal.classList.toggle('modal-active');
    if (modalId === 'createSecHeadModal' && !modal.classList.contains('hidden')) {
        updateCreateSecHeadIdPreview();
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
function openSecHeadView(data) {
    document.getElementById('viewShName').textContent = data.name;
    document.getElementById('viewShEmp').textContent = data.employee_id;
    document.getElementById('viewShEmail').textContent = data.email;
    document.getElementById('viewShWing').textContent = data.wing_label || '—';
    document.getElementById('viewShDepartments').textContent = data.departments_display || '—';
    const img = document.getElementById('viewShAvatar');
    const initialsEl = document.getElementById('viewShInitials');
    if (data.avatar) {
        img.src = data.avatar;
        img.classList.remove('hidden');
        initialsEl.classList.add('hidden');
    } else {
        img.classList.add('hidden');
        initialsEl.textContent = data.initials;
        initialsEl.classList.remove('hidden');
    }
    toggleModal('viewSecHeadModal');
}
function openSecHeadEdit(data) {
    document.getElementById('editSecHeadForm').action = data.updateUrl;
    document.getElementById('edit_sh_name').value = data.name;
    document.getElementById('edit_sh_employee_id_display').textContent = data.employee_id || '—';
    document.getElementById('edit_sh_email').value = data.email;
    const wingSelect = document.getElementById('edit_sh_wing');
    wingSelect.innerHTML = '';
    (data.allowedWings || []).forEach(function (o) {
        const opt = document.createElement('option');
        opt.value = o.value;
        opt.textContent = o.label;
        wingSelect.appendChild(opt);
    });
    wingSelect.value = data.wing || '';
    document.getElementById('edit_sh_title').value = data.title || '';
    document.querySelectorAll('#editSecHeadForm [name="departments[]"]').forEach(function (cb) {
        cb.checked = Array.isArray(data.departments) && data.departments.indexOf(cb.value) !== -1;
    });
    var otherInput = document.getElementById('edit_other_department_label');
    if (otherInput) otherInput.value = data.other_department_label || '';
    syncEditOtherDeptWrap();
    document.getElementById('edit_sh_password').value = '';
    document.getElementById('editAvatar').value = '';
    document.getElementById('editAvatarPreview').classList.add('hidden');
    document.getElementById('editInitials').textContent = data.name.split(/\s+/).filter(Boolean).slice(0, 2).map(function (p) { return p[0]; }).join('').toUpperCase();
    document.getElementById('editInitials').classList.remove('hidden');
    toggleModal('editSecHeadModal');
}
function openSecHeadDelete(data) {
    document.getElementById('deleteSecHeadForm').action = data.destroyUrl;
    document.getElementById('deleteSecHeadName').textContent = data.name;
    toggleModal('deleteSecHeadModal');
}
var INSTITUTIONAL_WING_PREFIX = { pre_junior: 'PRE', middle: 'M', senior: 'SE' };
function updateCreateSecHeadIdPreview() {
    var sel = document.getElementById('createSecHeadWing');
    var el = document.getElementById('createSecHeadIdPreview');
    if (!el) return;
    if (!sel || !sel.value || !INSTITUTIONAL_WING_PREFIX[sel.value]) {
        el.textContent = '—';
        return;
    }
    el.textContent = INSTITUTIONAL_WING_PREFIX[sel.value] + '-SEC-0001';
}
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#createSecHeadModal input[name="departments[]"]').forEach(function (el) {
        el.addEventListener('change', syncCreateOtherDeptWrap);
    });
    document.querySelectorAll('#editSecHeadForm input[name="departments[]"]').forEach(function (el) {
        el.addEventListener('change', syncEditOtherDeptWrap);
    });
    syncCreateOtherDeptWrap();
    var shWing = document.getElementById('createSecHeadWing');
    if (shWing) {
        shWing.addEventListener('change', updateCreateSecHeadIdPreview);
        updateCreateSecHeadIdPreview();
    }
});
</script>
@endpush
