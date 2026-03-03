<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'EasyColoc' }}</title>

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
        
        .blob {
            position: absolute;
            filter: blur(60px);
            opacity: 0.4;
            animation: blob-bounce 8s infinite ease-in-out;
        }
        
        @keyframes blob-bounce {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -30px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        
        .input-field {
            transition: all 0.3s ease;
        }
        
        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(102, 126, 234, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px -10px rgba(102, 126, 234, 0.4);
        }
        
        .link-hover {
            position: relative;
        }
        
        .link-hover::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
        }
        
        .link-hover:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="min-h-screen flex">

    {{-- Côté gauche : Formulaire --}}
    <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 py-12 lg:px-16 bg-white relative z-10">
        
        {{-- Logo mobile --}}
        <div class="lg:hidden mb-8 flex items-center gap-3 justify-center">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <span class="text-xl font-black gradient-text">EasyColoc</span>
        </div>

        {{-- Contenu avec $slot --}}
        <div class="w-full max-w-md mx-auto">
            {{ $slot }}
        </div>

        {{-- Footer légal --}}
        <div class="mt-12 text-center lg:text-left">
            <p class="text-xs text-slate-400">
                © 2026 EasyColoc. En continuant, vous acceptez nos 
                <a href="#" class="text-indigo-600 hover:underline">Conditions</a> et 
                <a href="#" class="text-indigo-600 hover:underline">Confidentialité</a>.
            </p>
        </div>
    </div>

    {{-- Côté droit : Visuel (caché sur mobile) --}}
    <div class="hidden lg:flex lg:w-1/2 gradient-bg relative items-center justify-center overflow-hidden">
        
        {{-- Blobs animés --}}
        <div class="blob w-96 h-96 bg-white rounded-full top-0 right-0 translate-x-1/3 -translate-y-1/3"></div>
        <div class="blob w-80 h-80 bg-purple-300 rounded-full bottom-0 left-0 -translate-x-1/3 translate-y-1/3 animation-delay-2000"></div>
        <div class="blob w-64 h-64 bg-pink-300 rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animation-delay-4000"></div>

        {{-- Contenu visuel simplifié --}}
        <div class="relative z-10 text-white text-center px-12 max-w-lg">
            
            {{-- Logo --}}
            <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-3xl flex items-center justify-center mx-auto mb-8 border border-white/30 shadow-2xl">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>

            <h2 class="text-4xl font-black mb-4 leading-tight">
                La gestion de colocation <br> simplifiée
            </h2>
            
            <p class="text-indigo-100 text-lg mb-8 leading-relaxed">
                Rejoignez plus de <strong class="text-white">2,000 colocations</strong> qui gèrent leurs dépenses communes sans prise de tête.
            </p>

            {{-- Features list --}}
            <div class="space-y-4 text-left">
                <div class="flex items-center gap-4 p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-white font-semibold">Répartition automatique des dépenses</p>
                </div>
                <div class="flex items-center gap-4 p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-white font-semibold">Suivi des remboursements en temps réel</p>
                </div>
                <div class="flex items-center gap-4 p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-white font-semibold">100% gratuit et sans engagement</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>