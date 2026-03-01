<x-app-layout>
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-black text-slate-800">Dépenses de {{ $colocation->name }}</h2>
                <p class="text-slate-500">Gestion des frais du quotidien.</p>
            </div>
            <a href="{{ route('depenses.create', $colocation) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-bold transition-all">
                + Ajouter une dépense
            </a>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-slate-400 text-sm uppercase tracking-wider font-bold">Total des dépenses</p>
            <p class="text-4xl font-black text-slate-900">{{ number_format($total, 2) }} €</p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th class="p-4 font-bold text-slate-600">Date</th>
                        <th class="p-4 font-bold text-slate-600">Description</th>
                        <th class="p-4 font-bold text-slate-600">Payé par</th>
                        <th class="p-4 font-bold text-slate-600 text-right">Montant</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($depenses as $depense)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-4 text-slate-500">{{ $depense->created_at->format('d/m/Y') }}</td>
                            <td class="p-4 font-medium text-slate-800">{{ $depense->description }}</td>
                            <td class="p-4 text-slate-600">{{ $depense->user->firstname }}</td>
                            <td class="p-4 text-right font-black text-emerald-600">{{ number_format($depense->amount, 2) }} €</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-slate-400">Aucune dépense enregistrée pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>