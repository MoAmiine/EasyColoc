<x-app-layout>
    <x-slot name="header">
        Mes Colocations
    </x-slot>

    <div class="h-full flex flex-col">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
            <div>
                <h2 class="text-2xl font-black text-slate-800 tracking-tight uppercase italic">Vue d'ensemble</h2>
                <p class="text-slate-400 font-medium italic">Gérez vos différents espaces et membres.</p>
            </div>
            
            <a href="{{ route('colocation.create') }}" 
                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 text-white rounded-2xl text-sm font-black shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all transform hover:-translate-y-1 uppercase tracking-widest">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Créer une colocation
            </a>
        </div>

        @if($colocations->count() === 0)
            <div class="flex-1 flex flex-col items-center justify-center animate-fade-in">
                <div class="w-32 h-32 bg-indigo-50 text-indigo-200 rounded-[3rem] flex items-center justify-center mb-8 border border-indigo-100/50 shadow-inner">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-black text-slate-800 mb-2 uppercase italic tracking-tight">Aucune colocation active</h3>
                <p class="text-slate-400 font-medium max-w-sm text-center leading-relaxed italic mb-8">
                    Vous ne faites partie d'aucune colocation pour le moment. Créez votre propre espace ou rejoignez-en un.
                </p>
                <div class="flex gap-4">
                    <a href="{{ route('colocation.create') }}" class="px-8 py-3 bg-white border-2 border-indigo-600 text-indigo-600 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-indigo-50 transition-colors">
                        Créer maintenant
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($colocations as $coloc)
                    <div class="group bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm hover:shadow-xl hover:shadow-indigo-100/30 transition-all duration-300 relative overflow-hidden">
                        <div class="absolute -right-4 -top-4 w-24 h-24 bg-indigo-50/30 rounded-full group-hover:scale-150 transition-transform duration-700"></div>

                        <div class="relative z-10">
                            <div class="flex justify-between items-start mb-6">
                                <div class="w-14 h-14 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-black text-xl italic shadow-lg shadow-indigo-100">
                                    {{ strtoupper(substr($coloc->name, 0, 1)) }}
                                </div>
                                <div class="flex flex-col items-end">
                                    <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-[10px] font-black uppercase rounded-lg tracking-tighter">
                                        ID: #{{ $coloc->id }}
                                    </span>
                                </div>
                            </div>
                            
                            <h4 class="text-xl font-black text-slate-900 mb-1 tracking-tight italic uppercase">{{ $coloc->name }}</h4>
                            <p class="text-xs text-slate-400 font-bold mb-8 uppercase tracking-widest flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                {{ $coloc->users_count ?? 0 }} Membres
                            </p>
                            
                            <div class="flex items-center justify-between pt-6 border-t border-slate-50">
                                <div class="flex -space-x-3">
                                    <div class="w-9 h-9 rounded-xl border-4 border-white bg-slate-900 text-[10px] text-white flex items-center justify-center font-bold">JD</div>
                                    <div class="w-9 h-9 rounded-xl border-4 border-white bg-indigo-100 text-[10px] text-indigo-600 flex items-center justify-center font-bold">+</div>
                                </div>
                                
                                <a href="#" class="flex items-center gap-2 text-xs font-black text-indigo-600 uppercase tracking-widest group-hover:gap-4 transition-all">
                                    Accéder
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>