<x-app-layout>
    <x-slot name="header">
        {{ $colocation->name }}
    </x-slot>

    <div class="space-y-8">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-indigo-600 p-6 rounded-[2rem] text-white shadow-xl shadow-indigo-100">
                <p class="text-[10px] font-black uppercase tracking-widest opacity-70 mb-1">Membres Actifs</p>
                <p class="text-4xl font-black">{{ $colocation->users->count() ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Solde Total</p>
                <p class="text-4xl font-black text-slate-900">0.00 €</p>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Date de création</p>
                <p class="text-xl font-bold text-slate-900 mt-2">{{ $colocation->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                @if(Auth::id() === $colocation->owner_id)
                    <div class="bg-indigo-600 p-8 rounded-[2rem] text-white shadow-xl shadow-indigo-100">
                        <h3 class="font-black uppercase italic tracking-tighter mb-4">Inviter un membre</h3>
                        <form action="#" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <input type="email" name="email" 
                                    placeholder="email@exemple.com" 
                                    class="w-full px-5 py-3 rounded-2xl bg-indigo-500 border-0 text-white placeholder-indigo-200 focus:ring-2 focus:ring-white outline-none font-bold"
                                    required>
                            </div>
                            <button type="submit" class="w-full py-3 bg-white text-indigo-600 font-black uppercase tracking-widest rounded-2xl hover:bg-indigo-50 transition-colors text-sm">
                                Envoyer l'invitation
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <div class="lg:col-span-2 bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm">
                <h3 class="text-xl font-black text-slate-900 mb-6 italic uppercase tracking-tight">Membres</h3>
                <div class="space-y-4">
                    @foreach($colocation->users as $user)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-black">
                                    {{ substr($user->firstname ?? 'U', 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">{{ $user->firstname ?? 'Utilisateur' }} {{ $user->lastname ?? '' }}</p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                        {{ $user->id === $colocation->owner_id ? 'Owner' : 'Membre' }}
                                    </p>
                                </div>
                            </div>
                            
                            @if(Auth::id() === $colocation->owner_id && $user->id !== Auth::id())
                                <form action="#" method="POST" onsubmit="return confirm('Retirer ce membre ?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-rose-500 hover:bg-rose-50 p-2 rounded-xl transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if(Auth::id() === $colocation->owner_id)
                    <div class="flex items-center justify-end gap-4 mt-8 pt-8 border-t border-slate-100">
                        <a href="{{ route('colocation.edit', $colocation) }}" 
                           class="px-6 py-3 bg-white border border-indigo-200 text-indigo-600 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-indigo-50 transition-all">
                           Modifier
                        </a>
                        <form action="#" method="POST" onsubmit="return confirm('Supprimer cette colocation ? Action irréversible.');">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-6 py-3 bg-rose-50 text-rose-600 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-rose-100 transition-all">
                                Supprimer
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>