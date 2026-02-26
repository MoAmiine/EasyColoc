<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel | EasyColoc</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-900 antialiased">
    <div class="min-h-screen flex">
        
        <aside class="w-20 lg:w-72 bg-slate-900 flex flex-col fixed inset-y-0 z-50 transition-all">
            <div class="flex flex-col flex-grow pt-8 overflow-y-auto">
                
                <div class="flex items-center px-6 gap-3 mb-12">
                    <div class="bg-rose-600 p-2 rounded-xl shadow-lg shadow-rose-500/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="hidden lg:block">
                        <span class="text-xl font-black text-white uppercase tracking-tighter">EasyColoc</span>
                        <p class="text-[10px] text-rose-200 font-bold">Admin</p>
                    </div>
                </div>

                <nav class="flex-1 px-4 space-y-2">
                    <p class="hidden lg:block px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-4">Surveillance</p>
                    
                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl bg-white/10 text-white shadow-xl">
                        <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                        <span class="hidden lg:block">Statistiques Globales</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl text-slate-400 hover:bg-white/5 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        <span class="hidden lg:block">Toutes les Colocs</span>
                    </a>

                    <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl text-slate-400 hover:bg-white/5 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 01-9-4.951" /></svg>
                        <span class="hidden lg:block">Utilisateurs & Bans</span>
                    </a>
                </nav>

                <div class="p-6 border-t border-white/5 mt-auto">
                    <div class="bg-white/5 rounded-2xl p-4 flex items-center justify-between">
                        <div class="hidden lg:block">
                            <p class="text-[10px] font-black text-rose-500 uppercase">Master Admin</p>
                            <p class="text-xs text-white font-bold truncate">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="p-2 text-slate-500 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <div class="flex-1 pl-20 lg:pl-72 flex flex-col">
            
            <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40 px-8 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <h1 class="text-xl font-black text-slate-900 italic tracking-tight">{{ $header ?? 'Console de Contrôle' }}</h1>
                    <span class="px-2 py-0.5 bg-rose-100 text-rose-600 text-[10px] font-black rounded uppercase">Live Mode</span>
                </div>

                <div class="flex items-center gap-6 text-slate-400">
                    <div class="flex items-center gap-2 text-xs font-bold">
                        <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                        Système : OK
                    </div>
                    <button class="relative p-2 hover:text-rose-500 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
                        <span class="absolute top-1 right-1 w-4 h-4 bg-rose-600 text-[8px] text-white flex items-center justify-center rounded-full border-2 border-white font-black">4</span>
                    </button>
                </div>
            </header>

            <main class="p-8 max-w-7xl mx-auto w-full">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>