<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Cek Transaksi - YASS Game Store</title>
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

<main class="flex-grow max-w-[600px] mx-auto w-full px-4 md:px-6 py-10 md:py-16">
    <!-- Hero -->
    <div class="text-center mb-10">
        <div class="w-16 h-16 rounded-2xl bg-blue-500/20 border border-blue-500/30 flex items-center justify-center mx-auto mb-6">
            <span class="material-symbols-outlined text-blue-400 text-4xl" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
        </div>
        <h1 class="font-display text-3xl md:text-4xl font-bold text-white mb-2">Cek Transaksi</h1>
        <p class="text-slate-400">Masukkan nomor invoice untuk melihat status transaksi Anda.</p>
    </div>

    <!-- Form -->
    <div class="glass-panel rounded-2xl p-6 md:p-8">
        <label class="block text-sm font-semibold text-slate-300 mb-2" for="invoice-input">
            Nomor Invoice / Resi
        </label>
        <div class="flex gap-3">
            <div class="relative flex-grow">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-slate-500 text-[20px]">tag</span>
                <input
                    id="invoice-input"
                    type="text"
                    placeholder="Contoh: INV-20240501-ABCXYZ"
                    class="w-full bg-[#0b1326] border border-white/10 focus:border-blue-500/70 focus:ring-1 focus:ring-blue-500/50 text-slate-200 placeholder-slate-600 rounded-xl pl-11 pr-4 py-3.5 text-sm outline-none transition-all"
                />
            </div>
            <button onclick="cekTransaksi()" id="btn-cek" class="flex-shrink-0 inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-5 py-3 rounded-xl transition-colors shadow-lg shadow-blue-500/30">
                <span class="material-symbols-outlined text-[20px]">search</span>
                <span class="hidden sm:inline">Cek</span>
            </button>
        </div>
        <p class="text-xs text-slate-500 mt-3">Nomor invoice dikirim ke email Anda setelah melakukan transaksi.</p>

        <!-- Error State -->
        <div id="error-state" class="hidden mt-5 bg-red-500/10 border border-red-500/20 rounded-xl p-4 flex items-center gap-3">
            <span class="material-symbols-outlined text-red-400 flex-shrink-0">error</span>
            <p class="text-sm text-red-300">Nomor invoice tidak ditemukan. Periksa kembali dan coba lagi.</p>
        </div>
    </div>

    <!-- Recent: Hint -->
    <div class="mt-6 text-center">
        <p class="text-xs text-slate-600">Format: <span class="text-slate-400 font-mono">INV-YYYYMMDD-XXXXXX</span></p>
    </div>
</main>

<script>
    async function cekTransaksi() {
        const input = document.getElementById('invoice-input').value.trim();
        const btn = document.getElementById('btn-cek');
        const errorState = document.getElementById('error-state');

        if (!input) {
            document.getElementById('invoice-input').focus();
            return;
        }

        // Loading state
        btn.innerHTML = `<span class="material-symbols-outlined animate-spin text-[20px]">sync</span>`;
        btn.disabled = true;
        errorState.classList.add('hidden');

        // Langsung coba redirect ke halaman invoice
        // Jika tidak ada, Laravel akan 404 dan kita tangkap
        try {
            const response = await fetch(`/invoice/${encodeURIComponent(input)}`, { method: 'HEAD' });
            if (response.ok) {
                window.location.href = `/invoice/${encodeURIComponent(input)}`;
            } else {
                errorState.classList.remove('hidden');
                btn.innerHTML = `<span class="material-symbols-outlined text-[20px]">search</span><span class="hidden sm:inline">Cek</span>`;
                btn.disabled = false;
            }
        } catch (e) {
            errorState.classList.remove('hidden');
            btn.innerHTML = `<span class="material-symbols-outlined text-[20px]">search</span><span class="hidden sm:inline">Cek</span>`;
            btn.disabled = false;
        }
    }

    document.getElementById('invoice-input').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') cekTransaksi();
    });
</script>

</body>
</html>
