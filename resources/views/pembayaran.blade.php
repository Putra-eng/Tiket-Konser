<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pembayaran - Bruno Mars</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-cream/30 min-h-screen p-8 text-navy font-sans">
    <div class="max-w-xl mx-auto">
        <h1 class="text-3xl font-black uppercase italic mb-8 border-b-4 border-navy inline-block">Metode Pembayaran</h1>
        
        <div class="grid gap-4">
            <div class="bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-gold cursor-pointer flex items-center justify-between group transition-all">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-10 bg-navy/5 rounded flex items-center justify-center font-bold italic text-navy">BCA</div>
                    <div>
                        <p class="font-bold uppercase text-sm">Bank Central Asia</p>
                        <p class="text-[10px] text-gray-400 italic">Virtual Account</p>
                    </div>
                </div>
                <div class="h-6 w-6 rounded-full border-2 border-gray-200 group-hover:border-gold group-hover:bg-gold transition-all"></div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-gold cursor-pointer flex items-center justify-between group transition-all">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-10 bg-navy/5 rounded flex items-center justify-center font-bold italic text-navy">MANDIRI</div>
                    <div>
                        <p class="font-bold uppercase text-sm">Bank Mandiri</p>
                        <p class="text-[10px] text-gray-400 italic">Transfer Bank</p>
                    </div>
                </div>
                <div class="h-6 w-6 rounded-full border-2 border-gray-200 group-hover:border-gold group-hover:bg-gold transition-all"></div>
            </div>

            <div class="mt-8 p-8 bg-navy rounded-3xl text-cream flex justify-between items-center shadow-2xl relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-24 h-24 bg-gold/10 rounded-full blur-2xl"></div>
                
                <div class="relative z-10">
                    <span class="text-[10px] font-bold opacity-70 uppercase tracking-[0.2em] block mb-1">Ringkasan Pembayaran</span>
                    <p class="text-xs">Total untuk <span id="displayQty" class="font-bold text-gold text-sm">1</span> Tiket</p>
                </div>
                <div class="text-right relative z-10">
                    <span id="totalPrice" class="text-3xl font-black text-gold italic leading-none text-right tracking-tighter">Rp 0</span>
                </div>
            </div>

            <button class="w-full bg-gold text-navy py-5 rounded-2xl font-black mt-6 hover:scale-[1.02] active:scale-95 transition-all shadow-xl uppercase tracking-[0.2em] text-sm">
                Bayar Sekarang
            </button>
            
            <a href="{{ route('home') }}" class="text-center text-[10px] font-bold text-gray-400 mt-6 uppercase tracking-widest hover:text-navy transition-colors">
                Batal & Kembali ke Beranda
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Ambil jumlah tiket dari URL (?qty=...)
            const urlParams = new URLSearchParams(window.location.search);
            const qty = parseInt(urlParams.get('qty')) || 1; // Default 1 jika tidak ada
            
            // 2. Harga Satuan (Kita pakai harga Reguler Rp 2.500.000 sebagai contoh)
            const hargaSatuan = 2500000;
            const totalBayar = qty * hargaSatuan;

            // 3. Tampilkan jumlah tiket ke layar
            document.getElementById('displayQty').innerText = qty;
            
            // 4. Format angka ke Rupiah yang rapi
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            document.getElementById('totalPrice').innerText = formatter.format(totalBayar);
        });
    </script>
</body>
</html>