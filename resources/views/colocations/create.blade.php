<x-app-layout>
    <x-slot name="header">
        Nouvelle Colocation
    </x-slot>

    <div class="max-w-2xl mx-auto h-full flex flex-col justify-center">
        <div class="text-center mb-10">
            <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-[2rem] flex items-center justify-center mx-auto mb-4 shadow-sm">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase italic">Créer un nouvel espace</h2>
            <p class="text-slate-400 font-medium italic">Invitez vos colocataires et commencez à gérer vos dépenses communes.</p>
        </div>

        <form method="POST" action="{{ route('colocation.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                    Nom de la colocation
                </label>
                <input type="text" name="name" id="name" 
                    placeholder="ex: La Villa des Amis, Appartement 42..." 
                    class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                    required>
                @error('name')
                    <p class="mt-2 text-rose-500 text-xs font-bold ml-4">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                    Description ou Adresse
                </label>
                <textarea name="description" id="description" rows="3"
                    placeholder="Une courte description de votre colocation..." 
                    class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"></textarea>
            </div>

            <div class="bg-indigo-50 border border-indigo-100 p-4 rounded-2xl flex gap-3 items-start">
                <svg class="w-5 h-5 text-indigo-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <p class="text-[11px] font-bold text-indigo-700 leading-relaxed uppercase tracking-tighter">
                    En créant cette colocation, vous en devenez le proprietaire. Vous pourrez inviter vos membres via un code unique après la création.
                </p>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <a href="#" 
                    class="flex-1 text-center px-6 py-4 rounded-[1.5rem] text-sm font-black text-slate-400 hover:bg-slate-50 transition-colors uppercase tracking-widest">
                    Annuler
                </a>
                <button type="submit" 
                    class="flex-[2] px-6 py-4 bg-indigo-600 text-white rounded-[1.5rem] text-sm font-black shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all transform hover:-translate-y-1 uppercase tracking-widest">
                    Lancer la colocation
                </button>
            </div>
        </form>
    </div>
</x-app-layout>