<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EasyColoc - La gestion simplifiée</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">
    <div class="min-h-screen flex">
        
        <div class="flex-1 flex flex-col justify-center py-12 px-6 lg:flex-none lg:px-20 xl:px-24 bg-slate-50/50">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                
                <div class="lg:hidden mb-10 flex flex-col items-center">
                    <div class="bg-indigo-600 p-3 rounded-2xl shadow-xl shadow-indigo-100">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="mt-4 text-xl font-black text-indigo-600 uppercase tracking-tighter">EasyColoc</span>
                </div>

                <div class="mt-6">
                    {{ $slot }}
                </div>

                <p class="mt-10 text-center text-xs text-slate-400 font-medium">
                    &copy; {{ date('Y') }} EasyColoc. Tous comptes faits.
                </p>
            </div>
        </div>

        <div class="hidden lg:block relative flex-1 w-0 overflow-hidden">
            <div class="absolute inset-0 h-full w-full bg-gradient-to-br from-indigo-600 via-indigo-700 to-blue-800 flex flex-col items-center justify-center p-12 text-center text-white">
                
                <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
                
                <div class="relative z-10">
                    <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-3xl inline-block mb-8 shadow-2xl">
                        <svg class="w-16 h-16 text-indigo-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>

                    <h2 class="text-4xl font-extrabold mb-4 leading-tight">
                        Faites vos comptes,<br><span class="text-indigo-200">gardez vos amis.</span>
                    </h2>
                    
                    <div class="space-y-4 max-w-sm mx-auto mt-10">
                        <div class="flex items-center gap-4 text-left p-4 bg-white/5 rounded-2xl border border-white/10 hover:bg-white/10 transition">
                            <div class="w-10 h-10 flex-shrink-0 bg-indigo-500/50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                            </div>
                            <p class="text-sm font-medium text-indigo-50">Répartition automatique des dépenses partagées.</p>
                        </div>

                        <div class="flex items-center gap-4 text-left p-4 bg-white/5 rounded-2xl border border-white/10 hover:bg-white/10 transition">
                            <div class="w-10 h-10 flex-shrink-0 bg-indigo-500/50 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                            </div>
                            <p class="text-sm font-medium text-indigo-50">Suivez l'évolution des budgets mois par mois.</p>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-10 opacity-40 text-xs font-bold uppercase tracking-widest italic">
                    EasyColoc - La solution n°1 pour colocataires
                </div>
            </div>
        </div>
    </div>
</body>
</html>