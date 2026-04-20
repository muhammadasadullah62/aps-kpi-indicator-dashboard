@php
    $name = request()->route()?->getName();
    $kpi = ['kpidashboard', 'quantitativeobservations', 'qualitativeobservations', 'academicreports'];
    $settingsRoutes = ['sechead', 'teachermanagement', 'systemsettings', 'observations'];
@endphp
@if(in_array($name, $kpi, true))
    @include('components.dashboard.sidebars.kpi')
@elseif($name === 'adminpanel')
    @include('components.dashboard.sidebars.admin')
@elseif(in_array($name, $settingsRoutes, true))
    @include('components.dashboard.sidebars.settings')
@else
    @include('components.dashboard.sidebars.kpi')
@endif
