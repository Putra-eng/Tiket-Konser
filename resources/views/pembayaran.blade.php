<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Tiket - Bruno Mars</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <style>
        .bank-active { border-color: #D4AF37 !important; background-color: #fdfaf0 !important; }
        .bank-active .check-icon { background-color: #D4AF37; border-color: #D4AF37; box-shadow: inset 0 0 0 4px white; }
    </style>
</head>
<body class="bg-cream/30 min-h-screen p-8 text-navy font-sans">

    <div class="max-w-xl mx-auto">
        <h1 class="text-3xl font-black uppercase italic mb-2 border-b-4 border-navy inline-block">Metode Pembayaran</h1>

        {{-- Info pesanan --}}
        <div class="mb-8 mt-4 bg-white rounded-2xl p-4 shadow border border-gray-100 text-sm">
            <p class="text-[10px] font-bold uppercase text-gray-400 tracking-widest mb-2">Detail Pesanan</p>
            <div class="flex justify-between">
                <span class="text-gray-500">Pemesan</span>
                <span class="font-bold text-navy">{{ $pemesanan->pembeli->nama }}</span>
            </div>
            <div class="flex justify-between mt-1">
                <span class="text-gray-500">Kategori Tiket</span>
                <span class="font-bold text-navy">{{ strtoupper($pemesanan->tiket->kategori) }}</span>
            </div>
            <div class="flex justify-between mt-1">
                <span class="text-gray-500">Jumlah Tiket</span>
                <span class="font-bold text-navy">{{ $pemesanan->jumlah }} tiket</span>
            </div>
        </div>

        <div class="grid gap-4 mb-8">
            <div onclick="selectBank(this, '800', 'Bank BCA')" class="bank-card bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-gold cursor-pointer flex items-center justify-between transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-10 bg-navy/5 rounded flex items-center justify-center font-bold italic text-navy">BCA</div>
                    <div><p class="font-bold uppercase text-sm">Bank Central Asia</p><p class="text-[10px] text-gray-400 italic">Virtual Account</p></div>
                </div>
                <div class="check-icon h-6 w-6 rounded-full border-2 border-gray-200 transition-all"></div>
            </div>

            <div onclick="selectBank(this, '700', 'Bank BRI')" class="bank-card bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-gold cursor-pointer flex items-center justify-between transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-10 bg-navy/5 rounded flex items-center justify-center font-bold italic text-navy">BRI</div>
                    <div><p class="font-bold uppercase text-sm">Bank Rakyat Indonesia</p><p class="text-[10px] text-gray-400 italic">Virtual Account</p></div>
                </div>
                <div class="check-icon h-6 w-6 rounded-full border-2 border-gray-200 transition-all"></div>
            </div>

            <div onclick="selectBank(this, '900', 'Bank Mandiri')" class="bank-card bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-gold cursor-pointer flex items-center justify-between transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-10 bg-navy/5 rounded flex items-center justify-center font-bold italic text-navy text-[10px]">MANDIRI</div>
                    <div><p class="font-bold uppercase text-sm">Bank Mandiri</p><p class="text-[10px] text-gray-400 italic">Virtual Account</p></div>
                </div>
                <div class="check-icon h-6 w-6 rounded-full border-2 border-gray-200 transition-all"></div>
            </div>

            <div onclick="selectBank(this, '600', 'GoPay')" class="bank-card bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-gold cursor-pointer flex items-center justify-between transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-10 bg-navy/5 rounded flex items-center justify-center font-bold italic text-navy text-[10px]">GOPAY</div>
                    <div><p class="font-bold uppercase text-sm">GoPay E-Wallet</p><p class="text-[10px] text-gray-400 italic">Virtual Account</p></div>
                </div>
                <div class="check-icon h-6 w-6 rounded-full border-2 border-gray-200 transition-all"></div>
            </div>

            <div onclick="selectBank(this, '500', 'ShopeePay')" class="bank-card bg-white p-6 rounded-2xl shadow-md border-2 border-transparent hover:border-gold cursor-pointer flex items-center justify-between transition-all duration-300">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-10 bg-navy/5 rounded flex items-center justify-center font-bold italic text-navy text-[10px]">SPAY</div>
                    <div><p class="font-bold uppercase text-sm">ShopeePay</p><p class="text-[10px] text-gray-400 italic">Virtual Account</p></div>
                </div>
                <div class="check-icon h-6 w-6 rounded-full border-2 border-gray-200 transition-all"></div>
            </div>
        </div>

        <div class="mt-8 p-8 bg-navy rounded-3xl text-cream flex justify-between items-center shadow-2xl">
            <div>
                <span class="text-[10px] font-bold opacity-70 uppercase tracking-[0.2em] block mb-1">Total Pembayaran</span>
                <p class="text-xs">Untuk <span class="font-bold text-gold text-sm">{{ $pemesanan->jumlah }}</span> tiket</p>
            </div>
            <div class="text-right">
                <span class="text-3xl font-black text-gold italic leading-none tracking-tighter">
                    Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <button onclick="processPayment()" class="w-full bg-gold text-navy py-5 rounded-2xl font-black mt-6 hover:scale-[1.02] active:scale-95 transition-all shadow-xl uppercase tracking-[0.2em] text-sm">
            Bayar Sekarang
        </button>

        <a href="{{ route('home') }}" class="block text-center text-[10px] font-bold text-gray-400 mt-6 uppercase tracking-widest hover:text-navy transition-colors">
            Batal &amp; Kembali ke Beranda
        </a>
    </div>

    {{-- Modal VA --}}
    <div id="vaModal" class="fixed inset-0 z-[100] hidden">
        <div class="fixed inset-0 bg-navy/90 backdrop-blur-md"></div>
        <div class="flex min-h-screen items-center justify-center p-4">
            <div class="relative z-[110] w-full max-w-sm rounded-3xl bg-white p-8 text-center shadow-2xl">
                <h3 class="text-xl font-black text-navy uppercase italic mb-2">Virtual Account</h3>
                <p id="selectedBankName" class="text-[10px] font-bold text-gold uppercase tracking-widest mb-6">BANK</p>
                <div class="bg-gray-50 rounded-2xl p-6 border-2 border-dashed border-gray-200 mb-6">
                    <p class="text-[10px] text-gray-400 uppercase font-bold mb-2">Nomor Pembayaran</p>
                    <div class="flex items-center justify-center gap-3">
                        <span id="vaNumber" class="text-2xl font-black text-navy tracking-widest">---</span>
                        <button onclick="copyVA()" class="relative group p-2 hover:bg-gray-200 rounded-lg transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span id="copyTooltip" class="absolute -top-8 left-1/2 -translate-x-1/2 bg-black text-white text-[9px] py-1 px-2 rounded opacity-0 transition-opacity">Tersalin!</span>
                        </button>
                    </div>
                </div>
                <button onclick="closeVAModal()" class="w-full bg-navy text-cream py-4 rounded-xl font-bold uppercase text-xs tracking-widest hover:bg-gold hover:text-navy transition-all">
                    Selesai &amp; Lihat Tiket
                </button>
            </div>
        </div>
    </div>

    {{-- Modal E-Ticket --}}
    <div id="eticketModal" class="fixed inset-0 z-[150] hidden overflow-y-auto">
        <div class="fixed inset-0 bg-navy/95 backdrop-blur-xl"></div>
        <div class="relative min-h-screen flex flex-col items-center p-6 py-10">
            <div class="text-center mb-8 relative z-10">
                <h2 class="text-3xl font-black text-gold italic uppercase">Tiket Kamu</h2>
                <p class="text-cream/60 text-sm tracking-widest">Silakan <strong>Screenshot</strong> halaman ini</p>
            </div>
            <div id="ticketContainer" class="flex flex-col items-center gap-6 mb-10 relative z-10"></div>
            <div class="relative z-10 w-full max-w-xs">
                <a href="{{ route('riwayat') }}" class="block text-center bg-gold text-navy w-full py-5 rounded-2xl font-black uppercase text-sm shadow-2xl">
                    Lanjut ke Riwayat
                </a>
            </div>
        </div>
    </div>

    <script>
        // Data dari server (Blade → JS)
        const PEMESANAN = {
            id      : {{ $pemesanan->id_pemesanan }},
            jumlah  : {{ $pemesanan->jumlah }},
            total   : {{ $pemesanan->total_harga }},
            kategori: '{{ strtoupper($pemesanan->tiket->kategori) }}',
            nama    : '{{ $pemesanan->pembeli->nama }}',
        };

        window.paymentData = { code: '', label: '' };

        function selectBank(element, code, name) {
            document.querySelectorAll('.bank-card').forEach(c => c.classList.remove('bank-active'));
            element.classList.add('bank-active');
            window.paymentData.code  = code;
            window.paymentData.label = name;
        }

        function copyVA() {
            const vaText  = document.getElementById('vaNumber').innerText;
            const tooltip = document.getElementById('copyTooltip');
            navigator.clipboard.writeText(vaText).then(() => {
                tooltip.style.opacity = '1';
                setTimeout(() => tooltip.style.opacity = '0', 2000);
            });
        }

        function processPayment() {
            if (!window.paymentData.code) {
                alert('Silakan pilih metode pembayaran!');
                return;
            }

            // Gunakan id_pemesanan dari server sebagai ID unik VA
            const finalVA = window.paymentData.code + '08' + PEMESANAN.id;

            document.getElementById('vaNumber').innerText      = finalVA;
            document.getElementById('selectedBankName').innerText = window.paymentData.label;
            document.getElementById('vaModal').classList.remove('hidden');

            // Simpan ke localStorage (hanya untuk riwayat lokal pemesan)
            const transaksiBaru = {
                id     : 'BM-' + PEMESANAN.id,
                tanggal: new Date().toLocaleDateString('id-ID'),
                bank   : window.paymentData.label,
                va     : finalVA,
                jumlah : PEMESANAN.jumlah,
                total  : PEMESANAN.total,
                status : 'Lunas'
            };

            let riwayat = JSON.parse(localStorage.getItem('riwayat_tiket')) || [];
            // Cegah duplikasi jika user refresh
            const sudahAda = riwayat.some(r => r.id === transaksiBaru.id);
            if (!sudahAda) {
                riwayat.push(transaksiBaru);
                localStorage.setItem('riwayat_tiket', JSON.stringify(riwayat));
            }
        }

        function closeVAModal() {
            document.getElementById('vaModal').classList.add('hidden');
            generateETicketPreview();
            document.getElementById('eticketModal').classList.remove('hidden');
        }

        function generateETicketPreview() {
            const container = document.getElementById('ticketContainer');
            container.innerHTML = '';

            for (let i = 1; i <= PEMESANAN.jumlah; i++) {
                const tId = `BM-${PEMESANAN.id}-0${i}`;
                container.innerHTML += `
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl" style="width:320px;border:2px solid #D4AF37;">
                        <div style="background:#001F3F;color:white;padding:15px;text-align:center;">
                            <h4 style="color:#D4AF37;font-weight:900;font-style:italic;margin:0;">BRUNO MARS</h4>
                            <p style="font-size:10px;margin:0;">${PEMESANAN.kategori} — E-TICKET ${i}</p>
                        </div>
                        <div style="padding:20px;text-align:center;color:#001F3F;">
                            <p style="font-size:10px;color:#888;margin:0;">TICKET ID</p>
                            <h5 style="font-weight:800;font-size:18px;margin-bottom:15px;">${tId}</h5>
                            <div style="background:#f3f4f6;padding:10px;border-radius:10px;display:flex;justify-content:center;">
                                <svg id="barcode-${i}"></svg>
                            </div>
                            <p style="font-size:10px;color:#888;margin-top:10px;">
                                Atas nama: <strong>${PEMESANAN.nama}</strong>
                            </p>
                        </div>
                    </div>
                `;
                setTimeout(() => {
                    JsBarcode(`#barcode-${i}`, tId, { format: 'CODE128', width: 1.2, height: 40, displayValue: false });
                }, 100);
            }
        }
    </script>
</body>
</html>
