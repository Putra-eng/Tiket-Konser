<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-Ticket | Bruno Mars Live in Jakarta 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root {
    --navy: #001F3F;
    --navy-light: #002a57;
    --cream: #F5F5DC;
    --cream-muted: #d4d4b8;
    --gold: #D4AF37;
    --gold-light: #e8ca5c;
    --gold-dark: #a88a20;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    font-family: 'Montserrat', sans-serif;
    background: var(--navy);
    min-height: 100vh;
    color: var(--cream);
  }
  .cormorant { font-family: 'Cormorant Garamond', serif; }

  /* Subtle starfield background */
  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image:
      radial-gradient(1px 1px at 20% 30%, rgba(212,175,55,0.3) 0%, transparent 100%),
      radial-gradient(1px 1px at 80% 10%, rgba(245,245,220,0.2) 0%, transparent 100%),
      radial-gradient(1px 1px at 50% 80%, rgba(212,175,55,0.2) 0%, transparent 100%),
      radial-gradient(1px 1px at 10% 60%, rgba(245,245,220,0.15) 0%, transparent 100%),
      radial-gradient(1px 1px at 90% 70%, rgba(212,175,55,0.25) 0%, transparent 100%),
      radial-gradient(2px 2px at 30% 15%, rgba(245,245,220,0.1) 0%, transparent 100%),
      radial-gradient(2px 2px at 70% 90%, rgba(212,175,55,0.15) 0%, transparent 100%);
    pointer-events: none;
    z-index: 0;
  }

  .container {
    position: relative;
    z-index: 1;
    max-width: 900px;
    margin: 0 auto;
    padding: 2rem 1rem;
  }

  /* ===== PAGE HEADER ===== */
  .page-header {
    text-align: center;
    padding: 2rem 0 1.5rem;
    border-bottom: 1px solid rgba(212,175,55,0.3);
    margin-bottom: 2rem;
  }
  .page-header .brand-label {
    font-size: 0.65rem;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 0.5rem;
  }
  .page-header h1 {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2.2rem;
    font-weight: 300;
    color: var(--cream);
    line-height: 1.2;
  }
  .page-header .subtitle {
    font-size: 0.7rem;
    letter-spacing: 0.2em;
    color: var(--cream-muted);
    margin-top: 0.5rem;
  }

  /* ===== SUCCESS BANNER ===== */
  .success-banner {
    background: linear-gradient(135deg, rgba(212,175,55,0.12) 0%, rgba(212,175,55,0.05) 100%);
    border: 1px solid rgba(212,175,55,0.4);
    border-radius: 8px;
    padding: 1.25rem 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
  }
  .success-icon {
    width: 44px; height: 44px;
    border-radius: 50%;
    border: 2px solid var(--gold);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .success-banner h2 { font-size: 0.95rem; font-weight: 600; color: var(--gold); margin-bottom: 0.2rem; }
  .success-banner p { font-size: 0.75rem; color: var(--cream-muted); }

  /* ===== STAT CARDS ===== */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    margin-bottom: 2rem;
  }
  @media (max-width: 600px) { .stats-grid { grid-template-columns: 1fr; } }
  .stat-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(212,175,55,0.2);
    border-radius: 8px;
    padding: 1.25rem;
    text-align: center;
  }
  .stat-card .stat-value {
    font-family: 'Cormorant Garamond', serif;
    font-size: 2rem;
    font-weight: 700;
    color: var(--gold);
    display: block;
  }
  .stat-card .stat-label {
    font-size: 0.65rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--cream-muted);
    margin-top: 0.25rem;
    display: block;
  }

  /* ===== SECTION TITLE ===== */
  .section-title {
    font-size: 0.65rem;
    letter-spacing: 0.4em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 1.25rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }
  .section-title::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(212,175,55,0.25);
  }

  /* ===== E-TICKET ===== */
  .ticket-wrapper { margin-bottom: 2rem; }

  .eticket {
    background: var(--navy-light);
    border: 1px solid rgba(212,175,55,0.5);
    border-radius: 12px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 0 60px rgba(212,175,55,0.08), 0 0 0 1px rgba(212,175,55,0.1);
  }

  /* Gold corner decorations */
  .eticket::before, .eticket::after {
    content: '';
    position: absolute;
    width: 24px; height: 24px;
    border-color: var(--gold);
    border-style: solid;
    border-width: 0;
    z-index: 10;
  }
  .eticket::before { top: 12px; left: 12px; border-top-width: 2px; border-left-width: 2px; }
  .eticket::after  { bottom: 12px; right: 12px; border-bottom-width: 2px; border-right-width: 2px; }

  /* Gold gradient bar at top */
  .ticket-top-bar {
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--gold), var(--gold-light), var(--gold), transparent);
  }

  /* HORIZONTAL layout (desktop) */
  .ticket-inner {
    display: flex;
    flex-direction: row;
  }

  .ticket-left {
    flex: 1;
    padding: 2rem;
    min-width: 0;
  }

  .ticket-right {
    width: 220px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 2rem 1.5rem;
  }

  /* Perforated separator */
  .ticket-separator {
    position: relative;
    width: 1px;
    align-self: stretch;
    flex-shrink: 0;
  }
  .ticket-separator::before {
    content: '';
    position: absolute;
    top: -12px; left: 50%;
    transform: translateX(-50%);
    width: 24px; height: 24px;
    background: var(--navy);
    border-radius: 50%;
    border: 1px solid rgba(212,175,55,0.4);
  }
  .ticket-separator::after {
    content: '';
    position: absolute;
    bottom: -12px; left: 50%;
    transform: translateX(-50%);
    width: 24px; height: 24px;
    background: var(--navy);
    border-radius: 50%;
    border: 1px solid rgba(212,175,55,0.4);
  }
  .ticket-separator .perf-line {
    position: absolute;
    top: 12px; bottom: 12px; left: 50%;
    width: 0;
    border-left: 2px dashed rgba(212,175,55,0.35);
  }

  /* MOBILE: vertical layout */
  @media (max-width: 640px) {
    .ticket-inner { flex-direction: column; }
    .ticket-left  { padding: 1.5rem; }
    .ticket-right { width: 100%; padding: 1.5rem; }

    .ticket-separator {
      height: 1px;
      width: auto;
      align-self: auto;
    }
    .ticket-separator::before {
      top: 50%; left: -12px;
      transform: translateY(-50%);
    }
    .ticket-separator::after {
      top: 50%; right: -12px; left: auto;
      transform: translateY(-50%);
    }
    .ticket-separator .perf-line {
      top: 50%; left: 12px; right: 12px; bottom: auto;
      height: 0; width: auto;
      border-left: none;
      border-top: 2px dashed rgba(212,175,55,0.35);
    }
  }

  /* Badge kategori */
  .ticket-category-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    background: rgba(212,175,55,0.15);
    border: 1px solid rgba(212,175,55,0.5);
    border-radius: 999px;
    padding: 0.25rem 0.75rem;
    font-size: 0.6rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 1.25rem;
  }
  .ticket-category-badge .dot {
    width: 6px; height: 6px;
    background: var(--gold);
    border-radius: 50%;
  }

  /* Artis section */
  .ticket-artist-section {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
  }
  .artist-photo {
    width: 60px; height: 60px;
    border-radius: 8px;
    border: 2px solid var(--gold);
    background: rgba(212,175,55,0.05);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .artist-name {
    font-family: 'Cormorant Garamond', serif;
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--cream);
    line-height: 1.1;
  }
  .artist-subtitle {
    font-size: 0.65rem;
    letter-spacing: 0.2em;
    color: var(--gold);
    text-transform: uppercase;
    margin-top: 0.2rem;
  }

  .ticket-divider {
    height: 1px;
    background: rgba(212,175,55,0.2);
    margin: 1.25rem 0;
  }

  /* Info grid */
  .ticket-info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
  }
  @media (max-width: 400px) { .ticket-info-grid { grid-template-columns: 1fr; } }

  .info-item .info-label {
    font-size: 0.58rem;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: var(--cream-muted);
    margin-bottom: 0.25rem;
  }
  .info-item .info-value {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--cream);
  }
  .info-item .info-value.gold { color: var(--gold); }

  /* Benefits */
  .benefits-list {
    display: flex;
    flex-direction: column;
    gap: 0.35rem;
    margin-top: 1.25rem;
  }
  .benefit-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.72rem;
    color: var(--cream-muted);
  }

  /* QR area */
  .qr-label {
    font-size: 0.58rem;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    color: var(--gold);
    margin-bottom: 1rem;
    text-align: center;
  }
  .qr-box {
    width: 140px; height: 140px;
    border: 2px solid var(--gold);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    background: rgba(212,175,55,0.04);
    position: relative;
    margin: 0 auto;
  }
  .qr-box::before, .qr-box::after {
    content: '';
    position: absolute;
    width: 16px; height: 16px;
    border-color: var(--gold-light);
    border-style: solid;
  }
  .qr-box::before { top: 6px; left: 6px;   border-width: 2px 0 0 2px; }
  .qr-box::after  { bottom: 6px; right: 6px; border-width: 0 2px 2px 0; }

  @media (max-width: 640px) {
    .qr-box { width: 180px; height: 180px; }
    .qr-inner-grid { width: 135px !important; height: 135px !important; }
  }

  .qr-inner-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    grid-template-rows: repeat(7, 1fr);
    gap: 2px;
    width: 105px; height: 105px;
    opacity: 0.6;
  }
  .qr-cell { background: var(--gold); border-radius: 1px; }
  .qr-cell.empty { background: transparent; }

  .qr-instruction {
    font-size: 0.62rem;
    text-align: center;
    color: var(--cream-muted);
    margin-top: 1rem;
    line-height: 1.5;
    max-width: 160px;
  }
  .ticket-serial {
    font-family: 'Montserrat', monospace;
    font-size: 0.6rem;
    letter-spacing: 0.15em;
    color: rgba(212,175,55,0.5);
    text-align: center;
    margin-top: 0.75rem;
  }

  /* ===== ORDER SUMMARY ===== */
  .order-card {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(212,175,55,0.2);
    border-radius: 8px;
    padding: 1.5rem;
    margin-bottom: 2rem;
  }
  .order-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.6rem 0;
    font-size: 0.8rem;
    border-bottom: 1px solid rgba(212,175,55,0.08);
  }
  .order-row:last-child { border-bottom: none; }
  .order-row.total {
    margin-top: 0.5rem;
    padding-top: 0.75rem;
    border-top: 1px solid rgba(212,175,55,0.3);
    border-bottom: none;
    font-weight: 600;
  }
  .order-row .label { color: var(--cream-muted); }
  .order-row .value { color: var(--cream); font-weight: 500; }
  .order-row.total .value { color: var(--gold); font-size: 1rem; }

  /* ===== ACTION BUTTONS ===== */
  .actions-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
  }
  .btn-primary {
    flex: 1; min-width: 140px;
    padding: 0.875rem 1.5rem;
    background: var(--gold);
    color: var(--navy);
    border: none; border-radius: 6px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.72rem; font-weight: 700;
    letter-spacing: 0.15em; text-transform: uppercase;
    cursor: pointer; transition: all 0.2s;
  }
  .btn-primary:hover { background: var(--gold-light); transform: translateY(-1px); }
  .btn-outline {
    flex: 1; min-width: 140px;
    padding: 0.875rem 1.5rem;
    background: transparent;
    color: var(--gold);
    border: 1px solid rgba(212,175,55,0.5);
    border-radius: 6px;
    font-family: 'Montserrat', sans-serif;
    font-size: 0.72rem; font-weight: 600;
    letter-spacing: 0.15em; text-transform: uppercase;
    cursor: pointer; transition: all 0.2s;
  }
  .btn-outline:hover { background: rgba(212,175,55,0.08); }

  /* ===== FOOTER ===== */
  .page-footer {
    text-align: center;
    margin-top: 3rem;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(212,175,55,0.15);
    font-size: 0.65rem;
    letter-spacing: 0.1em;
    color: rgba(245,245,220,0.3);
  }

  /* Fade-in animations */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .fade-up  { animation: fadeUp 0.6s ease forwards; }
  .delay-1  { animation-delay: 0.1s; opacity: 0; }
  .delay-2  { animation-delay: 0.2s; opacity: 0; }
  .delay-3  { animation-delay: 0.3s; opacity: 0; }
  .delay-4  { animation-delay: 0.4s; opacity: 0; }
