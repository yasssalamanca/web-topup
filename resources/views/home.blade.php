<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>YASS Game Store - Premium Gaming Store</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                        space: ['Space Grotesk', 'sans-serif'],
                    },
                    colors: {
                        background: "#060e20",
                        surface: "#0b1326",
                        "surface-light": "#171f33",
                        primary: "#0074D9",
                        "primary-glow": "rgba(0,116,217,0.5)",
                    }
                }
            }
        };
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-panel:hover {
            border-color: rgba(0, 116, 217, 0.5);
            box-shadow: 0 0 25px rgba(0, 116, 217, 0.15);
        }
        
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .slide-item {
            min-width: 100%;
            transition: opacity 0.5s ease-in-out;
        }
        
        .text-glow {
            text-shadow: 0 0 20px rgba(255,255,255,0.3);
        }
    </style>
</head>
<body class="bg-background text-slate-100 antialiased min-h-screen flex flex-col pt-[72px] selection:bg-primary selection:text-white">

<!-- TopNavBar Component -->
<header class="fixed top-0 w-full z-50 bg-[#060e20]/80 backdrop-blur-lg border-b border-white/5 shadow-xl transition-all duration-300">
    <div class="flex items-center justify-between px-4 md:px-6 py-3 md:py-4 max-w-[1280px] mx-auto">
        <div class="flex items-center gap-6 lg:gap-10">
            <a class="text-xl md:text-2xl font-black italic tracking-tighter text-blue-500 hover:text-blue-400 transition-colors flex items-center gap-2" href="#">
                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
                YASS
            </a>
            
            <!-- Desktop Nav -->
            <nav class="hidden md:flex items-center gap-8">
                <a class="text-sm font-semibold tracking-wide text-blue-500 border-b-2 border-blue-500 pb-1" href="#">Topup</a>
                <a class="text-sm font-semibold tracking-wide text-slate-400 hover:text-slate-200 transition-colors" href="#">Cek Transaksi</a>
                <a class="text-sm font-semibold tracking-wide text-slate-400 hover:text-slate-200 transition-colors" href="#">Leaderboard</a>
                <a class="text-sm font-semibold tracking-wide text-slate-400 hover:text-slate-200 transition-colors" href="#">Kalkulator</a>
            </nav>
        </div>
        
        <div class="flex items-center gap-3 md:gap-5">
            <!-- Search Icon (Mobile) / Bar (Desktop) -->
            <button class="md:hidden text-slate-300 hover:text-white p-2">
                <span class="material-symbols-outlined text-2xl">search</span>
            </button>
            <div class="hidden md:flex items-center bg-surface rounded-full px-4 py-2 border border-white/10 focus-within:border-primary/50 focus-within:ring-1 focus-within:ring-primary/50 transition-all">
                <span class="material-symbols-outlined text-slate-400 mr-2 text-lg">search</span>
                <input class="bg-transparent border-none text-sm text-slate-200 placeholder-slate-500 focus:ring-0 focus:outline-none w-32 lg:w-48" placeholder="Cari game..." type="text"/>
            </div>

            <!-- Login / Reg -->
            <div class="hidden sm:flex items-center gap-3 border-l border-white/10 pl-5">
                <button class="text-sm font-semibold text-slate-300 hover:text-white transition-colors">Masuk</button>
                <button class="text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-primary hover:from-blue-500 hover:to-blue-400 px-5 py-2 rounded-full shadow-[0_0_15px_rgba(0,116,217,0.3)] transition-all transform hover:scale-105 active:scale-95">Daftar</button>
            </div>

            <!-- Hamburger Button -->
            <button id="mobile-menu-btn" class="md:hidden text-slate-300 hover:text-white p-2 ml-1">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="fixed inset-y-0 right-0 z-[60] w-full sm:w-80 bg-[#060e20] border-l border-white/10 shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col">
    <div class="flex items-center justify-between p-5 border-b border-white/10">
        <a class="text-xl font-black italic tracking-tighter text-blue-500 flex items-center gap-2" href="#">
            <span class="material-symbols-outlined text-2xl" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
            YASS
        </a>
        <button id="close-menu-btn" class="text-slate-400 hover:text-white p-1 rounded-full bg-white/5">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    
    <div class="flex-grow overflow-y-auto py-6 px-5 flex flex-col gap-2">
        <a class="text-lg font-semibold text-blue-400 bg-blue-500/10 px-4 py-3 rounded-xl flex items-center gap-3" href="#">
            <span class="material-symbols-outlined">bolt</span> Topup
        </a>
        <a class="text-lg font-semibold text-slate-300 hover:text-white hover:bg-white/5 px-4 py-3 rounded-xl transition-colors flex items-center gap-3" href="#">
            <span class="material-symbols-outlined">receipt_long</span> Cek Transaksi
        </a>
        <a class="text-lg font-semibold text-slate-300 hover:text-white hover:bg-white/5 px-4 py-3 rounded-xl transition-colors flex items-center gap-3" href="#">
            <span class="material-symbols-outlined">leaderboard</span> Leaderboard
        </a>
        <a class="text-lg font-semibold text-slate-300 hover:text-white hover:bg-white/5 px-4 py-3 rounded-xl transition-colors flex items-center gap-3" href="#">
            <span class="material-symbols-outlined">calculate</span> Kalkulator
        </a>
    </div>

    <div class="p-5 border-t border-white/10 flex flex-col gap-3">
        <button class="w-full text-base font-semibold text-slate-200 bg-white/5 hover:bg-white/10 px-5 py-3 rounded-xl transition-colors border border-white/10">Masuk</button>
        <button class="w-full text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-primary hover:opacity-90 px-5 py-3 rounded-xl shadow-[0_0_20px_rgba(0,116,217,0.3)] transition-all">Daftar Akun Baru</button>
    </div>
