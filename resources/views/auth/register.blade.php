<x-guest-layout>
    <div class="text-center lg:text-left">
        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Rejoindre EasyColoc</h2>
        <p class="mt-2 text-slate-500 font-medium">L'outil indispensable pour votre vie en communauté.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="mt-10 space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-bold text-slate-700 mb-1">Nom complet</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                class="block w-full px-4 py-3.5 bg-white border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition shadow-sm"
                placeholder="Ex: Alex Martin">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-bold text-slate-700 mb-1">Adresse Email</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                class="block w-full px-4 py-3.5 bg-white border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition shadow-sm"
                placeholder="alex@exemple.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="password" class="block text-sm font-bold text-slate-700 mb-1">Mot de passe</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="block w-full px-4 py-3.5 bg-white border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition shadow-sm"
                    placeholder="••••••••">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-1">Confirmation</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="block w-full px-4 py-3.5 bg-white border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition shadow-sm"
                    placeholder="••••••••">
            </div>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-2xl shadow-lg shadow-indigo-200 text-sm font-extrabold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none transition-all transform hover:-translate-y-0.5">
                Créer mon compte
            </button>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-slate-500">
                Déjà inscrit ? 
                <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-500 transition">Se connecter</a>
            </p>
        </div>
    </form>
</x-guest-layout>