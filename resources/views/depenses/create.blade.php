<x-app-layout>
    <x-slot name="header">
        Nouvelle Dépense - {{ $colocation->name }}
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white p-8 rounded-[2.5rem] border border-slate-50 shadow-sm">
            
            <div class="flex items-center gap-4 mb-8">
                <a href="{{ route('colocation.show', $colocation) }}" class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600 hover:bg-slate-200 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-2xl font-black text-slate-800 uppercase italic tracking-tight">Ajouter une dépense</h2>
                    <p class="text-sm text-slate-400">{{ $colocation->name }}</p>
                </div>
            </div>

            {{-- Erreurs de validation --}}
            @if($errors->any())
                <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl mb-6">
                    <ul class="text-sm font-bold space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('depenses.store', $colocation) }}" method="POST" class="space-y-6">
                @csrf

                {{-- Titre --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                        Titre de la dépense *
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" 
                        placeholder="ex: Courses Carrefour, Loyer février..."
                        class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                        required>
                </div>

                {{-- Montant --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                        Montant (€) *
                    </label>
                    <input type="number" step="0.01" name="amount" value="{{ old('amount') }}" 
                        placeholder="0.00"
                        class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 placeholder:text-slate-300 shadow-sm"
                        required>
                </div>

                {{-- Catégorie --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                        Catégorie
                    </label>
                    <select name="category_id" 
                        class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 shadow-sm">
                        <option value="">-- Sans catégorie --</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ old('category_id') == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Payé par --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                        Payé par *
                    </label>
                    <select name="user_id" 
                        class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 shadow-sm">
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ Auth::id() == $member->id ? 'selected' : '' }}>
                                {{ $member->firstname }} {{ $member->lastname }}
                                {{ $member->id == Auth::id() ? '(moi)' : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Date --}}
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 ml-2">
                        Date *
                    </label>
                    <input type="date" name="spent_at" value="{{ old('spent_at', date('Y-m-d')) }}" 
                        class="w-full px-6 py-4 bg-[#F4F7FE] border-2 border-transparent focus:border-indigo-600 focus:bg-white rounded-[1.5rem] outline-none transition-all font-bold text-slate-700 shadow-sm"
                        required>
                </div>

                {{-- Boutons --}}
                <div class="flex items-center gap-4 pt-4">
                    <a href="{{ route('colocation.show', $colocation) }}" 
                        class="flex-1 text-center px-6 py-4 rounded-[1.5rem] text-sm font-black text-slate-400 hover:bg-slate-50 transition-colors uppercase tracking-widest">
                        Annuler
                    </a>
                    <button type="submit" 
                        class="flex-[2] px-6 py-4 bg-indigo-600 text-white rounded-[1.5rem] text-sm font-black shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all transform hover:-translate-y-1 uppercase tracking-widest">
                        Enregistrer la dépense
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>