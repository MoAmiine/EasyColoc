<x-guest-layout>
    <x-slot name="title">Connexion - EasyColoc</x-slot>
    
    <div class="space-y-6">
        <div class="text-center lg:text-left">
            <h1 class="text-3xl font-black text-slate-900 mb-2">Bon retour ! 👋</h1>
            <p class="text-slate-500">Connectez-vous pour accéder à votre colocation.</p>
        </div>

        @if(session('status'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-xl text-sm font-semibold">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Adresse email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                        </svg>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                        class="input-field w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-500 focus:bg-white text-slate-900 font-semibold placeholder:font-normal placeholder:text-slate-400"
                        placeholder="vous@exemple.com">
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-rose-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="text-sm font-bold text-slate-700">Mot de passe</label>
                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 font-semibold link-hover">
                            Oublié ?
                        </a>
                    @endif
                </div>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <input id="password" type="password" name="password" required 
                        class="input-field w-full pl-12 pr-4 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl outline-none focus:border-indigo-500 focus:bg-white text-slate-900 font-semibold placeholder:font-normal placeholder:text-slate-400"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-rose-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input id="remember" type="checkbox" name="remember" class="w-5 h-5 text-indigo-600 border-2 border-slate-200 rounded-lg focus:ring-indigo-500 cursor-pointer">
                <label for="remember" class="ml-3 text-sm text-slate-600 font-medium cursor-pointer">
                    Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="btn-primary w-full py-4 rounded-2xl text-white font-bold text-lg shadow-lg shadow-indigo-200">
                Se connecter
            </button>
        </form>

        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-slate-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-slate-400 font-medium">ou</span>
            </div>
        </div>

        <p class="text-center text-slate-600">
            Pas encore de compte ? 
            <a href="{{ route('register') }}" class="font-bold text-indigo-600 link-hover">
                Créer un compte
            </a>
        </p>
    </div>
</x-guest-layout>