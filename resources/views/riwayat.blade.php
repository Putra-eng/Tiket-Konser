<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian - Bruno Mars</title>
    @vite('resources/css/app.css')
</head>
<body class="relative min-h-screen flex items-center justify-center p-6 overflow-hidden">

    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-navy/60 z-10"></div>
        
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="{{ asset('videos/Bruno.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="relative z-20 max-w-2xl w-full bg-white/20 backdrop-blur-xl border border-white/30 shadow-[0_8px_32px_0_rgba(0,0,0,0.3)] rounded-3xl overflow-hidden">
    
    <div class="bg-navy/80 p-8 text-cream backdrop-blur-md">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-black tracking-tighter uppercase italic text-gold">Riwayat Tiket</h1>
                <p class="opacity-70 text-xs tracking-widest uppercase mt-1 text-cream">Exclusive Member Access</p>
            </div>
            <div class="h-12 w-12 border-2 border-gold/50 rounded-full flex items-center justify-center font-bold text-gold">
                BM
            </div>
        </div>
    </div>

    <div class="p-8 space-y-6">
        <div class="flex justify-between items-center border-b pb-4 border-white/10 group">
            <div>
                <p class="text-[10px] font-bold text-white/60 uppercase tracking-widest">Order #BM-9921 • 12 Mei 2026</p>
                <p class="text-xl font-bold text-white group-hover:text-gold transition-colors">VVIP - Section A</p>
                <p class="text-sm text-white/70 italic">2 Tiket • Rp 20.000.000</p>
            </div>
            <span class="bg-gold/20 text-gold border border-gold/30 px-4 py-1 rounded-full font-bold text-[10px] uppercase shadow-sm">Lunas</span>
        </div>

        <div class="flex justify-between items-center border-b pb-4 border-white/10 opacity-50">
            <div>
                <p class="text-[10px] font-bold text-white/40 uppercase tracking-widest">Order #BM-8812 • 10 Mei 2026</p>
                <p class="text-xl font-bold text-white/60 line-through">Reguler - Standing</p>
                <p class="text-sm text-white/40 italic">1 Tiket • Rp 2.500.000</p>
            </div>
            <span class="bg-white/10 text-white/40 border border-white/20 px-4 py-1 rounded-full font-bold text-[10px] uppercase">Batal</span>
        </div>

        <div class="pt-6">
            <a href="{{ route('home') }}" 
               class="block w-full text-center bg-gold text-navy py-4 rounded-xl font-bold text-sm tracking-[0.2em] hover:bg-white transition-all shadow-xl group">
               <span class="group-hover:mr-4 transition-all"></span> BELI TIKET LAGI
            </a>
        </div>
    </div>
</div>

</body>
</html>