<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyColoc') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">
    <div class="min-h-screen flex" x-data="{ mobileMenuOpen: false }">
        
        <aside class="hidden lg:flex lg:flex-shrink-0 w-72 flex-col fixed inset-y-0 border-r border-slate-200 bg-white">
            <div class="flex flex-col flex-grow pt-6 overflow-y-auto">
                <div class="flex items-center px-6 gap-3 mb-10">
                    <div class="bg-indigo-600 p-2 rounded-xl shadow-lg shadow-indigo-100">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xl font-black text-slate-800 tracking-tighter uppercase">EasyColoc</span>
                </div>

                <nav class="flex-1 px-4 space-y-1.5">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl transition {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200' : 'text-slate-500 hover:bg-slate-50 hover:text-indigo-600' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                        Tableau de bord
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl text-slate-500 hover:bg-slate-50 hover:text-indigo-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        Dépenses communes
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl text-slate-500 hover:bg-slate-50 hover:text-indigo-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 01-9-4.951" /></svg>
                        Ma Colocation
                    </a>

                    @if(Auth::user()->is_admin)
                    <div class="pt-8 pb-2 px-4 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Plateforme</div>
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl text-rose-500 hover:bg-rose-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                        Stats Globales
                    </a>
                    @endif
                </nav>

                <div class="p-4 border-t border-slate-100">
                    <div class="bg-slate-50 rounded-2xl p-4">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-sm font-bold text-slate-900 truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs font-medium text-emerald-600">Réput. : +{{ Auth::user()->reputation ?? 0 }}</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="w-full text-left text-xs font-bold text-slate-400 hover:text-rose-500 transition uppercase tracking-wider">
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex flex-col flex-1 lg:pl-72">
            
            <header class="bg-white/80 backdrop-blur-md sticky top-0 z-30 border-b border-slate-200">
                <div class="h-20 flex items-center justify-between px-6 sm:px-10">
                    <button @click="mobileMenuOpen = true" class="lg:hidden p-2 text-slate-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>

                    <h1 class="text-xl font-extrabold text-slate-900">
                        {{ $header ?? 'Dashboard' }}
                    </h1>

                    <div class="flex items-center gap-4">
                        <button class="p-2 text-slate-400 hover:text-indigo-600 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                        </button>
                    </div>
                </div>
            </header>

            <main class="p-6 sm:p-10">
                <div class="max-w-6xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>