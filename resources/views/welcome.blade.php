<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyColoc - Gérez votre colocation sans stress</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-indigo-600 p-2 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 m0 0h14a1 1 0 001-1V10M9 21V9i1 m4 0v12" /></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-indigo-600 uppercase">EasyColoc</span>
                </div>
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                    <a href="#features" class="hover:text-indigo-600 transition">Fonctionnalités</a>
                    <a href="#how-it-works" class="hover:text-indigo-600 transition">Comment ça marche</a>
                </div>
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-700 hover:text-indigo-600">Mon Tableau de bord</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-indigo-600">Connexion</a>
                            <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-full text-sm font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">Rejoindre l'aventure</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <header class="relative overflow-hidden pt-16 pb-24 lg:pt-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block py-1 px-3 rounded-full bg-indigo-50 text-indigo-700 text-xs font-bold tracking-widest uppercase mb-4">
                    Simplifiez votre vie en communauté
                </span>
                <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-900 tracking-tight mb-6">
                    Fini les galères de comptes <br> 
                    <span class="text-indigo-600 italic leading-snug">entre colocataires.</span>
                </h1>
                <p class="max-w-2xl mx-auto text-lg text-slate-600 mb-10">
                    EasyColoc automatise la répartition de vos dépenses communes. Voyez en un clin d'œil qui doit quoi à qui, suivez les remboursements et maintenez une bonne ambiance grâce à notre système de réputation.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg hover:bg-indigo-700 transition transform hover:-translate-y-1 shadow-xl shadow-indigo-200">
                        Créer ma colocation
                    </a>
                    <a href="#features" class="px-8 py-4 bg-white text-slate-700 border border-slate-200 rounded-2xl font-bold text-lg hover:bg-slate-50 transition">
                        Voir les fonctionnalités
                    </a>
                </div>
            </div>
        </div>
        
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full -z-0 pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-indigo-100 rounded-full blur-3xl opacity-50"></div>
            <div class="absolute bottom-[10%] right-[-5%] w-[30%] h-[30%] bg-blue-100 rounded-full blur-3xl opacity-50"></div>
        </div>
    </header>

    <div class="max-w-5xl mx-auto px-4 mb-24">
        <div class="bg-slate-900 rounded-3xl p-4 shadow-2xl">
            <div class="bg-white rounded-2xl overflow-hidden border border-slate-800">
                <div class="bg-slate-50 border-b border-slate-200 p-4 flex items-center justify-between">
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                    </div>
                    <div class="text-xs font-medium text-slate-400">Dashboard Coloc "Appart Centre"</div>
                    <div class="w-10"></div>
                </div>
                <div class="p-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100">
                        <p class="text-xs font-bold text-indigo-600 uppercase mb-1">Total payé ce mois</p>
                        <p class="text-3xl font-black text-indigo-900">1 450,00 €</p>
                    </div>
                    <div class="bg-emerald-50 p-6 rounded-xl border border-emerald-100">
                        <p class="text-xs font-bold text-emerald-600 uppercase mb-1">Votre solde</p>
                        <p class="text-3xl font-black text-emerald-900">+ 42,50 €</p>
                    </div>
                    <div class="bg-rose-50 p-6 rounded-xl border border-rose-100">
                        <p class="text-xs font-bold text-rose-600 uppercase mb-1">Dettes restantes</p>
                        <p class="text-3xl font-black text-rose-900">120,00 €</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Tout ce dont vous avez besoin</h2>
                <p class="mt-4 text-slate-600 max-w-2xl mx-auto">Conçu pour les étudiants, les jeunes actifs et tous ceux qui partagent plus qu'un toit.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-300"></div>
                    <div class="relative bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
                        <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-900">Gestion des dépenses</h3>
                        <p class="text-slate-600 leading-relaxed">Ajoutez vos tickets de caisse en deux clics. Catégorisez vos achats (loyer, courses, électricité) pour un suivi précis.</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-300"></div>
                    <div class="relative bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-900">Calcul Automatique</h3>
                        <p class="text-slate-600 leading-relaxed">Notre algorithme calcule qui doit combien à qui. Plus besoin de sortir la calculatrice ou Excel.</p>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-300"></div>
                    <div class="relative bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
                        <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-900">Score de Réputation</h3>
                        <p class="text-slate-600 leading-relaxed">Favorisez les bons comportements ! Un membre qui règle ses dettes à temps gagne en réputation dans la communauté.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-indigo-600 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Prêt à simplifier vos comptes ?</h2>
            <p class="text-indigo-100 text-lg mb-10">Rejoignez des centaines de colocations qui utilisent EasyColoc pour gérer leur budget au quotidien.</p>
            <a href="{{ route('register') }}" class="px-10 py-4 bg-white text-indigo-600 rounded-full font-bold text-lg hover:bg-slate-100 transition shadow-xl">
                Démarrer gratuitement
            </a>
        </div>
        <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-indigo-500 rounded-full opacity-50"></div>
        <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-64 h-64 bg-indigo-700 rounded-full opacity-50"></div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center gap-2 mb-6">
                <div class="bg-indigo-600 p-1.5 rounded-md">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 m0 0h14a1 1 0 001-1V10M9 21V9i1 m4 0v12" /></svg>
                </div>
                <span class="text-white font-bold tracking-widest uppercase">EasyColoc</span>
            </div>
            <p class="text-sm">© 2026 EasyColoc - Projet Digital Nexus. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>