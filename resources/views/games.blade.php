<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Semua Game - YASS Game Store</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet"/>
    <script>tailwind.config = { darkMode: "class", theme: { extend: { fontFamily: { inter: ['Inter','sans-serif'], space: ['Space Grotesk','sans-serif'] }, colors: { background: "#060e20", surface: "#0b1326", primary: "#0074D9" } } } };</script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .glass-panel { background: rgba(255,255,255,0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.08); }
        .glass-panel:hover { border-color: rgba(0,116,217,0.5); box-shadow: 0 0 25px rgba(0,116,217,0.15); }
        .game-card.hidden-card { display: none; }
    </style>
</head>
<body class="bg-background text-slate-100 antialiased min-h-screen flex flex-col pt-[72px]">

<header class="fixed top-0 w-full z-50 bg-[#060e20]/80 backdrop-blur-lg border-b border-white/5 shadow-xl">
    <div class="flex items-center justify-between px-4 md:px-6 py-3 md:py-4 max-w-[1280px] mx-auto">
        <a class="text-xl md:text-2xl font-black italic tracking-tighter text-blue-500 flex items-center gap-2" href="/">
            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
            YASS
        </a>
        <div class="flex items-center gap-3">
            <!-- Search Bar -->
            <div class="flex items-center bg-[#0b1326] rounded-full px-4 py-2 border border-white/10 focus-within:border-blue-500/50 transition-all">
                <span class="material-symbols-outlined text-slate-400 mr-2 text-lg">search</span>
                <input id="search-games" type="text" placeholder="Cari game..." class="bg-transparent border-none text-sm text-slate-200 placeholder-slate-500 focus:ring-0 focus:outline-none w-36 md:w-48"/>
            </div>
            <a href="/" class="text-sm font-semibold text-slate-300 hover:text-white flex items-center gap-1 bg-white/5 px-4 py-2 rounded-full transition-colors">
                <span class="material-symbols-outlined text-[18px]">home</span> Kembali
            </a>
        </div>
    </div>
</header>

<main class="flex-grow max-w-[1280px] mx-auto w-full px-4 md:px-6 py-8 md:py-12">
    <!-- Header -->
    <div class="flex items-center gap-4 mb-8 md:mb-10 border-b border-white/10 pb-6">
        <div class="w-14 h-14 rounded-2xl bg-orange-500/20 flex items-center justify-center border border-orange-500/30">
            <span class="material-symbols-outlined text-orange-400 text-3xl" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
        </div>
        <div>
            <h1 class="font-display text-2xl md:text-4xl font-bold text-white mb-0.5">Semua Game</h1>
            <p class="text-sm md:text-base text-slate-400">Pilih game untuk melakukan topup.</p>
        </div>
    </div>

    <!-- No result state -->
    <div id="no-result" class="hidden text-center py-20">
        <span class="material-symbols-outlined text-5xl text-slate-600 mb-4 block">search_off</span>
        <p class="text-slate-400 text-lg">Game "<span id="no-result-keyword" class="text-white font-semibold"></span>" tidak ditemukan.</p>
        <p class="text-slate-500 text-sm mt-1">Coba kata kunci lain.</p>
    </div>

    <!-- Games Grid -->
    <div id="games-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 md:gap-6">
        @foreach($games as $game)
        <a class="game-card glass-panel rounded-2xl p-4 md:p-5 flex flex-col items-center text-center gap-3 md:gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2"
           href="/order/{{ $game['slug'] }}"
           data-name="{{ strtolower($game['name']) }}"
           data-publisher="{{ strtolower($game['publisher']) }}">
            @if($game['tag'])
                @php
                    $tagClasses = match($game['tag_color']) {
                        'red' => 'from-orange-500 to-red-500',
                        'blue' => 'from-blue-500 to-cyan-500',
                        'purple' => 'from-purple-500 to-pink-500',
                        'yellow' => 'from-yellow-500 to-amber-400',
                        default => 'from-slate-500 to-slate-400'
                    };
                @endphp
                <div class="absolute top-0 right-0 bg-gradient-to-bl {{ $tagClasses }} text-white text-[9px] md:text-[10px] px-3 py-1 rounded-bl-xl font-bold z-10 uppercase tracking-wider shadow-lg">{{ $game['tag'] }}</div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
            <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-white/10 group-hover:border-blue-400/50 transition-colors z-10">
                <img alt="{{ $game['name'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                     src="{{ asset('assets/images/games/icons/' . $game['icon']) }}"
                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($game['name']) }}&background=0D8ABC&color=fff&size=128&font-size=0.33'"/>
            </div>
            <div class="z-10 mt-1 w-full">
                <h3 class="text-sm md:text-base font-bold text-white mb-0.5 group-hover:text-blue-400 transition-colors line-clamp-1">{{ $game['name'] }}</h3>
                <p class="text-[10px] md:text-xs font-medium text-slate-400">{{ $game['publisher'] }}</p>
                <p class="text-[10px] text-slate-500 mt-1">{{ $game['description'] }}</p>
            </div>
        </a>
        @endforeach
    </div>
</main>

<script>
    const searchInput = document.getElementById('search-games');
    const cards = document.querySelectorAll('.game-card');
    const noResult = document.getElementById('no-result');
    const noResultKw = document.getElementById('no-result-keyword');
    const grid = document.getElementById('games-grid');

    function filterCards(q) {
        q = q.toLowerCase();
        let visibleCount = 0;
        cards.forEach(card => {
            const name = card.dataset.name;
            const pub = card.dataset.publisher;
            const match = !q || name.includes(q) || pub.includes(q);
            card.classList.toggle('hidden-card', !match);
            if (match) visibleCount++;
        });
        if (visibleCount === 0 && q !== '') {
            noResult.classList.remove('hidden');
            grid.classList.add('hidden');
            noResultKw.textContent = q;
        } else {
            noResult.classList.add('hidden');
            grid.classList.remove('hidden');
        }
    }

    searchInput.addEventListener('input', function () { filterCards(this.value.trim()); });

    // Auto-fill from URL query param
    const urlParams = new URLSearchParams(window.location.search);
    const q = urlParams.get('q');
    if (q) {
        searchInput.value = q;
        filterCards(q);
    }
</script>
</body>
</html>
