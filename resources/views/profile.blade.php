<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 p-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-black text-slate-900 mb-8">Mon Profil</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="space-y-6">
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100 text-center">
                    <div class="w-24 h-24 bg-indigo-100 text-indigo-600 rounded-full mx-auto flex items-center justify-center text-2xl font-bold mb-4">
                        {{ substr(Auth::user()->firstname, 0, 1) }}{{ substr(Auth::user()->lastname, 0, 1) }}
                    </div>
                    <h2 class="font-bold text-xl text-slate-900">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
                    <p class="text-slate-500 text-sm mb-4">{{ Auth::user()->email }}</p>
                    <div class="inline-flex items-center px-4 py-2 bg-amber-50 text-amber-600 rounded-xl text-sm font-bold">
                        ⭐ Réputation : {{ Auth::user()->reputation ?? 0 }}
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                    <h3 class="text-lg font-bold mb-6">Informations personnelles</h3>
                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Prénom</label>
                            <input type="text" value="{{ Auth::user()->firstname }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-600 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nom</label>
                            <input type="text" value="{{ Auth::user()->lastname }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-600 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                            <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-600 outline-none transition">
                        </div>
                        <button class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition">Enregistrer</button>
                    </form>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                    <h3 class="text-lg font-bold text-rose-600 mb-6">Zone de danger</h3>
                    <p class="text-slate-500 text-sm mb-4">Une fois votre compte supprimé, toutes vos données de colocation seront anonymisées.</p>
                    <button class="px-6 py-3 bg-rose-50 text-rose-600 font-bold rounded-xl hover:bg-rose-100 transition">Supprimer mon compte</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>