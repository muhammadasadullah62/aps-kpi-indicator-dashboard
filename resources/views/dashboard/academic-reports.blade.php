@extends('layouts.app')

@section('title', 'APSACS Khanewal | Academic Reports')

@section('content-padding', 'p-6 space-y-6')

@section('header')
    <x-dashboard.page-header variant="session" title="Academic Reports" subtitle="Institutional reporting & exports" chip="Fall Semester 2023" />
@endsection

@section('content')
@include('dashboard.partials.academic-reports-content')
@endsection