</style>
</head>
<body>
<div class="container">

  {{-- ===== PAGE HEADER ===== --}}
  <div class="page-header fade-up">
    <p class="brand-label">&#9670; Tiketku Premium &#9670;</p>
    <h1>Tiket Saya</h1>
    <p class="subtitle">Ringkasan Pemesanan &amp; E-Ticket Digital</p>
  </div>

  {{-- ===== SUCCESS BANNER ===== --}}
  <div class="success-banner fade-up delay-1">
    <div class="success-icon">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
           stroke="#D4AF37" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="20 6 9 17 4 12"/>
      </svg>
    </div>
    <div>
      <h2>Pembayaran Berhasil!</h2>
      {{-- Ganti dengan: {{ $order->status_message }} --}}
      <p>Tiket Anda telah diterbitkan. Simpan QR Code ini untuk digunakan saat check-in di gate.</p>
    </div>
  </div>

  {{-- ===== STAT CARDS ===== --}}
  <div class="stats-grid fade-up delay-2">
    <div class="stat-card">
      {{-- Ganti dengan: {{ $order->quantity }} --}}
      <span class="stat-value">2</span>
      <span class="stat-label">Tiket Dibeli</span>
    </div>
    <div class="stat-card">
      {{-- Ganti dengan: {{ $ticket->category }} --}}
      <span class="stat-value">VIP</span>
      <span class="stat-label">Kategori</span>
    </div>
    <div class="stat-card">
      <span class="stat-value">
        {{-- Ganti dengan: {{ $event->date->format('d') }} --}}
        19
        <span style="font-size:1rem; font-weight:300"> Sep</span>
      </span>
      <span class="stat-label">Tanggal Acara</span>
    </div>
  </div>

  {{-- ===== E-TICKET ===== --}}
  <div class="ticket-wrapper fade-up delay-3">
    <div class="section-title">E-Ticket Digital</div>

    <div class="eticket">
      <div class="ticket-top-bar"></div>

      <div class="ticket-inner">

        {{-- LEFT: Info Konser --}}
        <div class="ticket-left">

          {{-- Badge Kategori --}}
          <div class="ticket-category-badge">
            <span class="dot"></span>
            {{-- Ganti dengan: {{ $ticket->category }} — {{ $ticket->category_description }} --}}
            VIP — Numbered Seat
          </div>

          {{-- Artis --}}
          <div class="ticket-artist-section">
            <div class="artist-photo">
              {{-- Ganti dengan: <img src="{{ $event->artist_photo }}" alt="{{ $event->artist }}" style="width:100%;height:100%;object-fit:cover;border-radius:6px;"> --}}
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                   stroke="#D4AF37" stroke-width="1.5" stroke-linecap="round">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
              </svg>
            </div>
            <div>
              {{-- Ganti dengan: {{ $event->artist }} --}}
              <div class="artist-name">Bruno Mars</div>
              <div class="artist-subtitle">&#9679; Live in Jakarta &#9679; 2026</div>
            </div>
          </div>

          <div class="ticket-divider"></div>

          {{-- Detail Info --}}
          <div class="ticket-info-grid">
            <div class="info-item">
              <div class="info-label">Tanggal</div>
              {{-- Ganti dengan: {{ $event->date->isoFormat('dddd, D MMMM YYYY') }} --}}
              <div class="info-value">Sabtu, 19 September 2026</div>
            </div>
            <div class="info-item">
              <div class="info-label">Doors Open</div>
              {{-- Ganti dengan: {{ $event->doors_open }} WIB --}}
              <div class="info-value gold">17:00 WIB</div>
            </div>
            <div class="info-item">
              <div class="info-label">Venue</div>
              {{-- Ganti dengan: {{ $event->venue_name }} --}}
              <div class="info-value">Gelora Bung Karno</div>
            </div>
            <div class="info-item">
              <div class="info-label">Area</div>
              {{-- Ganti dengan: {{ $event->venue_area }} --}}
              <div class="info-value">GBK Main Stadium</div>
            </div>
            <div class="info-item">
              <div class="info-label">Nomor Kursi</div>
              {{-- Ganti dengan: {{ $ticket->seat_number }} --}}
              <div class="info-value gold">Blok V — Baris 3 — 14</div>
            </div>
            <div class="info-item">
              <div class="info-label">Pemegang Tiket</div>
              {{-- Ganti dengan: {{ $ticket->holder_name }} --}}
              <div class="info-value">Rizky Ananda</div>
            </div>
          </div>

          <div class="ticket-divider"></div>

          {{-- Benefits --}}
          <div style="font-size:0.6rem;letter-spacing:0.25em;text-transform:uppercase;color:var(--gold);margin-bottom:0.6rem;">
            {{-- Ganti dengan: Benefit {{ $ticket->category }} --}}
            Benefit VIP
          </div>
          <div class="benefits-list">
            {{-- Loop: @foreach($ticket->benefits as $benefit) --}}
            <div class="benefit-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                   stroke="#D4AF37" stroke-width="2.5" style="flex-shrink:0">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              Tempat duduk bernomor — akses prioritas
            </div>
            <div class="benefit-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                   stroke="#D4AF37" stroke-width="2.5" style="flex-shrink:0">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              Merchandise eksklusif konser
            </div>
            <div class="benefit-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                   stroke="#D4AF37" stroke-width="2.5" style="flex-shrink:0">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              Jalur masuk khusus VIP gate
            </div>
            {{-- @endforeach --}}
          </div>
        </div>

        {{-- SEPARATOR (perforated line) --}}
        <div class="ticket-separator">
          <div class="perf-line"></div>
        </div>

        {{-- RIGHT: QR Code --}}
        <div class="ticket-right">
          <div class="qr-label">Scan untuk check-in</div>

          <div class="qr-box">
            {{--
              Untuk QR Code asli, install package:
              composer require simplesoftwareio/simple-qrcode

              Lalu ganti placeholder ini dengan:
              {!! QrCode::size(130)->color(212,175,55)->generate($ticket->code) !!}

              Atau gunakan img tag:
              <img src="{{ route('ticket.qr', $ticket->code) }}" width="130" height="130" alt="QR Code">
            --}}
            <div class="qr-inner-grid" id="qr-grid"></div>
          </div>

          <div class="qr-instruction">
            Tunjukkan QR Code ini kepada petugas di pintu masuk
          </div>

          {{-- Ganti dengan: {{ $ticket->code }} --}}
          <div class="ticket-serial">#TKT-2026-VIP-0849-JKT</div>
        </div>

      </div>{{-- end .ticket-inner --}}
    </div>{{-- end .eticket --}}
  </div>{{-- end .ticket-wrapper --}}

  {{-- ===== RINGKASAN PESANAN ===== --}}
  <div class="fade-up delay-4">
    <div class="section-title">Ringkasan Pesanan</div>

    <div class="order-card">
      <div class="order-row">
        <span class="label">Nomor Pesanan</span>
        {{-- Ganti dengan: {{ $order->order_number }} --}}
        <span class="value" style="font-family:monospace;color:var(--gold);">#ORD-20260901-7823</span>
      </div>
      <div class="order-row">
        <span class="label">Tanggal Pembelian</span>
        {{-- Ganti dengan: {{ $order->created_at->isoFormat('D MMM YYYY — HH:mm') }} WIB --}}
        <span class="value">01 Sep 2026 — 14:32 WIB</span>
      </div>
      <div class="order-row">
        {{-- Ganti dengan: {{ $order->quantity }}× Tiket {{ $ticket->category }} --}}
        <span class="label">2&times; Tiket VIP</span>
        {{-- Ganti dengan: Rp {{ number_format($order->subtotal, 0, ',', '.') }} --}}
        <span class="value">Rp 2.900.000</span>
      </div>
      <div class="order-row">
        <span class="label">Biaya Layanan</span>
        {{-- Ganti dengan: Rp {{ number_format($order->service_fee, 0, ',', '.') }} --}}
        <span class="value">Rp 150.000</span>
      </div>
      <div class="order-row">
        <span class="label">Biaya Transaksi</span>
        {{-- Ganti dengan: Rp {{ number_format($order->transaction_fee, 0, ',', '.') }} --}}
        <span class="value">Rp 5.000</span>
      </div>
      <div class="order-row total">
        <span class="label" style="color:var(--cream);">Total Pembayaran</span>
        {{-- Ganti dengan: Rp {{ number_format($order->total, 0, ',', '.') }} --}}
        <span class="value">Rp 3.055.000</span>
      </div>
    </div>

    {{-- Action Buttons --}}
    <div class="actions-row">
      {{-- Ganti dengan: <a href="{{ route('ticket.download', $ticket->code) }}" class="btn-primary"> --}}
      <button class="btn-primary">&#8659; Unduh E-Ticket</button>
      {{-- Ganti dengan: <a href="{{ route('ticket.email', $ticket->code) }}" class="btn-outline"> --}}
      <button class="btn-outline">&#9993; Kirim via Email</button>
      <button class="btn-outline">&#8634; Tambah ke Kalender</button>
    </div>
  </div>

  {{-- ===== FOOTER ===== --}}
  <div class="page-footer">
    <p>Tiket ini diterbitkan oleh Tiketku Premium &bull; Dilarang diperjualbelikan kembali</p>
    <p style="margin-top:0.25rem;">Bantuan: support@tiketku.id &bull; 021-1234-5678</p>
  </div>

</div>{{-- end .container --}}

<script>
  // QR Code placeholder — hapus script ini setelah pakai package QR asli
  const grid = document.getElementById('qr-grid');
  if (grid) {
    const base = [1,1,1,0,1,0,1,1,0,1,0,0,1,1,1,1,1,1,0,0,1,0,0,1,0,1,1,0,1,1,1,0,1,0,1,1,0,0,1,0,1,1,1,1,0,1,1,0,1];
    base.forEach(filled => {
      const cell = document.createElement('div');
      cell.className = filled ? 'qr-cell' : 'qr-cell empty';
      grid.appendChild(cell);
    });
  }
</script>
</body>
</html>