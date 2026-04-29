<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bruno Mars Concert - Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">

        <aside class="w-80 bg-navy shadow-[10px_0_30px_rgba(0,0,0,0.3)] z-20 p-8 flex flex-col fixed h-full border-r border-gold/30 text-cream">
            <div class="flex-1">
                <div class="mb-12 border-b border-cream/10 pb-8">
                    <h2 class="text-4xl font-black tracking-tighter italic text-gold">BRUNO</h2>
                    <h2 class="text-2xl font-light tracking-[0.4em] -mt-2">MARS</h2>
                    <p class="text-[10px] uppercase tracking-widest mt-4 text-cream/50">Live in Concert 2026</p>
                </div>
                
                <nav class="space-y-4">
                    <a href="{{ route('home') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-cream/10 border border-cream/20 group transition-all duration-300">
                        <div class="p-2 bg-gold rounded-lg shadow-lg shadow-gold/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </div>
                        <span class="font-bold uppercase text-xs tracking-widest">Beranda</span>
                    </a>

                    <a href="{{ route('riwayat') }}" class="flex items-center gap-4 p-4 rounded-2xl border border-transparent hover:bg-cream/5 hover:border-cream/10 transition-all group">
                        <div class="p-2 bg-cream/10 rounded-lg group-hover:bg-gold transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cream group-hover:text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="font-bold uppercase text-xs tracking-widest opacity-70 group-hover:opacity-100 transition-opacity">Riwayat Tiket</span>
                    </a>
                </nav>
            </div>
            <div class="pt-8 border-t border-cream/10 text-center">
                <p class="text-xs font-bold uppercase tracking-tight italic">D'Tickets Experience</p>
            </div>
        </aside>

        <main class="flex-1 ml-80 bg-cream/20">
            <section class="relative h-screen w-full overflow-hidden bg-navy">
                <img src="{{ asset('images/banner-bruno.png') }}" alt="Bruno Mars Banner" class="w-full h-full object-cover opacity-90 shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-t from-navy via-transparent to-transparent opacity-60"></div>
                <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-cream animate-bounce flex flex-col items-center text-center">
                    <span class="text-[10px] font-bold tracking-[0.3em] uppercase mb-2">Scroll Down</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 14l-7 7-7-7" /></svg>
                </div>
            </section>

            <section id="tickets" class="py-24 px-12">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-16">
                        <h2 class="text-5xl font-black text-navy uppercase tracking-tighter mb-4 italic">Pilih Kategori Tiket</h2>
                        <div class="h-1.5 w-24 bg-gold mx-auto"></div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-xl hover:-translate-y-3 transition-all">
                            <span class="text-[10px] bg-gray-100 text-gray-500 px-3 py-1 rounded-full uppercase font-bold">Festival</span>
                            <h3 class="text-3xl font-bold text-navy mt-4">REGULER</h3>
                            <p class="text-gray-500 mt-2 text-sm">Akses standar area festival (berdiri).</p>
                            <p class="text-3xl font-black text-navy mt-8">Rp 2.500.000</p>
                            <button onclick="openTicketModal(2500000)" class="mt-6 w-full py-4 rounded-xl border-2 border-navy text-navy font-bold hover:bg-navy hover:text-cream transition-all uppercase text-xs">Pilih Tiket</button>
                        </div>
                        <div class="bg-navy rounded-3xl p-8 shadow-2xl hover:-translate-y-3 transition-all transform lg:scale-105 z-10 text-cream">
                            <span class="text-[10px] bg-gold text-navy px-3 py-1 rounded-full uppercase font-bold">Terpopuler</span>
                            <h3 class="text-3xl font-bold mt-4">VIP</h3>
                            <p class="text-cream/70 mt-2 text-sm">Tempat duduk bernomor & Jalur khusus.</p>
                            <p class="text-3xl font-black mt-8 text-gold">Rp 8.000.000</p>
                            <button onclick="openTicketModal(8000000)" class="mt-6 w-full py-4 rounded-xl bg-gold text-navy font-bold hover:bg-white transition-all uppercase text-xs">Pilih Tiket</button>
                        </div>
                        <div class="bg-white border-2 border-gold rounded-3xl p-8 shadow-xl hover:-translate-y-3 transition-all">
                            <span class="text-[10px] bg-gold/10 text-gold px-3 py-1 rounded-full uppercase font-bold italic">Ultimate</span>
                            <h3 class="text-3xl font-bold text-navy mt-4">VVIP</h3>
                            <p class="text-gray-500 mt-2 text-sm">Meet & Greet + Lounge Access.</p>
                            <p class="text-3xl font-black text-navy mt-8">Rp 20.000.000</p>
                            <button onclick="openTicketModal(20000000)" class="mt-6 w-full py-4 rounded-xl bg-navy text-cream font-bold hover:bg-gold transition-all uppercase text-xs">Pilih Tiket</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <div id="ticketModal" class="fixed inset-0 z-[100] hidden">
            <div class="fixed inset-0 bg-navy/90 backdrop-blur-md" onclick="closeModal()"></div>
            
            <div class="flex min-h-screen items-center justify-center p-4">
                <div class="relative z-[110] w-full max-w-md rounded-3xl bg-white p-8 shadow-2xl">
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-navy text-2xl">✕</button>

                    <div id="stepData">
                        <h3 class="text-2xl font-black text-navy uppercase italic mb-6">Informasi Pembeli</h3>
                        <div class="space-y-4 text-left">
                            <div>
                                <label class="text-[10px] font-bold uppercase text-gray-400">Nama Lengkap</label>
                                <input type="text" id="buyerName" class="w-full border-b-2 border-gray-100 py-2 focus:border-gold outline-none" placeholder="Masukkan nama..." required>
                            </div>
                            <div>
                                <label class="text-[10px] font-bold uppercase text-gray-400">Email</label>
                                <input type="email" id="buyerEmail" class="w-full border-b-2 border-gray-100 py-2 focus:border-gold outline-none" placeholder="email@anda.com" required>
                            </div>
                            <div>
                                <label class="text-[10px] font-bold uppercase text-gray-400">NO Handphone</label>
                                <input type="text" id="buyerName" class="w-full border-b-2 border-gray-100 py-2 focus:border-gold outline-none" placeholder="Masukkan no hp aktif..." required>
                            </div>
                            <div class="flex justify-between items-center py-4">
                                <label class="text-[10px] font-bold uppercase text-gray-400">Jumlah Tiket</label>
                                <div class="flex items-center gap-4 bg-gray-50 rounded-xl px-4 py-2">
                                    <button onclick="decrement()" class="text-navy font-bold text-xl hover:text-gold transition-colors">-</button>
                                    <span id="ticketCount" class="font-bold text-lg">1</span>
                                    <button onclick="increment()" class="text-navy font-bold text-xl hover:text-gold transition-colors">+</button>
                                </div>
                            </div>
                        </div>
                        <button onclick="showConfirmation()" class="w-full bg-navy text-cream py-4 rounded-xl font-bold mt-6 hover:bg-gold hover:text-navy transition-all uppercase text-xs tracking-widest text-center">Lanjut Konfirmasi</button>
                    </div>

                    <div id="stepConfirm" class="hidden text-center">
                        <div class="w-16 h-16 bg-gold/20 text-gold rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        </div>
                        <h3 class="text-2xl font-black text-navy italic mb-2 uppercase">Konfirmasi Data</h3>
                        <p class="text-gray-500 text-sm mb-8">Pastikan data dan jumlah tiket sudah sesuai.</p>
                        <div class="space-y-3">
                            <a href="{{ route('pembayaran') }}" id="payNowBtn" class="block w-full bg-navy text-white py-4 rounded-xl font-bold uppercase text-xs tracking-widest text-center shadow-lg hover:bg-green-900 transition-all">
                                Ya, Bayar Sekarang
                            </a>
                            <button onclick="backToData()" class="w-full py-2 text-gray-400 text-xs font-bold uppercase hover:text-navy transition-colors">Kembali Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
    const modal = document.getElementById('ticketModal');
    const stepData = document.getElementById('stepData');
    const stepConfirm = document.getElementById('stepConfirm');
    const countDisplay = document.getElementById('ticketCount');
    
    let count = 1;
    let selectedPrice = 0; // Variabel baru untuk menyimpan harga tiket yang dipilih

    function openTicketModal(price) {
        selectedPrice = price; // Simpan harga tiket yang dipilih
        count = 1; // Reset jumlah ke 1 setiap buka modal
        countDisplay.innerText = count;
        
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        updatePaymentLink();
    }

    function closeModal() {
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
    
    // Reset input agar bersih kembali
    document.getElementById('buyerName').value = "";
    document.getElementById('buyerEmail').value = "";
    
    backToData();
}

    function increment() { 
        count++; 
        countDisplay.innerText = count; 
        updatePaymentLink();
    }

    function decrement() { 
        if(count > 1) { 
            count--; 
            countDisplay.innerText = count; 
            updatePaymentLink();
        } 
    }

    function updatePaymentLink() {
        const payBtn = document.getElementById('payNowBtn');
        if(payBtn) {
            const baseUrl = "{{ route('pembayaran') }}";
            // SEKARANG KITA KIRIM QTY DAN PRICE LEWAT URL
            payBtn.href = baseUrl + "?qty=" + count + "&price=" + selectedPrice;
        }
    }

    function showConfirmation() {
    // 1. Ambil nilai input
    const name = document.getElementById('buyerName').value.trim();
    const email = document.getElementById('buyerEmail').value.trim();

    // 2. Cek apakah kosong
    if (name === "" || email === "") {
        alert("Mohon isi Nama dan Email terlebih dahulu!");
        return; // Berhenti di sini, jangan lanjut ke konfirmasi
    }

    // 3. Cek format email sederhana (harus ada @)
    if (!email.includes("@")) {
        alert("Mohon masukkan format email yang benar!");
        return;
    }

    // Jika semua oke, baru pindah ke step konfirmasi
    stepData.classList.add('hidden');
    stepConfirm.classList.remove('hidden');
}
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });
</script>
    </div>
</body>
</html>