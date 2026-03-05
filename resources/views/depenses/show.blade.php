<x-app-layout>
    <x-slot name="header">
        Détail Dépense - {{ $colocation->name }}
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-8">
        
        <div class="flex items-center gap-4">
            <a href="{{ route('colocation.show', $colocation) }}" class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600 hover:bg-slate-200 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-black text-slate-800 uppercase italic tracking-tight">{{ $depense->title }}</h2>
                <p class="text-slate-400 text-sm">{{ $depense->spent_at->format('d/m/Y') }}</p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6 bg-indigo-50 rounded-2xl">
                    <p class="text-[10px] font-black text-indigo-400 uppercase tracking-widest mb-2">Montant total</p>
                    <p class="text-4xl font-black text-indigo-600">{{ number_format($depense->amount, 2, ',', ' ') }} €</p>
                </div>
                
                <div class="text-center p-6 bg-emerald-50 rounded-2xl">
                    <p class="text-[10px] font-black text-emerald-600 uppercase tracking-widest mb-2">Part par personne</p>
                    <p class="text-4xl font-black text-emerald-600">{{ number_format($sharePerPerson, 2, ',', ' ') }} €</p>
                </div>
                
                <div class="text-center p-6 bg-slate-50 rounded-2xl">
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Membres</p>
                    <p class="text-4xl font-black text-slate-700">{{ $membersData->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm">
            <h3 class="text-xl font-black text-slate-900 uppercase italic tracking-tight mb-6 flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a1 1 0 11-2 0 1 1 0 012 0z"/>
                    </svg>
                </div>
                Payé par
            </h3>
            
            <div class="flex items-center gap-4 p-4 bg-emerald-50 rounded-2xl border-2 border-emerald-200">
                <div class="w-14 h-14 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-black text-xl">
                    {{ strtoupper(substr($depense->user->firstname, 0, 1)) }}
                </div>
                <div>
                    <p class="font-bold text-slate-900 text-lg">{{ $depense->user->firstname }} {{ $depense->user->lastname }}</p>
                    <p class="text-emerald-600 font-bold text-sm">A avancé {{ number_format($depense->amount, 2, ',', ' ') }} €</p>
                </div>
                <div class="ml-auto">
                    <span class="px-4 py-2 bg-emerald-500 text-white rounded-xl text-xs font-black uppercase tracking-widest">
                        Payeur
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-50 p-8 shadow-sm">
            <h3 class="text-xl font-black text-slate-900 uppercase italic tracking-tight mb-6 flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                Répartition
            </h3>

            <div class="space-y-3">
                @foreach($membersData as $data)
                    <div class="flex items-center justify-between p-4 rounded-2xl {{ $data['hasPaid'] ? 'bg-emerald-50 border-2 border-emerald-100' : 'bg-slate-50 border-2 border-slate-100' }}">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl {{ $data['hasPaid'] ? 'bg-emerald-500 text-white' : 'bg-slate-300 text-slate-600' }} flex items-center justify-center font-bold relative">
                                {{ strtoupper(substr($data['user']->firstname, 0, 1)) }}
                                @if($data['hasPaid'] && $data['user']->id !== $depense->user_id)
                                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-emerald-600 rounded-full flex items-center justify-center">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">
                                    {{ $data['user']->firstname }} {{ $data['user']->lastname }}
                                    @if($data['user']->id === Auth::id())
                                        <span class="text-indigo-500 text-sm">(vous)</span>
                                    @endif
                                </p>
                                @if($data['user']->id === $depense->user_id)
                                    <p class="text-emerald-600 text-sm font-bold">💰 A payé pour tout le monde</p>
                                @elseif($data['hasPaid'])
                                    <p class="text-emerald-600 text-sm font-bold">✓ A remboursé sa part</p>
                                @else
                                    <p class="text-rose-500 text-sm font-bold">⏳ Doit encore payer</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="text-right">
                            @if($data['user']->id === $depense->user_id)
                                <p class="text-2xl font-black text-emerald-600">+{{ number_format($data['shouldReceive'], 2, ',', ' ') }} €</p>
                                <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">À recevoir</p>
                            @elseif($data['hasPaid'])
                                <p class="text-2xl font-black text-emerald-600">0,00 €</p>
                                <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Payé</p>
                            @else
                                <p class="text-2xl font-black text-rose-600">-{{ number_format($data['owes'], 2, ',', ' ') }} €</p>
                                <p class="text-[10px] font-bold text-rose-500 uppercase tracking-widest">À payer</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @php
            $currentUserData = $membersData->firstWhere('user.id', Auth::id());
        @endphp
        
        @if($currentUserData && !$currentUserData['hasPaid'] && Auth::id() !== $depense->user_id)
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-[2.5rem] p-8 text-white shadow-xl shadow-indigo-200">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-indigo-100 text-sm font-bold uppercase tracking-widest mb-1">Votre part à payer</p>
                        <p class="text-4xl font-black">{{ number_format($currentUserData['owes'], 2, ',', ' ') }} €</p>
                        <p class="text-indigo-100 text-sm mt-2">À rembourser à {{ $depense->user->firstname }}</p>
                    </div>
                    <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                
                <form action="{{ route('paiements.payer', [$colocation, $depense]) }}" method="POST">
                    @csrf
                    <button type="submit" 
                            class="w-full py-4 bg-white text-indigo-600 rounded-2xl font-black text-lg uppercase tracking-widest hover:bg-indigo-50 transition shadow-lg flex items-center justify-center gap-3 group">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a1 1 0 11-2 0 1 1 0 012 0z"/>
                        </svg>
                        Payer {{ number_format($currentUserData['owes'], 2, ',', ' ') }} €
                    </button>
                </form>
            </div>
            
        @elseif($currentUserData && $currentUserData['hasPaid'] && Auth::id() !== $depense->user_id)
            <div class="bg-emerald-500 rounded-[2.5rem] p-8 text-white shadow-xl shadow-emerald-200">
                <div class="flex items-center justify-center gap-4">
                    <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-emerald-100 text-sm font-bold uppercase tracking-widest">Statut</p>
                        <p class="text-2xl font-black">Vous avez payé votre part</p>
                        <p class="text-emerald-100">{{ number_format($sharePerPerson, 2, ',', ' ') }} € payés à {{ $depense->user->firstname }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(Auth::id() === $colocation->owner_id || Auth::id() === $depense->user_id)
            <div class="flex justify-end gap-4">
                <a href="{{ route('depenses.edit', [$colocation, $depense]) }}" 
                   class="px-6 py-3 bg-white border-2 border-indigo-200 text-indigo-600 rounded-2xl text-sm font-black uppercase tracking-widest hover:bg-indigo-50 transition">
                    Modifier
                </a>
            </div>
        @endif
    </div>
</x-app-layout>