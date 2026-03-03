<x-app-layout>
    <x-slot name="header">
        Dépenses - {{ $colocation->name }}
    </x-slot>

    <div class="space-y-6">
        
        {{-- Header avec stats --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase italic">
                    {{ $depenses->count() }} Dépense{{ $depenses->count() > 1 ? 's' : '' }}
                </h2>
                <p class="text-slate-400 font-medium italic">Total: {{ number_format($total, 2, ',', ' ') }} €</p>
            </div>
            
            <div class="flex gap-3">
                <a href="{{ route('colocation.show', $colocation) }}" 
                    class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-slate-200 transition">
                    ← Retour
                </a>
                <a href="{{ route('depenses.create', $colocation) }}" 
                    class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-indigo-700 transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Ajouter
                </a>
            </div>
        </div>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-2xl font-bold">
                {{ session('success') }}
            </div>
        @endif

        @if($depenses->count() === 0)
            {{-- État vide --}}
            <div class="bg-white rounded-[2.5rem] border border-slate-50 p-12 text-center">
                <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-slate-800 mb-2">Aucune dépense</h3>
                <p class="text-slate-400 mb-6">Commencez par ajouter votre première dépense</p>
                <a href="{{ route('depenses.create', $colocation) }}" 
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-black uppercase tracking-widest hover:bg-indigo-700 transition">
                    Ajouter une dépense
                </a>
            </div>
        @else
            {{-- Tableau des dépenses --}}
            <div class="bg-white rounded-[2.5rem] border border-slate-50 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Date</th>
                                <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Titre</th>
                                <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Catégorie</th>
                                <th class="px-6 py-4 text-left text-[10px] font-black text-slate-400 uppercase tracking-widest">Payé par</th>
                                <th class="px-6 py-4 text-right text-[10px] font-black text-slate-400 uppercase tracking-widest">Montant</th>
                                <th class="px-6 py-4 text-center text-[10px] font-black text-slate-400 uppercase tracking-widest">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($depenses as $depense)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-6 py-4 text-sm font-bold text-slate-600">
                                        {{ $depense->spent_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="font-bold text-slate-900">{{ $depense->title }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase rounded-lg">
                                            {{ $depense->categorie->name ?? 'Autre' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-bold text-slate-600">
                                        {{ $depense->user->firstname ?? 'Inconnu' }}
                                        @if($depense->user_id === Auth::id())
                                            <span class="text-indigo-500">(vous)</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right font-black text-slate-900">
                                        {{ number_format($depense->amount, 2, ',', ' ') }} €
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-2">
                                            @if($depense->user_id === Auth::id() || Auth::id() === $colocation->owner_id)
                                                <a href="{{ route('depenses.edit', [$colocation, $depense]) }}" 
                                                    class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-xl transition-colors"
                                                    title="Modifier">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('depenses.destroy', [$colocation, $depense]) }}" method="POST" 
                                                    onsubmit="return confirm('Supprimer cette dépense ?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-2 text-rose-500 hover:bg-rose-50 rounded-xl transition-colors" title="Supprimer">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-slate-300 text-xs">-</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>