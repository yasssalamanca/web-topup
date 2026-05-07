<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>{{ $data['title'] }} - YASS Game Store</title>
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
    </style>
</head>
<body class="bg-background text-slate-100 antialiased min-h-screen flex flex-col pt-[72px]">

<header class="fixed top-0 w-full z-50 bg-[#060e20]/80 backdrop-blur-lg border-b border-white/5 shadow-xl transition-all duration-300">
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

<main class="flex-grow max-w-[1280px] mx-auto w-full px-4 md:px-6 py-8 md:py-12">
    <!-- Header Section -->
    <div class="flex items-center gap-4 mb-8 md:mb-12 border-b border-white/10 pb-6">
        <div class="w-14 h-14 md:w-16 md:h-16 rounded-2xl bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
            <span class="material-symbols-outlined text-blue-400 text-3xl md:text-4xl">{{ $data['icon'] }}</span>
        </div>
        <div>
            <h1 class="font-display text-2xl md:text-4xl font-bold text-white mb-1">{{ $data['title'] }}</h1>
            <p class="text-sm md:text-base text-slate-400">Pilih provider untuk melanjutkan transaksi.</p>
        </div>
    </div>

    <!-- Catalog Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
        @foreach($data['items'] as $item)
        <div onclick="showDevelopmentAlert('{{ $item['name'] }}')" class="glass-panel rounded-2xl p-5 flex flex-col items-center text-center gap-4 relative overflow-hidden group transition-all duration-300 hover:-translate-y-2 cursor-pointer">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/80 z-0"></div>
            
            <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-2xl overflow-hidden shadow-2xl border border-white/10 group-hover:border-blue-400/50 transition-colors z-10 bg-white p-2">
                <!-- Kita gunakan placeholder image jika image asli belum ada -->
                <img alt="{{ $item['name'] }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500" 
                     src="{{ asset('assets/images/games/icons/' . $item['image']) }}"
                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($item['name']) }}&background=0D8ABC&color=fff&size=128&font-size=0.33'" />
            </div>
            
            <div class="z-10 mt-2 w-full">
                <h3 class="text-sm md:text-base font-bold text-white mb-1 group-hover:text-blue-400 transition-colors line-clamp-2 leading-tight">{{ $item['name'] }}</h3>
            </div>
        </div>
        @endforeach
    </div>
</main>

<script>
    function showDevelopmentAlert(providerName) {
        alert('Maaf, layanan untuk ' + providerName + ' saat ini masih dalam tahap pengembangan. \nNantikan update selanjutnya dari YASS Game Store!');
    }
</script>

</body>
</html>
