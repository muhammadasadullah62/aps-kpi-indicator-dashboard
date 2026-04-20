<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head', ['title' => trim($__env->yieldContent('title')) ?: 'APSACS Khanewal'])
</head>
<body class="@yield('body-class', 'flex h-screen overflow-hidden text-slate-900')" style="background-color: #f1f5f9;">
    <x-dashboard.sidebar />
    <main class="flex-1 flex flex-col h-full overflow-hidden @yield('main-class', 'bg-slate-100')">
        @yield('header')
        <div class="flex-1 overflow-y-auto flex flex-col min-h-0 @yield('scroll-class')">
            <div class="@yield('content-padding', 'p-8 space-y-8') no-scrollbar flex-1">
                @yield('content')
            </div>
            @hasSection('hide-footer')
            @else
                <x-dashboard.footer />
            @endif
        </div>
    </main>
    @stack('modals')
    @stack('scripts')
</body>
</html>
