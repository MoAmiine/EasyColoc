<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center lg:text-left">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Connexion</h2>
        <p class="mt-2 text-slate-500 font-medium">Gérez les dépenses de votre colocation en un clic.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="mt-10 space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Adresse Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                class="block w-full px-4 py-3.5 bg-white border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition shadow-sm"
                placeholder="nom@exemple.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-sm font-bold text-slate-700">Mot de passe</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-bold text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                        Oublié ?
                    </a>
                @endif
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="block w-full px-4 py-3.5 bg-white border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition shadow-sm"
                placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember" class="rounded-md border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
            <label for="remember_me" class="ml-2 text-sm font-medium text-slate-600 italic">Se souvenir de moi</label>
        </div>

        <div>
            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-2xl shadow-lg shadow-indigo-200 text-sm font-extrabold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none transition-all transform hover:-translate-y-0.5">
                Se connecter
            </button>
        </div>

        <div class="text-center mt-8">
            <p class="text-sm text-slate-500">
                Nouveau ici ? 
                <a href="{{ route('register') }}" class="font-bold text-indigo-600 hover:text-indigo-500 transition">Créer un compte</a>
            </p>
        </div>
    </form>
</x-guest-layout>