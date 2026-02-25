<x-guest-layout>
    <div class="text-center lg:text-left">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-50 rounded-2xl mb-6 lg:mb-4">
            <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
        </div>
        
        <h2 class="text-3xl font-black text-slate-900 tracking-tight">Mot de passe oublié ?</h2>
        <p class="mt-3 text-slate-500 font-medium leading-relaxed">
            Pas de souci ! Indiquez-nous votre adresse email et nous vous enverrons un lien pour en choisir un nouveau.
        </p>
    </div>

    <x-auth-session-status class="mt-6 p-4 bg-emerald-50 text-emerald-700 rounded-xl border border-emerald-100 text-sm font-medium" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Votre adresse email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="block w-full pl-11 pr-4 py-3.5 bg-white border border-slate-200 text-slate-900 text-sm rounded-2xl focus:ring-2 focus:ring-indigo-600 focus:border-transparent transition shadow-sm"
                    placeholder="exemple@mail.com">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs font-medium text-rose-500" />
        </div>

        <div class="space-y-4">
            <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-2xl shadow-lg shadow-indigo-200 text-sm font-extrabold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none transition-all transform hover:-translate-y-0.5 active:scale-95">
                Envoyer le lien de réinitialisation
            </button>
            
            <a href="{{ route('login') }}" class="w-full flex justify-center py-3 text-sm font-bold text-slate-500 hover:text-indigo-600 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Retour à la connexion
            </a>
        </div>
    </form>
</x-guest-layout>