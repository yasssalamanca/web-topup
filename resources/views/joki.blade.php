<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Joki MLBB - YASS Game Store</title>
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
        
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Custom Radio Styling */
        .product-card input:checked + div {
            border-color: #3b82f6; 
            background-color: rgba(59, 130, 246, 0.1);
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }
        .product-card input:checked + div .check-icon { opacity: 1; transform: scale(1); }

        .payment-card input:checked + div {
            border-color: #3b82f6;
            background-color: rgba(59, 130, 246, 0.1);
        }
        .payment-card input:checked + div .check-icon { opacity: 1; transform: scale(1); }

        /* Tab Active State */
        .tab-btn.active {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.5);
            color: #60a5fa;
        }
        
        /* Select & Input dark style */
        select option { background-color: #0b1326; color: white; }
    </style>
</head>
<body class="bg-background text-slate-100 antialiased min-h-screen flex flex-col pt-[72px] selection:bg-primary selection:text-white">

<header class="fixed top-0 w-full z-50 bg-[#060e20]/80 backdrop-blur-lg border-b border-white/5 shadow-xl transition-all duration-300">
    <div class="flex items-center justify-between px-4 md:px-6 py-3 md:py-4 max-w-[1280px] mx-auto">
        <a class="text-xl md:text-2xl font-black italic tracking-tighter text-blue-500 flex items-center gap-2" href="/">
            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">sports_esports</span>
            YASS
        </a>
        <a href="/" class="text-sm font-semibold text-slate-300 hover:text-white flex items-center gap-1">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span> Kembali
        </a>
    </div>
</header>

<main class="flex-grow max-w-[1280px] mx-auto w-full px-4 md:px-6 py-8">
    
    <!-- Joki Banner -->
    <div class="relative w-full h-[150px] md:h-[200px] rounded-2xl overflow-hidden mb-8 border border-white/10 shadow-2xl bg-[#0a1930]">
        <div class="absolute inset-0 bg-gradient-to-t from-[#060e20] via-[#060e20]/80 to-transparent z-10"></div>
        <img src="{{ asset('assets/images/banners/slider-1.jpg') }}" class="w-full h-full object-cover opacity-50 mix-blend-luminosity" alt="Banner">
        <div class="absolute bottom-0 left-0 z-20 p-6 w-full flex items-center gap-4">
            <div class="w-16 h-16 md:w-20 md:h-20 rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center border-2 border-white/20 shadow-[0_0_30px_rgba(59,130,246,0.6)]">
                <span class="material-symbols-outlined text-white text-4xl">military_tech</span>
            </div>
            <div>
                <h1 class="font-display text-2xl md:text-4xl font-bold text-white mb-1">Joki Mobile Legends</h1>
                <p class="text-xs md:text-sm text-blue-400 font-semibold">Tingkatkan Rank Anda dengan Cepat & Aman 100%</p>
            </div>
        </div>
    </div>

    <form id="order-form" class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
        
        <!-- Left Column: Data Akun & Pilihan Joki -->
        <div class="lg:col-span-2 flex flex-col gap-6 md:gap-8">
            
            <!-- Step 1: Data Akun -->
            <section class="glass-panel rounded-2xl p-6 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500"></div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center font-bold font-display border border-blue-500/30">1</div>
                    <h2 class="text-xl font-bold text-white">Data Akun Login</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Login Via <span class="text-red-500">*</span></label>
                        <select name="login_via" required class="w-full bg-surface-light border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-all appearance-none">
                            <option value="">Pilih Metode Login</option>
                            <option value="Moonton">Moonton</option>
                            <option value="VK">VK</option>
                            <option value="TikTok">TikTok</option>
                            <option value="Facebook">Facebook</option>
                        </select>
                    </div>
                    <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">User ID <span class="text-red-500">*</span></label>
                            <input type="text" id="target_id" name="target_id" required class="w-full bg-surface-light border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-all" placeholder="Contoh: 12345678">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Zone ID <span class="text-red-500">*</span></label>
                            <input type="text" id="target_zone" name="target_zone" required class="w-full bg-surface-light border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-all" placeholder="Contoh: 1234">
                        </div>
                    </div>
                    
                    <!-- Hidden input to store resolved nickname -->
                    <input type="hidden" name="nickname" id="resolved_nickname" value="">

                    <!-- Nickname Result UI -->
                    <div class="col-span-1 md:col-span-2">
                        <div id="nickname-result" class="hidden bg-blue-500/10 border border-blue-500/20 rounded-xl p-3 flex items-center gap-3 transition-all">
                            <div class="w-8 h-8 rounded-lg bg-blue-500/20 flex items-center justify-center text-blue-400" id="nickname-icon">
                                <span class="material-symbols-outlined text-[18px]">person</span>
                            </div>
                            <div>
                                <div class="text-[10px] text-blue-400 font-bold uppercase tracking-wider mb-0.5">Nickname in-game</div>
                                <div class="text-sm font-bold text-white" id="nickname-text">Menunggu input...</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Email / Username <span class="text-red-500">*</span></label>
                        <input type="text" name="email" required class="w-full bg-surface-light border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-all" placeholder="Email akun">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password" required class="w-full bg-surface-light border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-all" placeholder="Password akun">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Request Hero (Opsional)</label>
                        <input type="text" name="req_hero" class="w-full bg-surface-light border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-all" placeholder="Minimal 3 hero">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-300 mb-2">Catatan untuk Penjoki (Opsional)</label>
                        <input type="text" name="notes" class="w-full bg-surface-light border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-blue-500 transition-all" placeholder="Jam main, dll">
                    </div>
                </div>
                <div class="mt-4 p-3 rounded-lg bg-orange-500/10 border border-orange-500/20 flex items-start gap-2">
                    <span class="material-symbols-outlined text-orange-400 text-[18px]">security</span>
                    <p class="text-xs text-orange-300">Harap matikan verifikasi 2 langkah (2FA) sementara untuk mempercepat proses login oleh penjoki. Data Anda 100% aman.</p>
                </div>
            </section>

            <!-- Step 2: Pilih Mode Joki -->
            <section class="glass-panel rounded-2xl p-6 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500"></div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center font-bold font-display border border-blue-500/30">2</div>
                    <h2 class="text-xl font-bold text-white">Pilih Layanan Joki</h2>
                </div>

                <!-- Tabs -->
                <div class="flex gap-2 mb-6 p-1 bg-surface-light rounded-xl border border-white/5">
                    <button type="button" onclick="switchTab('paket')" id="btn-tab-paket" class="tab-btn active flex-1 py-2 rounded-lg text-sm font-bold border border-transparent transition-all">Paket Joki</button>
                    <button type="button" onclick="switchTab('kalkulator')" id="btn-tab-calc" class="tab-btn flex-1 py-2 rounded-lg text-sm font-bold text-slate-400 border border-transparent transition-all hover:text-white">Kalkulator Bintang</button>
                </div>

                <!-- Tab Content: Paket -->
                <div id="tab-paket" class="block">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($packages as $item)
                        <label class="product-card cursor-pointer relative group">
                            <input type="radio" name="joki_type" value="paket_{{ $item['id'] }}" class="hidden joki-input" 
                                   data-name="{{ $item['name'] }}" data-price="{{ $item['price'] }}" onchange="updateCheckout()">
                            <div class="h-full bg-surface-light border border-white/5 rounded-xl p-4 transition-all duration-300 hover:border-white/20 hover:bg-white/5 flex flex-col justify-between gap-3 relative overflow-hidden">
                                <div class="check-icon absolute top-3 right-3 w-5 h-5 bg-blue-500 rounded-full flex items-center justify-center opacity-0 transform scale-50 transition-all duration-300">
                                    <span class="material-symbols-outlined text-white text-[12px] font-bold">check</span>
                                </div>
                                <div class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-blue-400 text-2xl" style="font-variation-settings: 'FILL' 1;">{{ $item['icon'] }}</span>
                                    <div>
                                        <div class="text-sm font-bold text-white leading-tight">{{ $item['name'] }}</div>
                                    </div>
                                </div>
                                <div class="text-blue-400 font-bold text-sm mt-1">
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>

                <!-- Tab Content: Kalkulator -->
                <div id="tab-calc" class="hidden">
                    
                    <!-- Info Harga Per Bintang -->
                    <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4 mb-6">
                        <h3 class="text-xs font-bold text-blue-400 mb-3 uppercase tracking-wider flex items-center gap-2">
                            <span class="material-symbols-outlined text-[16px]">info</span> Daftar Harga Per Bintang
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-xs">
                            <div class="bg-surface-light p-2 rounded-lg border border-white/5 flex flex-col">
                                <span class="text-slate-400 font-semibold mb-1">Master - GM</span>
                                <span class="text-white font-bold text-sm">Rp 5.000</span>
                            </div>
                            <div class="bg-surface-light p-2 rounded-lg border border-white/5 flex flex-col">
                                <span class="text-slate-400 font-semibold mb-1">Epic</span>
                                <span class="text-white font-bold text-sm">Rp 6.000</span>
                            </div>
                            <div class="bg-surface-light p-2 rounded-lg border border-white/5 flex flex-col">
                                <span class="text-slate-400 font-semibold mb-1">Legend</span>
                                <span class="text-white font-bold text-sm">Rp 7.000</span>
                            </div>
                            <div class="bg-surface-light p-2 rounded-lg border border-white/5 flex flex-col">
                                <span class="text-slate-400 font-semibold mb-1">Mythic Romawi</span>
                                <span class="text-white font-bold text-sm">Rp 14.000</span>
                            </div>
                            <div class="bg-surface-light p-2 rounded-lg border border-white/5 flex flex-col">
                                <span class="text-slate-400 font-semibold mb-1">Mythic Honor</span>
                                <span class="text-white font-bold text-sm">Rp 16.000</span>
                            </div>
                            <div class="bg-surface-light p-2 rounded-lg border border-white/5 flex flex-col">
                                <span class="text-slate-400 font-semibold mb-1">Mythic Glory</span>
                                <span class="text-white font-bold text-sm">Rp 20.000</span>
                            </div>
                            <div class="bg-surface-light p-2 rounded-lg border border-white/5 flex flex-col md:col-span-2">
                                <span class="text-slate-400 font-semibold mb-1">Mythic Immortal</span>
                                <span class="text-white font-bold text-sm">Rp 24.000</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-light rounded-xl p-5 border border-white/5 mb-4">
                        <h3 class="text-sm font-bold text-blue-400 mb-4 flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">keyboard_double_arrow_up</span> Rank Saat Ini</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1">Rank</label>
                                <select id="current_rank" class="w-full bg-surface border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-blue-500 transition-all appearance-none calc-input" onchange="updateFields('current'); calculateDynamicPrice()">
                                    <option value="Master">Master</option>
                                    <option value="Grand Master">Grand Master</option>
                                    <option value="Epic">Epic</option>
                                    <option value="Legend">Legend</option>
                                    <option value="Mythic Romawi">Mythic Romawi</option>
                                    <option value="Mythic Honor">Mythic Honor</option>
                                    <option value="Mythic Glory">Mythic Glory</option>
                                    <option value="Mythic Immortal">Mythic Immortal</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1">Tier</label>
                                <select id="current_tier" class="w-full bg-surface border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-blue-500 transition-all appearance-none calc-input" onchange="calculateDynamicPrice()">
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1">Bintang</label>
                                <input type="number" id="current_star" value="0" min="0" class="w-full bg-surface border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:border-blue-500 transition-all calc-input" oninput="validateStar('current'); calculateDynamicPrice()" onblur="enforceMinStar('current')">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center -my-3 relative z-10">
                        <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center border-4 border-surface shadow-[0_0_15px_rgba(59,130,246,0.5)]">
                            <span class="material-symbols-outlined text-white text-sm">arrow_downward</span>
                        </div>
                    </div>

                    <div class="bg-surface-light rounded-xl p-5 border border-white/5 mt-0 relative z-0">
                        <h3 class="text-sm font-bold text-cyan-400 mb-4 flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">workspace_premium</span> Target Rank</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1">Rank</label>
                                <select id="target_rank" class="w-full bg-surface border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:cyan-500 transition-all appearance-none calc-input" onchange="updateFields('target'); calculateDynamicPrice()">
                                    <option value="Master">Master</option>
                                    <option value="Grand Master">Grand Master</option>
                                    <option value="Epic">Epic</option>
                                    <option value="Legend">Legend</option>
                                    <option value="Mythic Romawi">Mythic Romawi</option>
                                    <option value="Mythic Honor">Mythic Honor</option>
                                    <option value="Mythic Glory">Mythic Glory</option>
                                    <option value="Mythic Immortal">Mythic Immortal</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1">Tier</label>
                                <select id="target_tier" class="w-full bg-surface border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:cyan-500 transition-all appearance-none calc-input" onchange="calculateDynamicPrice()">
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 mb-1">Bintang</label>
                                <input type="number" id="target_star" value="1" min="0" class="w-full bg-surface border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none focus:cyan-500 transition-all calc-input" oninput="validateStar('target'); calculateDynamicPrice()" onblur="enforceMinStar('target')">
                            </div>
                        </div>
                    </div>

                    <div id="calc-error" class="mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 hidden items-start gap-2 text-xs text-red-400">
                        <span class="material-symbols-outlined text-[16px]">error</span>
                        <span id="calc-error-text">Target rank harus lebih tinggi dari rank saat ini.</span>
                    </div>

                    <div class="mt-4 p-4 bg-blue-500/10 border border-blue-500/20 rounded-xl flex items-center justify-between">
                        <div>
                            <div class="text-xs text-blue-400 font-bold uppercase tracking-wider mb-1">Total Harga Joki</div>
                            <div class="text-xs text-slate-400" id="calc-desc">Pilih rank awal dan tujuan.</div>
                        </div>
                        <div class="text-xl font-display font-bold text-white" id="calc-price-display">Rp 0</div>
                    </div>
                </div>

            </section>
        </div>

        <!-- Right Column: Payment & Checkout -->
        <div class="flex flex-col gap-6 md:gap-8">
            
            <!-- Step 3: Select Payment -->
            <section class="glass-panel rounded-2xl p-6 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-blue-500"></div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 rounded-full bg-blue-500/20 text-blue-400 flex items-center justify-center font-bold font-display border border-blue-500/30">3</div>
                    <h2 class="text-xl font-bold text-white">Metode Pembayaran</h2>
                </div>

                <div class="flex flex-col gap-4 max-h-[500px] overflow-y-auto pr-2 hide-scrollbar">
                    @foreach($paymentMethods as $category => $methods)
                    <div class="bg-surface-light rounded-xl border border-white/5 p-4">
                        <h3 class="text-xs font-bold text-slate-400 mb-3 uppercase tracking-wider">{{ $category }}</h3>
                        <div class="flex flex-col gap-2">
                            @foreach($methods as $method)
                            <label class="payment-card cursor-pointer block relative">
                                <input type="radio" name="payment_method_id" value="{{ $method['id'] }}" class="hidden"
                                       data-name="{{ $method['name'] }}" data-fee="{{ $method['fee'] }}" onchange="updateCheckout()">
                                <div class="flex items-center justify-between p-3 rounded-lg border border-transparent bg-[#0b1326] hover:bg-white/5 transition-all">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-6 bg-white/10 rounded flex items-center justify-center">
                                            <span class="material-symbols-outlined text-slate-300 text-[18px]">{{ $method['logo'] }}</span>
                                        </div>
                                        <div>
                                            <div class="text-sm font-semibold text-white">{{ $method['name'] }}</div>
                                            <div class="text-[10px] text-slate-400">Biaya Admin: Rp {{ number_format($method['fee'], 0, ',', '.') }}</div>
                                        </div>
                                    </div>
                                    <div class="check-icon w-4 h-4 rounded-full border-2 border-blue-500 flex items-center justify-center opacity-0 scale-50 transition-all">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    </div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
    </form>
</main>

<!-- Bottom Checkout Bar -->
<div class="fixed bottom-0 left-0 w-full bg-[#060e20]/95 backdrop-blur-xl border-t border-white/10 shadow-[0_-10px_30px_rgba(0,0,0,0.5)] z-50 transform translate-y-full transition-transform duration-300" id="checkout-bar">
    <div class="max-w-[1280px] mx-auto px-4 md:px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-4 w-full md:w-auto">
            <div class="hidden md:block w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center border border-blue-500/30">
                <span class="material-symbols-outlined text-blue-400 text-2xl">shopping_cart</span>
            </div>
            <div class="flex-grow">
                <div class="text-xs text-slate-400 font-semibold mb-1" id="summary-product">Belum ada pesanan</div>
                <div class="text-2xl font-display font-bold text-white flex items-center gap-2">
                    <span class="text-sm text-blue-400 font-normal">Total:</span> 
                    <span id="summary-price">Rp 0</span>
                </div>
            </div>
        </div>
        <button type="button" onclick="submitOrder()" id="btn-buy" disabled class="w-full md:w-auto bg-gradient-to-r from-slate-600 to-slate-500 text-white font-bold px-8 py-3.5 rounded-xl shadow-lg transition-all cursor-not-allowed flex items-center justify-center gap-2">
            <span class="material-symbols-outlined">lock</span> Lengkapi Data
        </button>
    </div>
</div>

<script>
    let activeTab = 'paket'; // paket or kalkulator
    let selectedPrice = 0;
    let selectedName = '';
    let selectedFee = 0;
    let typingTimer;                
    let doneTypingInterval = 800;
    let currentNickname = '';
    const gameSlug = "mobile-legends";

    const rankConfig = {
        'Master': { tiers: ['IV', 'III', 'II', 'I'], maxStar: 4 },
        'Grand Master': { tiers: ['V', 'IV', 'III', 'II', 'I'], maxStar: 5 },
        'Epic': { tiers: ['V', 'IV', 'III', 'II', 'I'], maxStar: 5 },
        'Legend': { tiers: ['V', 'IV', 'III', 'II', 'I'], maxStar: 5 },
        'Mythic Romawi': { tiers: [], minStar: 1, maxStar: 24 },
        'Mythic Honor': { tiers: [], minStar: 25, maxStar: 49 },
        'Mythic Glory': { tiers: [], minStar: 50, maxStar: 99 },
        'Mythic Immortal': { tiers: [], minStar: 100, maxStar: 6000 }
    };

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
    }

    function switchTab(tab) {
        activeTab = tab;
        document.getElementById('tab-paket').classList.toggle('hidden', tab !== 'paket');
        document.getElementById('tab-calc').classList.toggle('hidden', tab !== 'kalkulator');
        
        const btnPaket = document.getElementById('btn-tab-paket');
        const btnCalc = document.getElementById('btn-tab-calc');
        
        if (tab === 'paket') {
            btnPaket.classList.add('active', 'text-blue-400');
            btnPaket.classList.remove('text-slate-400');
            btnCalc.classList.remove('active', 'text-blue-400');
            btnCalc.classList.add('text-slate-400');
            
            // Clear radio selection trigger update
            const radios = document.querySelectorAll('input[name="joki_type"]');
            radios.forEach(r => r.checked = false);
            selectedPrice = 0;
            selectedName = '';
        } else {
            btnCalc.classList.add('active', 'text-blue-400');
            btnCalc.classList.remove('text-slate-400');
            btnPaket.classList.remove('active', 'text-blue-400');
            btnPaket.classList.add('text-slate-400');
            
            const radios = document.querySelectorAll('input[name="joki_type"]');
            radios.forEach(r => r.checked = false);
            calculateDynamicPrice();
        }
        updateCheckout();
    }

    function updateFields(type) {
        const rankVal = document.getElementById(type + '_rank').value;
        const tierEl = document.getElementById(type + '_tier');
        const starEl = document.getElementById(type + '_star');
        const config = rankConfig[rankVal];
        
        if (config.tiers.length > 0) {
            tierEl.parentNode.style.display = 'block';
            tierEl.innerHTML = '';
            config.tiers.forEach(t => {
                tierEl.innerHTML += `<option value="${t}">${t}</option>`;
            });
            starEl.min = 0;
            starEl.max = config.maxStar;
            starEl.placeholder = `0 - ${config.maxStar}`;
        } else {
            tierEl.parentNode.style.display = 'none';
            starEl.min = config.minStar;
            starEl.max = config.maxStar;
            starEl.placeholder = `${config.minStar} - ${config.maxStar}`;
            if (parseInt(starEl.value) < config.minStar) starEl.value = config.minStar;
            if (parseInt(starEl.value) > config.maxStar) starEl.value = config.maxStar;
        }
    }

    function validateStar(type) {
        const rankVal = document.getElementById(type + '_rank').value;
        const starEl = document.getElementById(type + '_star');
        const config = rankConfig[rankVal];
        
        let val = parseInt(starEl.value);
        if (isNaN(val)) return;
        
        const max = config.maxStar;
        
        // Hanya validasi batas atas saat mengetik, agar user bisa menghapus angka bebas
        if (val > max) starEl.value = max;
    }

    function enforceMinStar(type) {
        const rankVal = document.getElementById(type + '_rank').value;
        const starEl = document.getElementById(type + '_star');
        const config = rankConfig[rankVal];
        
        let val = parseInt(starEl.value);
        const min = config.tiers.length > 0 ? 0 : config.minStar;
        
        // Paksa nilai minimum saat user selesai mengetik (blur)
        if (isNaN(val) || val < min) {
            starEl.value = min;
            calculateDynamicPrice();
        }
    }

    // Initialize dropdowns
    document.addEventListener('DOMContentLoaded', () => {
        updateFields('current');
        updateFields('target');
        document.getElementById('current_star').value = 0;
        document.getElementById('target_star').value = 1;
    });

    function getGSI(rankName, tierName, star) {
        let gsi = 0;
        const ranksArr = ['Master', 'Grand Master', 'Epic', 'Legend', 'Mythic Romawi', 'Mythic Honor', 'Mythic Glory', 'Mythic Immortal'];
        
        for (let i = 0; i < ranksArr.length; i++) {
            const name = ranksArr[i];
            const r = rankConfig[name];
            
            if (name === rankName) {
                if (r.tiers.length > 0) {
                    const tierIndex = r.tiers.indexOf(tierName);
                    return gsi + (tierIndex * r.maxStar) + parseInt(star);
                } else {
                    // For Mythic, it's continuous. 91 is base Mythic.
                    return 91 + parseInt(star);
                }
            } else {
                if (r.tiers.length > 0) {
                    gsi += r.tiers.length * r.maxStar;
                }
            }
        }
        return gsi;
    }

    function getPriceForStep(step) {
        if (step < 16) return 5000; // Master
        if (step < 41) return 5000; // GM
        if (step < 66) return 6000; // Epic
        if (step < 91) return 7000; // Legend
        if (step < 115) return 14000; // Mythic 1-24
        if (step < 140) return 16000; // Honor 25-49
        if (step < 190) return 20000; // Glory 50-99
        return 24000; // Immortal
    }

    function calculateDynamicPrice() {
        if (activeTab !== 'kalkulator') return;
        
        const cRank = document.getElementById('current_rank').value;
        const cTier = document.getElementById('current_tier').value;
        const cStar = document.getElementById('current_star').value;
        
        const tRank = document.getElementById('target_rank').value;
        const tTier = document.getElementById('target_tier').value;
        const tStar = document.getElementById('target_star').value;

        if (cStar === '' || tStar === '') return;

        const currentGSI = getGSI(cRank, cTier, cStar);
        const targetGSI = getGSI(tRank, tTier, tStar);

        const errorEl = document.getElementById('calc-error');
        
        if (targetGSI <= currentGSI) {
            errorEl.style.display = 'flex';
            selectedPrice = 0;
            selectedName = 'Rank Tidak Valid';
            document.getElementById('calc-price-display').innerText = 'Rp 0';
            document.getElementById('calc-desc').innerText = '-';
        } else {
            errorEl.style.display = 'none';
            let total = 0;
            for (let i = currentGSI; i < targetGSI; i++) {
                total += getPriceForStep(i);
            }
            selectedPrice = total;
            const diff = targetGSI - currentGSI;
            
            let cLabel = rankConfig[cRank].tiers.length > 0 ? `${cRank} ${cTier} Bintang ${cStar}` : `${cRank} Bintang ${cStar}`;
            let tLabel = rankConfig[tRank].tiers.length > 0 ? `${tRank} ${tTier} Bintang ${tStar}` : `${tRank} Bintang ${tStar}`;
            
            selectedName = `Joki ${diff} Bintang (${cLabel} -> ${tLabel})`;
            document.getElementById('calc-price-display').innerText = formatRupiah(total);
            document.getElementById('calc-desc').innerText = `Kalkulasi ${diff} Bintang.`;
        }
        updateCheckout();
    }

    function updateCheckout() {
        if (activeTab === 'paket') {
            const productRadio = document.querySelector('input[name="joki_type"]:checked');
            if (productRadio) {
                selectedPrice = parseInt(productRadio.getAttribute('data-price'));
                selectedName = productRadio.getAttribute('data-name');
            }
        }

        const paymentRadio = document.querySelector('input[name="payment_method_id"]:checked');
        const checkoutBar = document.getElementById('checkout-bar');
        const btnBuy = document.getElementById('btn-buy');
        const summaryProduct = document.getElementById('summary-product');
        const summaryPrice = document.getElementById('summary-price');

        if (selectedPrice > 0 || paymentRadio) {
            checkoutBar.classList.remove('translate-y-full');
        }

        if (selectedPrice > 0) {
            if (paymentRadio) {
                let pName = paymentRadio.getAttribute('data-name');
                summaryProduct.innerText = `${selectedName} via ${pName}`;
            } else {
                summaryProduct.innerText = selectedName;
            }
        }

        if (paymentRadio) {
            selectedFee = parseInt(paymentRadio.getAttribute('data-fee'));
        } else {
            selectedFee = 0;
        }

        const total = selectedPrice + selectedFee;
        summaryPrice.innerText = formatRupiah(total);

        // Check validation
        const email = document.querySelector('input[name="email"]').value;
        const pass = document.querySelector('input[name="password"]').value;
        const loginVia = document.querySelector('select[name="login_via"]').value;
        const targetId = document.getElementById('target_id').value;
        const targetZone = document.getElementById('target_zone').value;
        
        if (selectedPrice > 0 && paymentRadio && email && pass && loginVia && targetId && targetZone) {
            btnBuy.disabled = false;
            btnBuy.classList.remove('from-slate-600', 'to-slate-500', 'cursor-not-allowed');
            btnBuy.classList.add('from-blue-600', 'to-cyan-500', 'hover:scale-105', 'shadow-[0_0_20px_rgba(6,182,212,0.4)]');
            btnBuy.innerHTML = `Beli Sekarang <span class="material-symbols-outlined text-[18px]">rocket_launch</span>`;
        } else {
            btnBuy.disabled = true;
            btnBuy.classList.add('from-slate-600', 'to-slate-500', 'cursor-not-allowed');
            btnBuy.classList.remove('from-blue-600', 'to-cyan-500', 'hover:scale-105', 'shadow-[0_0_20px_rgba(6,182,212,0.4)]');
            btnBuy.innerHTML = `<span class="material-symbols-outlined">lock</span> Lengkapi Data`;
        }
    }

    // Attach listener to inputs for live validation
    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(el => {
        if(!el.classList.contains('calc-input') && el.id !== 'target_id' && el.id !== 'target_zone') {
            el.addEventListener('input', updateCheckout);
            el.addEventListener('change', updateCheckout);
        }
    });

    // Listeners for nickname checking
    const targetIdInput = document.getElementById('target_id');
    const targetZoneInput = document.getElementById('target_zone');
    const resolvedNicknameInput = document.getElementById('resolved_nickname');
    
    targetIdInput.addEventListener('input', () => {
        updateCheckout();
        clearTimeout(typingTimer);
        typingTimer = setTimeout(checkNickname, doneTypingInterval);
    });
    
    targetZoneInput.addEventListener('input', () => {
        updateCheckout();
        clearTimeout(typingTimer);
        typingTimer = setTimeout(checkNickname, doneTypingInterval);
    });

    // Fungsi Cek Nickname Otomatis
    async function checkNickname() {
        const targetId = targetIdInput.value;
        const targetZone = targetZoneInput.value;
        const resultContainer = document.getElementById('nickname-result');
        const textElement = document.getElementById('nickname-text');
        const iconElement = document.getElementById('nickname-icon');

        if (!targetId || !targetZone) {
            resultContainer.classList.add('hidden');
            currentNickname = '';
            resolvedNicknameInput.value = '';
            updateCheckout();
            return;
        }

        resultContainer.classList.remove('hidden');
        textElement.innerText = "Mencari Nickname...";
        textElement.classList.replace('text-white', 'text-slate-400');
        iconElement.innerHTML = `<div class="w-4 h-4 border-2 border-blue-500/50 border-t-blue-400 rounded-full animate-spin"></div>`;

        try {
            const response = await fetch('/api/check-nickname', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() ?? "" }}'
                },
                body: JSON.stringify({
                    game: gameSlug,
                    target_id: targetId,
                    target_zone: targetZone
                })
            });

            const data = await response.json();

            if (data.success) {
                currentNickname = data.nickname;
                resolvedNicknameInput.value = data.nickname;
                textElement.innerText = data.nickname;
                textElement.classList.replace('text-slate-400', 'text-white');
                iconElement.innerHTML = `<span class="material-symbols-outlined text-[18px]">verified_user</span>`;
            } else {
                currentNickname = '';
                resolvedNicknameInput.value = '';
                textElement.innerText = "ID Tidak Ditemukan";
                textElement.classList.replace('text-white', 'text-red-400');
                textElement.classList.replace('text-slate-400', 'text-red-400');
                iconElement.innerHTML = `<span class="material-symbols-outlined text-[18px] text-red-400">error</span>`;
            }
        } catch (error) {
            currentNickname = '';
            resolvedNicknameInput.value = '';
            textElement.innerText = "Gagal memuat nickname";
            textElement.classList.replace('text-white', 'text-slate-400');
            iconElement.innerHTML = `<span class="material-symbols-outlined text-[18px]">cloud_off</span>`;
        }
        updateCheckout();
    }

    function submitOrder() {
        if (!selectedPrice) {
            alert('Mohon lengkapi kalkulasi paket joki!');
            return;
        }

        const paymentMethodInput = document.querySelector('input[name="payment_method_id"]:checked');
        if (!paymentMethodInput) {
            alert('Mohon pilih metode pembayaran!');
            return;
        }

        const targetId = document.getElementById('target_id').value;
        const targetZone = document.getElementById('target_zone').value;

        if (!targetId) {
            alert('Mohon lengkapi User ID!');
            return;
        }

        // Tampilkan visual loading (jika perlu)
        const btn = document.getElementById('btn-buy');
        if(btn) btn.innerHTML = `<span class="material-symbols-outlined animate-spin">sync</span> Memproses...`;

        fetch('/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() ?? "" }}'
            },
            body: JSON.stringify({
                product_id: 999, // Joki Custom ID (berdasarkan Seeder)
                amount: selectedPrice,
                target_id: targetId,
                target_zone: targetZone,
                payment_method_id: paymentMethodInput.value,
                game: 'mobile-legends'
            })
        })
        .then(response => {
            if(!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(result => {
            if(result.success) {
                window.location.href = '/invoice/' + result.data.reference_id;
            } else {
                alert('Gagal: ' + result.message);
                if(btn) btn.innerHTML = `<span class="material-symbols-outlined">shopping_cart_checkout</span> Beli Sekarang`;
            }
        })
        .catch(error => {
            alert('Terjadi kesalahan saat memproses pesanan Joki.');
            if(btn) btn.innerHTML = `<span class="material-symbols-outlined">shopping_cart_checkout</span> Beli Sekarang`;
        });
    }
</script>

</body>
</html>
