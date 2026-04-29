<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>YASS Game Store - Premium Gaming Store</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Space+Grotesk:wght@600&display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-secondary-container": "#fefcff",
                        "error-container": "#93000a",
                        "primary-fixed-dim": "#b1c8e8",
                        "tertiary-fixed-dim": "#e9c400",
                        "on-surface": "#dae2fd",
                        "surface-container-highest": "#2d3449",
                        "on-primary": "#1a324b",
                        "secondary-container": "#0174d9",
                        "on-surface-variant": "#c4c6ce",
                        "surface-container-lowest": "#060e20",
                        "secondary-fixed": "#d5e3ff",
                        "on-primary-fixed": "#011d35",
                        "on-tertiary-fixed": "#221b00",
                        "on-tertiary-container": "#4c3f00",
                        secondary: "#a7c8ff",
                        "on-primary-fixed-variant": "#314862",
                        "surface-bright": "#31394d",
                        "on-tertiary-fixed-variant": "#544600",
                        "primary-fixed": "#d1e4ff",
                        "outline-variant": "#43474d",
                        "on-secondary-fixed-variant": "#004788",
                        primary: "#b1c8e8",
                        "on-secondary-fixed": "#001b3b",
                        "primary-container": "#001b33",
                        "on-error-container": "#ffdad6",
                        outline: "#8d9198",
                        "surface-dim": "#0b1326",
                        error: "#ffb4ab",
                        "secondary-fixed-dim": "#a7c8ff",
                        tertiary: "#e9c400",
                        "inverse-surface": "#dae2fd",
                        "on-error": "#690005",
                        "surface-variant": "#2d3449",
                        "on-secondary": "#003060",
                        "tertiary-fixed": "#ffe16d",
                        "inverse-primary": "#49607b",
                        "surface-container-low": "#131b2e",
                        "surface-container-high": "#222a3d",
                        "tertiary-container": "#c9a900",
                        "inverse-on-surface": "#283044",
                        "on-background": "#dae2fd",
                        "on-tertiary": "#3a3000",
                        background: "#0b1326",
                        "on-primary-container": "#6d84a1",
                        "surface-container": "#171f33",
                        "surface-tint": "#b1c8e8",
                        surface: "#0b1326"
                    }
                }
            }
        };
    </script>
    <style>
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .glass-panel:hover {
            border-color: #0174d9;
            box-shadow: 0 0 20px rgba(1, 116, 217, 0.2);
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-background text-on-background antialiased min-h-screen flex flex-col pt-[72px]">

<!-- TopNavBar Component -->
<header class="fixed top-0 w-full z-50 bg-[#001B33]/80 backdrop-blur-md border-b border-white/10 shadow-[0_4px_30px_rgba(0,0,0,0.1)]">
    <div class="flex items-center justify-between px-6 py-4 max-w-[1280px] mx-auto">
        <div class="flex items-center gap-8">
            <a class="text-2xl font-black italic tracking-tighter text-blue-500" href="#">YASS Game Store</a>
            <nav class="hidden md:flex items-center gap-6">
                <a class="font-inter text-sm font-medium tracking-wide text-blue-500 border-b-2 border-blue-500 pb-1 hover:text-blue-400 transition-colors duration-200 active:scale-95 transition-transform" href="#">Topup</a>
                <a class="font-inter text-sm font-medium tracking-wide text-slate-300 hover:text-blue-400 transition-colors duration-200 active:scale-95 transition-transform" href="#">Cek Transaksi</a>
                <a class="font-inter text-sm font-medium tracking-wide text-slate-300 hover:text-blue-400 transition-colors duration-200 active:scale-95 transition-transform" href="#">Leaderboard</a>
                <a class="font-inter text-sm font-medium tracking-wide text-slate-300 hover:text-blue-400 transition-colors duration-200 active:scale-95 transition-transform" href="#">Kalkulator</a>
            </nav>
        </div>
        <div class="flex items-center gap-4">
            <div class="hidden lg:flex items-center bg-surface-container-highest rounded-full px-4 py-2 border border-white/10">
                <span class="material-symbols-outlined text-on-surface-variant mr-2" style="font-variation-settings: 'FILL' 0;">search</span>
                <input class="bg-transparent border-none text-sm text-on-surface placeholder-on-surface-variant focus:ring-0 focus:outline-none w-48" placeholder="Search games..." type="text"/>
            </div>
            <button aria-label="Language" class="text-slate-300 hover:text-blue-400 transition-colors duration-200">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">language</span>
            </button>
            <button aria-label="Payments" class="text-slate-300 hover:text-blue-400 transition-colors duration-200">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">payments</span>
            </button>
            <div class="flex items-center gap-3 ml-2">
                <button class="text-blue-500 hover:text-blue-400 transition-colors duration-200 px-4 py-2 rounded-lg border border-white/10 bg-white/5 backdrop-blur-sm font-semibold">Login</button>
                <button class="text-white bg-gradient-to-b from-[#0084FF] to-[#0074D9] hover:from-[#0074D9] hover:to-[#005bb5] transition-all duration-200 px-4 py-2 rounded-lg shadow-lg font-semibold">Register</button>
            </div>
        </div>
    </div>
</header>

<main class="flex-grow flex flex-col gap-12 pb-12">
    <!-- Hero Slider Section -->
    <section class="max-w-[1280px] mx-auto w-full px-6 mt-6">
        <div class="relative w-full h-[400px] rounded-xl overflow-hidden shadow-2xl group">
            <div class="absolute inset-0 bg-gradient-to-r from-surface-container-lowest to-transparent z-10 opacity-60"></div>
            <img alt="Promo April Banner" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDyNP6R0L9O_CYnnWSNFJoSd2376SIWPO3-iB1QuVZn4jE1I4rj9wjR5cAQvLvRKBqC67QAAJZneqWB3tBBT48qL4odW8pKk9fWurtVuqg7ONmMK5vZVNLj1Ra6LWZPl3o_yHir4X1FdGEdKGS-qzsk3fczeDjEb9kwZzhN6h-MTjhRjBJcAsQ4NJYSiLdT_PWgGvIPZwVVA7pX4TzDLyUUzDq_nY169_1rciUq2frvGi22KL8KO9mJl0Dt9quXL6kdyWs6mhYQOzMZ"/>
            <div class="absolute inset-y-0 left-0 z-20 flex flex-col justify-center px-12 max-w-lg">
                <span class="text-xs font-bold text-tertiary-fixed mb-4 inline-block px-3 py-1 bg-tertiary-container/20 rounded-full border border-tertiary/30 backdrop-blur-md uppercase tracking-wider">PROMO APRIL TAHUN INI</span>
                <h1 class="text-5xl font-extrabold text-on-secondary-container mb-4 leading-tight">YASS Game Store <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-secondary-fixed to-primary-fixed">Super Sale</span></h1>
                <p class="text-lg text-on-surface-variant mb-8">Dapatkan diskon hingga 50% untuk semua topup game favoritmu bulan ini. Stock terbatas!</p>
                <button class="w-fit font-semibold text-on-secondary-container bg-gradient-to-b from-[#0084FF] to-[#0074D9] px-8 py-3 rounded-lg shadow-[0_0_20px_rgba(0,116,217,0.4)] hover:scale-105 transition-transform">Topup Sekarang</button>
            </div>
            <!-- Slider Controls -->
            <button class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md flex items-center justify-center border border-white/10 text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-primary-container">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">chevron_left</span>
            </button>
            <button class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 rounded-full bg-black/50 backdrop-blur-md flex items-center justify-center border border-white/10 text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-primary-container">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 0;">chevron_right</span>
            </button>
            <!-- Slider Indicators -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex gap-2">
                <div class="w-8 h-1.5 rounded-full bg-secondary-container"></div>
                <div class="w-2 h-1.5 rounded-full bg-white/30 hover:bg-white/50 cursor-pointer transition-colors"></div>
                <div class="w-2 h-1.5 rounded-full bg-white/30 hover:bg-white/50 cursor-pointer transition-colors"></div>
            </div>
        </div>
    </section>

    <!-- Category Navigation -->
    <section class="max-w-[1280px] mx-auto w-full px-6">
        <div class="flex gap-4 overflow-x-auto pb-4 hide-scrollbar">
            <button class="flex-shrink-0 flex items-center gap-2 px-6 py-3 rounded-full bg-secondary-container text-on-secondary-container font-semibold shadow-[0_0_15px_rgba(1,116,217,0.3)]">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
                Top Up Games
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-6 py-3 rounded-full glass-panel text-on-surface font-semibold hover:text-secondary-fixed transition-colors">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 0;">military_tech</span>
                Joki MLBB
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-6 py-3 rounded-full glass-panel text-on-surface font-semibold hover:text-secondary-fixed transition-colors">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 0;">confirmation_number</span>
                Voucher
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-6 py-3 rounded-full glass-panel text-on-surface font-semibold hover:text-secondary-fixed transition-colors">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 0;">phone_iphone</span>
                Pulsa & Data
            </button>
            <button class="flex-shrink-0 flex items-center gap-2 px-6 py-3 rounded-full glass-panel text-on-surface font-semibold hover:text-secondary-fixed transition-colors">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings: 'FILL' 0;">movie</span>
                Entertainment
            </button>
        </div>
    </section>

    <!-- Popular Games Section -->
    <section class="max-w-[1280px] mx-auto w-full px-6">
        <div class="flex items-center gap-3 mb-6">
            <span class="material-symbols-outlined text-tertiary text-3xl" style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
            <h2 class="text-3xl font-bold text-on-secondary-container">POPULER SEKARANG!</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <!-- Game Card 1 -->
            <a class="glass-panel rounded-xl p-4 flex flex-col items-center text-center gap-3 relative overflow-hidden group transition-all duration-300" href="#">
                <div class="absolute top-0 right-0 bg-tertiary-fixed text-on-tertiary-fixed text-[10px] px-2 py-0.5 rounded-bl-lg font-bold z-10 uppercase tracking-wide">HOT</div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-surface-container-lowest/80 z-0"></div>
                <img alt="Mobile Legends Icon" class="w-20 h-20 rounded-2xl object-cover shadow-lg border border-white/20 z-10 group-hover:scale-110 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIGVgjwovKaY3W3Xwsg8yBeRXV53_zfcXIyXonIqD2qZTy0AM-TmmoX-a0rG5u8qKyU0wUORyT8tnOAyXvAQOKpty-UIh49RtN551TjLT_V25p2Me6dKAwXaHg-xpz1f-8veZv7BbOPeSkEZXVlZHKxSQv21qqZ96EU9tFh8uuHXBvrmLQw--n9kRto_jzeh-VQK1-pllyLKrAMKRED9GR-BMwl8plAr0mBT3rZcNnDgDJ95YMuSx1bjYNBqcdf_MO2SmjLGqsRTq4"/>
                <div class="z-10 mt-2">
                    <h3 class="text-base font-bold text-on-surface mb-1 group-hover:text-secondary-fixed transition-colors">Mobile Legends</h3>
                    <p class="text-xs text-on-surface-variant">Moonton</p>
                </div>
            </a>
            <!-- Game Card 2 -->
            <a class="glass-panel rounded-xl p-4 flex flex-col items-center text-center gap-3 relative overflow-hidden group transition-all duration-300" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-surface-container-lowest/80 z-0"></div>
                <img alt="Free Fire Icon" class="w-20 h-20 rounded-2xl object-cover shadow-lg border border-white/20 z-10 group-hover:scale-110 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtwor8T_m6nzVNzSu2DlXAVxiRhUkxHZytqb8WGn37YkyHCTGlnrOhNVX4v-w9s7jMTN9RhuPTchO0ttoVmyVF1KFiqDOk4hzTGnl1P6vTOAkLUTk4EjThU8Uayzxx9HyMTp5GLkFKpRaJxujGHOU2aK-Sa6doreM8ez8gNHjX_2T4POXuvtQnG8cKNnCrWJM9Uj8bN_yOiKaAdiGMUA0cYeO02_QsRsKyXcm5Kxw6e0xGZv731OWFU3kYhiMgQc5J5DEkTJfUabIa"/>
                <div class="z-10 mt-2">
                    <h3 class="text-base font-bold text-on-surface mb-1 group-hover:text-secondary-fixed transition-colors">Free Fire</h3>
                    <p class="text-xs text-on-surface-variant">Garena</p>
                </div>
            </a>
            <!-- Game Card 3 -->
            <a class="glass-panel rounded-xl p-4 flex flex-col items-center text-center gap-3 relative overflow-hidden group transition-all duration-300" href="#">
                <div class="absolute top-0 right-0 bg-gradient-to-r from-red-500 to-orange-500 text-white text-[10px] px-2 py-0.5 rounded-bl-lg font-bold z-10 uppercase tracking-wide">SALE</div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-surface-container-lowest/80 z-0"></div>
                <img alt="PUBG Mobile Icon" class="w-20 h-20 rounded-2xl object-cover shadow-lg border border-white/20 z-10 group-hover:scale-110 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9_rXqvV-Sa7PRcoKqaICV86ISTkKfNu1EhS3c7uH-FiReNGrsXDl_R2yRRw3heor4ZbEcULbcVd4aElXGIOtsPglwR_lTiFTYXsI_zCovt2aw9eEP_V-yR1FzNbtIy3BJqrwAEoIz-v_rbSHLYFAu7nwSHR_v--bMvKib0mzXQAS1AmfFSwyVg_RB4ksGv996IVh5fscTzfTkNLM6Hws8e5N7xcZ8vr1g-K_6aXUgjXFLxetxXvpWJ4SDrf9EYJft11DGw0B6xxCz"/>
                <div class="z-10 mt-2">
                    <h3 class="text-base font-bold text-on-surface mb-1 group-hover:text-secondary-fixed transition-colors">PUBG Mobile</h3>
                    <p class="text-xs text-on-surface-variant">Level Infinite</p>
                </div>
            </a>
            <!-- Game Card 4 -->
            <a class="glass-panel rounded-xl p-4 flex flex-col items-center text-center gap-3 relative overflow-hidden group transition-all duration-300" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-surface-container-lowest/80 z-0"></div>
                <img alt="Valorant Icon" class="w-20 h-20 rounded-2xl object-cover shadow-lg border border-white/20 z-10 group-hover:scale-110 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVtO1HDjpk2Q_OoL5L-OrFFgfobZ7J8TZcozEIn-If3imkTzJxJo5t6ji8rjmL4i2CB8vL5b1aEHb1eLW-tuCAUyP1JVQ-VRH0CE5RV9ZX0njcn_xtHHTsMoQUTuDWD6-2fsL4dOzSkiDSDkNYGqO6NkUt2Xtf2OQrt_85_4r8cckGJefKZ9cklgYR2RdAEBBXPCxweRxZnJw9IcOUvpuFGuLvzVaAG-b56FDYcdr34IW2MdHO9v0JmG7nDT2gMPT_ln0QVFIL_XGR"/>
                <div class="z-10 mt-2">
                    <h3 class="text-base font-bold text-on-surface mb-1 group-hover:text-secondary-fixed transition-colors">Valorant</h3>
                    <p class="text-xs text-on-surface-variant">Riot Games</p>
                </div>
            </a>
            <!-- Game Card 5 -->
            <a class="glass-panel rounded-xl p-4 flex flex-col items-center text-center gap-3 relative overflow-hidden group transition-all duration-300 border-[#c9a900]/30 shadow-[0_0_15px_rgba(201,169,0,0.1)]" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-surface-container-lowest/80 z-0"></div>
                <img alt="Genshin Impact Icon" class="w-20 h-20 rounded-2xl object-cover shadow-lg border border-[#c9a900]/50 z-10 group-hover:scale-110 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC10ziIAZYqtomlpKtdQNkbxw_pATG8oyYH9DiEONqm7CRLBCnQVOzXNCrIU8AJ7LZ28WGSIJedBUpfB1ltfrM2J7YZcN2JkEAk6Xk-uag3ilC8gwTHtUtUbGQrOLoQCyHh2FPWEQLugvN_cndYy6KIkKBndV-iokvquU36K33_wKU6brDibMUl4xF46yzOFFl7QiTj5ghC7PNMyhxvr4PyWvkdv4cZYt8ToQo3lBDUmONgLeK_MHM_CKmO7pzCTgNqJ7e4EP0p7Z7f"/>
                <div class="z-10 mt-2">
                    <h3 class="text-base font-bold text-tertiary-fixed-dim mb-1 group-hover:text-tertiary-fixed transition-colors">Genshin Impact</h3>
                    <p class="text-xs text-on-surface-variant">HoYoverse</p>
                </div>
            </a>
            <!-- Game Card 6 -->
            <a class="glass-panel rounded-xl p-4 flex flex-col items-center text-center gap-3 relative overflow-hidden group transition-all duration-300" href="#">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-surface-container-lowest/80 z-0"></div>
                <img alt="Honkai Star Rail Icon" class="w-20 h-20 rounded-2xl object-cover shadow-lg border border-white/20 z-10 group-hover:scale-110 transition-transform duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCw5NAGubfnatfwiY04GuFeKnoy0NC_jo30SP6lpIQRaxqMb5wV-FuO-Zqw4wzknLiEXYt0Ah4AvkolhcSk_rsICUiURWHT6rI1BoZLKfngfurUVlt0Imz8wKHiEoDq7eV94AZMCBJArAXnTAAnItRm5nrtzgO15CBqYB1P5q5BORow6z1O6s2DdGGGHbr4o5GUbnxI-1nx9IDVOSPljFoyKSXTjsfSV1foh6us126FHOXVdq55cVM8mUWNEHxBU-iuXoy0x82KIvSU"/>
                <div class="z-10 mt-2">
                    <h3 class="text-base font-bold text-on-surface mb-1 group-hover:text-secondary-fixed transition-colors">Honkai: Star Rail</h3>
                    <p class="text-xs text-on-surface-variant">HoYoverse</p>
                </div>
            </a>
        </div>
    </section>

    <!-- Promo Section Bento Grid -->
    <section class="max-w-[1280px] mx-auto w-full px-6 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 glass-panel rounded-2xl p-8 relative overflow-hidden min-h-[300px] flex flex-col justify-end">
                <div class="absolute inset-0 z-0">
                    <img alt="Special Event" class="w-full h-full object-cover opacity-40" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA60iqEhP3guVgy0qC2UtlQEi-aV3DLOTM20S3NXYrTVkySXNBIYbp6BRsALmBu3x90c7m7e_z0vRF9sGj_gDHBNKy4txqIcpjYRalvYJD2WTpwKxXTHUot3hGtjg78R9MbgXa36W4e_qA0g6zVVtWhh6tORwkUfn6brJlRfPLniwC2Za4sv9q6fyFPHmv78TFQERNjgXbFN1Vbz5QG1RgCweAQv4ji-iStlCjh3y82Pl41CSbbV_7haEHBjul_784x0c6PAlIPZuQd"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-surface-container-lowest via-surface-container-lowest/80 to-transparent"></div>
                </div>
                <div class="relative z-10">
                    <span class="inline-block px-3 py-1 bg-primary-container rounded-md border border-primary/20 text-primary text-xs font-bold mb-3 uppercase tracking-wider">WEEKEND DEAL</span>
                    <h3 class="text-3xl font-bold text-on-secondary-container mb-2">Bonus Diamond 20%</h3>
                    <p class="text-base text-on-surface-variant mb-4 max-w-md">Topup minimal 500 Diamonds dan dapatkan bonus 20% langsung ke akun kamu. Berlaku khusus akhir pekan.</p>
                    <button class="font-semibold text-white bg-transparent border border-white/30 hover:border-white hover:bg-white/10 px-6 py-2 rounded-lg transition-all">Lihat Detail</button>
                </div>
            </div>
            <div class="glass-panel rounded-2xl p-6 relative overflow-hidden min-h-[300px] flex flex-col justify-between group border-[#c9a900]/20 hover:border-[#c9a900]/50">
                <div class="relative z-10 flex justify-between items-start">
                    <span class="material-symbols-outlined text-tertiary-fixed text-4xl" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
                    <span class="text-xs font-bold text-tertiary-fixed bg-tertiary-container/30 px-2 py-1 rounded uppercase tracking-wider">VIP MEMBER</span>
                </div>
                <div class="relative z-10 mt-auto">
                    <h3 class="text-2xl font-bold text-tertiary-fixed mb-2">YASS Prestige</h3>
                    <p class="text-sm text-on-surface-variant mb-4">Daftar jadi VIP dan nikmati harga khusus reseller setiap harinya tanpa syarat.</p>
                    <button class="w-full font-semibold text-[#001B33] bg-gradient-to-r from-tertiary-fixed to-tertiary px-4 py-2 rounded-lg shadow-[0_0_15px_rgba(233,196,0,0.3)]">Daftar Sekarang</button>
                </div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-tertiary-fixed/10 rounded-full blur-3xl group-hover:bg-tertiary-fixed/20 transition-all duration-500"></div>
            </div>
        </div>
    </section>
</main>

<!-- Footer Component -->
<footer class="bg-[#001B33] w-full pt-12 pb-8 border-t border-white/5">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 max-w-[1280px] mx-auto px-6">
        <div class="col-span-1 md:col-span-1">
            <h3 class="text-xl font-bold text-blue-500 mb-4">YASS Game Store</h3>
            <p class="text-sm text-slate-400 mb-6 leading-relaxed">YASS Game Store adalah platform topup game termurah, tercepat, dan terpercaya di Indonesia. Kami menyediakan berbagai macam produk digital dengan sistem otomatis 24/7.</p>
        </div>
        <div>
            <h4 class="font-bold text-on-surface mb-4">Peta Situs</h4>
            <ul class="space-y-3">
                <li><a class="text-sm text-blue-500 font-semibold opacity-80 hover:opacity-100 hover:text-amber-400 transition-all" href="#">Beranda</a></li>
                <li><a class="text-sm text-slate-400 opacity-80 hover:opacity-100 hover:text-amber-400 transition-all" href="#">Hubungi Kami</a></li>
                <li><a class="text-sm text-slate-400 opacity-80 hover:opacity-100 hover:text-amber-400 transition-all" href="#">Terms of Service</a></li>
                <li><a class="text-sm text-slate-400 opacity-80 hover:opacity-100 hover:text-amber-400 transition-all" href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-on-surface mb-4">Sosial Media</h4>
            <ul class="space-y-3">
                <li><a class="flex items-center gap-2 text-sm text-slate-400 opacity-80 hover:opacity-100 hover:text-amber-400 transition-all" href="#">
                    <span class="material-symbols-outlined text-[18px]">chat</span>WhatsApp
                </a></li>
                <li><a class="flex items-center gap-2 text-sm text-slate-400 opacity-80 hover:opacity-100 hover:text-amber-400 transition-all" href="#">
                    <span class="material-symbols-outlined text-[18px]">photo_camera</span>Instagram
                </a></li>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-on-surface mb-4">Metode Pembayaran</h4>
            <div class="flex flex-wrap gap-2">
                <div class="w-12 h-8 bg-white/10 rounded flex items-center justify-center border border-white/5">
                    <span class="text-[10px] font-bold text-white/50">Qris</span>
                </div>
                <div class="w-12 h-8 bg-white/10 rounded flex items-center justify-center border border-white/5">
                    <span class="text-[10px] font-bold text-white/50">Ovo</span>
                </div>
                <div class="w-12 h-8 bg-white/10 rounded flex items-center justify-center border border-white/5">
                    <span class="text-[10px] font-bold text-white/50">Dana</span>
                </div>
                <div class="w-12 h-8 bg-white/10 rounded flex items-center justify-center border border-white/5">
                    <span class="text-[10px] font-bold text-white/50">BCA</span>
                </div>
                <div class="w-12 h-8 bg-white/10 rounded flex items-center justify-center border border-white/5">
                    <span class="text-[10px] font-bold text-white/50">Mandiri</span>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-[1280px] mx-auto px-6 mt-12 pt-6 border-t border-white/5 text-center">
        <p class="text-sm text-slate-400">© 2024 YASS Game Store - Premium Gaming Store. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
