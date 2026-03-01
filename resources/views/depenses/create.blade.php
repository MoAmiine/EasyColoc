<x-app-layout>
    <div class="max-w-2xl mx-auto space-y-6">
        <div>
            <h2 class="text-2xl font-black text-slate-800">Nouvelle dépense</h2>
            <p class="text-slate-500">Sélectionnez la colocation concernée.</p>
        </div>

        <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm">
            <form action="{{ route('depenses.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Choisir la colocation</label>
                    <select name="colocation_id" required 
                            class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Sélectionner --</option>
                        @foreach($colocations as $colocation)
                            <option value="{{ $colocation->id }}">{{ $colocation->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                    <input type="text" name="description" required 
                           class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Ex: Courses alimentaires">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Montant (€)</label>
                    <input type="number" step="0.01" name="amount" required 
                           class="w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="0.00">
                </div>

                <button type="submit" 
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-indigo-500/20">
                    Enregistrer la dépense
                </button>
            </form>
        </div>
    </div>
</x-app-layout>