</div>

<main class="flex-grow flex flex-col gap-10 md:gap-14 pb-16">
    <!-- Hero Slider Section -->
    <section class="max-w-[1280px] mx-auto w-full px-4 md:px-6 pt-4 md:pt-6">
        <div class="relative w-full h-[220px] sm:h-[300px] md:h-[450px] rounded-2xl overflow-hidden shadow-2xl group border border-white/5">
            
            <div id="slider-container" class="flex transition-transform duration-700 ease-in-out h-full w-full">
                <!-- Slide 1 -->
                <div class="slide-item relative h-full flex-shrink-0">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#060e20] via-[#060e20]/60 to-transparent z-10"></div>
                    <img alt="Promo Mobile Legends" class="w-full h-full object-cover" src="{{ asset('assets/images/banners/slider-1.jpg') }}"/>
                    <div class="absolute inset-y-0 left-0 z-20 flex flex-col justify-center px-6 md:px-14 max-w-xl">
                        <span class="text-[10px] md:text-xs font-bold text-yellow-400 mb-2 md:mb-4 inline-block w-max px-3 py-1 bg-yellow-500/20 rounded-full border border-yellow-500/30 backdrop-blur-md uppercase tracking-wider">SUPER PROMO</span>
                        <h1 class="font-display text-2xl sm:text-4xl md:text-6xl font-extrabold text-white mb-2 md:mb-4 leading-[1.1] text-glow">SUPER Yass <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Mega Sale</span></h1>
                        <p class="text-xs sm:text-sm md:text-lg text-slate-300 mb-4 md:mb-8 max-w-sm md:max-w-md line-clamp-2 md:line-clamp-none">Dapatkan diskon hingga 50% untuk semua topup game favoritmu minggu ini. Stock sangat terbatas!</p>
                        <button class="w-fit text-xs md:text-base font-semibold text-white bg-gradient-to-r from-blue-600 to-cyan-500 px-6 md:px-8 py-2.5 md:py-3.5 rounded-full shadow-[0_0_20px_rgba(6,182,212,0.4)] hover:scale-105 transition-transform flex items-center gap-2">
                            Topup Sekarang <span class="material-symbols-outlined text-sm md:text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="slide-item relative h-full flex-shrink-0">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#060e20] via-[#060e20]/60 to-transparent z-10"></div>
                    <img alt="Promo HSR" class="w-full h-full object-cover" src="{{ asset('assets/images/banners/slider-2.jpg') }}"/>
                    <div class="absolute inset-y-0 left-0 z-20 flex flex-col justify-center px-6 md:px-14 max-w-xl">
                        <span class="text-[10px] md:text-xs font-bold text-purple-400 mb-2 md:mb-4 inline-block w-max px-3 py-1 bg-purple-500/20 rounded-full border border-purple-500/30 backdrop-blur-md uppercase tracking-wider">NEW BANNER</span>
                        <h1 class="font-display text-2xl sm:text-4xl md:text-6xl font-extrabold text-white mb-2 md:mb-4 leading-[1.1] text-glow">Honkai: <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-400">Star Rail</span></h1>
                        <p class="text-xs sm:text-sm md:text-lg text-slate-300 mb-4 md:mb-8 max-w-sm md:max-w-md line-clamp-2 md:line-clamp-none">Top up Oneiric Shard sekarang dan dapatkan bonus Double Reward khusus user baru!</p>
                        <button class="w-fit text-xs md:text-base font-semibold text-white bg-gradient-to-r from-purple-500 to-pink-500 px-6 md:px-8 py-2.5 md:py-3.5 rounded-full shadow-[0_0_20px_rgba(168,85,247,0.4)] hover:scale-105 transition-transform flex items-center gap-2">
                            Topup HSR <span class="material-symbols-outlined text-sm md:text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="slide-item relative h-full flex-shrink-0">
                    <div class="absolute inset-0 bg-gradient-to-r from-[#060e20] via-[#060e20]/60 to-transparent z-10"></div>
                    <img alt="Promo Valorant" class="w-full h-full object-cover" src="{{ asset('assets/images/banners/slider-3.jpg') }}"/>
                    <div class="absolute inset-y-0 left-0 z-20 flex flex-col justify-center px-6 md:px-14 max-w-xl">
                        <span class="text-[10px] md:text-xs font-bold text-orange-400 mb-2 md:mb-4 inline-block w-max px-3 py-1 bg-orange-500/20 rounded-full border border-orange-500/30 backdrop-blur-md uppercase tracking-wider">FLASH DEALS</span>
                        <h1 class="font-display text-2xl sm:text-4xl md:text-6xl font-extrabold text-white mb-2 md:mb-4 leading-[1.1] text-glow">Mobile Legends <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500">Diamond Pass</span></h1>
                        <p class="text-xs sm:text-sm md:text-lg text-slate-300 mb-4 md:mb-8 max-w-sm md:max-w-md line-clamp-2 md:line-clamp-none">Harga super miring untuk Weekly Diamond Pass! Klaim sekarang sebelum kehabisan.</p>
                        <button class="w-fit text-xs md:text-base font-semibold text-white bg-gradient-to-r from-orange-500 to-red-600 px-6 md:px-8 py-2.5 md:py-3.5 rounded-full shadow-[0_0_20px_rgba(249,115,22,0.4)] hover:scale-105 transition-transform flex items-center gap-2">
                            Beli Sekarang <span class="material-symbols-outlined text-sm md:text-base">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Slider Controls -->
            <button id="prev-slide" aria-label="Previous Slide" class="absolute left-2 md:left-6 top-1/2 -translate-y-1/2 z-30 w-8 h-8 md:w-12 md:h-12 rounded-full bg-black/40 backdrop-blur-sm flex items-center justify-center border border-white/20 text-white opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-blue-600 hover:scale-110">
                <span class="material-symbols-outlined text-base md:text-xl">chevron_left</span>
            </button>
            <button id="next-slide" aria-label="Next Slide" class="absolute right-2 md:right-6 top-1/2 -translate-y-1/2 z-30 w-8 h-8 md:w-12 md:h-12 rounded-full bg-black/40 backdrop-blur-sm flex items-center justify-center border border-white/20 text-white opacity-0 group-hover:opacity-100 transition-all duration-300 hover:bg-blue-600 hover:scale-110">
                <span class="material-symbols-outlined text-base md:text-xl">chevron_right</span>
            </button>

            <!-- Slider Indicators -->
            <div class="absolute bottom-3 md:bottom-6 left-1/2 -translate-x-1/2 z-30 flex gap-2 md:gap-3 bg-black/30 backdrop-blur-md px-3 md:px-4 py-2 rounded-full border border-white/10">
                <button class="indicator active w-6 md:w-8 h-1.5 md:h-2 rounded-full bg-blue-500 shadow-[0_0_10px_rgba(59,130,246,0.8)] transition-all duration-300" data-index="0" aria-label="Slide 1"></button>
                <button class="indicator w-1.5 md:w-2 h-1.5 md:h-2 rounded-full bg-white/40 hover:bg-white transition-all duration-300" data-index="1" aria-label="Slide 2"></button>
                <button class="indicator w-1.5 md:w-2 h-1.5 md:h-2 rounded-full bg-white/40 hover:bg-white transition-all duration-300" data-index="2" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <!-- Category Navigation -->
    <section class="max-w-[1280px] mx-auto w-full px-4 md:px-6">
        <div class="flex gap-3 md:gap-4 overflow-x-auto pb-4 hide-scrollbar -mx-4 px-4 md:mx-0 md:px-0">
            <button class="flex-shrink-0 flex items-center gap-2 px-5 md:px-6 py-2.5 md:py-3.5 rounded-2xl bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold shadow-[0_4px_15px_rgba(0,116,217,0.3)] border border-blue-400/30 transform hover:-translate-y-1 transition-all">
                <span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
                Games
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-5 md:px-6 py-2.5 md:py-3.5 rounded-2xl glass-panel text-slate-300 font-semibold hover:text-white hover:bg-white/5 transform hover:-translate-y-1 transition-all">
                <span class="material-symbols-outlined text-[20px]">military_tech</span>
                Joki MLBB
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-5 md:px-6 py-2.5 md:py-3.5 rounded-2xl glass-panel text-slate-300 font-semibold hover:text-white hover:bg-white/5 transform hover:-translate-y-1 transition-all">
                <span class="material-symbols-outlined text-[20px]">confirmation_number</span>
                Voucher
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-5 md:px-6 py-2.5 md:py-3.5 rounded-2xl glass-panel text-slate-300 font-semibold hover:text-white hover:bg-white/5 transform hover:-translate-y-1 transition-all">
                <span class="material-symbols-outlined text-[20px]">phone_iphone</span>
                Pulsa & Data
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-5 md:px-6 py-2.5 md:py-3.5 rounded-2xl glass-panel text-slate-300 font-semibold hover:text-white hover:bg-white/5 transform hover:-translate-y-1 transition-all">
                <span class="material-symbols-outlined text-[20px]">movie</span>
                Entertainment
            </button>
        </div>
    </section>

    <!-- Popular Games Section -->
    <section class="max-w-[1280px] mx-auto w-full px-4 md:px-6">
        <div class="flex items-center justify-between mb-6 md:mb-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center border border-orange-500/30">
                    <span class="material-symbols-outlined text-orange-400 text-2xl" style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
                </div>
                <h2 class="font-display text-xl md:text-3xl font-bold text-white tracking-tight">Sedang Tren</h2>
            </div>
            <a href="#" class="text-sm font-semibold text-blue-400 hover:text-blue-300 flex items-center gap-1">Lihat Semua <span class="material-symbols-outlined text-[16px]">arrow_forward</span></a>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 md:gap-6">
            <!-- Game Card 1 -->
            <a class="glass-panel rounded-2xl p-4 md:p-5 flex flex-col items-center text-center gap-3 md:gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2" href="/order/mobile-legends">
                <div class="absolute top-0 right-0 bg-gradient-to-bl from-orange-500 to-red-500 text-white text-[9px] md:text-[10px] px-3 py-1 rounded-bl-xl font-bold z-10 uppercase tracking-wider shadow-lg">HOT</div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
                <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-white/10 group-hover:border-blue-400/50 transition-colors z-10">
                    <img alt="Mobile Legends" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset('assets/images/games/icons/mlbb.png') }}"/>
                </div>
                <div class="z-10 mt-1">
                    <h3 class="text-sm md:text-base font-bold text-white mb-1 group-hover:text-blue-400 transition-colors line-clamp-1">Mobile Legends</h3>
                    <p class="text-[10px] md:text-xs font-medium text-slate-400">Moonton</p>
                </div>
            </a>
            
            <!-- Game Card 2 -->
            <a class="glass-panel rounded-2xl p-4 md:p-5 flex flex-col items-center text-center gap-3 md:gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
                <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-white/10 group-hover:border-blue-400/50 transition-colors z-10">
                    <img alt="Free Fire" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset('assets/images/games/icons/free-fire.png') }}"/>
                </div>
                <div class="z-10 mt-1">
                    <h3 class="text-sm md:text-base font-bold text-white mb-1 group-hover:text-blue-400 transition-colors line-clamp-1">Free Fire</h3>
                    <p class="text-[10px] md:text-xs font-medium text-slate-400">Garena</p>
                </div>
            </a>
            
            <!-- Game Card 3 -->
            <a class="glass-panel rounded-2xl p-4 md:p-5 flex flex-col items-center text-center gap-3 md:gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2" href="#">
                <div class="absolute top-0 right-0 bg-gradient-to-bl from-blue-500 to-cyan-500 text-white text-[9px] md:text-[10px] px-3 py-1 rounded-bl-xl font-bold z-10 uppercase tracking-wider shadow-lg">SALE</div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
                <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-white/10 group-hover:border-blue-400/50 transition-colors z-10">
                    <img alt="PUBG Mobile" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset('assets/images/games/icons/pubg.png') }}"/>
                </div>
                <div class="z-10 mt-1">
                    <h3 class="text-sm md:text-base font-bold text-white mb-1 group-hover:text-blue-400 transition-colors line-clamp-1">PUBG Mobile</h3>
                    <p class="text-[10px] md:text-xs font-medium text-slate-400">Level Infinite</p>
                </div>
            </a>

            <!-- Game Card 4 -->
            <a class="glass-panel rounded-2xl p-4 md:p-5 flex flex-col items-center text-center gap-3 md:gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
                <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-white/10 group-hover:border-blue-400/50 transition-colors z-10">
                    <img alt="Valorant" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset('assets/images/games/icons/valorant.png') }}"/>
                </div>
                <div class="z-10 mt-1">
                    <h3 class="text-sm md:text-base font-bold text-white mb-1 group-hover:text-blue-400 transition-colors line-clamp-1">Valorant</h3>
                    <p class="text-[10px] md:text-xs font-medium text-slate-400">Riot Games</p>
                </div>
            </a>

            <!-- Game Card 5 -->
            <a class="glass-panel rounded-2xl p-4 md:p-5 flex flex-col items-center text-center gap-3 md:gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2 border-yellow-500/20 hover:border-yellow-400/50 shadow-[0_0_20px_rgba(234,179,8,0.05)]" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
                <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-yellow-500/40 group-hover:border-yellow-400 transition-colors z-10">
                    <img alt="Genshin Impact" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset('assets/images/games/icons/genshin.png') }}"/>
                </div>
                <div class="z-10 mt-1">
                    <h3 class="text-sm md:text-base font-bold text-yellow-300 mb-1 group-hover:text-yellow-200 transition-colors line-clamp-1">Genshin Impact</h3>
                    <p class="text-[10px] md:text-xs font-medium text-slate-400">HoYoverse</p>
                </div>
            </a>

            <!-- Game Card 6 -->
            <a class="glass-panel rounded-2xl p-4 md:p-5 flex flex-col items-center text-center gap-3 md:gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
                <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-white/10 group-hover:border-blue-400/50 transition-colors z-10">
                    <img alt="Honkai Star Rail" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset('assets/images/games/icons/hsr.png') }}"/>
                </div>
                <div class="z-10 mt-1">
                    <h3 class="text-sm md:text-base font-bold text-white mb-1 group-hover:text-blue-400 transition-colors line-clamp-1">Honkai: Star Rail</h3>
                    <p class="text-[10px] md:text-xs font-medium text-slate-400">HoYoverse</p>
                </div>
            </a>
        </div>
    </section>

    <!-- Promo Section Bento Grid -->
    <section class="max-w-[1280px] mx-auto w-full px-4 md:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6">
            <!-- Large Bento Box -->
            <div class="lg:col-span-2 glass-panel rounded-3xl p-6 md:p-10 relative overflow-hidden min-h-[250px] md:min-h-[350px] flex flex-col justify-end group">
                <div class="absolute inset-0 z-0 bg-[#0a1930]">
                    <img alt="Special Event" class="w-full h-full object-cover opacity-30 group-hover:scale-105 group-hover:opacity-40 transition-all duration-700" src="{{ asset('assets/images/banners/promo-event.jpg') }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-[#060e20] via-[#060e20]/80 to-transparent"></div>
                </div>
                <div class="relative z-10 w-full md:max-w-xl">
                    <span class="inline-block px-3 py-1 bg-blue-500/20 rounded-md border border-blue-400/30 text-blue-400 text-[10px] md:text-xs font-bold mb-3 md:mb-4 uppercase tracking-widest backdrop-blur-md">WEEKEND DEAL</span>
                    <h3 class="font-display text-2xl md:text-4xl font-bold text-white mb-2 md:mb-3">Bonus Diamond 20%</h3>
                    <p class="text-sm md:text-base text-slate-300 mb-4 md:mb-6">Topup minimal 500 Diamonds dan dapatkan bonus 20% langsung ke akun kamu. Event terbatas untuk merayakan Season baru!</p>
                    <button class="w-fit font-semibold text-white bg-white/10 hover:bg-white hover:text-black border border-white/20 px-6 py-2.5 md:py-3 rounded-xl transition-all duration-300 backdrop-blur-sm">Lihat Detail Promo</button>
                </div>
            </div>
            
            <!-- Small Bento Box -->
            <div class="glass-panel rounded-3xl p-6 md:p-8 relative overflow-hidden min-h-[250px] md:min-h-[350px] flex flex-col justify-between group border-amber-500/20 hover:border-amber-400/50 bg-gradient-to-b from-[#0a1526] to-[#121008]">
                <div class="relative z-10 flex justify-between items-start">
                    <div class="w-12 h-12 rounded-full bg-amber-500/20 flex items-center justify-center border border-amber-500/30 backdrop-blur-sm">
                        <span class="material-symbols-outlined text-amber-400 text-2xl" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
                    </div>
                    <span class="text-[10px] md:text-xs font-bold text-amber-400 bg-amber-500/10 border border-amber-500/20 px-3 py-1 rounded-full uppercase tracking-wider backdrop-blur-md">VIP MEMBER</span>
                </div>
                <div class="relative z-10 mt-8 md:mt-auto">
                    <h3 class="font-display text-xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-amber-200 to-yellow-500 mb-2 md:mb-3">YASS Prestige</h3>
                    <p class="text-sm text-slate-300 mb-6">Daftar jadi VIP dan nikmati harga khusus reseller (diskon hingga 15%) setiap harinya tanpa syarat.</p>
                    <button class="w-full font-bold text-black bg-gradient-to-r from-amber-400 to-yellow-500 hover:from-amber-300 hover:to-yellow-400 px-4 py-3 md:py-3.5 rounded-xl shadow-[0_0_20px_rgba(245,158,11,0.3)] hover:scale-[1.02] transition-all">Daftar Sekarang</button>
                </div>
                <div class="absolute -bottom-16 -right-16 w-48 h-48 bg-amber-500/10 rounded-full blur-3xl group-hover:bg-amber-500/20 transition-all duration-700"></div>
            </div>
        </div>
    </section>
