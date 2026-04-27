@php
    $viewer = auth()->user();
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    @include('dashboard.partials.overview-top-card', ['label' => 'Top ranking · All staff', 'row' => $topStaff ?? null])
    @include('dashboard.partials.overview-top-card', ['label' => 'Top ranking · Section heads', 'row' => $topSectionHead ?? null])
    @include('dashboard.partials.overview-top-card', ['label' => 'Top ranking · Teachers (your wing)', 'row' => $topWingTeacher ?? null])
</div>

<div class="space-y-10">
    @include('dashboard.partials.overview-ranking-table', [
        'title' => 'Overall staff rankings',
        'rows' => $rankStaff ?? collect(),
        'viewer' => $viewer,
    ])

    @include('dashboard.partials.overview-ranking-table', [
        'title' => 'Section head rankings',
        'rows' => $rankSectionHeads ?? collect(),
        'viewer' => $viewer,
    ])

    @include('dashboard.partials.overview-ranking-table', [
        'title' => $viewer->wing ? 'Teachers · '.$viewer->wing->label() : 'Teachers (assign a wing to your profile)',
        'rows' => $rankFacultyWing ?? collect(),
        'viewer' => $viewer,
    ])
</div>

<div class="mt-12 space-y-6">
    @include('dashboard.partials.overview-observations-section-heading')
    @include('dashboard.partials.overview-metrics-panels', [
        'metrics' => $observerMetrics ?? ['quantitative' => [], 'qualitative' => []],
        'aggregatedSessions' => $rubricAggregatedSessions ?? 0,
        'kpiQuantAveragePercent' => $kpiQuantAveragePercent ?? null,
        'kpiQualAveragePercent' => $kpiQualAveragePercent ?? null,
    ])
    @include('dashboard.partials.overview-observation-remarks', ['observationRemarks' => $observationRemarks ?? null])
</div>
