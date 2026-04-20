@props([
    'variant' => 'simple',
    'title',
    'subtitle' => null,
    'chip' => null,
    'dateRange' => null,
    'showDateRange' => true,
    'padding' => 'px-8 py-6',
    'actions' => null,
])
@php
    $resolvedDateChip = $dateRange ?? now()->startOfMonth()->format('M j') . ' – ' . now()->endOfMonth()->format('M j, Y');
@endphp
<header class="bg-white {{ $padding }} flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-200 shrink-0">
    @if($variant === 'profile')
        <h2 class="text-2xl font-black text-slate-800 tracking-tight">{{ $title }}</h2>
        <div class="flex items-center gap-6">
            @if($showDateRange)
                <div class="hidden md:flex items-center gap-3 px-4 py-2 border border-slate-200 rounded-xl bg-slate-50 text-slate-600 font-bold text-xs select-none">
                    <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $resolvedDateChip }}
                </div>
            @endif
            <x-dashboard.user-menu />
        </div>
    @elseif($variant === 'session')
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase leading-none">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-xs text-slate-500 font-bold tracking-widest uppercase mt-2">{{ $subtitle }}</p>
            @endif
        </div>
        <div class="flex items-center gap-6">
            @if($chip)
                <div class="flex items-center gap-3 px-4 py-2 border border-slate-200 rounded-xl bg-slate-50 text-slate-600 font-bold text-xs cursor-pointer">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $chip }}
                </div>
            @endif
            <x-dashboard.user-menu />
        </div>
    @elseif($variant === 'bare')
        <div>
            <h2 class="text-3xl font-black text-slate-800 tracking-tight uppercase leading-none">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-sm text-slate-400 font-bold uppercase tracking-widest mt-3">{{ $subtitle }}</p>
            @endif
        </div>
        <div class="flex items-center gap-4 shrink-0">
            {{ $actions ?? '' }}
            <x-dashboard.user-menu />
        </div>
    @else
        <div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase">{{ $title }}</h2>
            @if($subtitle)
                <p class="text-xs text-slate-500 font-bold tracking-widest uppercase">{{ $subtitle }}</p>
            @endif
        </div>
        <div class="flex items-center gap-4 shrink-0">
            @isset($actions)
                {{ $actions }}
            @endisset
            <x-dashboard.user-menu />
        </div>
    @endif
</header>
