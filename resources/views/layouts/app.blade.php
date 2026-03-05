<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyColoc') }}</title>

    <link href="https:

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https:

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1.25rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s ease;
            color:
            text-decoration: none;
            margin-bottom: 0.25rem;
        }
        
        .nav-link:hover {
            background: linear-gradient(135deg,
            color: white;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        
        .nav-link.active {
            background: linear-gradient(135deg,
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        .gradient-text {
            background: linear-gradient(135deg,
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <div class="flex min-h-screen">
        
        <aside class="w-72 bg-white border-r border-slate-200 flex flex-col fixed inset-y-0 z-50 shadow-xl shadow-slate-200/50">
            
            <div class="p-8 pb-6">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-indigo-200 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-black tracking-tight gradient-text">EasyColoc</span>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Gestion simplifiée</p>
                    </div>
                </a>
            </div>

            <nav class="flex-1 px-4 py-4">
                <p class="text-[10px] font-black text-slate-300 uppercase tracking-[0.2em] px-4 mb-3">Menu principal</p>
                
                <a href="{{ route('dashboard') }}" 
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('colocation.index') }}" 
                   class="nav-link {{ request()->routeIs('colocation.*') || request()->routeIs('depenses.*') ? 'active' : '' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>Mes Colocations</span>
                    @php
                        $colocCount = Auth::user()->colocations()->whereNull('memberships.left_at')->count();
                    @endphp
                    @if($colocCount > 0)
                        <span class="ml-auto bg-indigo-100 text-indigo-600 text-[10px] font-black px-2 py-0.5 rounded-full">
                            {{ $colocCount }}
                        </span>
                    @endif
                </a>

                @if(Auth::user()->is_admin)
                    <div class="mt-6 pt-6 border-t border-slate-100">
                        <p class="text-[10px] font-black text-rose-300 uppercase tracking-[0.2em] px-4 mb-3">Administration</p>
                        
                        <a href="{{ route('admin.index') }}" 
                           class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }} !text-rose-600 hover:!text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            <span>Contrôle Admin</span>
                            <span class="ml-auto bg-rose-100 text-rose-600 text-[10px] font-black px-2 py-0.5 rounded-full">ADMIN</span>
                        </a>
                    </div>
                @endif
            </nav>

            <div class="p-4 border-t border-slate-100">
                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center gap-3 p-3 rounded-2xl hover:bg-slate-50 transition-colors group {{ request()->routeIs('profile.*') ? 'bg-indigo-50' : '' }}">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-slate-700 to-slate-900 text-white flex items-center justify-center font-bold text-sm shadow-md group-hover:scale-105 transition-transform">
                        {{ strtoupper(substr(Auth::user()->firstname, 0, 1) . substr(Auth::user()->lastname, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-slate-900 truncate text-sm">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest truncate">Mon Profil</p>
                    </div>
                    <svg class="w-5 h-5 text-slate-300 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" 
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-bold text-slate-400 hover:text-rose-500 hover:bg-rose-50 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col ml-72">
            
            <header class="h-20 flex items-center justify-between px-8 bg-white/50 backdrop-blur-sm sticky top-0 z-40 border-b border-slate-100">
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.3em] mb-0.5">
                        {{ Auth::user()->is_admin ? 'Admin / ' : '' }}{{ $header ?? 'Dashboard' }}
                    </p>
                    <h1 class="text-lg font-black text-slate-800 uppercase tracking-wide">
                        {{ $header ?? 'Tableau de bord' }}
                    </h1>
                </div>

                
            </header>

            <main class="flex-1 p-8">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm shadow-slate-200/50 h-full min-h-[calc(100vh-160px)] p-8 overflow-y-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

</body>
</html>