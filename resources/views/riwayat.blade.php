<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian - Bruno Mars</title>
    @vite('resources/css/app.css')
    <style>
        /* Memastikan scroll halus dan mengizinkan gulir */
        html, body {
            overflow-y: auto !important;
            height: auto !important;
            min-height: 100vh;
        }
    </style>
</head>
<body class="relative bg-navy block p-6">

    <div class="fixed inset-0 z-0">
        <div class="absolute inset-0 bg-navy/70 z-10"></div>
        <video autoplay loop muted playsinline class="w-full h-full object-cover">
            <source src="{{ asset('videos/Bruno.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="relative z-20 max-w-2xl mx-auto my-10 bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl rounded-3xl overflow-hidden">
        
        <div class="bg-navy/80 p-8 text-cream backdrop-blur-md border-b border-white/10">
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
            <div id="riwayatList" class="space-y-6">
                <div class="text-center py-10 text-white/50 italic text-sm">
                    Memuat riwayat transaksi...
                </div>
            </div>

            <div class="pt-6 border-t border-white/10">
                <a href="{{ route('home') }}" 
                   class="block w-full text-center bg-gold text-navy py-4 rounded-xl font-bold text-sm tracking-[0.2em] hover:bg-white transition-all shadow-xl">
                    BELI TIKET LAGI
                </a>
                <button onclick="hapusRiwayat()" class="w-full text-center text-[10px] text-white/30 mt-4 uppercase tracking-widest hover:text-red-400 transition-colors">
                    Reset Riwayat
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Memastikan body bisa di-scroll (antisipasi sisa modal)
            document.body.style.overflow = 'auto';

            const container = document.getElementById('riwayatList');
            let dataRiwayat = JSON.parse(localStorage.getItem('riwayat_tiket')) || [];

            if (dataRiwayat.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-10">
                        <p class="text-white/60 text-sm italic tracking-widest uppercase">Belum ada transaksi</p>
                    </div>
                `;
                return;
            }

            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency', currency: 'IDR', minimumFractionDigits: 0
            });

            // Render Data (Copy-paste logika kamu yang sudah benar)
            container.innerHTML = dataRiwayat.slice().reverse().map(item => `
                <div class="flex justify-between items-start border-b pb-4 border-white/10 group transition-all">
                    <div>
                        <p class="text-[10px] font-bold text-white/60 uppercase tracking-widest">
                            Order ${item.id} • ${item.tanggal}
                        </p>
                        <p class="text-xl font-bold text-white group-hover:text-gold transition-colors italic">
                            ${item.bank} - PAYMENT
                        </p>
                        <p class="text-sm text-white/70 italic">
                            ${item.jumlah} Tiket • ${formatter.format(item.total)}
                        </p>
                        <p class="text-[9px] text-gold/80 font-mono mt-1 tracking-tighter">VA: ${item.va}</p>
                    </div>
                    <span class="bg-gold/20 text-gold border border-gold/30 px-3 py-1 rounded-full font-bold text-[9px] uppercase">
                        ${item.status}
                    </span>
                </div>
            `).join('');
        });

        function hapusRiwayat() {
            if(confirm("Hapus semua riwayat transaksi?")) {
                localStorage.removeItem('riwayat_tiket');
                location.reload();
            }
        }
    </script>
</body>
</html>