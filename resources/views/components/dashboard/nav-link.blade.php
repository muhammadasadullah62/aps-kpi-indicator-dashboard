@props([
    'href',
    'active' => false,
])
<a
    href="{{ $href }}"
    @class([
        'flex items-center gap-4 px-4 py-3 rounded-xl relative group',
        'bg-emerald-50 text-emerald-800 font-bold' => $active,
        'text-slate-500 hover:bg-slate-50 font-semibold transition-all' => ! $active,
    ])
    {{ $attributes }}
>
    @if($active)
        <div class="absolute left-0 w-1.5 h-6 bg-aps-green rounded-r-full"></div>
    @endif
    {{ $slot }}
</a>
