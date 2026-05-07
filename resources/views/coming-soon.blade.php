<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $title }} - YASS Game Store</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet"/>
    <script>tailwind.config = { darkMode: "class", theme: { extend: { fontFamily: { inter: ['Inter', 'sans-serif'], space: ['Space Grotesk', 'sans-serif'] }, colors: { background: "#060e20", surface: "#0b1326", primary: "#0074D9" } } } };</script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        @keyframes pulse-ring { 0%,100%{transform:scale(1);opacity:0.5} 50%{transform:scale(1.15);opacity:0.2} }
        .pulse-ring { animation: pulse-ring 3s ease-in-out infinite; }
        @keyframes float { 0%,100%{transform:translateY(0px)} 50%{transform:translateY(-12px)} }
        .float { animation: float 4s ease-in-out infinite; }
    </style>
</head>
<body class="bg-background text-slate-100 antialiased min-h-screen flex flex-col">

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

<main class="flex-grow flex items-center justify-center px-4 py-20 md:py-0">
    <div class="text-center max-w-lg mx-auto">
        <!-- Pulsing Rings Animation -->
        <div class="relative w-40 h-40 mx-auto mb-10">
            <div class="pulse-ring absolute inset-0 rounded-full bg-blue-500/10 border border-blue-500/20"></div>
            <div class="pulse-ring absolute inset-4 rounded-full bg-blue-500/10 border border-blue-500/20" style="animation-delay: 0.5s"></div>
            <div class="float relative w-full h-full rounded-full bg-gradient-to-br from-blue-600/30 to-cyan-500/20 border border-blue-500/30 flex items-center justify-center">
                <span class="material-symbols-outlined text-blue-400" style="font-size: 64px; font-variation-settings: 'FILL' 1;">{{ $icon }}</span>
            </div>
        </div>

        <span class="inline-block px-4 py-1.5 mb-6 bg-amber-500/10 border border-amber-500/30 rounded-full text-amber-400 text-xs font-bold uppercase tracking-widest">
            Segera Hadir
        </span>

        <h1 class="font-display text-4xl md:text-5xl font-bold text-white mb-4">{{ $title }}</h1>
        <p class="text-slate-400 text-base md:text-lg mb-10 leading-relaxed">{{ $description }}</p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="/" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-8 py-3 rounded-xl transition-colors shadow-lg shadow-blue-500/30">
                <span class="material-symbols-outlined text-[20px]">home</span> Kembali ke Beranda
            </a>
        </div>
    </div>
</main>

</body>
</html>
