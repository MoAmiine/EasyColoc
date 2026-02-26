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
        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            border-radius: 1.25rem;
            font-size: 0.875rem;
            font-weight: 700;
            transition: all 0.2s;
            color: #64748b; /* text-slate-500 */
            text-decoration: none;
        }
        .nav-item:hover { background-color: #EEF2FF; color: #4f46e5; }
        .nav-item.active { background-color: #4f46e5; color: white; box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.2); }
        
        .profile-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.6rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 0.8rem;
            transition: all 0.2s;
            color: #64748b;
            background: transparent;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }
        .profile-btn:hover { background: #EEF2FF; color: #4f46e5; }
    </style>
</head>
<body class="bg-[#F4F7FE] text-slate-900 antialiased">
    <div class="flex min-h-screen" x-data="{ mobileMenuOpen: false }">
        
        <aside class="w-72 bg-white border-r border-indigo-50 flex flex-col fixed inset-y-0 z-50">
            <div class="p-8">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 no-underline group">
                    <div class="w-11 h-11 bg-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-100 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="text-xl font-black text-slate-800 tracking-tighter uppercase italic">EasyColoc</span>
                </a>
            </div>

            <nav class="flex-1 px-4 overflow-y-auto space-y-1.5">
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('colocation.index') }}" class="nav-item {{ request()->routeIs('collocation.*') ? 'active' : 'text-indigo-600 bg-indigo-50/50 hover:bg-indigo-100/50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Colocations</span>
                </a>

                <div class="mt-6 pt-6 border-t border-slate-50 space-y-1.5">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] px-4 mb-2">Gestion</p>
                    <a href="#" class="nav-item">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        <span>Dépenses</span>
                    </a>
                    <a href="#" class="nav-item">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <span>Balances</span>
                    </a>
                </div>

                @if(Auth::user()->is_admin)
                <div class="mt-6 pt-6 border-t border-slate-50">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] px-4 mb-2">Administration</p>
                    <a href="#" class="nav-item !text-rose-500 hover:bg-rose-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Admin Global</span>
                    </a>
                </div>
                @endif
            </nav>

            <div class="p-6 border-t border-slate-50 bg-slate-50/30">
                <div class="flex items-center gap-3 mb-4 px-1">
                    <div class="w-10 h-10 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-bold text-sm italic shadow-md">
                        {{ substr(Auth::user()->firstname, 0, 1) }}{{ substr(Auth::user()->lastname, 0, 1) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-[11px] font-black text-slate-900 truncate uppercase tracking-tighter">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                        <p class="text-[10px] font-bold text-indigo-500 uppercase italic">Utilisateur</p>
                    </div>
                </div>

                <div class="space-y-1">
                    <a href="{{ route('profile.edit') }}" class="profile-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span>Profil</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="profile-btn !text-rose-500 hover:!bg-rose-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            <span>Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col ml-72">
            
            <header class="h-24 flex items-center justify-between px-12">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-1">Nexus / Dashboard</p>
                    <h1 class="text-xl font-black text-slate-800 italic uppercase tracking-wider">
                        {{ $header ?? 'Vue Principale' }}
                    </h1>
                </div>
                
                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-2xl border border-indigo-50 shadow-sm">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></span>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Connecté</span>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-12 pb-12">
                <div class="bg-white rounded-[3rem] border border-white shadow-xl shadow-indigo-100/20 h-full min-h-[calc(100vh-180px)] p-12 overflow-y-auto relative">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>
</html>