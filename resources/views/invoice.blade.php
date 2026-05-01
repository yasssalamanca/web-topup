<!DOCTYPE html>
<html class="dark" lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Invoice {{ $transaction->reference_id }} - YASS Game Store</title>
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
            <span class="material-symbols-outlined text-[18px]">home</span> Beranda
        </a>
    </div>
</header>

<main class="flex-grow max-w-[800px] mx-auto w-full px-4 md:px-6 py-8">
    <div class="glass-panel rounded-2xl p-6 md:p-8 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1.5 
            @if($transaction->status == 'success') bg-green-500
            @elseif($transaction->status == 'pending') bg-yellow-500
            @else bg-red-500 @endif
        "></div>
        
        <div class="flex flex-col md:flex-row items-start justify-between gap-6 mb-8 border-b border-white/10 pb-8">
            <div>
                <h1 class="font-display text-2xl md:text-3xl font-bold text-white mb-2">Detail Transaksi</h1>
                <p class="text-slate-400 text-sm">Nomor Invoice: <span class="text-white font-bold">{{ $transaction->reference_id }}</span></p>
                <p class="text-slate-400 text-xs mt-1">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y, H:i') }}</p>
            </div>
            
            <div class="flex items-center gap-2 px-4 py-2 rounded-lg border 
                @if($transaction->status == 'success') border-green-500/30 bg-green-500/10 text-green-400
                @elseif($transaction->status == 'pending') border-yellow-500/30 bg-yellow-500/10 text-yellow-400
                @else border-red-500/30 bg-red-500/10 text-red-400 @endif
            ">
                <span class="material-symbols-outlined text-[20px]">
                    @if($transaction->status == 'success') check_circle
                    @elseif($transaction->status == 'pending') schedule
                    @else cancel @endif
                </span>
                <span class="font-bold text-sm uppercase tracking-wider">{{ $transaction->status }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <!-- Informasi Pesanan -->
            <div>
                <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Informasi Pesanan</h3>
                <div class="bg-surface-light rounded-xl p-4 border border-white/5 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset($transaction->product->category->image) }}" class="w-10 h-10 rounded-lg object-cover" alt="Game Icon">
                        <div>
                            <p class="text-xs text-slate-400">{{ $transaction->product->category->name }}</p>
                            <p class="text-sm font-bold text-white">{{ $transaction->product->name }}</p>
                        </div>
                    </div>
                    <div class="pt-3 border-t border-white/5">
                        <p class="text-xs text-slate-400 mb-1">Target ID</p>
                        <p class="text-sm font-semibold text-white font-mono">{{ $transaction->target_id }}{{ $transaction->target_zone ? ' ('.$transaction->target_zone.')' : '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Detail Pembayaran -->
            <div>
                <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-4">Detail Pembayaran</h3>
                <div class="bg-surface-light rounded-xl p-4 border border-white/5 space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-400">Metode</span>
                        <span class="text-white font-semibold">{{ $transaction->paymentMethod->name }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-400">Harga Item</span>
                        <span class="text-white">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-400">Biaya Layanan</span>
                        <span class="text-white">Rp {{ number_format($transaction->fee, 0, ',', '.') }}</span>
                    </div>
                    <div class="pt-3 border-t border-white/5 flex justify-between items-center">
                        <span class="text-slate-300 font-bold">Total Bayar</span>
                        <span class="text-blue-400 font-display font-bold text-xl">Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

        @if($transaction->status == 'pending')
        <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-5 text-center flex flex-col items-center justify-center gap-4">
            <p class="text-sm text-blue-300 font-medium">Selesaikan pembayaran Anda menggunakan <strong class="text-white">{{ $transaction->paymentMethod->name }}</strong> untuk memproses pesanan.</p>
            
            <div class="flex flex-col sm:flex-row items-center gap-3 w-full sm:w-auto">
                <a href="{{ $transaction->payment_url }}" target="_blank" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-500 text-white font-bold px-6 py-3 rounded-xl transition-colors shadow-lg shadow-blue-500/30">
                    <span class="material-symbols-outlined">payments</span> Lanjutkan Pembayaran
                </a>
                
                <!-- Tombol Ajaib Simulator Webhook -->
                <button onclick="simulatePayment()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-400 text-white font-bold px-6 py-3 rounded-xl transition-colors shadow-lg shadow-amber-500/30 ring-2 ring-amber-500/50 ring-offset-2 ring-offset-background">
                    <span class="material-symbols-outlined">auto_fix_high</span> Simulasikan Lunas
                </button>
            </div>
            
            <p class="text-xs text-slate-500 mt-2">Halaman ini akan otomatis diperbarui setelah Anda melakukan pembayaran.</p>
        </div>
        @endif
        
        @if($transaction->status == 'success')
        <div class="bg-green-500/10 border border-green-500/20 rounded-xl p-5 text-center flex flex-col items-center justify-center gap-2">
            <span class="material-symbols-outlined text-green-400 text-4xl mb-2">check_circle</span>
            <h3 class="text-lg font-bold text-green-400">Pembayaran Berhasil!</h3>
            <p class="text-sm text-green-300 font-medium">Pesanan Anda telah diproses dan sedang dikirim ke akun Anda.</p>
        </div>
        @endif
    </div>
</main>

@if($transaction->status == 'pending')
<script>
    // Auto refresh untuk cek status pembayaran setiap 10 detik
    setInterval(() => {
        window.location.reload();
    }, 10000);

    // Fungsi Simulator Webhook (Ajaib)
    async function simulatePayment() {
        if(!confirm('Fitur Developer: Anda yakin ingin mensimulasikan pembayaran LUNAS dari Tripay?')) return;

        const btn = event.currentTarget;
        const originalHtml = btn.innerHTML;
        btn.innerHTML = `<span class="material-symbols-outlined animate-spin">sync</span> Memproses...`;
        btn.disabled = true;

        try {
            const response = await fetch('/api/simulate-payment/{{ $transaction->reference_id }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            const data = await response.json();
            
            if(data.success) {
                // Refresh langsung untuk menampilkan centang hijau!
                window.location.reload();
            } else {
                alert('Gagal: ' + data.message);
                btn.innerHTML = originalHtml;
                btn.disabled = false;
            }
        } catch (error) {
            alert('Terjadi kesalahan saat menghubungi simulator.');
            btn.innerHTML = originalHtml;
            btn.disabled = false;
        }
    }
</script>
@endif

</body>
</html>
