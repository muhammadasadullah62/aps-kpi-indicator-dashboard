@extends('layouts.app')

@section('title', 'APSACS Khanewal | Advanced Observation')

@section('body-class', 'flex h-screen overflow-hidden text-slate-900 font-semibold')

@section('content-padding', 'p-12 space-y-8')

@section('header')
    <x-dashboard.page-header variant="bare" title="Faculty Performance Audit" subtitle="Aggregate Review Portal: Quantitative (70%) + Qualitative (30%)" padding="px-10 py-8" />
@endsection

@section('content')
            @if (session('status'))
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-900">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ $errors->first() }}</div>
            @endif
@include('dashboard.partials.observation-grid')
@endsection

@push('styles')
<style>
    .rating-input:checked + .rating-label {
        background-color: #064e3b;
        color: white;
        border-color: #064e3b;
        box-shadow: 0 10px 15px -3px rgba(6, 78, 59, 0.3);
    }
    .collapse-content { max-height: 0; overflow: hidden; transition: max-height 0.4s ease-out; }
    .collapse-content.active { max-height: 2500px; padding-bottom: 1.5rem; }
    .chevron-icon { transition: transform 0.3s ease; }
    .chevron-active { transform: rotate(180deg); }
    .modal-active { align-items: center; justify-content: center; }
</style>
@endpush

@push('modals')
@include('dashboard.partials.observation-modals', ['observationDepartments' => $observationDepartments ?? \App\Models\User::departmentsForObservationContext()])
@endpush

