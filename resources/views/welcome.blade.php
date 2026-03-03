<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyColoc - Fini les galères de comptes entre colocataires</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-delayed {
            animation: float 6s ease-in-out 2s infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .blob {
            position: absolute;
            filter: blur(80px);
            opacity: 0.6;
            animation: blob-bounce 10s infinite ease-in-out;
        }
        
        @keyframes blob-bounce {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(99, 102, 241, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px -10px rgba(102, 126, 234, 0.5);
        }
        
        .step-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased overflow-x-hidden">

    {{-- Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-lg border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="text-xl font-black gradient-text">EasyColoc</span>
                </a>

                {{-- Menu desktop --}}
                <div class="hidden md:flex items-center gap-8">
                    <a href="#features" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">Fonctionnalités</a>
                    <a href="#how-it-works" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">Comment ça marche</a>
                    <a href="#pricing" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">Tarifs</a>
                </div>

                {{-- CTA --}}
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary text-white px-6 py-2.5 rounded-xl text-sm font-bold">
                            Mon Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">Connexion</a>
                        <a href="{{ route('register') }}" class="btn-primary text-white px-6 py-2.5 rounded-xl text-sm font-bold">
                            Commencer gratuitement
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 overflow-hidden">
        {{-- Blobs animés --}}
        <div class="blob w-96 h-96 bg-purple-300 rounded-full top-0 left-0 -translate-x-1/2 -translate-y-1/2"></div>
        <div class="blob w-80 h-80 bg-indigo-300 rounded-full top-20 right-0 translate-x-1/3 animation-delay-2000"></div>
        <div class="blob w-72 h-72 bg-pink-200 rounded-full bottom-0 left-1/3 animation-delay-4000"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                {{-- Texte --}}
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 rounded-full mb-6">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"></span>
                        <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider">Nouveau • Système de réputation</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6">
                        Fini les galères <br>
                        <span class="gradient-text">de comptes</span> entre <br>
                        colocataires.
                    </h1>
                    
                    <p class="text-lg text-slate-600 mb-8 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                        EasyColoc automatise la répartition de vos dépenses communes. 
                        Voyez en un clin d'œil <strong>qui doit quoi à qui</strong>, sans prise de tête.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn-primary text-white px-8 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-2">
                                Accéder à ma coloc
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="btn-primary text-white px-8 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-2">
                                Créer ma colocation
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </a>
                            <a href="#demo" class="px-8 py-4 bg-white border-2 border-slate-200 text-slate-700 rounded-2xl font-bold text-lg hover:border-indigo-300 hover:text-indigo-600 transition flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Voir la démo
                            </a>
                        @endauth
                    </div>
                    
                    {{-- Social proof --}}
                    <div class="flex items-center gap-4 justify-center lg:justify-start">
                        <div class="flex -space-x-3">
                            <img src="https://i.pravatar.cc/100?img=1" class="w-10 h-10 rounded-full border-3 border-white" alt="User">
                            <img src="https://i.pravatar.cc/100?img=2" class="w-10 h-10 rounded-full border-3 border-white" alt="User">
                            <img src="https://i.pravatar.cc/100?img=3" class="w-10 h-10 rounded-full border-3 border-white" alt="User">
                            <img src="https://i.pravatar.cc/100?img=4" class="w-10 h-10 rounded-full border-3 border-white" alt="User">
                            <div class="w-10 h-10 rounded-full border-3 border-white bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-600">+2k</div>
                        </div>
                        <p class="text-sm text-slate-600">
                            <strong class="text-slate-900">2,000+</strong> colocations nous font confiance
                        </p>
                    </div>
                </div>

                {{-- Mockup Dashboard --}}
                <div class="relative">
                    <div class="floating">
                        <div class="glass-card rounded-3xl p-2 shadow-2xl shadow-indigo-200/50">
                            <div class="bg-white rounded-2xl overflow-hidden">
                                {{-- Header mockup --}}
                                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4 flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                            </svg>
                                        </div>
                                        <span class="text-white font-bold text-sm">La Villa des Amis</span>
                                    </div>
                                    <div class="flex gap-1">
                                        <div class="w-2 h-2 bg-white/40 rounded-full"></div>
                                        <div class="w-2 h-2 bg-white/40 rounded-full"></div>
                                        <div class="w-2 h-2 bg-white rounded-full"></div>
                                    </div>
                                </div>
                                
                                {{-- Stats mockup --}}
                                <div class="p-6 grid grid-cols-3 gap-4">
                                    <div class="bg-indigo-50 p-4 rounded-2xl text-center">
                                        <p class="text-[10px] font-bold text-indigo-600 uppercase mb-1">Total</p>
                                        <p class="text-xl font-black text-indigo-900">1,450€</p>
                                    </div>
                                    <div class="bg-emerald-50 p-4 rounded-2xl text-center">
                                        <p class="text-[10px] font-bold text-emerald-600 uppercase mb-1">Mon solde</p>
                                        <p class="text-xl font-black text-emerald-600">+42€</p>
                                    </div>
                                    <div class="bg-rose-50 p-4 rounded-2xl text-center">
                                        <p class="text-[10px] font-bold text-rose-600 uppercase mb-1">Dettes</p>
                                        <p class="text-xl font-black text-rose-600">120€</p>
                                    </div>
                                </div>
                                
                                {{-- Liste dépenses mockup --}}
                                <div class="px-6 pb-6 space-y-3">
                                    @php $items = [['🛒', 'Courses', '45€', 'Alice'], ['💡', 'Électricité', '120€', 'Bob'], ['🍕', 'Pizza', '35€', 'Moi']]; @endphp
                                    @foreach($items as $item)
                                        <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl">
                                            <div class="flex items-center gap-3">
                                                <span class="w-8 h-8 bg-white rounded-lg flex items-center justify-center text-lg shadow-sm">{{ $item[0] }}</span>
                                                <div>
                                                    <p class="font-bold text-slate-900 text-sm">{{ $item[1] }}</p>
                                                    <p class="text-[10px] text-slate-400 font-bold uppercase">Par {{ $item[3] }}</p>
                                                </div>
                                            </div>
                                            <span class="font-black text-slate-900">{{ $item[2] }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Floating badge --}}
                    <div class="floating-delayed absolute -bottom-4 -left-4 bg-white rounded-2xl p-4 shadow-xl">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">Remboursement</p>
                                <p class="text-sm text-emerald-600 font-bold">+ 25,00 € reçu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-indigo-600 font-bold text-sm uppercase tracking-widest">Fonctionnalités</span>
                <h2 class="text-4xl font-black text-slate-900 mt-4 mb-4">Tout ce qu'il faut pour une coloc tranquille</h2>
                <p class="text-slate-600 text-lg">Des outils pensés pour éviter les disputes et garder une bonne ambiance.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $features = [
                    ['icon' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', 'color' => 'indigo', 'title' => 'Gestion des dépenses', 'desc' => 'Ajoutez vos tickets en 2 clics. Catégorisation automatique pour un suivi clair.'],
                    ['icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'color' => 'emerald', 'title' => 'Calcul automatique', 'desc' => 'Notre algorithme détermine qui doit combien à qui. Fini Excel et la calculette !'],
                    ['icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'color' => 'amber', 'title' => 'Score de réputation', 'desc' => 'Gagnez des points en payant à temps. Une communauté de colocataires de confiance.'],
                    ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z', 'color' => 'purple', 'title' => 'Invitations simples', 'desc' => 'Invitez vos colocataires par email. Ils rejoignent en un clic, sans prise de tête.'],
                    ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'color' => 'rose', 'title' => 'Sécurisé & privé', 'desc' => 'Vos données sont chiffrées. Seuls les membres de votre coloc y ont accès.'],
                    ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'color' => 'cyan', 'title' => 'Historique complet', 'desc' => 'Consultez toutes vos dépenses passées, filtrez par mois, par catégorie, par membre...'],
                ];
                @endphp

                @foreach($features as $feature)
                    <div class="feature-card bg-white p-8 rounded-3xl border border-slate-100 shadow-sm transition-all duration-300">
                        <div class="w-14 h-14 bg-{{ $feature['color'] }}-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-{{ $feature['color'] }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $feature['title'] }}</h3>
                        <p class="text-slate-600 leading-relaxed">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- How it works --}}
    <section id="how-it-works" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-indigo-600 font-bold text-sm uppercase tracking-widest">Comment ça marche</span>
                <h2 class="text-4xl font-black text-slate-900 mt-4 mb-4">3 étapes, zéro prise de tête</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                $steps = [
                    ['num' => '1', 'title' => 'Créez votre coloc', 'desc' => 'Inscrivez-vous gratuitement et créez votre espace colocation en 30 secondes.'],
                    ['num' => '2', 'title' => 'Invitez vos colocs', 'desc' => 'Envoyez des invitations par email. Vos colocataires rejoignent en un clic.'],
                    ['num' => '3', 'title' => 'Ajoutez les dépenses', 'desc' => 'Chacun ajoute ses dépenses. Le calcul se fait tout seul !'],
                ];
                @endphp

                @foreach($steps as $step)
                    <div class="relative text-center">
                        <div class="step-number w-16 h-16 rounded-2xl flex items-center justify-center text-white text-2xl font-black mx-auto mb-6 shadow-lg shadow-indigo-200">
                            {{ $step['num'] }}
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $step['title'] }}</h3>
                        <p class="text-slate-600">{{ $step['desc'] }}</p>
                        
                        @if(!$loop->last)
                            <div class="hidden md:block absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-indigo-200 to-transparent -translate-x-8"></div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-24 gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.05%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-black text-white mb-6">Prêt à simplifier vos comptes ?</h2>
            <p class="text-indigo-100 text-lg mb-10 max-w-2xl mx-auto">
                Rejoignez des milliers de colocations qui utilisent EasyColoc au quotidien. 
                C'est gratuit et ça prend 2 minutes.
            </p>
            
            @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-3 bg-white text-indigo-600 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-indigo-50 transition shadow-2xl shadow-indigo-900/20">
                    Accéder à mon dashboard
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            @else
                <a href="{{ route('register') }}" class="inline-flex items-center gap-3 bg-white text-indigo-600 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-indigo-50 transition shadow-2xl shadow-indigo-900/20">
                    Créer ma colocation gratuite
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <p class="text-indigo-200 text-sm mt-6">Sans carte bancaire • Sans engagement • Gratuit</p>
            @endauth
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-slate-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <span class="text-white font-black text-lg">EasyColoc</span>
                </div>
                
                <div class="flex gap-8 text-sm font-semibold">
                    <a href="#" class="hover:text-white transition">Mentions légales</a>
                    <a href="#" class="hover:text-white transition">Confidentialité</a>
                    <a href="#" class="hover:text-white transition">Contact</a>
                </div>
                
                <p class="text-sm">© 2026 EasyColoc. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

</body>
</html>