</main>

<!-- Footer Component -->
<footer class="bg-[#040914] w-full pt-16 pb-8 border-t border-white/5 relative overflow-hidden">
    <!-- Decorative glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-3xl h-1 bg-gradient-to-r from-transparent via-blue-500/50 to-transparent"></div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 md:gap-8 max-w-[1280px] mx-auto px-6">
        <div class="col-span-1 sm:col-span-2 md:col-span-1">
            <a class="text-2xl font-black italic tracking-tighter text-blue-500 flex items-center gap-2 mb-4" href="#">
                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">sports_esports</span> YASS
            </a>
            <p class="text-sm text-slate-400 mb-6 leading-relaxed">YASS Game Store adalah platform topup game termurah, tercepat, dan terpercaya di Indonesia. Otomatis 24/7 tanpa ribet.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-blue-500/20 hover:text-blue-400 text-slate-400 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">photo_camera</span>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-green-500/20 hover:text-green-400 text-slate-400 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chat</span>
                </a>
            </div>
        </div>
        
        <div>
            <h4 class="font-bold text-white mb-6 uppercase tracking-wider text-sm">Peta Situs</h4>
            <ul class="space-y-4">
                <li><a class="text-sm text-blue-400 font-medium hover:text-blue-300 transition-colors flex items-center gap-2" href="#"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Beranda</a></li>
                <li><a class="text-sm text-slate-400 hover:text-white transition-colors" href="#">Hubungi Kami</a></li>
                <li><a class="text-sm text-slate-400 hover:text-white transition-colors" href="#">Syarat & Ketentuan</a></li>
                <li><a class="text-sm text-slate-400 hover:text-white transition-colors" href="#">Kebijakan Privasi</a></li>
            </ul>
        </div>
        
        <div>
            <h4 class="font-bold text-white mb-6 uppercase tracking-wider text-sm">Produk</h4>
            <ul class="space-y-4">
                <li><a class="text-sm text-slate-400 hover:text-white transition-colors" href="#">Mobile Legends</a></li>
                <li><a class="text-sm text-slate-400 hover:text-white transition-colors" href="#">Free Fire</a></li>
                <li><a class="text-sm text-slate-400 hover:text-white transition-colors" href="#">PUBG Mobile</a></li>
                <li><a class="text-sm text-slate-400 hover:text-white transition-colors" href="#">Genshin Impact</a></li>
            </ul>
        </div>
        
        <div>
            <h4 class="font-bold text-white mb-6 uppercase tracking-wider text-sm">Pembayaran</h4>
            <div class="flex flex-wrap gap-2">
                <div class="w-[50px] h-[32px] bg-white rounded flex items-center justify-center shadow-inner">
                    <span class="text-[10px] font-black text-blue-800 italic">BCA</span>
                </div>
                <div class="w-[50px] h-[32px] bg-[#00A5CF] rounded flex items-center justify-center shadow-inner">
                    <span class="text-[10px] font-black text-white">DANA</span>
                </div>
                <div class="w-[50px] h-[32px] bg-[#4C3494] rounded flex items-center justify-center shadow-inner">
                    <span class="text-[10px] font-black text-white italic">OVO</span>
                </div>
                <div class="w-[50px] h-[32px] bg-[#ED1C24] rounded flex items-center justify-center shadow-inner">
                    <span class="text-[10px] font-black text-white">QRIS</span>
                </div>
                <div class="w-[50px] h-[32px] bg-white rounded flex items-center justify-center shadow-inner border border-slate-200">
                    <span class="text-[10px] font-black text-blue-600">MANDIRI</span>
                </div>
            </div>
            <p class="text-xs text-slate-500 mt-4">Transkasi aman & terenkripsi</p>
        </div>
    </div>
    
    <div class="max-w-[1280px] mx-auto px-6 mt-16 pt-6 border-t border-white/5 flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="text-sm text-slate-500">© 2024 YASS Game Store. All Rights Reserved.</p>
        <p class="text-sm text-slate-500 flex items-center gap-1">Made with <span class="material-symbols-outlined text-red-500 text-[16px]" style="font-variation-settings: 'FILL' 1;">favorite</span> in Indonesia</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- Mobile Menu Logic ---
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        if(mobileMenuBtn && closeMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.remove('translate-x-full');
            });

            closeMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.add('translate-x-full');
            });
        }

        // --- Navbar Scroll Effect ---
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                header.classList.add('py-2');
                header.classList.remove('py-3', 'md:py-4');
                header.classList.add('bg-[#060e20]/95');
                header.classList.remove('bg-[#060e20]/80');
            } else {
                header.classList.remove('py-2');
                header.classList.add('py-3', 'md:py-4');
                header.classList.remove('bg-[#060e20]/95');
                header.classList.add('bg-[#060e20]/80');
            }
        });

        // --- Slider Logic ---
        const sliderContainer = document.getElementById('slider-container');
        const slides = document.querySelectorAll('.slide-item');
        const nextBtn = document.getElementById('next-slide');
        const prevBtn = document.getElementById('prev-slide');
        const indicators = document.querySelectorAll('.indicator');
        
        if (slides.length > 0) {
            let currentSlide = 0;
            const slideCount = slides.length;
            let autoSlideInterval;

            const updateSlider = () => {
                // Geser container (menggunakan flex translateX)
                sliderContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Update indicator styling (dot di bagian bawah)
                indicators.forEach((ind, index) => {
                    if (index === currentSlide) {
                        ind.classList.remove('w-1.5', 'md:w-2', 'bg-white/40');
                        ind.classList.add('w-6', 'md:w-8', 'bg-blue-500', 'active', 'shadow-[0_0_10px_rgba(59,130,246,0.8)]');
                    } else {
                        ind.classList.remove('w-6', 'md:w-8', 'bg-blue-500', 'active', 'shadow-[0_0_10px_rgba(59,130,246,0.8)]');
                        ind.classList.add('w-1.5', 'md:w-2', 'bg-white/40');
                    }
                });
            };

            const nextSlide = () => {
                currentSlide = (currentSlide + 1) % slideCount;
                updateSlider();
            };

            const prevSlide = () => {
                currentSlide = (currentSlide - 1 + slideCount) % slideCount;
                updateSlider();
            };

            const goToSlide = (index) => {
                currentSlide = index;
                updateSlider();
            };

            const startInterval = () => {
                // Auto slide setiap 8000ms (8 detik)
                autoSlideInterval = setInterval(nextSlide, 8000); 
            };

            const resetInterval = () => {
                clearInterval(autoSlideInterval);
                startInterval();
            };

            // Event Listeners tombol slider
            if(nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    resetInterval(); // reset timer saat klik manual
                });
            }

            if(prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    resetInterval(); // reset timer saat klik manual
                });
            }
            
            // Event Listeners indikator
            indicators.forEach(ind => {
                ind.addEventListener('click', (e) => {
                    const index = parseInt(e.target.getAttribute('data-index'));
                    goToSlide(index);
                    resetInterval();
                });
            });

            // Mulai auto slide saat halaman dimuat
            startInterval();
        }
    });
</script>
</body>
</html>
