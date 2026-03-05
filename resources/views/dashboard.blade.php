<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-[2rem] p-8 text-white shadow-xl">
                <p class="text-indigo-100 text-xs font-black uppercase tracking-widest mb-2">Mon Score Nexus</p>
                <div class="flex items-end gap-2">
                    <span class="text-5xl font-black italic">{{ $reputation }}</span>
                    <span class="text-indigo-200 font-bold mb-1">pts</span>
                </div>
                <div class="mt-4 h-1.5 w-full bg-white/20 rounded-full overflow-hidden">
                    <div class="h-full bg-white" style="width: {{ min($reputation, 100) }}%"></div>
                </div>
                <p class="mt-4 text-xs text-indigo-100 italic font-medium">Fidélité et paiements à jour</p>
            </div>

            <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-sm">
                <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-2">Total Dépensé</p>
                <div class="flex items-end gap-2 text-slate-900">
                    <span class="text-5xl font-black italic">{{ number_format($totalDepenses, 2) }}</span>
                    <span class="text-slate-400 font-bold mb-1">€</span>
                </div>
                <p class="mt-4 text-xs text-emerald-500 font-bold flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"/></svg>
                    Cumul de vos participations
                </p>
            </div>

            <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-sm">
                <p class="text-slate-400 text-xs font-black uppercase tracking-widest mb-2">Mes Espaces</p>
                <div class="flex items-end gap-2 text-slate-900">
                    <span class="text-5xl font-black italic">{{ $colocations->count() }}</span>
                    <span class="text-slate-400 font-bold mb-1">Actifs</span>
                </div>
                <p class="mt-4 text-xs text-slate-400 font-medium italic">En cours de partage</p>
            </div>
        </div>

        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-black text-slate-900 uppercase italic tracking-tight">Mes Colocations</h2>
            <a href="{{ route('colocation.create') }}" class="text-xs font-black bg-slate-900 text-white px-5 py-3 rounded-xl uppercase tracking-widest hover:bg-indigo-600 transition">
                + Nouvelle Coloc
            </a>
        </div>

        @if($colocations->isEmpty())
            <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-[3rem] py-20 text-center">
                <p class="text-slate-400 font-bold uppercase italic">Aucune colocation trouvée</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($colocations as $coloc)
                    <div class="group bg-white border border-slate-100 rounded-[2.5rem] p-8 flex items-center justify-between hover:shadow-2xl hover:shadow-indigo-100 transition-all duration-300">
                        <div class="flex items-center gap-6">
                            <div class="w-16 h-16 bg-slate-50 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl font-black italic border border-slate-100">
                                {{ substr($coloc->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900 uppercase italic">{{ $coloc->name }}</h3>
                                <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">{{ $coloc->users_count }} Membres actifs</p>
                            </div>
                        </div>
                        <a href="{{ route('colocation.show', $coloc->id) }}" class="w-12 h-12 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-app-layout>