<x-app-layout>
    <x-slot name="header">
        Tableau de bord
    </x-slot>

    <div class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total ce mois</span>
                </div>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-black text-slate-900">1 240,50</span>
                    <span class="text-lg font-bold text-slate-400">€</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm italic">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-2xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Mon Solde</span>
                </div>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-black text-emerald-600">+ 42,00</span>
                    <span class="text-lg font-bold text-emerald-400">€</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-amber-50 text-amber-600 rounded-2xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z" /></svg>
                    </div>
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Réputation</span>
                </div>
                <div class="flex items-baseline gap-2">
                    <span class="text-3xl font-black text-slate-900">+{{ Auth::user()->reputation ?? 0 }}</span>
                    <span class="text-sm font-bold text-amber-500">Score</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                        <h3 class="font-bold text-lg text-slate-800">Membres de la colocation</h3>
                        <button class="text-indigo-600 text-sm font-bold hover:underline">Inviter +</button>
                    </div>
                    <div class="divide-y divide-slate-50">
                        <div class="p-6 flex items-center justify-between hover:bg-slate-50 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 flex items-center justify-center font-bold text-slate-600">JD</div>
                                <div>
                                    <p class="font-bold text-slate-900">Jean Dupont</p>
                                    <span class="text-xs font-medium px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full uppercase">Owner</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-bold text-rose-500">Doit 120,00 €</p>
                                <p class="text-xs text-slate-400">Réputation: +5</p>
                            </div>
                        </div>

                        <div class="p-6 flex items-center justify-between hover:bg-slate-50 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-600 flex items-center justify-center font-bold text-white italic">SM</div>
                                <div>
                                    <p class="font-bold text-slate-900">Sarah Martin</p>
                                    <span class="text-xs font-medium px-2 py-0.5 bg-slate-100 text-slate-600 rounded-full uppercase">Member</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-bold text-emerald-500">À recevoir 78,00 €</p>
                                <p class="text-xs text-slate-400">Réputation: +12</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-indigo-600 p-8 rounded-[2.5rem] text-white shadow-xl shadow-indigo-100 relative overflow-hidden group">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-2">Une dépense ?</h3>
                        <p class="text-indigo-100 text-sm mb-6 opacity-80">Ajoutez-la maintenant pour mettre à jour les soldes automatiquement.</p>
                        <a href="#" class="block w-full py-4 bg-white text-indigo-600 text-center rounded-2xl font-black shadow-lg hover:bg-indigo-50 transition transform group-hover:scale-[1.02]">
                            + Ajouter une dépense
                        </a>
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-2xl transition group-hover:bg-white/20"></div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <h4 class="font-bold text-slate-900 mb-4">À savoir</h4>
                    <div class="space-y-4">
                        <div class="flex gap-3 items-start">
                            <div class="w-2 h-2 mt-1.5 rounded-full bg-amber-400 flex-shrink-0"></div>
                            <p class="text-xs text-slate-500">Un départ avec une dette entraîne une pénalité de réputation de <span class="font-bold text-slate-700">-1</span>.</p>
                        </div>
                        <div class="flex gap-3 items-start">
                            <div class="w-2 h-2 mt-1.5 rounded-full bg-indigo-400 flex-shrink-0"></div>
                            <p class="text-xs text-slate-500">Seul l'<strong>Owner</strong> peut supprimer ou retirer des membres de la colocation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>