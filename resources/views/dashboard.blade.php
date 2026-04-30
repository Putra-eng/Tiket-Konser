{{-- dashboard.blade.php --}}
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
                    <a href="{{ route('welcome') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-cream/10 border border-cream/20 group transition-all duration-300">
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
                        @foreach ($tikets as $tiket)
                            @php
                                $isVip      = strtoupper($tiket->kategori) === 'VIP';
                                $isVvip     = strtoupper($tiket->kategori) === 'VVIP';
                                $habis      = $tiket->stok <= 0;
                                $formatter  = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
                            @endphp

                            @if ($isVip)
                            {{-- Kartu VIP - Featured --}}
                            <div class="bg-navy rounded-3xl p-8 shadow-2xl hover:-translate-y-3 transition-all transform lg:scale-105 z-10 text-cream {{ $habis ? 'opacity-60' : '' }}">
                                <span class="text-[10px] bg-gold text-navy px-3 py-1 rounded-full uppercase font-bold">Terpopuler</span>
                                <h3 class="text-3xl font-bold mt-4">{{ strtoupper($tiket->kategori) }}</h3>
                                <p class="text-cream/70 mt-2 text-sm">Tempat duduk bernomor &amp; Jalur khusus.</p>
                                <p class="text-3xl font-black mt-8 text-gold">
                                    Rp {{ number_format($tiket->harga, 0, ',', '.') }}
                                </p>
                                <div class="mt-4 flex items-center gap-2">
                                    <span class="text-[10px] font-bold uppercase tracking-widest {{ $habis ? 'text-red-400' : 'text-cream/60' }}">
                                        Stok: {{ $habis ? 'Habis' : $tiket->stok . ' tiket' }}
                                    </span>
                                </div>
                                <button
                                    onclick="openTicketModal({{ $tiket->id_tiket }}, {{ $tiket->harga }}, '{{ $tiket->kategori }}')"
                                    {{ $habis ? 'disabled' : '' }}
                                    class="mt-6 w-full py-4 rounded-xl bg-gold text-navy font-bold hover:bg-white transition-all uppercase text-xs {{ $habis ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    {{ $habis ? 'Stok Habis' : 'Pilih Tiket' }}
                                </button>
                            </div>

                            @elseif ($isVvip)
                            {{-- Kartu VVIP --}}
                            <div class="bg-white border-2 border-gold rounded-3xl p-8 shadow-xl hover:-translate-y-3 transition-all {{ $habis ? 'opacity-60' : '' }}">
                                <span class="text-[10px] bg-gold/10 text-gold px-3 py-1 rounded-full uppercase font-bold italic">Ultimate</span>
                                <h3 class="text-3xl font-bold text-navy mt-4">{{ strtoupper($tiket->kategori) }}</h3>
                                <p class="text-gray-500 mt-2 text-sm">Meet &amp; Greet + Lounge Access.</p>
                                <p class="text-3xl font-black text-navy mt-8">
                                    Rp {{ number_format($tiket->harga, 0, ',', '.') }}
                                </p>
                                <div class="mt-4">
                                    <span class="text-[10px] font-bold uppercase tracking-widest {{ $habis ? 'text-red-500' : 'text-gray-400' }}">
                                        Stok: {{ $habis ? 'Habis' : $tiket->stok . ' tiket' }}
                                    </span>
                                </div>
                                <button
                                    onclick="openTicketModal({{ $tiket->id_tiket }}, {{ $tiket->harga }}, '{{ $tiket->kategori }}')"
                                    {{ $habis ? 'disabled' : '' }}
                                    class="mt-6 w-full py-4 rounded-xl bg-navy text-cream font-bold hover:bg-gold transition-all uppercase text-xs {{ $habis ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    {{ $habis ? 'Stok Habis' : 'Pilih Tiket' }}
                                </button>
                            </div>

                            @else
                            {{-- Kartu Reguler / default --}}
                            <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-xl hover:-translate-y-3 transition-all {{ $habis ? 'opacity-60' : '' }}">
                                <span class="text-[10px] bg-gray-100 text-gray-500 px-3 py-1 rounded-full uppercase font-bold">Festival</span>
                                <h3 class="text-3xl font-bold text-navy mt-4">{{ strtoupper($tiket->kategori) }}</h3>
                                <p class="text-gray-500 mt-2 text-sm">Akses standar area festival (berdiri).</p>
                                <p class="text-3xl font-black text-navy mt-8">
                                    Rp {{ number_format($tiket->harga, 0, ',', '.') }}
                                </p>
                                <div class="mt-4">
                                    <span class="text-[10px] font-bold uppercase tracking-widest {{ $habis ? 'text-red-500' : 'text-gray-400' }}">
                                        Stok: {{ $habis ? 'Habis' : $tiket->stok . ' tiket' }}
                                    </span>
                                </div>
                                <button
                                    onclick="openTicketModal({{ $tiket->id_tiket }}, {{ $tiket->harga }}, '{{ $tiket->kategori }}')"
                                    {{ $habis ? 'disabled' : '' }}
                                    class="mt-6 w-full py-4 rounded-xl border-2 border-navy text-navy font-bold hover:bg-navy hover:text-cream transition-all uppercase text-xs {{ $habis ? 'opacity-50 cursor-not-allowed' : '' }}">
                                    {{ $habis ? 'Stok Habis' : 'Pilih Tiket' }}
                                </button>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        </main>

        {{-- ===================== MODAL ===================== --}}
        <div id="ticketModal" class="fixed inset-0 z-[100] hidden">
            <div class="fixed inset-0 bg-navy/90 backdrop-blur-md" onclick="closeModal()"></div>

            <div class="flex min-h-screen items-center justify-center p-4">
                <div class="relative z-[110] w-full max-w-md rounded-3xl bg-white p-8 shadow-2xl">
                    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-navy text-2xl">✕</button>

                    {{-- Step 1: Isi Data --}}
                    <div id="stepData">
                        <h3 class="text-2xl font-black text-navy uppercase italic mb-1">Informasi Pembeli</h3>
                        <p id="modalKategoriLabel" class="text-[10px] font-bold text-gold uppercase tracking-widest mb-6">—</p>

                        <div class="space-y-4 text-left">
                            <div>
                                <label class="text-[10px] font-bold uppercase text-gray-400">Nama Lengkap</label>
                                <input type="text" id="buyerName" class="w-full border-b-2 border-gray-100 py-2 focus:border-gold outline-none" placeholder="Masukkan nama...">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold uppercase text-gray-400">Email</label>
                                <input type="email" id="buyerEmail" class="w-full border-b-2 border-gray-100 py-2 focus:border-gold outline-none" placeholder="email@anda.com">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold uppercase text-gray-400">No Handphone</label>
                                <input type="text" id="buyerPhone" class="w-full border-b-2 border-gray-100 py-2 focus:border-gold outline-none" placeholder="Masukkan no hp aktif...">
                            </div>
                            <div class="flex justify-between items-center py-4">
                                <label class="text-[10px] font-bold uppercase text-gray-400">Jumlah Tiket</label>
                                <div class="flex items-center gap-4 bg-gray-50 rounded-xl px-4 py-2">
                                    <button onclick="decrement()" class="text-navy font-bold text-xl hover:text-gold transition-colors">-</button>
                                    <span id="ticketCount" class="font-bold text-lg">1</span>
                                    <button onclick="increment()" class="text-navy font-bold text-xl hover:text-gold transition-colors">+</button>
                                </div>
                            </div>
                            <div class="flex justify-between items-center bg-gray-50 rounded-xl px-4 py-3">
                                <span class="text-[10px] font-bold uppercase text-gray-400">Subtotal</span>
                                <span id="subtotalDisplay" class="font-black text-navy text-sm">Rp 0</span>
                            </div>
                        </div>
                        <button onclick="showConfirmation()" class="w-full bg-navy text-cream py-4 rounded-xl font-bold mt-6 hover:bg-gold hover:text-navy transition-all uppercase text-xs tracking-widest">
                            Lanjut Konfirmasi
                        </button>
                    </div>

                    {{-- Step 2: Konfirmasi --}}
                    <div id="stepConfirm" class="hidden text-center">
                        <div class="w-16 h-16 bg-gold/20 text-gold rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-navy italic mb-2 uppercase">Konfirmasi Data</h3>
                        <p class="text-gray-500 text-sm mb-2">Pastikan data dan jumlah tiket sudah sesuai.</p>

                        {{-- Ringkasan --}}
                        <div class="bg-gray-50 rounded-2xl p-4 text-left mb-6 space-y-2">
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400 font-bold uppercase">Nama</span>
                                <span id="confirmNama" class="font-bold text-navy">—</span>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400 font-bold uppercase">Email</span>
                                <span id="confirmEmail" class="font-bold text-navy">—</span>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400 font-bold uppercase">Kategori</span>
                                <span id="confirmKategori" class="font-bold text-navy">—</span>
                            </div>
                            <div class="flex justify-between text-xs">
                                <span class="text-gray-400 font-bold uppercase">Jumlah</span>
                                <span id="confirmJumlah" class="font-bold text-navy">—</span>
                            </div>
                            <div class="flex justify-between text-xs border-t pt-2 mt-2">
                                <span class="text-gray-400 font-bold uppercase">Total</span>
                                <span id="confirmTotal" class="font-black text-gold">—</span>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <button onclick="submitPemesanan()" class="block w-full bg-navy text-white py-4 rounded-xl font-bold uppercase text-xs tracking-widest text-center shadow-lg hover:bg-green-900 transition-all">
                                Ya, Bayar Sekarang
                            </button>
                            <button onclick="backToData()" class="w-full py-2 text-gray-400 text-xs font-bold uppercase hover:text-navy transition-colors">
                                Kembali Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form tersembunyi untuk submit ke server --}}
        <form id="pemesananForm" action="{{ route('pemesanan.store') }}" method="POST" class="hidden">
            @csrf
            <input type="hidden" name="nama"     id="formNama">
            <input type="hidden" name="email"    id="formEmail">
            <input type="hidden" name="no_hp"    id="formNoHp">
            <input type="hidden" name="jumlah"   id="formJumlah">
            <input type="hidden" name="id_tiket" id="formTiketId">
        </form>

    </div>

    <script>
        const modal       = document.getElementById('ticketModal');
        const stepData    = document.getElementById('stepData');
        const stepConfirm = document.getElementById('stepConfirm');
        const countDisplay = document.getElementById('ticketCount');

        let count            = 1;
        let selectedPrice    = 0;
        let selectedTiketId  = null;
        let selectedKategori = '';

        const rupiahFormat = (n) =>
            'Rp ' + new Intl.NumberFormat('id-ID').format(n);

        function openTicketModal(tiketId, price, kategori) {
            selectedTiketId  = tiketId;
            selectedPrice    = price;
            selectedKategori = kategori;
            count = 1;

            countDisplay.innerText = count;
            document.getElementById('modalKategoriLabel').innerText =
                kategori.toUpperCase() + ' — ' + rupiahFormat(price) + ' / tiket';
            updateSubtotal();

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            stepData.classList.remove('hidden');
            stepConfirm.classList.add('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.getElementById('buyerName').value  = '';
            document.getElementById('buyerEmail').value = '';
            document.getElementById('buyerPhone').value = '';
            backToData();
        }

        function increment() {
            count++;
            countDisplay.innerText = count;
            updateSubtotal();
        }

        function decrement() {
            if (count > 1) {
                count--;
                countDisplay.innerText = count;
                updateSubtotal();
            }
        }

        function updateSubtotal() {
            document.getElementById('subtotalDisplay').innerText =
                rupiahFormat(count * selectedPrice);
        }

        function showConfirmation() {
            const name  = document.getElementById('buyerName').value.trim();
            const email = document.getElementById('buyerEmail').value.trim();
            const phone = document.getElementById('buyerPhone').value.trim();

            if (!name || !email || !phone) {
                alert('Mohon isi semua data terlebih dahulu!');
                return;
            }
            if (!email.includes('@')) {
                alert('Mohon masukkan format email yang benar!');
                return;
            }

            // Isi ringkasan konfirmasi
            document.getElementById('confirmNama').innerText     = name;
            document.getElementById('confirmEmail').innerText    = email;
            document.getElementById('confirmKategori').innerText = selectedKategori.toUpperCase();
            document.getElementById('confirmJumlah').innerText   = count + ' tiket';
            document.getElementById('confirmTotal').innerText    = rupiahFormat(count * selectedPrice);

            stepData.classList.add('hidden');
            stepConfirm.classList.remove('hidden');
        }

        function backToData() {
            stepConfirm.classList.add('hidden');
            stepData.classList.remove('hidden');
        }

        function submitPemesanan() {
            document.getElementById('formNama').value    = document.getElementById('buyerName').value;
            document.getElementById('formEmail').value   = document.getElementById('buyerEmail').value;
            document.getElementById('formNoHp').value    = document.getElementById('buyerPhone').value;
            document.getElementById('formJumlah').value  = count;
            document.getElementById('formTiketId').value = selectedTiketId;
            document.getElementById('pemesananForm').submit();
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });
    </script>
</body>
</html>