@push('scripts')
<script>
    let observerRequiresObservationContext = @json(auth()->check() && auth()->user()->canAccessObservations());
    let currentObserveeIsFaculty = false;
    let defaultObservationWing = @json(auth()->user()?->wing?->value);
    let defaultObservationDepartment = @json(auth()->user()?->department?->value);
    let auditCounter = 0;
    const quantMetrics = ["Student Achievement", "Student Progress", "Lesson Planning", "Assessment Quality", "Attendance"];
    const qualMetrics = ["Student-Centricity", "Professional Ethics", "Classroom Culture", "Communication", "Collaboration", "Innovation"];

    function observationFormEl() {
        return document.getElementById('observationStoreForm');
    }

    function setFormModeCreate() {
        const form = observationFormEl();
        const storeUrl = form.dataset.storeUrl;
        form.action = storeUrl;
        document.getElementById('observation-method-spoof').innerHTML = '';
        const oid = document.getElementById('store_observee_id');
        oid.disabled = false;
        document.getElementById('observation_modal_mode').textContent = 'New observation';
        const btn = document.getElementById('observation_submit_btn');
        btn.textContent = 'Submit Evaluation';
    }

    function setObservationContextForObservee(isFacultyObservee) {
        currentObserveeIsFaculty = !!isFacultyObservee;
        var card = document.getElementById('observationContextCard');
        var wingSel = document.getElementById('observation_context_wing');
        var deptSel = document.getElementById('observation_context_department');
        var wingNull = document.getElementById('observation_wing_null');
        var deptNull = document.getElementById('observation_department_null');
        var reqMark = document.getElementById('observationContextRequiredMark');
        if (!card || !wingSel || !deptSel || !wingNull || !deptNull) return;

        if (currentObserveeIsFaculty) {
            card.classList.add('hidden');
            wingSel.disabled = true;
            deptSel.disabled = true;
            wingSel.required = false;
            deptSel.required = false;
            wingNull.disabled = false;
            deptNull.disabled = false;
            wingNull.value = '';
            deptNull.value = '';
            if (reqMark) reqMark.classList.add('hidden');
        } else {
            card.classList.remove('hidden');
            wingSel.disabled = false;
            deptSel.disabled = false;
            wingSel.required = true;
            deptSel.required = true;
            wingNull.disabled = true;
            deptNull.disabled = true;
            wingNull.value = '';
            deptNull.value = '';
            if (reqMark) reqMark.classList.remove('hidden');
            resetObservationContext();
        }
    }

    function resetObservationContext() {
        var wingEl = document.getElementById('observation_context_wing');
        var deptEl = document.getElementById('observation_context_department');
        if (!wingEl || !deptEl) return;
        if (observerRequiresObservationContext && defaultObservationWing) {
            wingEl.value = defaultObservationWing;
        } else {
            wingEl.value = '';
        }
        if (observerRequiresObservationContext && defaultObservationDepartment) {
            deptEl.value = defaultObservationDepartment;
        } else {
            deptEl.value = '';
        }
    }

    function setFormModeEdit(observationId) {
        const form = observationFormEl();
        const prefix = form.dataset.updateUrlPrefix.replace(/\/$/, '');
        form.action = `${prefix}/${observationId}`;
        document.getElementById('observation-method-spoof').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        document.getElementById('store_observee_id').disabled = true;
        document.getElementById('observation_modal_mode').textContent = 'Edit observation';
        document.getElementById('observation_submit_btn').textContent = 'Update Evaluation';
    }

    function ensureSelectHasOption(selectEl, value, label) {
        if (!selectEl || !value) {
            if (selectEl) selectEl.value = '';
            return;
        }
        var found = false;
        for (var i = 0; i < selectEl.options.length; i++) {
            if (selectEl.options[i].value === value) {
                found = true;
                break;
            }
        }
        if (!found) {
            var opt = document.createElement('option');
            opt.value = value;
            opt.textContent = label || value;
            selectEl.appendChild(opt);
        }
        selectEl.value = value;
    }

    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        modal.classList.toggle('modal-active');
    }

    function openAuditPortal(data) {
        setFormModeCreate();
        const oid = document.getElementById('store_observee_id');
        oid.value = data.id;
        oid.setAttribute('data-last-value', String(data.id));
        document.getElementById('modalFacultyName').textContent = data.name;
        document.getElementById('auditEntriesContainer').innerHTML = '';
        document.getElementById('observation_overall_notes').value = '';
        auditCounter = 0;
        document.getElementById('auditCount').textContent = '0';
        document.getElementById('totalScore').textContent = '0%';
        setObservationContextForObservee(data.observee_is_faculty === true);
        toggleModal('observationModal');
        addNewAudit(null);
    }

    function openEditObservation(obs) {
        setFormModeEdit(obs.id);
        setObservationContextForObservee(obs.observee_is_faculty === true);
        const oid = document.getElementById('store_observee_id');
        oid.value = obs.observee_id;
        oid.setAttribute('data-last-value', String(obs.observee_id ?? ''));
        document.getElementById('modalFacultyName').textContent = obs.observee_name || '';
        document.getElementById('auditEntriesContainer').innerHTML = '';
        auditCounter = 0;
        document.getElementById('observation_overall_notes').value = obs.notes || '';
        const sessions = Array.isArray(obs.sessions_payload) ? obs.sessions_payload : [];
        if (sessions.length === 0) {
            addNewAudit(null);
        } else {
            sessions.forEach(function (session) {
                addNewAudit(session);
            });
        }
        calculateAggregateScore();
        if (!obs.observee_is_faculty) {
            var wingEl = document.getElementById('observation_context_wing');
            var deptEl = document.getElementById('observation_context_department');
            if (wingEl) wingEl.value = obs.observation_wing || '';
            if (deptEl) {
                ensureSelectHasOption(deptEl, obs.observation_department || '', obs.observation_department_label || '');
            }
        }
        toggleModal('observationModal');
    }

    function applyRatingsFromSession(entryDiv, metricsObj, listSelector) {
        if (!metricsObj || typeof metricsObj !== 'object') return;
        entryDiv.querySelectorAll(listSelector + ' > div').forEach(function (row) {
            const metricEl = row.querySelector('.metric-name');
            if (!metricEl) return;
            const name = metricEl.textContent.trim();
            if (!(name in metricsObj)) return;
            const val = metricsObj[name];
            const input = row.querySelector('input.rating-input[value="' + String(val) + '"]');
            if (input) input.checked = true;
        });
    }

    function collectObservationPayload() {
        const sessions = [];
        document.querySelectorAll('#auditEntriesContainer .audit-entry').forEach(function (audit) {
            const quantitative = {};
            audit.querySelectorAll('.quant-metrics-list > div').forEach(function (row) {
                const metricEl = row.querySelector('.metric-name');
                const checked = row.querySelector('input.rating-input:checked');
                if (metricEl && checked) quantitative[metricEl.textContent.trim()] = parseInt(checked.value, 10);
            });
            const qualitative = {};
            audit.querySelectorAll('.qual-metrics-list > div').forEach(function (row) {
                const metricEl = row.querySelector('.metric-name');
                const checked = row.querySelector('input.rating-input:checked');
                if (metricEl && checked) qualitative[metricEl.textContent.trim()] = parseInt(checked.value, 10);
            });
            const notesEl = audit.querySelector('.session-notes-input');
            const session_notes = notesEl ? (notesEl.value || '').trim() : '';
            sessions.push({
                quantitative: quantitative,
                qualitative: qualitative,
                session_notes: session_notes,
            });
        });
        return sessions;
    }

    function submitObservationForm() {
        const observeeField = document.getElementById('store_observee_id');
        const observeeOk = observeeField.disabled
            ? observeeField.getAttribute('data-last-value')
            : observeeField.value;

        if (!observeeOk) {
            alert('Open an audit from the grid first.');
            return;
        }

        if (observerRequiresObservationContext && !currentObserveeIsFaculty) {
            var w = document.getElementById('observation_context_wing');
            var d = document.getElementById('observation_context_department');
            if (!w || !d || !w.value || !d.value) {
                alert('Please select wing and department for this observation.');
                return;
            }
        }

        const sessions = collectObservationPayload();
        if (sessions.length === 0) {
            alert('Add at least one observation session.');
            return;
        }
        var scoreText = document.getElementById('totalScore').textContent.replace(/%/g, '').trim();
        var agg = parseInt(scoreText, 10);
        if (isNaN(agg)) agg = 0;
        document.getElementById('store_aggregate_percent').value = agg;
        document.getElementById('store_sessions_payload').value = JSON.stringify(sessions);
        observationFormEl().submit();
    }

    function addNewAudit(sessionData) {
        auditCounter++;
        const container = document.getElementById('auditEntriesContainer');
        const template = document.getElementById('audit-entry-template');
        const entryClone = template.content.cloneNode(true);

        const entryDiv = entryClone.querySelector('.audit-entry');
        entryDiv.id = `audit-${auditCounter}`;
        entryDiv.querySelector('.audit-number').textContent = auditCounter;

        populateAuditMetrics(entryDiv.querySelector('.quant-metrics-list'), quantMetrics, `audit_${auditCounter}_quant`);
        populateAuditMetrics(entryDiv.querySelector('.qual-metrics-list'), qualMetrics, `audit_${auditCounter}_qual`);

        if (sessionData && sessionData.quantitative) {
            applyRatingsFromSession(entryDiv, sessionData.quantitative, '.quant-metrics-list');
        }
        if (sessionData && sessionData.qualitative) {
            applyRatingsFromSession(entryDiv, sessionData.qualitative, '.qual-metrics-list');
        }
        const sn = entryDiv.querySelector('.session-notes-input');
        if (sn && sessionData && typeof sessionData.session_notes === 'string') {
            sn.value = sessionData.session_notes;
        }

        const triggers = entryDiv.querySelectorAll('.collapse-trigger');
        triggers.forEach(trigger => {
            trigger.onclick = () => {
                trigger.nextElementSibling.classList.toggle('active');
                trigger.querySelector('.chevron-icon').classList.toggle('chevron-active');
            };
        });

        entryDiv.querySelector('.remove-audit').onclick = () => {
            entryDiv.remove();
            calculateAggregateScore();
        };

        entryDiv.addEventListener('change', calculateAggregateScore);
        entryDiv.querySelectorAll('.session-notes-input').forEach(el => el.addEventListener('input', calculateAggregateScore));
        container.appendChild(entryClone);
        calculateAggregateScore();
    }

    function populateAuditMetrics(container, list, groupPrefix) {
        const rowTemplate = document.getElementById('rating-row-template');
        list.forEach(metric => {
            const rowClone = rowTemplate.content.cloneNode(true);
            rowClone.querySelector('.metric-name').textContent = metric;
            const inputs = rowClone.querySelectorAll('input');
            const uniqueName = `${groupPrefix}_${metric.replace(/\s/g, '_').toLowerCase()}`;
            inputs.forEach(input => input.name = uniqueName);
            container.appendChild(rowClone);
        });
    }

    function calculateAggregateScore() {
        const audits = document.querySelectorAll('.audit-entry');
        document.getElementById('auditCount').textContent = audits.length;

        if (audits.length === 0) {
            document.getElementById('totalScore').textContent = '0%';
            return;
        }

        let globalSumPercent = 0;
        audits.forEach(audit => {
            let qSum = 0, qCount = 0, lSum = 0, lCount = 0;
            audit.querySelectorAll('.quant-metrics-list input:checked').forEach(i => { qSum += parseInt(i.value); qCount++; });
            audit.querySelectorAll('.qual-metrics-list input:checked').forEach(i => { lSum += parseInt(i.value); lCount++; });
            let qAvg = qCount > 0 ? (qSum / (qCount * 5)) * 100 : 0;
            let lAvg = lCount > 0 ? (lSum / (lCount * 5)) * 100 : 0;
            globalSumPercent += (qAvg * 0.7) + (lAvg * 0.3);
        });

        const finalScore = Math.round(globalSumPercent / audits.length);
        document.getElementById('totalScore').textContent = finalScore + '%';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const oid = document.getElementById('store_observee_id');
        function syncObserveeDataAttr() {
            oid.setAttribute('data-last-value', oid.value || '');
        }
        oid.addEventListener('change', syncObserveeDataAttr);
        oid.addEventListener('input', syncObserveeDataAttr);
        syncObserveeDataAttr();

        @if(!empty($highlightObserveeId))
        const highlightCard = document.getElementById('observee-card-{{ (int) $highlightObserveeId }}');
        if (highlightCard) {
            setTimeout(function () {
                highlightCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 150);
        }
        @endif
    });
</script>
@endpush
