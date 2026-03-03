<x-app-layout>
    <x-slot name="header">
        Mon Profil
    </x-slot>

    <div class="max-w-4xl mx-auto">
        
        {{-- Header avec avatar --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm mb-8 text-center">
            <div class="w-24 h-24 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mx-auto flex items-center justify-center text-white text-3xl font-black mb-4 shadow-lg shadow-indigo-200">
                {{ strtoupper(substr(Auth::user()->firstname, 0, 1) . substr(Auth::user()->lastname, 0, 1)) }}
            </div>
            <h2 class="text-2xl font-black text-slate-900 uppercase italic tracking-tight">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
            <p class="text-slate-400 font-medium">{{ Auth::user()->email }}</p>
            
            {{-- Badge réputation --}}
            <div class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-amber-50 text-amber-600 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.922-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span class="text-sm font-black">Score de réputation: {{ Auth::user()->reputation_score ?? 0 }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Colonne gauche: Informations --}}
            <div class="lg:col-span-2 space-y-8">
                
                {{-- Informations personnelles --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm">
                    <h3 class="text-xl font-black text-slate-900 uppercase italic tracking-tight mb-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        Informations personnelles
                    </h3>

                    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        {{-- Prénom --}}
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                                Prénom
                            </label>
                            <input type="text" name="firstname" value="{{ old('firstname', $user->firstname) }}" 
                                class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                                required>
                            @error('firstname')
                                <p class="mt-2 text-sm text-rose-600 font-bold ml-4">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nom --}}
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                                Nom
                            </label>
                            <input type="text" name="lastname" value="{{ old('lastname', $user->lastname) }}" 
                                class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                                required>
                            @error('lastname')
                                <p class="mt-2 text-sm text-rose-600 font-bold ml-4">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                                Email
                            </label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                                required>
                            @error('email')
                                <p class="mt-2 text-sm text-rose-600 font-bold ml-4">{{ $message }}</p>
                            @enderror
                            
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-4 p-4 bg-amber-50 rounded-2xl">
                                    <p class="text-sm text-amber-700 font-medium">
                                        Votre email n'est pas vérifié.
                                        <button form="send-verification" class="text-indigo-600 font-bold underline hover:text-indigo-800">
                                            Renvoyer l'email de vérification
                                        </button>
                                    </p>
                                </div>
                            @endif
                        </div>

                        {{-- Bouton sauvegarder --}}
                        <div class="flex items-center gap-4 pt-4">
                            @if (session('status') === 'profile-updated')
                                <p class="text-sm text-emerald-600 font-bold flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Enregistré !
                                </p>
                            @endif
                            
                            <button type="submit" 
                                class="ml-auto px-8 py-4 bg-indigo-600 text-white rounded-[1.5rem] text-sm font-black shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all transform hover:-translate-y-1 uppercase tracking-widest">
                                Sauvegarder
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Modifier mot de passe --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm">
                    <h3 class="text-xl font-black text-slate-900 uppercase italic tracking-tight mb-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        Modifier le mot de passe
                    </h3>

                    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        @method('put')

                        {{-- Mot de passe actuel --}}
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                                Mot de passe actuel
                            </label>
                            <input type="password" name="current_password" 
                                class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                                autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <p class="mt-2 text-sm text-rose-600 font-bold ml-4">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nouveau mot de passe --}}
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                                Nouveau mot de passe
                            </label>
                            <input type="password" name="password" 
                                class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                                autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <p class="mt-2 text-sm text-rose-600 font-bold ml-4">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Confirmation --}}
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                                Confirmer le mot de passe
                            </label>
                            <input type="password" name="password_confirmation" 
                                class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                                autocomplete="new-password">
                        </div>

                        {{-- Bouton --}}
                        <div class="flex items-center gap-4 pt-4">
                            @if (session('status') === 'password-updated')
                                <p class="text-sm text-emerald-600 font-bold flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Mot de passe modifié !
                                </p>
                            @endif
                            
                            <button type="submit" 
                                class="ml-auto px-8 py-4 bg-slate-800 text-white rounded-[1.5rem] text-sm font-black shadow-lg shadow-slate-200 hover:bg-slate-900 transition-all transform hover:-translate-y-1 uppercase tracking-widest">
                                Changer le mot de passe
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Colonne droite: Danger zone --}}
            <div class="space-y-8">
                
                {{-- Supprimer compte --}}
                <div class="bg-rose-50 rounded-[2.5rem] border border-rose-100 p-8">
                    <h3 class="text-xl font-black text-rose-600 uppercase italic tracking-tight mb-6 flex items-center gap-3">
                        <div class="w-10 h-10 bg-rose-100 rounded-xl flex items-center justify-center text-rose-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        Zone de danger
                    </h3>

                    <p class="text-rose-700 text-sm mb-6 leading-relaxed">
                        Une fois votre compte supprimé, toutes vos données seront définitivement effacées. Cette action est irréversible.
                    </p>

                    <button type="button" 
                        onclick="document.getElementById('delete-modal').classList.remove('hidden')"
                        class="w-full px-6 py-4 bg-rose-600 text-white rounded-[1.5rem] text-sm font-black shadow-lg shadow-rose-200 hover:bg-rose-700 transition-all uppercase tracking-widest">
                        Supprimer mon compte
                    </button>
                </div>

                {{-- Stats rapides --}}
                <div class="bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm">
                    <h3 class="text-lg font-black text-slate-900 uppercase italic tracking-tight mb-6">Mes stats</h3>
                    
                    <div class="space-y-4">
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                            <span class="text-sm font-bold text-slate-600">Colocations</span>
                            <span class="text-lg font-black text-indigo-600">{{ Auth::user()->colocations->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                            <span class="text-sm font-bold text-slate-600">Dépenses</span>
                            <span class="text-lg font-black text-indigo-600">{{ Auth::user()->depenses->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center p-4 bg-slate-50 rounded-2xl">
                            <span class="text-sm font-bold text-slate-600">Membre depuis</span>
                            <span class="text-sm font-black text-slate-900">{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal de confirmation suppression --}}
    <div id="delete-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-[2.5rem] p-8 max-w-md w-full mx-4 shadow-2xl">
            <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            
            <h3 class="text-xl font-black text-slate-900 text-center uppercase italic tracking-tight mb-2">
                Êtes-vous sûr ?
            </h3>
            <p class="text-slate-500 text-center mb-8">
                Cette action est irréversible. Toutes vos données seront supprimées définitivement.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                        Confirmez avec votre mot de passe
                    </label>
                    <input type="password" name="password" 
                        class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-rose-500 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                        placeholder="••••••••"
                        required>
                    @error('password', 'userDeletion')
                        <p class="mt-2 text-sm text-rose-600 font-bold ml-4">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-4">
                    <button type="button" 
                        onclick="document.getElementById('delete-modal').classList.add('hidden')"
                        class="flex-1 px-6 py-4 bg-slate-100 text-slate-600 rounded-[1.5rem] text-sm font-black hover:bg-slate-200 transition uppercase tracking-widest">
                        Annuler
                    </button>
                    <button type="submit" 
                        class="flex-1 px-6 py-4 bg-rose-600 text-white rounded-[1.5rem] text-sm font-black shadow-lg shadow-rose-200 hover:bg-rose-700 transition uppercase tracking-widest">
                        Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Formulaire caché pour renvoi email vérification --}}
    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="hidden">
            @csrf
        </form>
    @endif
</x-app-layout>