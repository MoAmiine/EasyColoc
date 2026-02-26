<x-app-layout>
    <x-slot name="header">
        Tableau de bord
    </x-slot>

    <div class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-[2rem] border border-slate-50 shadow-sm flex items-center gap-5">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Solde Total</p>
                    <p class="text-2xl font-black text-slate-900">145.50 €</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-[2rem] border border-slate-50 shadow-sm flex items-center gap-5">
                <div class="w-14 h-14 bg-rose-50 text-rose-500 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Mes Dépenses</p>
                    <p class="text-2xl font-black text-slate-900">62.00 €</p>
                </div>
            </div>

            <div class="bg-slate-900 p-6 rounded-[2rem] shadow-lg shadow-slate-200 flex items-center gap-5">
                <div class="w-14 h-14 bg-white/10 text-amber-400 rounded-2xl flex items-center justify-center">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Score Réputation</p>
                    <p class="text-2xl font-black text-white">+{{ Auth::user()->reputation ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-50 shadow-sm overflow-hidden">
            <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                <h3 class="text-xl font-black text-slate-900 italic tracking-tight">Activité Récente</h3>
                <button class="text-xs font-bold text-indigo-600 hover:underline uppercase tracking-widest">Voir tout</button>
            </div>
            
            <div class="p-4">
                <div class="flex items-center justify-between p-4 hover:bg-slate-50 rounded-[1.5rem] transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center font-bold">
                            🛒
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-900">Courses hebdomadaires</p>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">Coloc : La Villa des Amis • Hier</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-black text-slate-900">- 42.00 €</p>
                        <p class="text-[10px] font-bold text-rose-500 uppercase tracking-widest">En attente</p>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 hover:bg-slate-50 rounded-[1.5rem] transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center font-bold">
                            💰
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-900">Remboursement Sarah</p>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">Virement reçu • Il y a 2 jours</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-black text-emerald-600">+ 15.00 €</p>
                        <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Confirmé</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-slate-50/50 border-t border-slate-50 text-center">
                <p class="text-xs text-slate-400 font-medium italic">Aucune autre activité à afficher pour le moment.</p>
            </div>
        </div>
    </div>
</x-app-layout>