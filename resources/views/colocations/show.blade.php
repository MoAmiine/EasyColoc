<x-app-layout>
    <x-slot name="header">
        {{ $colocation->name }}
    </x-slot>

    <div class="space-y-8">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-indigo-600 p-6 rounded-[2rem] text-white shadow-xl shadow-indigo-100">
                <p class="text-[10px] font-black uppercase tracking-widest opacity-70 mb-1">Membres Actifs</p>
                <p class="text-4xl font-black">{{ $colocation->users->count() ?? 0 }}</p>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Dépenses</p>
                <p class="text-4xl font-black text-slate-900">
                    {{ number_format($colocation->depenses->sum('amount'), 2, ',', ' ') }} €</p>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Ma Balance</p>
                <p class="text-4xl font-black text-emerald-600">+0,00 €</p>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Date de création</p>
                <p class="text-xl font-bold text-slate-900 mt-2">{{ $colocation->created_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">

            <div class="flex border-b border-slate-100">
                <button onclick="switchTab('members')" id="tab-members"
                    class="flex-1 px-6 py-4 text-sm font-black uppercase tracking-widest text-indigo-600 border-b-2 border-indigo-600 bg-indigo-50/50 transition-colors">
                    Membres
                </button>
                <button onclick="switchTab('expenses')" id="tab-expenses"
                    class="flex-1 px-6 py-4 text-sm font-black uppercase tracking-widest text-slate-400 hover:text-slate-600 transition-colors">
                    Dépenses
                </button>
            </div>

            <div id="content-members" class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-black text-slate-900 italic uppercase tracking-tight">Membres de la
                        colocation</h3>
                    @if (Auth::id() === $colocation->owner_id)
                        <span
                            class="px-3 py-1 bg-indigo-100 text-indigo-600 text-[10px] font-black uppercase rounded-lg">Vous
                            êtes Owner</span>
                    @endif
                </div>

                <div class="space-y-4">
                    @foreach ($colocation->users as $user)
                        <div class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center font-black text-lg">
                                    {{ strtoupper(substr($user->firstname, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-900">{{ $user->firstname }} {{ $user->lastname }}</p>
                                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                        {{ $user->id === $colocation->owner_id ? '👑 Owner' : 'Membre' }}
                                        @if ($user->id === Auth::id())
                                            <span class="text-indigo-500">(vous)</span>
                                        @endif
                                    </p>
                                </div>
                                
                            </div>
                            @if ($user->id === Auth::id() && Auth::id() !== $colocation->owner_id)
            <form action="{{ route('colocation.quitter', $colocation) }}" method="POST" 
                  onsubmit="return confirm('Quitter la colocation ? Votre réputation sera mise à jour selon vos dettes.')">
                @csrf
                <button type="submit" class="px-4 py-2 bg-rose-50 text-rose-600 text-[10px] font-black uppercase tracking-widest rounded-xl hover:bg-rose-100 transition">
                    Quitter
                </button>
            </form>
        @endif

                            @if (Auth::id() === $colocation->owner_id && $user->id !== Auth::id())
                                <form
                                    action="
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                    class="text-rose-500 hover:bg-rose-50 p-2 rounded-xl transition-colors"
                                    title="Retirer">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                        
                    @endforeach
                    
                </div>

                @if (Auth::id() === $colocation->owner_id)
                    <div class="mt-8 pt-8 border-t border-slate-100">
                        <h4 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-4">Inviter un nouveau
                            membre</h4>

                        @if (session('success'))
                            <div class="mb-4 p-4 bg-emerald-50 text-emerald-700 rounded-2xl text-sm font-bold">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="mb-4 p-4 bg-rose-50 text-rose-700 rounded-2xl text-sm font-bold">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('invitations.store', $colocation) }}" method="POST" class="flex gap-3">
                            @csrf
                            <input type="email" name="email" placeholder="email@exemple.com"
                                class="flex-1 px-5 py-3 rounded-2xl bg-slate-50 border-0 font-bold text-slate-700 placeholder-slate-400 focus:ring-2 focus:ring-indigo-600 outline-none"
                                required>
                            <button type="submit"
                                class="px-6 py-3 bg-indigo-600 text-white font-black uppercase tracking-widest rounded-2xl hover:bg-indigo-700 transition text-sm flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Inviter
                            </button>
                        </form>
                        <p class="mt-2 text-xs text-slate-400">Un email d'invitation sera envoyé à cette adresse.</p>
                    </div>
                @endif
            </div>
            

            <div id="content-expenses" class="hidden p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-black text-slate-900 italic uppercase tracking-tight">
                        Dépenses
                        <span class="text-slate-400 text-lg">({{ $colocation->depenses->count() }})</span>
                    </h3>
                    <a href="{{ route('depenses.create', $colocation) }}"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-indigo-700 transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Ajouter
                    </a>
                </div>

                @if ($colocation->depenses->count() === 0)
                    <div class="text-center py-12">
                        <div class="w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <p class="text-slate-400 font-medium">Aucune dépense enregistrée</p>
                        <a href="{{ route('depenses.create', $colocation) }}"
                            class="text-indigo-600 font-bold text-sm mt-2 inline-block hover:underline">
                            Ajouter la première dépense →
                        </a>
                    </div>
                @else
                    <div class="space-y-3">
@foreach ($colocation->depenses as $depense)
    <div class="relative group">
        <a href="{{ route('depenses.show', [$colocation, $depense]) }}" 
           class="flex items-center justify-between p-4 bg-slate-50 rounded-2xl hover:bg-indigo-50/50 transition-colors cursor-pointer">
            
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-white text-indigo-600 flex items-center justify-center font-bold shadow-sm">
                    {{ $depense->categorie ? substr($depense->categorie->name, 0, 2) : '💰' }}
                </div>
                
                <div>
                    <p class="font-bold text-slate-900">{{ $depense->title }}</p>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                        Par {{ $depense->user->firstname ?? 'Inconnu' }} •
                        {{ $depense->spent_at->format('d/m/Y') }}
                        @if ($depense->categorie)
                            • {{ $depense->categorie->name }}
                        @endif
                    </p>
                </div>
            </div>
            
            <div class="text-right mr-16">
                <p class="font-black text-slate-900 text-lg">
                    {{ number_format($depense->amount, 2, ',', ' ') }} €
                </p>
                @if ($depense->user_id === Auth::id())
                    <span class="text-[10px] font-bold text-emerald-600 uppercase">Payé par vous</span>
                @endif
            </div>
        </a>

        @if ($depense->user_id === Auth::id() || Auth::id() === $colocation->owner_id)
            <div class="absolute right-4 top-1/2 -translate-y-1/2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <a href="{{ route('depenses.edit', [$colocation, $depense]) }}"
                   class="p-2 text-indigo-600 hover:bg-indigo-100 rounded-lg transition-colors bg-white shadow-sm"
                   title="Modifier"
                   onclick="event.stopPropagation()">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </a>
                
                <form action="{{ route('depenses.destroy', [$colocation, $depense]) }}"
                      method="POST" 
                      onsubmit="return confirm('Supprimer cette dépense ?'); event.stopPropagation();"
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="p-2 text-rose-500 hover:bg-rose-100 rounded-lg transition-colors bg-white shadow-sm"
                            title="Supprimer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
        @endif
    </div>
@endforeach                    </div>

                    @if ($colocation->depenses->count() > 5)
                        <div class="mt-6 text-center">
                            <a href="{{ route('colocation.show', $colocation) }}"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-slate-100 text-slate-600 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-slate-200 transition">
                                Voir toutes les {{ $colocation->depenses->count() }} dépenses
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        @if (Auth::id() === $colocation->owner_id)
            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('colocation.edit', $colocation) }}"
                    class="px-6 py-3 bg-white border border-indigo-200 text-indigo-600 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-indigo-50 transition-all">
                    Modifier la colocation
                </a>
                <form action="{{ route('colocation.delete', $colocation) }}" method="POST"
                    onsubmit="return confirm('Supprimer définitivement cette colocation ?');">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="px-6 py-3 bg-rose-50 text-rose-600 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-rose-100 transition-all">
                        Supprimer
                    </button>
                </form>
            </div>
        @endif
    </div>

    <script>
        function switchTab(tabName) {
            document.getElementById('content-members').classList.add('hidden');
            document.getElementById('content-expenses').classList.add('hidden');

            document.getElementById('tab-members').classList.remove('text-indigo-600', 'border-b-2', 'border-indigo-600',
                'bg-indigo-50/50');
            document.getElementById('tab-members').classList.add('text-slate-400');
            document.getElementById('tab-expenses').classList.remove('text-indigo-600', 'border-b-2', 'border-indigo-600',
                'bg-indigo-50/50');
            document.getElementById('tab-expenses').classList.add('text-slate-400');

            document.getElementById('content-' + tabName).classList.remove('hidden');
            const activeTab = document.getElementById('tab-' + tabName);
            activeTab.classList.remove('text-slate-400');
            activeTab.classList.add('text-indigo-600', 'border-b-2', 'border-indigo-600', 'bg-indigo-50/50');
        }
    </script>
</x-app-layout>
