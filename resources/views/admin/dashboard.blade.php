<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <h1 class="text-3xl font-black text-slate-900 uppercase italic mb-10">Nexus Control <span class="text-indigo-600">Admin</span></h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Utilisateurs</p>
                <p class="text-3xl font-black italic text-slate-900">{{ $stats['total_users'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Colocations</p>
                <p class="text-3xl font-black italic text-slate-900">{{ $stats['total_colocations'] }}</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest">Flux Total</p>
                <p class="text-3xl font-black italic text-indigo-600">{{ number_format($stats['total_spent'], 2) }} €</p>
            </div>
            <div class="bg-red-50 p-6 rounded-3xl border border-red-100 shadow-sm">
                <p class="text-red-400 text-[10px] font-black uppercase tracking-widest">Bannis</p>
                <p class="text-3xl font-black italic text-red-600">{{ $stats['banned_users'] }}</p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-slate-400">Utilisateur</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-slate-400">Email</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-slate-400">Réputation</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase text-slate-400 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($users as $user)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-8 py-5">
                                <span class="font-bold text-slate-900">{{ $user->firstname }} {{ $user->lastname }}</span>
                                @if($user->is_admin) <span class="ml-2 text-[9px] bg-indigo-100 text-indigo-600 px-2 py-0.5 rounded-full font-black uppercase">Staff</span> @endif
                            </td>
                            <td class="px-8 py-5 text-slate-500 text-sm font-medium">{{ $user->email }}</td>
                            <td class="px-8 py-5">
                                <span class="font-black italic text-slate-700">{{ $user->reputation_score }} pts</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <form action="{{ route('admin.users.ban', $user) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-[10px] font-black uppercase tracking-widest {{ $user->is_banned ? 'text-emerald-500' : 'text-red-500' }}">
                                        {{ $user->is_banned ? 'Débannir' : 'Bannir' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-6">
                {{ $users->links() }}
            </div>
        </div>

    </div>
</x-app-layout>