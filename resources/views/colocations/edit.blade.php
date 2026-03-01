<x-app-layout>
    <x-slot name="header">
        Modifier : {{ $collocation->name }}
    </x-slot>

    <div class="max-w-2xl mx-auto animate-fade-in">
        
        <form action="{{ route('colocation.update', $collocation)}}" method="POST" 
            class="bg-white p-8 md:p-10 rounded-[2.5rem] border border-slate-50 shadow-xl shadow-indigo-100/30">
            @csrf
            @method('PUT')

            <h3 class="text-xl font-black text-slate-900 mb-8 italic uppercase tracking-tight">Paramètres du Nexus</h3>

            <div class="mb-6">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Nom de la colocation</label>
                <input type="text" name="name" value="{{ old('name', $collocation->name) }}" 
                    class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-600 rounded-2xl outline-none font-bold text-slate-900 transition-all"
                    required>
                @error('name')
                    <p class="mt-2 text-rose-500 text-[10px] font-black uppercase tracking-widest">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label class="block text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2">Description</label>
                <textarea name="description" rows="4" 
                    class="w-full px-6 py-4 bg-slate-50 border-2 border-transparent focus:border-indigo-600 rounded-2xl outline-none font-bold text-slate-900 transition-all">{{ old('description', $collocation->description) }}</textarea>
                @error('description')
                    <p class="mt-2 text-rose-500 text-[10px] font-black uppercase tracking-widest">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('colocation.show', $collocation) }}" 
                    class="px-6 py-3 text-slate-400 text-xs font-black uppercase tracking-widest hover:text-slate-600 transition-colors">
                    Annuler
                </a>
                <button type="submit" 
                    class="px-8 py-3 bg-indigo-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all transform hover:-translate-y-1">
                    Enregistrer
                </button>
            </div>
        </form>
    </div>
</x-app-layout>