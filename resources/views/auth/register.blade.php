<x-guest-layout>
    <x-slot name="title">Inscription - EasyColoc</x-slot>
    
    <div class="space-y-6">
        {{-- Header --}}
        <div class="text-center lg:text-left">
            <h1 class="text-3xl font-black text-slate-900 mb-2">Créer votre coloc 🏠</h1>
            <p class="text-slate-500">Commencez à gérer vos dépenses communes en 2 minutes.</p>
        </div>

        {{-- Formulaire --}}
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            {{-- Nom & Prénom --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="firstname" class="block text-sm font-bold text-slate-700 mb-2">Prénom</label>
                    <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}" required autofocus 
                        class="input-field w-full px-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-500 focus:bg-white text-slate-900 font-semibold placeholder:text-slate-400"
                        placeholder="Jean">
                    @error('firstname')
                        <p class="mt-2 text-sm text-rose-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="lastname" class="block text-sm font-bold text-slate-700 mb-2">Nom</label>
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" required 
                        class="input-field w-full px-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-500 focus:bg-white text-slate-900 font-semibold placeholder:text-slate-400"
                        placeholder="Dupont">
                    @error('lastname')
                        <p class="mt-2 text-sm text-rose-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Adresse email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                        </svg>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required 
                        class="input-field w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-500 focus:bg-white text-slate-900 font-semibold placeholder:text-slate-400"
                        placeholder="jean.dupont@exemple.com">
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-rose-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Mot de passe</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <input id="password" type="password" name="password" required 
                        class="input-field w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-500 focus:bg-white text-slate-900 font-semibold placeholder:text-slate-400"
                        placeholder="8 caractères minimum">
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-rose-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-2">Confirmer le mot de passe</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <input id="password_confirmation" type="password" name="password_confirmation" required 
                        class="input-field w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-500 focus:bg-white text-slate-900 font-semibold placeholder:text-slate-400"
                        placeholder="••••••••">
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-primary w-full py-4 rounded-2xl text-white font-bold text-lg shadow-lg shadow-indigo-200 flex items-center justify-center gap-2">
                <span>Créer mon compte</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </button>
        </form>

        {{-- Divider --}}
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-slate-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-slate-400 font-medium">déjà inscrit ?</span>
            </div>
        </div>

        {{-- Login link --}}
        <a href="{{ route('login') }}" class="block w-full py-4 rounded-2xl border-2 border-slate-200 text-slate-600 font-bold text-center hover:border-indigo-500 hover:text-indigo-600 transition-all">
            Se connecter
        </a>
    </div>
</x-guest-layout>