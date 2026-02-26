<x-admin-layout>
    <x-slot name="header">
        Panneau d'administration
    </x-slot>

    <div class="space-y-8">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Bienvenue Admin {{ Auth::user()->firstname }}</h2>
            <p class="text-slate-600">Vous êtes connecté avec des droits d'administrateur.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2z" /></svg>
                    </div>
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Utilisateurs</span>
                </div>
                <div class="text-3xl font-black text-slate-900">--</div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-rose-50 text-rose-600 rounded-2xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Utilisateurs Bannis</span>
                </div>
                <div class="text-3xl font-black text-slate-900">--</div>
            </div>

            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <div class="p-3 bg-emerald-50 text-emerald-600 rounded-2xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5.5m0 0H9m0 0H3.5m0 0H1" /></svg>
                    </div>
                    <span class="text-sm font-bold text-slate-500 uppercase tracking-wider">Colocations</span>
                </div>
                <div class="text-3xl font-black text-slate-900">--</div>
            </div>
        </div>

        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
            <h3 class="text-lg font-bold text-slate-900 mb-6">Gestion</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="#" class="p-6 border border-slate-200 rounded-2xl hover:border-indigo-300 hover:bg-indigo-50 transition">
                    <p class="font-bold text-slate-900 mb-2">Gérer les utilisateurs</p>
                    <p class="text-sm text-slate-600">Voir et gérer tous les utilisateurs</p>
                </a>
                <a href="#" class="p-6 border border-slate-200 rounded-2xl hover:border-rose-300 hover:bg-rose-50 transition">
                    <p class="font-bold text-slate-900 mb-2">Utilisateurs bannis</p>
                    <p class="text-sm text-slate-600">Gérer les utilisateurs bannis</p>
                </a>
                <a href="#" class="p-6 border border-slate-200 rounded-2xl hover:border-emerald-300 hover:bg-emerald-50 transition">
                    <p class="font-bold text-slate-900 mb-2">Colocations</p>
                    <p class="text-sm text-slate-600">Gérer les colocations</p>
                </a>
                <a href="#" class="p-6 border border-slate-200 rounded-2xl hover:border-amber-300 hover:bg-amber-50 transition">
                    <p class="font-bold text-slate-900 mb-2">Paramètres</p>
                    <p class="text-sm text-slate-600">Paramètres de l'application</p>
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
