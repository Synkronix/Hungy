<!DOCTYPE html>
<html lang="id" class="h-full antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Hungy — Calorie Tracker')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>
<body class="min-h-full bg-slate-50 font-sans text-slate-900">
    <div class="flex min-h-screen flex-col">
        <header class="sticky top-0 z-30 border-b border-slate-200/70 bg-white/80 backdrop-blur-md">
            <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <a href="{{ route('calories.index') }}" class="flex items-center gap-2.5">
                    <span class="grid h-9 w-9 place-items-center rounded-xl bg-blue-600 text-white shadow-sm shadow-blue-600/30">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.5 0-7.5-3-7.5-7.2C4.5 8.6 8.3 4.9 12 3c3.7 1.9 7.5 5.6 7.5 10.8C19.5 18 16.5 21 12 21Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21V10m0 4.5 2.5-2.5M12 12 9.5 9.5" />
                        </svg>
                    </span>
                    <span class="text-lg font-semibold tracking-tight text-slate-900">
                        Hungy<span class="text-blue-600">.</span>
                    </span>
                </a>

                <nav class="flex items-center gap-1">
                    <a href="{{ route('calories.index') }}"
                       class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('calories.*', 'home') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3m0 12v3M3 12h3m12 0h3M5.6 5.6l2.1 2.1m8.6 8.6 2.1 2.1m0-12.8-2.1 2.1m-8.6 8.6-2.1 2.1" />
                            <circle cx="12" cy="12" r="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Calorie Tracker
                    </a>
                    <a href="{{ route('recipes.index') }}"
                       class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('recipes.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-.673 0-1.33.075-1.96.217a.75.75 0 0 0-.59.734v14.25a.75.75 0 0 0 .964.725 9.03 9.03 0 0 1 2.336-.31 8.967 8.967 0 0 1 5.25 1.75 8.967 8.967 0 0 1 5.25-1.75c.81 0 1.597.108 2.336.31a.75.75 0 0 0 .964-.725V4.701a.75.75 0 0 0-.59-.734A9.045 9.045 0 0 0 18 3.75a8.967 8.967 0 0 0-6 2.292Z" />
                        </svg>
                        Resep
                    </a>
                    <a href="{{ route('budget.index') }}"
                       class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium transition {{ request()->routeIs('budget.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5a1.5 1.5 0 0 1 1.5 1.5v9a1.5 1.5 0 0 1-1.5 1.5H3.75a1.5 1.5 0 0 1-1.5-1.5v-9a1.5 1.5 0 0 1 1.5-1.5Zm0 0h16.5" />
                        </svg>
                        Budget
                    </a>
                </nav>
            </div>
        </header>

        <main class="flex-1">
            <div class="mx-auto w-full max-w-6xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">
                @yield('content')
            </div>
        </main>

        <footer class="border-t border-slate-200/70 py-6">
            <p class="text-center text-xs text-slate-400">
                Hungy &middot; Jaga asupan harianmu, satu catatan setiap waktu.
            </p>
        </footer>
    </div>

    @stack('scripts')
</body>
</html>
