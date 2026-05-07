<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Kalkulator Topup - YASS Game Store</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: { extend: {
                fontFamily: { inter: ['Inter','sans-serif'], space: ['Space Grotesk','sans-serif'] },
                colors: { background: "#060e20", surface: "#0b1326", "surface-light": "#171f33", primary: "#0074D9" }
            }}
        };
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .glass-panel { background: rgba(255,255,255,0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.08); }
        .game-tab { transition: all 0.2s ease; }
        .game-tab.active { background: rgba(0, 116, 217, 0.2); border-color: rgba(0, 116, 217, 0.6); color: #fff; }
        .result-row { transition: all 0.3s ease; }
        @keyframes fadeUp { from { opacity:0; transform: translateY(8px); } to { opacity:1; transform: translateY(0); } }
        .fade-up { animation: fadeUp 0.3s ease forwards; }
    </style>
</head>
<body class="bg-background text-slate-100 antialiased min-h-screen flex flex-col pt-[72px]">

<header class="fixed top-0 w-full z-50 bg-[#060e20]/80 backdrop-blur-lg border-b border-white/5 shadow-xl">
    <div class="flex items-center justify-between px-4 md:px-6 py-3 md:py-4 max-w-[1280px] mx-auto">
        <a class="text-xl md:text-2xl font-black italic tracking-tighter text-blue-500 flex items-center gap-2" href="/">
            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
            YASS
        </a>
        <a href="/" class="text-sm font-semibold text-slate-300 hover:text-white flex items-center gap-1 bg-white/5 px-4 py-2 rounded-full transition-colors">
            <span class="material-symbols-outlined text-[18px]">home</span> Kembali
        </a>
    </div>
</header>

<main class="flex-grow max-w-[800px] mx-auto w-full px-4 md:px-6 py-10 md:py-12">
    <!-- Hero -->
    <div class="text-center mb-8 md:mb-12">
        <div class="w-16 h-16 rounded-2xl bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-emerald-400 text-4xl" style="font-variation-settings: 'FILL' 1;">calculate</span>
        </div>
        <h1 class="font-display text-3xl md:text-4xl font-bold text-white mb-2">Kalkulator Topup</h1>
        <p class="text-slate-400">Hitung berapa Diamond/VP/UC yang bisa Anda dapatkan dari budget Anda.</p>
    </div>

    <!-- Game Tabs -->
    <div class="flex gap-2 flex-wrap justify-center mb-8" id="game-tabs">
        <button onclick="setGame('mlbb')" data-game="mlbb" class="game-tab active glass-panel px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold text-slate-300 flex items-center gap-2">
            <span class="text-lg">💎</span> Mobile Legends
        </button>
        <button onclick="setGame('ff')" data-game="ff" class="game-tab glass-panel px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold text-slate-300 flex items-center gap-2">
            <span class="text-lg">🔥</span> Free Fire
        </button>
        <button onclick="setGame('pubg')" data-game="pubg" class="game-tab glass-panel px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold text-slate-300 flex items-center gap-2">
            <span class="text-lg">🎯</span> PUBG Mobile
        </button>
        <button onclick="setGame('valorant')" data-game="valorant" class="game-tab glass-panel px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold text-slate-300 flex items-center gap-2">
            <span class="text-lg">⚡</span> Valorant
        </button>
        <button onclick="setGame('genshin')" data-game="genshin" class="game-tab glass-panel px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold text-slate-300 flex items-center gap-2">
            <span class="text-lg">✨</span> Genshin Impact
        </button>
        <button onclick="setGame('hsr')" data-game="hsr" class="game-tab glass-panel px-4 py-2 rounded-xl border border-white/10 text-sm font-semibold text-slate-300 flex items-center gap-2">
            <span class="text-lg">🚂</span> Honkai: Star Rail
        </button>
    </div>

    <!-- Calculator Card -->
    <div class="glass-panel rounded-2xl p-6 md:p-8 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
            <!-- Input Budget -->
            <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">Budget Anda (Rp)</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm font-bold">Rp</span>
                    <input
                        id="budget-input"
                        type="number"
                        placeholder="50000"
                        min="0"
                        oninput="calculate()"
                        class="w-full bg-[#0b1326] border border-white/10 focus:border-emerald-500/70 focus:ring-1 focus:ring-emerald-500/50 text-slate-200 placeholder-slate-600 rounded-xl pl-12 pr-4 py-4 text-lg font-bold outline-none transition-all"
                    />
                </div>
                <!-- Quick Budget Presets -->
                <div class="flex gap-2 flex-wrap mt-3">
                    <button onclick="setBudget(20000)" class="text-xs text-slate-400 hover:text-white bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg transition-colors">Rp20k</button>
                    <button onclick="setBudget(50000)" class="text-xs text-slate-400 hover:text-white bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg transition-colors">Rp50k</button>
                    <button onclick="setBudget(100000)" class="text-xs text-slate-400 hover:text-white bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg transition-colors">Rp100k</button>
                    <button onclick="setBudget(200000)" class="text-xs text-slate-400 hover:text-white bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg transition-colors">Rp200k</button>
                    <button onclick="setBudget(500000)" class="text-xs text-slate-400 hover:text-white bg-white/5 hover:bg-white/10 px-3 py-1.5 rounded-lg transition-colors">Rp500k</button>
                </div>
            </div>

            <!-- Result Big Display -->
            <div class="bg-gradient-to-br from-emerald-500/10 to-cyan-500/10 border border-emerald-500/20 rounded-2xl p-5 text-center">
                <p class="text-xs font-bold text-emerald-400/70 uppercase tracking-widest mb-2">Estimasi yang Didapat</p>
                <div id="main-result" class="font-display text-4xl md:text-5xl font-extrabold text-emerald-300 mb-1 fade-up">-</div>
                <div id="main-currency" class="text-sm text-slate-400">Pilih game & masukkan budget</div>
            </div>
        </div>
    </div>

    <!-- Breakdown Table -->
    <div class="glass-panel rounded-2xl overflow-hidden">
        <div class="p-5 md:p-6 border-b border-white/5 flex items-center gap-2">
            <span class="material-symbols-outlined text-blue-400 text-[20px]">format_list_bulleted</span>
            <h2 class="font-semibold text-white text-sm">Pilihan Paket Terdekat</h2>
        </div>
        <div id="breakdown-table" class="divide-y divide-white/5">
            <div class="flex items-center justify-center gap-3 text-slate-500 py-10 text-sm">
                <span class="material-symbols-outlined text-2xl">arrow_upward</span>
                Masukkan budget untuk melihat pilihan paket yang tersedia.
            </div>
        </div>
    </div>
</main>

<script>
    const gameData = {
        mlbb: {
            currency: 'Diamonds',
            emoji: '💎',
            color: 'blue',
            packages: [
                { name:'5 Diamonds', price:1500, amount:5, bonus:0 },
                { name:'12 Diamonds', price:3500, amount:12, bonus:1 },
                { name:'50 Diamonds', price:14500, amount:50, bonus:5 },
                { name:'70 Diamonds', price:20000, amount:70, bonus:7 },
                { name:'140 Diamonds', price:40000, amount:140, bonus:14 },
                { name:'284 Diamonds', price:80000, amount:284, bonus:28 },
                { name:'429 Diamonds', price:120000, amount:429, bonus:42 },
                { name:'706 Diamonds', price:200000, amount:706, bonus:70 },
                { name:'1084 Diamonds', price:300000, amount:1084, bonus:108 },
                { name:'1446 Diamonds', price:400000, amount:1446, bonus:144 },
            ]
        },
        ff: {
            currency: 'Diamonds FF',
            emoji: '🔥',
            color: 'orange',
            packages: [
                { name:'5 Diamonds', price:1000, amount:5, bonus:0 },
                { name:'50 Diamonds', price:8000, amount:50, bonus:5 },
                { name:'70 Diamonds', price:10000, amount:70, bonus:10 },
                { name:'140 Diamonds', price:20000, amount:140, bonus:20 },
                { name:'355 Diamonds', price:50000, amount:355, bonus:50 },
                { name:'720 Diamonds', price:100000, amount:720, bonus:100 },
                { name:'1450 Diamonds', price:200000, amount:1450, bonus:200 },
            ]
        },
        pubg: {
            currency: 'Unknown Cash (UC)',
            emoji: '🎯',
            color: 'amber',
            packages: [
                { name:'60 UC', price:14000, amount:60, bonus:0 },
                { name:'325 UC', price:70000, amount:325, bonus:25 },
                { name:'660 UC', price:140000, amount:660, bonus:60 },
                { name:'1800 UC', price:350000, amount:1800, bonus:300 },
                { name:'3850 UC', price:700000, amount:3850, bonus:850 },
                { name:'8100 UC', price:1400000, amount:8100, bonus:2100 },
            ]
        },
        valorant: {
            currency: 'Valorant Points (VP)',
            emoji: '⚡',
            color: 'red',
            packages: [
                { name:'125 VP', price:15000, amount:125, bonus:0 },
                { name:'420 VP', price:50000, amount:420, bonus:0 },
                { name:'700 VP', price:80000, amount:700, bonus:0 },
                { name:'1375 VP', price:150000, amount:1375, bonus:0 },
                { name:'2400 VP', price:250000, amount:2400, bonus:0 },
                { name:'4000 VP', price:400000, amount:4000, bonus:0 },
                { name:'8150 VP', price:800000, amount:8150, bonus:0 },
            ]
        },
        genshin: {
            currency: 'Genesis Crystals',
            emoji: '✨',
            color: 'yellow',
            packages: [
                { name:'60 Genesis Crystals', price:12000, amount:60, bonus:0 },
                { name:'300 Genesis Crystals', price:60000, amount:300, bonus:30 },
                { name:'980 Genesis Crystals', price:190000, amount:980, bonus:110 },
                { name:'1980 Genesis Crystals', price:380000, amount:1980, bonus:260 },
                { name:'3280 Genesis Crystals', price:630000, amount:3280, bonus:600 },
                { name:'6480 Genesis Crystals', price:1250000, amount:6480, bonus:1600 },
            ]
        },
        hsr: {
            currency: 'Oneiric Shards',
            emoji: '🚂',
            color: 'purple',
            packages: [
                { name:'60 Oneiric Shards', price:12000, amount:60, bonus:0 },
                { name:'300 Oneiric Shards', price:60000, amount:300, bonus:30 },
                { name:'980 Oneiric Shards', price:190000, amount:980, bonus:110 },
                { name:'1980 Oneiric Shards', price:380000, amount:1980, bonus:260 },
                { name:'3280 Oneiric Shards', price:630000, amount:3280, bonus:600 },
                { name:'6480 Oneiric Shards', price:1250000, amount:6480, bonus:1600 },
            ]
        }
    };

    let currentGame = 'mlbb';

    function setGame(game) {
        currentGame = game;
        document.querySelectorAll('.game-tab').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.game === game);
        });
        calculate();
    }

    function setBudget(val) {
        document.getElementById('budget-input').value = val;
        calculate();
    }

    function formatRupiah(n) {
        return 'Rp ' + Number(n).toLocaleString('id-ID');
    }

    function calculate() {
        const budget = parseInt(document.getElementById('budget-input').value) || 0;
        const game = gameData[currentGame];
        const mainResult = document.getElementById('main-result');
        const mainCurrency = document.getElementById('main-currency');
        const breakdownTable = document.getElementById('breakdown-table');

        if (!budget || budget <= 0) {
            mainResult.textContent = '-';
            mainCurrency.textContent = 'Pilih game & masukkan budget';
            breakdownTable.innerHTML = `<div class="flex items-center justify-center gap-3 text-slate-500 py-10 text-sm"><span class="material-symbols-outlined text-2xl">arrow_upward</span>Masukkan budget untuk melihat pilihan paket yang tersedia.</div>`;
            return;
        }

        // Find best single package
        let bestPackage = null;
        let bestValue = 0;
        game.packages.forEach(pkg => {
            if (pkg.price <= budget) {
                const total = pkg.amount + pkg.bonus;
                if (total > bestValue) { bestValue = total; bestPackage = pkg; }
            }
        });

        if (bestPackage) {
            mainResult.textContent = (bestPackage.amount + bestPackage.bonus).toLocaleString('id-ID');
            mainCurrency.textContent = `${game.emoji} ${game.currency} dari paket ${bestPackage.name}`;
        } else {
            mainResult.textContent = '0';
            mainCurrency.textContent = `Budget tidak cukup untuk paket terendah (${formatRupiah(game.packages[0].price)})`;
        }

        // Build breakdown table showing all affordable packages
        let rows = '';
        const affordablePkgs = game.packages.filter(p => p.price <= budget);
        const cheapest = game.packages[0];

        if (affordablePkgs.length === 0) {
            rows = `<div class="flex items-center justify-center gap-2 text-amber-400 py-8 text-sm">
                <span class="material-symbols-outlined">warning</span>
                Budget kurang. Minimum: <strong>${formatRupiah(cheapest.price)}</strong> untuk ${cheapest.name}
            </div>`;
        } else {
            const sorted = [...affordablePkgs].reverse();
            sorted.forEach((pkg, i) => {
                const total = pkg.amount + pkg.bonus;
                const isRecommended = bestPackage && pkg.name === bestPackage.name;
                rows += `
                <div class="result-row flex items-center justify-between px-5 md:px-6 py-4 ${isRecommended ? 'bg-blue-500/10' : 'hover:bg-white/5'} transition-colors fade-up" style="animation-delay:${i*0.05}s">
                    <div class="flex items-center gap-3">
                        ${isRecommended ? '<span class="material-symbols-outlined text-blue-400 text-[18px]" style="font-variation-settings: \'FILL\' 1">star</span>' : '<span class="material-symbols-outlined text-slate-600 text-[18px]">radio_button_unchecked</span>'}
                        <div>
                            <p class="text-sm font-semibold text-white">${pkg.name}</p>
                            ${pkg.bonus > 0 ? `<p class="text-xs text-emerald-400">+${pkg.bonus.toLocaleString('id-ID')} Bonus</p>` : ''}
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold ${isRecommended ? 'text-blue-300' : 'text-white'}">${formatRupiah(pkg.price)}</p>
                        <p class="text-xs text-slate-400">Total ${total.toLocaleString('id-ID')} ${game.currency}</p>
                    </div>
                </div>`;
            });
        }

        breakdownTable.innerHTML = rows;
    }
</script>

</body>
</html>
