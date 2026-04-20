@extends('layouts.app')

@section('title', 'APSACS Khanewal | Teacher KPI Dashboard')

@php
    $variant = $overviewVariant ?? null;
    $dashboardTitle = match ($variant) {
        'principal', 'section_head' => 'Leadership overview',
        'faculty' => 'My performance dashboard',
        default => 'Teacher KPI Dashboard',
    };
@endphp

@section('header')
    <x-dashboard.page-header variant="profile" :title="$dashboardTitle" />
@endsection

@section('content')
    @if ($variant === 'principal')
        @include('dashboard.partials.overview-principal')
    @elseif ($variant === 'section_head')
        @include('dashboard.partials.overview-kpi-metric-cards', [
            'overviewVariant' => $overviewVariant ?? null,
            'kpiCards' => $kpiCards ?? null,
            'kpiQuantCards' => $kpiQuantCards ?? [],
            'kpiQualCards' => $kpiQualCards ?? [],
            'kpiObservationCount' => $kpiObservationCount ?? 0,
        ])
        @include('dashboard.partials.overview-section-head')
    @elseif ($variant === 'faculty')
        @include('dashboard.partials.overview-faculty')
    @else
        <div class="rounded-2xl border border-amber-200 bg-amber-50 px-6 py-4 text-sm font-semibold text-amber-900">
            Dashboard content is not available for your role.
        </div>
    @endif
@endsection
