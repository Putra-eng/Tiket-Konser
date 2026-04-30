{{-- welcome.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bruno Mars — Live in Jakarta 2026</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,600&family=Mrs+Saint+Delafield&family=Jost:wght@200;300;400&display=swap" rel="stylesheet"/>

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<style>
/* ── RESET & BASE ─────────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
:root {
  --navy:      #001020;
  --navy-mid:  #001F3F;
  --navy-lite: #002d5a;
  --gold:      #C9A84C;
  --gold-lt:   #E8C96A;
  --gold-dim:  rgba(201,168,76,0.18);
  --cream:     #F0EAD6;
  --cream-dim: rgba(240,234,214,0.55);
  --glass:     rgba(0,18,42,0.55);
}
body {
  background: var(--navy);
  color: var(--cream);
  font-family: 'Jost', sans-serif;
  font-weight: 300;
  overflow-x: hidden;
  cursor: none;
}
::selection { background: var(--gold); color: var(--navy); }

/* ── CUSTOM CURSOR ──────────────────────────────────────── */
#cursor {
  position: fixed; top: 0; left: 0; z-index: 99999;
  width: 12px; height: 12px;
  background: var(--gold);
  border-radius: 50%;
  pointer-events: none;
  mix-blend-mode: difference;
  transform: translate(-50%, -50%);
  transition: width .25s, height .25s, background .25s;
}
#cursor-ring {
  position: fixed; top: 0; left: 0; z-index: 99998;
  width: 38px; height: 38px;
  border: 1px solid rgba(201,168,76,0.55);
  border-radius: 50%;
  pointer-events: none;
  transform: translate(-50%, -50%);
}
body:hover #cursor { width: 12px; height: 12px; }
a:hover ~ #cursor, button:hover ~ #cursor { width: 22px; height: 22px; }

/* ── CANVAS BG ──────────────────────────────────────────── */
#mesh-canvas {
  position: fixed; inset: 0; z-index: 0;
  pointer-events: none;
}

/* ── GOLD DUST ──────────────────────────────────────────── */
.dust {
  position: fixed;
  border-radius: 50%;
  background: var(--gold);
  pointer-events: none;
  z-index: 1;
  opacity: 0;
}

/* ── PRELOADER ──────────────────────────────────────────── */
#preloader {
  position: fixed; inset: 0; z-index: 9000;
  background: var(--navy);
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  gap: 2.5rem;
}
#preloader-line {
  width: 1px; height: 0;
  background: linear-gradient(to bottom, transparent, var(--gold), transparent);
  position: absolute; top: 0; left: 50%;
}
.pre-eyebrow {
  font-family: 'Jost', sans-serif;
  font-size: .65rem;
  letter-spacing: .6em;
  text-transform: uppercase;
  color: rgba(201,168,76,.5);
  opacity: 0;
}
#sig-wrap {
  position: relative;
  display: flex; align-items: center; justify-content: center;
  opacity: 0;
}
/* The signature font text rendered into SVG path via JS */
#sig-svg path {
  fill: none;
  stroke: var(--gold);
  stroke-width: 1.8;
  stroke-linecap: round;
  stroke-linejoin: round;
  filter: drop-shadow(0 0 8px rgba(201,168,76,.6));
}
.pre-subtitle {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1rem;
  font-weight: 300;
  letter-spacing: .5em;
  color: var(--cream-dim);
  text-transform: uppercase;
  opacity: 0;
}
#preloader-bar-wrap {
  width: 180px; height: 1px;
  background: rgba(201,168,76,.15);
  position: relative; overflow: hidden;
  opacity: 0;
}
#preloader-bar {
  position: absolute; top: 0; left: 0;
  height: 100%; width: 0%;
  background: var(--gold);
}

/* ── NAVBAR ─────────────────────────────────────────────── */
#nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 500;
  padding: 1.8rem 3rem;
  display: flex; align-items: center; justify-content: space-between;
  transition: background .5s ease, padding .5s ease;
}
#nav.scrolled {
  background: rgba(0,16,32,.82);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  padding: 1.1rem 3rem;
  border-bottom: 1px solid rgba(201,168,76,.12);
}
.nav-brand {
  font-family: 'Cormorant Garamond', serif;
  font-size: .95rem; font-weight: 600;
  letter-spacing: .35em; color: var(--gold);
  text-transform: uppercase;
}
.nav-items {
  display: flex; align-items: center; gap: 3rem;
}
.nav-items a {
  font-size: .68rem; letter-spacing: .25em; text-transform: uppercase;
  color: var(--cream-dim); text-decoration: none;
  transition: color .3s;
}
.nav-items a:hover { color: var(--gold); }
.btn-ticket {
  font-family: 'Cormorant Garamond', serif;
  font-size: .8rem; letter-spacing: .22em;
  color: var(--navy); background: var(--gold);
  border: none; padding: .6rem 1.8rem;
  cursor: none; text-transform: uppercase;
  transition: background .3s, box-shadow .3s;
  clip-path: polygon(6px 0%,100% 0%,calc(100% - 6px) 100%,0% 100%);
}
.btn-ticket:hover {
  background: var(--gold-lt);
  box-shadow: 0 0 28px rgba(201,168,76,.45);
}

/* ── SECTIONS ───────────────────────────────────────────── */
section { position: relative; min-height: 100vh; z-index: 2; }

/* ── HERO ───────────────────────────────────────────────── */
#hero {
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  overflow: hidden;
  isolation: isolate;
}
.hero-img-wrap {
  position: absolute; inset: 0; z-index: -1;
  overflow: hidden;
}
.hero-img-wrap img {
  width: 100%; height: 100%;
  object-fit: cover;
  transform: scale(1.08);
  filter: brightness(.35) saturate(1.1);
}
.hero-img-overlay {
  position: absolute; inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(0,10,24,.55) 0%,
    rgba(0,16,40,.25) 40%,
    rgba(0,10,24,.88) 100%
  );
}
.hero-img-gold-tint {
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 50% 60%,
    rgba(201,168,76,.12) 0%,
    transparent 65%);
}
/* Hero text */
.hero-inner {
  position: relative; z-index: 5;
  text-align: center; padding: 0 2rem;
}
.hero-date-tag {
  font-size: .65rem; letter-spacing: .55em;
  text-transform: uppercase; color: var(--gold);
  font-family: 'Jost', sans-serif; font-weight: 400;
  border: 1px solid rgba(201,168,76,.28);
  display: inline-block; padding: .35rem 1.4rem;
  margin-bottom: 2.5rem;
  opacity: 0;
}
.hero-title-main {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(6rem, 17vw, 15rem);
  font-weight: 700;
  color: var(--gold);
  line-height: .85;
  letter-spacing: -.015em;
  text-shadow: 0 0 120px rgba(201,168,76,.2);
  opacity: 0;
}
.hero-title-sub {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(1rem, 3vw, 2rem);
  font-weight: 300;
  font-style: italic;
  color: var(--cream-dim);
  letter-spacing: .12em;
  margin-top: .5rem;
  opacity: 0;
}
.hero-city-strip {
  display: flex; align-items: center; justify-content: center;
  gap: 1.5rem; margin-top: 2.5rem;
  opacity: 0;
}
.city-line { width: 80px; height: 1px; background: linear-gradient(90deg,transparent,var(--gold),transparent); }
.city-text {
  font-size: .7rem; letter-spacing: .4em; text-transform: uppercase;
  color: var(--cream-dim);
}
/* Scroll badge */
.scroll-badge {
  position: absolute; bottom: 2.5rem; right: 3rem;
  width: 88px; height: 88px; z-index: 10;
  opacity: 0;
}
.scroll-badge svg { animation: spinBadge 14s linear infinite; }
.badge-center {
  position: absolute; top: 50%; left: 50%;
  transform: translate(-50%,-50%);
  width: 6px; height: 6px; background: var(--gold); border-radius: 50%;
}
@keyframes spinBadge { to { transform: rotate(360deg); } }
/* Vertical scroll indicator */
.v-scroll {
  position: absolute; bottom: 2.5rem; left: 50%;
  transform: translateX(-50%);
  display: flex; flex-direction: column; align-items: center; gap: .6rem;
  opacity: 0;
}
.v-scroll span {
  font-size: .6rem; letter-spacing: .35em; text-transform: uppercase;
  color: rgba(240,234,214,.35);
}
.v-scroll-line {
  width: 1px; height: 55px;
  background: linear-gradient(to bottom, var(--gold), transparent);
  animation: vLinePulse 2.2s ease-in-out infinite;
}
@keyframes vLinePulse {
  0%,100% { opacity:.25; transform: scaleY(1); }
  50%     { opacity:1;   transform: scaleY(1.18); }
}

/* ── MARQUEE ─────────────────────────────────────────────── */
.marquee-strip {
  position: relative; z-index: 3;
  overflow: hidden; white-space: nowrap;
  border-top: 1px solid rgba(201,168,76,.15);
  border-bottom: 1px solid rgba(201,168,76,.15);
  padding: .8rem 0;
  background: rgba(0,10,24,.6);
  backdrop-filter: blur(8px);
}
.marquee-track {
  display: inline-flex;
  animation: marqueeRun 28s linear infinite;
}
.marquee-item {
  font-family: 'Cormorant Garamond', serif;
  font-size: .88rem; font-weight: 300;
  font-style: italic;
  letter-spacing: .25em; color: var(--gold);
  padding: 0 3.5rem;
  border-right: 1px solid rgba(201,168,76,.18);
  flex-shrink: 0;
}
@keyframes marqueeRun { to { transform: translateX(-50%); } }

/* ── ACT SECTION (Story) ─────────────────────────────────── */
#act {
  display: flex; align-items: center;
  padding: 0 8vw;
}
.act-inner {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 8vw; align-items: center;
  max-width: 1200px; margin: 0 auto; width: 100%;
}
.act-img-wrap {
  position: relative; aspect-ratio: 3/4; overflow: hidden;
}
.act-img-wrap img {
  width: 100%; height: 100%;
  object-fit: cover;
  filter: brightness(.7) saturate(1.2);
  transform: scale(1.05);
  transition: transform 8s ease;
}
.act-img-wrap:hover img { transform: scale(1); }
.act-img-border {
  position: absolute; inset: 0;
  border: 1px solid rgba(201,168,76,.25);
  pointer-events: none;
  margin: 1.5rem;
}
.act-img-gold-frame {
  position: absolute; top: 1rem; right: 1rem;
  width: 28px; height: 28px;
  border-top: 1.5px solid var(--gold);
  border-right: 1.5px solid var(--gold);
  opacity: .7;
}
.act-img-gold-frame-bl {
  position: absolute; bottom: 1rem; left: 1rem;
  width: 28px; height: 28px;
  border-bottom: 1.5px solid var(--gold);
  border-left: 1.5px solid var(--gold);
  opacity: .7;
}
.act-eyebrow {
  font-size: .62rem; letter-spacing: .5em; text-transform: uppercase;
  color: var(--gold); margin-bottom: 1.5rem;
}
.act-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(2.5rem, 5vw, 4.5rem);
  font-weight: 600; line-height: 1.05;
  color: var(--cream);
  margin-bottom: 2rem;
}
.act-title em { color: var(--gold); font-style: italic; }
.act-body {
  font-size: .85rem; line-height: 1.9;
  color: var(--cream-dim); max-width: 42ch;
  margin-bottom: 2.5rem;
}
.act-stats {
  display: flex; gap: 3rem;
  border-top: 1px solid rgba(201,168,76,.15);
  padding-top: 2rem; margin-top: 2rem;
}
.stat-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2.2rem; font-weight: 700; color: var(--gold);
  line-height: 1;
}
.stat-label {
  font-size: .65rem; letter-spacing: .25em; text-transform: uppercase;
  color: var(--cream-dim); margin-top: .4rem;
}

/* ── STAGE / SEATING ─────────────────────────────────────── */
#stage {
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
  padding: 5rem 4vw;
}
.stage-header { text-align: center; margin-bottom: 4rem; }
.sec-eyebrow {
  font-size: .63rem; letter-spacing: .55em; text-transform: uppercase;
  color: var(--gold); margin-bottom: 1.2rem;
}
.sec-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(2.2rem, 5vw, 3.8rem); font-weight: 600;
  color: var(--cream); line-height: 1.08;
}
.sec-title em { color: var(--gold); font-style: italic; }
.sec-hint {
  font-size: .72rem; letter-spacing: .15em;
  color: var(--cream-dim); margin-top: 1rem; opacity: .65;
}
/* Map layout */
.map-container {
  display: flex; gap: 3rem; align-items: flex-start;
  width: 100%; max-width: 1100px;
  flex-wrap: wrap; justify-content: center;
}
.map-svg-wrap { flex: 0 0 auto; width: min(520px, 90vw); position: relative; }
/* Price panel */
#price-panel {
  flex: 1 1 280px; min-width: 260px;
  background: rgba(0,20,45,.6);
  backdrop-filter: blur(24px);
  border: 1px solid rgba(201,168,76,.2);
  padding: 2.5rem 2rem;
  position: relative;
  opacity: 0; transform: translateX(20px);
  transition: opacity .5s ease, transform .5s ease;
}
#price-panel.active { opacity: 1; transform: translateX(0); }
#price-panel::before {
  content:'';
  position: absolute; top:0; left:0; right:0; height:2px;
  background: linear-gradient(90deg,transparent,var(--gold),transparent);
}
.pp-corner {
  position: absolute; top: 1rem; right: 1rem;
  width: 20px; height: 20px;
  border-top: 1px solid var(--gold); border-right: 1px solid var(--gold);
  opacity:.5;
}
#pp-zone {
  font-size: .62rem; letter-spacing: .45em; text-transform: uppercase;
  color: var(--gold); margin-bottom: .8rem;
}
#pp-name {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2rem; font-weight: 700; color: var(--cream);
  margin-bottom: .4rem; line-height: 1;
}
#pp-desc {
  font-size: .78rem; color: var(--cream-dim); line-height: 1.7;
  margin-bottom: 1.5rem; border-bottom: 1px solid rgba(201,168,76,.12); padding-bottom: 1.5rem;
}
#pp-perks { list-style: none; margin-bottom: 1.8rem; }
#pp-perks li {
  font-size: .76rem; color: var(--cream); padding: .4rem 0;
  border-bottom: 1px solid rgba(201,168,76,.08);
  display: flex; align-items: center; gap: .6rem;
}
#pp-perks li::before { content:'◆'; color:var(--gold); font-size:.4rem; flex-shrink:0; }
#pp-price-wrap { margin-bottom: .5rem; }
#pp-price {
  font-family: 'Cormorant Garamond', serif;
  font-size: 2.2rem; font-weight: 700; color: var(--gold);
}
#pp-price-sub { font-size: .7rem; color: var(--cream-dim); margin-bottom: 1.2rem; }
#pp-status { font-size: .68rem; letter-spacing: .15em; margin-bottom: 1.4rem; }
.s-open   { color: #4ec994; }
.s-limit  { color: #e0b84a; }
.s-sold   { color: #e05c5c; }
.pp-buy {
  display: block; width: 100%;
  font-family: 'Cormorant Garamond', serif;
  font-size: .82rem; letter-spacing: .22em; text-transform: uppercase;
  color: var(--navy); background: var(--gold);
  border: none; padding: .85rem 1rem; cursor: none;
  clip-path: polygon(6px 0%,100% 0%,calc(100% - 6px) 100%,0% 100%);
  transition: background .3s, box-shadow .3s;
}
.pp-buy:hover { background: var(--gold-lt); box-shadow: 0 0 28px rgba(201,168,76,.4); }
#pp-placeholder {
  display: flex; flex-direction: column; align-items: center;
  justify-content: center; text-align: center;
  height: 100%; min-height: 280px; gap: 1rem;
}
#pp-placeholder svg { opacity: .25; }
#pp-placeholder p {
  font-size: .75rem; color: var(--cream-dim); opacity: .5;
  letter-spacing: .15em;
}
/* SVG zones */
.zone-path {
  cursor: none;
  transition: filter .3s;
}
.zone-path:hover { filter: drop-shadow(0 0 14px var(--gold)); }
.zone-path.selected { filter: drop-shadow(0 0 18px rgba(201,168,76,.9)); }
.zone-label-text {
  font-family: 'Jost', sans-serif;
  font-size: 10px; fill: rgba(240,234,214,.7);
  pointer-events: none; letter-spacing: 2px;
}

/* ── SETLIST SECTION ─────────────────────────────────────── */
#setlist {
  display: flex; align-items: center; justify-content: center;
  padding: 8rem 8vw;
}
.setlist-inner { max-width: 900px; width: 100%; }
.setlist-header { margin-bottom: 5rem; }
.setlist-grid {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 0;
}
.setlist-item {
  padding: 1.8rem 0;
  border-bottom: 1px solid rgba(201,168,76,.1);
  display: flex; align-items: baseline; gap: 1.5rem;
  cursor: default;
}
.setlist-item:nth-child(odd) { padding-right: 4rem; border-right: 1px solid rgba(201,168,76,.1); }
.setlist-item:nth-child(even) { padding-left: 4rem; }
.setlist-num {
  font-family: 'Cormorant Garamond', serif;
  font-size: .9rem; font-weight: 300; font-style: italic;
  color: rgba(201,168,76,.4); flex-shrink: 0; width: 1.5rem;
}
.setlist-song {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.15rem; font-weight: 400;
  color: var(--cream); letter-spacing: .05em;
  transition: color .3s;
}
.setlist-item:hover .setlist-song { color: var(--gold); }
.setlist-year {
  margin-left: auto; font-size: .65rem; letter-spacing: .2em;
  color: var(--cream-dim); opacity: .35;
}

/* ── FOOTER ──────────────────────────────────────────────── */
footer {
  position: relative; z-index: 3;
  background: rgba(0,8,20,.95);
  border-top: 1px solid rgba(201,168,76,.1);
  padding: 6rem 8vw 3rem;
}
.footer-ghost {
  position: absolute; bottom: 0; right: 0;
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(4rem, 12vw, 9rem); font-weight: 700;
  color: var(--gold); opacity: .04; white-space: nowrap;
  line-height: 1; pointer-events: none; user-select: none;
  transform: translateY(15%);
}
.footer-top {
  display: flex; justify-content: space-between;
  align-items: flex-start; flex-wrap: wrap; gap: 3rem;
  margin-bottom: 4rem;
}
.footer-brand {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.5rem; font-weight: 700; color: var(--gold);
  letter-spacing: .1em; margin-bottom: .6rem;
}
.footer-tagline { font-size: .68rem; letter-spacing: .3em; color: var(--cream-dim); opacity: .5; }
.footer-col h5 {
  font-size: .62rem; letter-spacing: .4em; text-transform: uppercase;
  color: var(--gold); margin-bottom: 1.2rem; opacity: .7;
}
.footer-col p, .footer-col a {
  display: block; font-size: .8rem; color: var(--cream-dim);
  opacity: .55; line-height: 2; text-decoration: none;
  transition: opacity .3s, color .3s;
}
.footer-col a:hover { opacity: 1; color: var(--gold); }
.footer-bottom {
  border-top: 1px solid rgba(201,168,76,.08);
  padding-top: 2rem;
  display: flex; justify-content: space-between;
  align-items: center; flex-wrap: wrap; gap: 1rem;
}
.footer-copy { font-size: .65rem; color: var(--cream-dim); opacity: .3; letter-spacing: .12em; }

/* ── GLASS DIVIDER ────────────────────────────────────────── */
.glass-divider {
  position: relative; z-index: 3;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(201,168,76,.3) 35%, rgba(201,168,76,.3) 65%, transparent);
}

/* ── REVEAL HELPERS ────────────────────────────────────────── */
.reveal { opacity: 0; transform: translateY(40px); }
</style>
</head>
<body>

<!-- ══ CUSTOM CURSOR ══════════════════════════════════════════ -->
<div id="cursor"></div>
<div id="cursor-ring"></div>

<!-- ══ MOVING MESH CANVAS ════════════════════════════════════ -->
<canvas id="mesh-canvas"></canvas>

<!-- ══ PRELOADER ══════════════════════════════════════════════ -->
<div id="preloader">
  <div id="preloader-line"></div>
  <p class="pre-eyebrow" id="pre-eye">Dipersembahkan Khusus Untuk Jakarta</p>

  <div id="sig-wrap">
    <!--
      "Bruno Mars" rendered as a hand-drawn SVG path
      approximating the Mrs Saint Delafield cursive style.
      Animates via stroke-dashoffset (ghost-writing effect).
    -->
    <svg id="sig-svg" viewBox="0 0 480 110" width="480" height="110" xmlns="http://www.w3.org/2000/svg">
      <!-- B -->
      <path d="M28,85 C28,85 28,30 28,28 C40,27 58,26 62,38 C66,50 52,54 52,54 C52,54 72,57 70,72 C68,86 28,85 28,85 Z M28,54 L54,53"/>
      <!-- r -->
      <path d="M80,85 L80,55 C82,48 90,46 98,52"/>
      <!-- u -->
      <path d="M106,55 L106,74 C106,85 122,89 127,76 L127,55"/>
      <!-- n -->
      <path d="M135,85 L135,55 C140,46 152,48 155,58 L155,85"/>
      <!-- o -->
      <path d="M180,70 C180,82 168,90 160,87 C150,83 148,70 153,61 C158,52 170,49 178,56 C184,62 183,72 180,70 Z"/>
      <!-- M -->
      <path d="M202,85 L202,28 L222,62 L242,28 L242,85"/>
      <!-- a -->
      <path d="M274,72 C268,88 251,91 248,80 C244,68 254,58 266,58 C277,58 280,66 280,66 L280,85"/>
      <!-- r -->
      <path d="M290,85 L290,58 C294,50 303,48 310,54"/>
      <!-- s -->
      <path d="M326,57 C320,53 312,56 313,63 C314,70 326,69 328,76 C330,84 320,89 312,84"/>
      <!-- underline flourish -->
      <path d="M25,100 Q140,112 260,108 Q360,105 460,98"/>
    </svg>
  </div>

  <p class="pre-subtitle" id="pre-sub">Live In Jakarta · 2026</p>
  <div id="preloader-bar-wrap">
    <div id="preloader-bar"></div>
  </div>
</div>

<!-- ══ NAVBAR ════════════════════════════════════════════════ -->
<nav id="nav">
  <div class="nav-brand">Bruno Mars</div>
  <div class="nav-items">
    <a href="#act">About</a>
    <a href="#stage">Kursi</a>
    <a href="#setlist">Setlist</a>
    <a href="/tiket" class="btn-ticket">Beli Tiket</a>
  </div>
</nav>

<!-- ══ HERO ══════════════════════════════════════════════════ -->
<section id="hero">
  <div class="hero-img-wrap">
    <img
      src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=1800&q=80&fit=crop"
      alt="Concert stage"
      id="hero-img"
    />
    <div class="hero-img-overlay"></div>
    <div class="hero-img-gold-tint"></div>
  </div>

  <div class="hero-inner">
    <div class="hero-date-tag" id="h-tag">14 &amp; 15 Maret 2026 &nbsp;·&nbsp; GBK Senayan</div>
    <h1 class="hero-title-main" id="h-title">BRUNO<br>MARS</h1>
    <p class="hero-title-sub" id="h-sub">Live In Jakarta</p>
    <div class="hero-city-strip" id="h-strip">
      <div class="city-line"></div>
      <span class="city-text">24K Magic World Tour · Satu Malam Tak Terlupakan</span>
      <div class="city-line"></div>
    </div>
  </div>

  <!-- Scroll badge -->
  <div class="scroll-badge" id="scroll-badge">
    <svg viewBox="0 0 88 88" width="88" height="88">
      <defs>
        <path id="badge-path" d="M44,44 m-32,0 a32,32 0 1,1 64,0 a32,32 0 1,1 -64,0"/>
      </defs>
      <text font-family="'Jost',sans-serif" font-size="8.5" fill="var(--gold)" font-weight="300" letter-spacing="2.5">
        <textPath href="#badge-path">SCROLL DOWN · 24K MAGIC · JAKARTA ·</textPath>
      </text>
    </svg>
    <div class="badge-center"></div>
  </div>

  <!-- Vertical scroll line -->
  <div class="v-scroll" id="v-scroll">
    <span>Scroll</span>
    <div class="v-scroll-line"></div>
  </div>
</section>

<!-- ══ MARQUEE ════════════════════════════════════════════════ -->
<div class="marquee-strip">
  <div class="marquee-track">
    <span class="marquee-item">24K Magic</span>
    <span class="marquee-item">Just The Way You Are</span>
    <span class="marquee-item">Uptown Funk</span>
    <span class="marquee-item">That's What I Like</span>
    <span class="marquee-item">Grenade</span>
    <span class="marquee-item">Treasure</span>
    <span class="marquee-item">When I Was Your Man</span>
    <span class="marquee-item">Locked Out of Heaven</span>
    <span class="marquee-item">24K Magic</span>
    <span class="marquee-item">Just The Way You Are</span>
    <span class="marquee-item">Uptown Funk</span>
    <span class="marquee-item">That's What I Like</span>
    <span class="marquee-item">Grenade</span>
    <span class="marquee-item">Treasure</span>
    <span class="marquee-item">When I Was Your Man</span>
    <span class="marquee-item">Locked Out of Heaven</span>
  </div>
</div>

<!-- ══ ACT / ABOUT ════════════════════════════════════════════ -->
<section id="act">
  <div class="act-inner">
    <div class="act-img-wrap reveal">
      <img
        src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=900&q=85&fit=crop"
        alt="Artist spotlight"
      />
      <div class="act-img-border"></div>
      <div class="act-img-gold-frame"></div>
      <div class="act-img-gold-frame-bl"></div>
    </div>
    <div>
      <p class="act-eyebrow reveal">Satu Panggung · Satu Legenda</p>
      <h2 class="act-title reveal">Malam yang<br><em>Mengubah Segalanya</em></h2>
      <p class="act-body reveal">
        Untuk pertama kalinya setelah penantian panjang, Bruno Mars hadir langsung di bumi Ibu Kota.
        Suaranya yang memukau, koreografi kelas dunia, dan panggung spektakuler akan membawa kamu
        dalam perjalanan musikal yang tak akan pernah terlupakan.
      </p>
      <p class="act-body reveal" style="margin-top:-1rem">
        Ini bukan sekadar konser — ini adalah <em style="color:var(--gold)">pengalaman</em>.
        Momen yang akan kamu ceritakan kepada cucu-cucumu suatu hari nanti.
      </p>
      <div class="act-stats reveal">
        <div>
          <div class="stat-num">2</div>
          <div class="stat-label">Malam Penuh Magia</div>
        </div>
        <div>
          <div class="stat-num">50K+</div>
          <div class="stat-label">Kapasitas Penonton</div>
        </div>
        <div>
          <div class="stat-num">30+</div>
          <div class="stat-label">Hits Terbaik</div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="glass-divider"></div>

<!-- ══ STAGE / INTERACTIVE SEAT MAP ══════════════════════════ -->
<section id="stage">
  <div class="stage-header reveal">
    <p class="sec-eyebrow">Pilih Zona Kamu</p>
    <h2 class="sec-title">Peta <em>Kursi</em></h2>
    <p class="sec-hint">Klik zona pada peta untuk melihat harga &amp; fasilitas</p>
  </div>

  <div class="map-container">
    <!-- SVG Seating Map -->
    <div class="map-svg-wrap reveal">
      <svg id="seat-map" viewBox="0 0 520 430" width="100%" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <radialGradient id="stageG" cx="50%" cy="100%" r="70%">
            <stop offset="0%" stop-color="#C9A84C" stop-opacity=".3"/>
            <stop offset="100%" stop-color="#001020" stop-opacity="0"/>
          </radialGradient>
          <filter id="glow">
            <feGaussianBlur stdDeviation="5" result="b"/>
            <feComposite in="SourceGraphic" in2="b" operator="over"/>
          </filter>
          <!-- Zone fills -->
          <radialGradient id="gReg" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#3a5070" stop-opacity=".55"/>
            <stop offset="100%" stop-color="#001535" stop-opacity=".85"/>
          </radialGradient>
          <radialGradient id="gVip" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#205878" stop-opacity=".65"/>
            <stop offset="100%" stop-color="#00203a" stop-opacity=".9"/>
          </radialGradient>
          <radialGradient id="gVvip" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#7c5a10" stop-opacity=".7"/>
            <stop offset="100%" stop-color="#2a1a00" stop-opacity=".95"/>
          </radialGradient>
        </defs>

        <!-- Stadium shell -->
        <ellipse cx="260" cy="215" rx="245" ry="195" fill="rgba(0,12,30,.7)" stroke="rgba(201,168,76,.14)" stroke-width="1"/>

        <!-- REGULER (outermost ring) -->
        <g class="zone-path" id="zReg" data-zone="reguler">
          <ellipse cx="260" cy="215" rx="215" ry="170" fill="url(#gReg)" stroke="rgba(90,120,160,.55)" stroke-width="1.5"/>
          <!-- inner cutout -->
          <ellipse cx="260" cy="215" rx="155" ry="115" fill="rgba(0,14,32,.92)" stroke="none"/>
          <!-- seat rows suggestion -->
          <ellipse cx="260" cy="215" rx="210" ry="165" fill="none" stroke="rgba(90,120,160,.18)" stroke-width=".8" stroke-dasharray="3 7"/>
          <ellipse cx="260" cy="215" rx="192" ry="149" fill="none" stroke="rgba(90,120,160,.15)" stroke-width=".8" stroke-dasharray="3 7"/>
          <ellipse cx="260" cy="215" rx="174" ry="133" fill="none" stroke="rgba(90,120,160,.12)" stroke-width=".8" stroke-dasharray="3 7"/>
          <text class="zone-label-text" x="260" y="70" text-anchor="middle">R E G U L E R</text>
        </g>

        <!-- VIP (middle ring) -->
        <g class="zone-path" id="zVip" data-zone="vip">
          <ellipse cx="260" cy="215" rx="155" ry="115" fill="url(#gVip)" stroke="rgba(40,150,190,.6)" stroke-width="1.8"/>
          <ellipse cx="260" cy="215" rx="92" ry="60" fill="rgba(0,12,30,.95)" stroke="none"/>
          <ellipse cx="260" cy="215" rx="150" ry="111" fill="none" stroke="rgba(40,150,190,.22)" stroke-width=".8" stroke-dasharray="3 6"/>
          <ellipse cx="260" cy="215" rx="128" ry="92" fill="none" stroke="rgba(40,150,190,.18)" stroke-width=".8" stroke-dasharray="3 6"/>
          <ellipse cx="260" cy="215" rx="108" ry="76" fill="none" stroke="rgba(40,150,190,.14)" stroke-width=".8" stroke-dasharray="3 6"/>
          <text class="zone-label-text" x="260" y="118" text-anchor="middle" fill="rgba(60,190,220,.75)">V I P</text>
        </g>

        <!-- VVIP (inner) -->
        <g class="zone-path" id="zVvip" data-zone="vvip">
          <ellipse cx="260" cy="215" rx="92" ry="60" fill="url(#gVvip)" stroke="rgba(201,168,76,.85)" stroke-width="2"/>
          <ellipse cx="260" cy="215" rx="88" ry="56" fill="none" stroke="rgba(201,168,76,.25)" stroke-width=".8" stroke-dasharray="2 5"/>
          <text class="zone-label-text" x="260" y="209" text-anchor="middle" fill="rgba(201,168,76,.9)">V V I P</text>
          <text x="260" y="225" text-anchor="middle" font-family="'Jost',sans-serif" font-size="7.5" fill="rgba(201,168,76,.5)" letter-spacing="1.5" pointer-events="none">PIT FLOOR</text>
        </g>

        <!-- Stage -->
        <rect x="195" y="345" width="130" height="52" rx="5" fill="rgba(201,168,76,.1)" stroke="rgba(201,168,76,.6)" stroke-width="1.5"/>
        <rect x="200" y="350" width="120" height="42" rx="3" fill="url(#stageG)"/>
        <text x="260" y="375" text-anchor="middle" font-family="'Cormorant Garamond',serif" font-size="14" fill="var(--gold)" letter-spacing="4" pointer-events="none">PANGGUNG</text>

        <!-- Stage light rays -->
        <line x1="260" y1="345" x2="80"  y2="140" stroke="rgba(201,168,76,.04)" stroke-width="45"/>
        <line x1="260" y1="345" x2="260" y2="90"  stroke="rgba(201,168,76,.05)" stroke-width="45"/>
        <line x1="260" y1="345" x2="440" y2="140" stroke="rgba(201,168,76,.04)" stroke-width="45"/>

        <!-- Legend -->
        <circle cx="42" cy="360" r="5" fill="rgba(201,168,76,.85)"/>
        <text x="54" y="364" font-family="'Jost',sans-serif" font-size="8.5" fill="var(--cream-dim)" letter-spacing="1">VVIP</text>
        <circle cx="42" cy="378" r="5" fill="rgba(40,150,190,.8)"/>
        <text x="54" y="382" font-family="'Jost',sans-serif" font-size="8.5" fill="var(--cream-dim)" letter-spacing="1">VIP</text>
        <circle cx="42" cy="396" r="5" fill="rgba(90,120,160,.8)"/>
        <text x="54" y="400" font-family="'Jost',sans-serif" font-size="8.5" fill="var(--cream-dim)" letter-spacing="1">Reguler</text>
      </svg>
    </div>

    <!-- Price Panel -->
    <div id="price-panel">
      <div id="pp-placeholder">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="1">
          <path d="M15 10l-4 4l6 6l4-16l-16 4l6 6l4-4"/>
        </svg>
        <p>Klik zona pada peta<br>untuk melihat detail tiket</p>
      </div>
      <div id="pp-content" style="display:none">
        <div class="pp-corner"></div>
        <p id="pp-zone"></p>
        <h3 id="pp-name"></h3>
        <p id="pp-desc"></p>
        <ul id="pp-perks"></ul>
        <div id="pp-price-wrap">
          <div id="pp-price"></div>
          <div id="pp-price-sub">per orang · sudah termasuk pajak</div>
        </div>
        <p id="pp-status"></p>
        <button class="pp-buy" id="pp-buy-btn">Pilih Tiket Ini</button>
      </div>
    </div>
  </div>
</section>

<div class="glass-divider"></div>

<!-- ══ SETLIST ════════════════════════════════════════════════ -->
<section id="setlist">
  <div class="setlist-inner">
    <div class="setlist-header">
      <p class="sec-eyebrow reveal">Ekspektasi Malam Itu</p>
      <h2 class="sec-title reveal">Kemungkinan <em>Setlist</em></h2>
    </div>
    <div class="setlist-grid" id="setlist-grid">
      <!-- injected by JS -->
    </div>
  </div>
</section>

<div class="glass-divider"></div>

<!-- ══ FOOTER ════════════════════════════════════════════════ -->
<footer>
  <div class="footer-ghost">BRUNO MARS</div>
  <div class="footer-top">
    <div>
      <div class="footer-brand">Bruno Mars</div>
      <div class="footer-tagline">Live In Jakarta 2026 · 24K Magic World Tour</div>
    </div>
    <div class="footer-col">
      <h5>Lokasi</h5>
      <p>Stadion Utama Gelora Bung Karno</p>
      <p>Senayan, Jakarta Pusat</p>
      <p>DKI Jakarta, Indonesia</p>
    </div>
    <div class="footer-col">
      <h5>Tanggal</h5>
      <p>14 Maret 2026 — Hari Pertama</p>
      <p>15 Maret 2026 — Hari Kedua</p>
      <p>Pintu buka: 16.00 WIB</p>
    </div>
    <div class="footer-col">
      <h5>Kontak</h5>
      <a href="#">info@brunomarsjakarta.com</a>
      <a href="#">loket.com · tiket.com</a>
      <a href="#">@brunomarsjakarta</a>
    </div>
  </div>
  <div class="footer-bottom">
    <p class="footer-copy">© 2025 Bruno Mars Jakarta 2026. Ini adalah halaman demo. Hak cipta dilindungi.</p>
    <p class="footer-copy">Dipersembahkan oleh Promotor Acara Jakarta</p>
  </div>
</footer>

<!-- ══════════════════════════════════════════════════════════
     GSAP + ALL LOGIC
══════════════════════════════════════════════════════════════ -->
<script>
// ─────────────────────────────────────────────────────────────
//  DATA — Ticket zones (C++ struct style)
// ─────────────────────────────────────────────────────────────
const ZONES = {
  reguler: {
    id: "reguler",
    label: "CAT 3 · REGULER",
    name: "Reguler",
    desc: "Nikmati konser dari area festival yang luas. Pengalaman bersama ribuan penonton antusias di bawah langit Jakarta.",
    perks: [
      "Area festival berdiri bebas",
      "View panggung panoramik",
      "Akses fasilitas umum venue",
      "Merchandise counter tersedia",
    ],
    price: "Rp 850.000",
    priceSub: "per orang · sudah termasuk pajak",
    status: "open",
    statusLabel: "● Tiket Tersedia",
    statusClass: "s-open",
  },
  vip: {
    id: "vip",
    label: "CAT 2 · VIP",
    name: "VIP",
    desc: "Kursi bernomor di tribun premium. Sudut pandang terbaik dengan kenyamanan eksklusif dan layanan prioritas.",
    perks: [
      "Kursi bernomor tribun premium",
      "Akses lounge VIP eksklusif",
      "Merchandise pack senilai Rp 350.000",
      "Jalur masuk prioritas",
      "Catering ringan & minuman",
      "Parkir khusus VIP",
    ],
    price: "Rp 2.500.000",
    priceSub: "per orang · sudah termasuk pajak",
    status: "limited",
    statusLabel: "◐ Terbatas — Segera Dapatkan",
    statusClass: "s-limit",
  },
  vvip: {
    id: "vvip",
    label: "CAT 1 · VVIP",
    name: "VVIP",
    desc: "Pengalaman paling eksklusif di baris terdepan. Bertemu langsung dengan Bruno Mars dan rasakan energi terdekst dari sang bintang.",
    perks: [
      "Kursi pit floor — baris pertama",
      "Meet & Greet eksklusif Bruno Mars",
      "Sesi foto bersama (terbatas 20 orang)",
      "Lounge mewah VVIP pre-show",
      "Full merchandise bundle (senilai Rp 1,2jt)",
      "Makan malam pre-show fine dining",
      "Gift box eksklusif",
    ],
    price: "Rp 7.500.000",
    priceSub: "per orang · sudah termasuk pajak",
    status: "sold",
    statusLabel: "✕ Habis Terjual",
    statusClass: "s-sold",
  },
};

const SETLIST = [
  { num: "01", title: "24K Magic",            year: "2016" },
  { num: "02", title: "Uptown Funk",           year: "2014" },
  { num: "03", title: "Just The Way You Are",  year: "2010" },
  { num: "04", title: "That's What I Like",    year: "2016" },
  { num: "05", title: "Grenade",               year: "2010" },
  { num: "06", title: "Treasure",              year: "2012" },
  { num: "07", title: "Locked Out of Heaven",  year: "2012" },
  { num: "08", title: "When I Was Your Man",   year: "2013" },
  { num: "09", title: "Finesse",               year: "2017" },
  { num: "10", title: "Leave The Door Open",   year: "2021" },
  { num: "11", title: "Marry You",             year: "2010" },
  { num: "12", title: "Calling All My Lovelies", year: "2016" },
];

// ─────────────────────────────────────────────────────────────
//  MOVING MESH CANVAS BACKGROUND
// ─────────────────────────────────────────────────────────────
(function initMeshCanvas() {
  const canvas = document.getElementById('mesh-canvas');
  const ctx    = canvas.getContext('2d');
  let W, H, t = 0;

  function resize() {
    W = canvas.width  = window.innerWidth;
    H = canvas.height = window.innerHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  // Gradient mesh nodes
  const nodes = [
    { x: 0.12, y: 0.15, vx: .00018, vy: .00012, r: '#001F3F', g: '#001535' },
    { x: 0.85, y: 0.22, vx:-.00015, vy: .00020, r: '#002855', g: '#001a35' },
    { x: 0.50, y: 0.70, vx: .00022, vy:-.00016, r: '#001020', g: '#002040' },
    { x: 0.25, y: 0.88, vx:-.00012, vy:-.00018, r: '#000d20', g: '#001830' },
    { x: 0.75, y: 0.65, vx: .00016, vy: .00014, r: '#001530', g: '#002450' },
  ];

  function draw() {
    t += 0.6;
    ctx.clearRect(0, 0, W, H);

    // Base fill
    ctx.fillStyle = '#000c1e';
    ctx.fillRect(0, 0, W, H);

    // Draw each soft blob
    nodes.forEach((n, i) => {
      n.x += n.vx;
      n.y += n.vy;
      if (n.x < 0 || n.x > 1) n.vx *= -1;
      if (n.y < 0 || n.y > 1) n.vy *= -1;

      const px = n.x * W;
      const py = n.y * H;
      const radius = Math.min(W, H) * 0.62;

      const grd = ctx.createRadialGradient(px, py, 0, px, py, radius);
      grd.addColorStop(0,   hexToRgba(n.r, 0.32));
      grd.addColorStop(0.5, hexToRgba(n.g, 0.12));
      grd.addColorStop(1,   'rgba(0,0,0,0)');

      ctx.fillStyle = grd;
      ctx.fillRect(0, 0, W, H);
    });

    // Gold shimmer vein (very subtle diagonal)
    const veinGrd = ctx.createLinearGradient(0, 0, W, H);
    veinGrd.addColorStop(0,   'rgba(0,0,0,0)');
    veinGrd.addColorStop(0.48,'rgba(0,0,0,0)');
    veinGrd.addColorStop(0.50, `rgba(201,168,76,${0.015 + 0.012 * Math.sin(t * 0.025)})`);
    veinGrd.addColorStop(0.52,'rgba(0,0,0,0)');
    veinGrd.addColorStop(1,   'rgba(0,0,0,0)');
    ctx.fillStyle = veinGrd;
    ctx.fillRect(0, 0, W, H);

    requestAnimationFrame(draw);
  }

  function hexToRgba(hex, alpha) {
    const r = parseInt(hex.slice(1,3),16);
    const g = parseInt(hex.slice(3,5),16);
    const b = parseInt(hex.slice(5,7),16);
    return `rgba(${r},${g},${b},${alpha})`;
  }

  draw();
})();

// ─────────────────────────────────────────────────────────────
//  GOLD DUST PARTICLES
// ─────────────────────────────────────────────────────────────
(function initDust() {
  const COUNT = 38;
  const dust  = [];
  const mousePos = { x: window.innerWidth/2, y: window.innerHeight/2 };

  for (let i = 0; i < COUNT; i++) {
    const el = document.createElement('div');
    el.className = 'dust';
    const size = Math.random() * 3 + 1;
    el.style.cssText = `
      width:${size}px; height:${size}px;
      left:${Math.random()*100}vw;
      top:${Math.random()*100}vh;
      opacity:0;
    `;
    document.body.appendChild(el);

    const d = {
      el,
      x: Math.random() * window.innerWidth,
      y: Math.random() * window.innerHeight,
      baseX: Math.random() * window.innerWidth,
      baseY: Math.random() * window.innerHeight,
      size,
      speed: Math.random() * 0.3 + 0.1,
      angle: Math.random() * Math.PI * 2,
      angleSpeed: (Math.random() - 0.5) * 0.008,
      radius: Math.random() * 60 + 20,
    };
    dust.push(d);

    gsap.to(el, {
      opacity: Math.random() * 0.5 + 0.08,
      duration: 1.5 + Math.random(),
      delay: Math.random() * 3,
      ease: 'power2.out',
    });
  }

  window.addEventListener('mousemove', (e) => {
    mousePos.x = e.clientX;
    mousePos.y = e.clientY;
  });

  function animateDust() {
    dust.forEach((d) => {
      d.angle += d.angleSpeed;

      // Drift naturally in a slow orbit
      const driftX = d.baseX + Math.cos(d.angle) * d.radius;
      const driftY = d.baseY + Math.sin(d.angle) * d.radius;

      // Mouse influence (repel slightly)
      const dx = driftX - mousePos.x;
      const dy = driftY - mousePos.y;
      const dist = Math.sqrt(dx*dx + dy*dy);
      const repelRadius = 140;
      const repelStrength = 0.045;

      let fx = driftX, fy = driftY;
      if (dist < repelRadius) {
        const force = (repelRadius - dist) / repelRadius;
        fx += (dx / dist) * force * repelRadius * repelStrength;
        fy += (dy / dist) * force * repelRadius * repelStrength;
      }

      d.x += (fx - d.x) * 0.028;
      d.y += (fy - d.y) * 0.028;

      d.el.style.transform = `translate(${d.x - parseFloat(d.el.style.left)}px, ${d.y - parseFloat(d.el.style.top)}px)`;
    });
    requestAnimationFrame(animateDust);
  }
  animateDust();
})();

// ─────────────────────────────────────────────────────────────
//  CUSTOM CURSOR
// ─────────────────────────────────────────────────────────────
(function initCursor() {
  const cur  = document.getElementById('cursor');
  const ring = document.getElementById('cursor-ring');
  let mx = 0, my = 0, rx = 0, ry = 0;

  window.addEventListener('mousemove', (e) => {
    mx = e.clientX; my = e.clientY;
    gsap.to(cur, { x: mx, y: my, duration: 0.08, ease: 'none' });
  });

  // Ring follows with lag
  (function loopRing() {
    rx += (mx - rx) * 0.14;
    ry += (my - ry) * 0.14;
    gsap.set(ring, { x: rx, y: ry });
    requestAnimationFrame(loopRing);
  })();

  document.querySelectorAll('a, button, .zone-path, .setlist-item').forEach(el => {
    el.addEventListener('mouseenter', () => {
      gsap.to(cur,  { scale: 2.2,  duration: .3 });
      gsap.to(ring, { scale: 1.6, opacity: .5, duration: .3 });
    });
    el.addEventListener('mouseleave', () => {
      gsap.to(cur,  { scale: 1, duration: .3 });
      gsap.to(ring, { scale: 1, opacity: 1, duration: .3 });
    });
  });
})();

// ─────────────────────────────────────────────────────────────
//  PRELOADER — Ghost Signature Animation
// ─────────────────────────────────────────────────────────────
(function initPreloader() {
  const paths   = document.querySelectorAll('#sig-svg path');
  const preEye  = document.getElementById('pre-eye');
  const sigWrap = document.getElementById('sig-wrap');
  const preSub  = document.getElementById('pre-sub');
  const barWrap = document.getElementById('preloader-bar-wrap');
  const bar     = document.getElementById('preloader-bar');
  const loader  = document.getElementById('preloader');
  const line    = document.getElementById('preloader-line');

  // Measure each path
  paths.forEach(p => {
    const len = p.getTotalLength ? p.getTotalLength() : 250;
    p.style.strokeDasharray  = len;
    p.style.strokeDashoffset = len;
  });

  const tl = gsap.timeline({
    onComplete: () => {
      // Exit preloader
      gsap.to(loader, {
        opacity: 0, duration: 1, ease: 'power2.inOut',
        onComplete: () => {
          loader.style.pointerEvents = 'none';
          loader.style.display = 'none';
          bootPage();
        },
      });
    },
  });

  // Entry: vertical line drops
  tl.to(line, { height: '50%', duration: .8, ease: 'power3.out' }, 0.2);

  // Eye brow fades in
  tl.to(preEye, { opacity: 1, y: 0, duration: .6, ease: 'power2.out' }, 0.6);

  // Sig wrap appears
  tl.to(sigWrap, { opacity: 1, duration: .4 }, 1.0);

  // Draw each signature path (ghost-writing)
  let drawStart = 1.1;
  paths.forEach((path) => {
    const len = parseFloat(path.style.strokeDasharray);
    const dur = Math.max(len / 250, 0.25);
    tl.to(path, {
      strokeDashoffset: 0,
      duration: dur,
      ease: 'power1.inOut',
    }, drawStart);
    drawStart += dur * 0.68;
  });

  // Sub title
  tl.to(preSub, { opacity: 1, y: 0, duration: .5, ease: 'power2.out' }, '-=0.3');

  // Progress bar
  tl.to(barWrap, { opacity: 1, duration: .3 }, '-=0.3');
  tl.to(bar, { width: '100%', duration: 1.2, ease: 'power2.inOut' }, '-=0.2');
  tl.to({}, { duration: 0.5 }); // pause before exit
})();

// ─────────────────────────────────────────────────────────────
//  PAGE BOOT — runs after preloader exits
// ─────────────────────────────────────────────────────────────
function bootPage() {
  gsap.registerPlugin(ScrollTrigger);

  // Navbar scroll
  const nav = document.getElementById('nav');
  ScrollTrigger.create({
    start: 'top -80',
    onUpdate: (self) => {
      nav.classList.toggle('scrolled', self.scroll() > 80);
    },
  });

  // Hero entrance
  const htl = gsap.timeline({ defaults: { ease: 'power3.out' } });
  htl.to('#h-tag',   { opacity: 1, y: 0, duration: .7 }, .1)
     .fromTo('#h-title', { y: 100 }, { y: 0, opacity: 1, duration: 1.1 }, .25)
     .to('#h-sub',   { opacity: 1, y: 0, duration: .7 }, .6)
     .to('#h-strip', { opacity: 1, y: 0, duration: .6 }, .75)
     .to('#scroll-badge', { opacity: 1, duration: .8 }, 1)
     .to('#v-scroll',     { opacity: 1, duration: .8 }, 1);

  gsap.set(['#h-tag','#h-sub','#h-strip'], { y: 20 });

  // Hero parallax
  gsap.to('#hero-img', {
    yPercent: 22,
    ease: 'none',
    scrollTrigger: { trigger: '#hero', start: 'top top', end: 'bottom top', scrub: true },
  });

  // ScrollTrigger reveals — generic .reveal elements
  gsap.utils.toArray('.reveal').forEach((el, i) => {
    gsap.fromTo(el,
      { opacity: 0, y: 50 },
      {
        opacity: 1, y: 0, duration: .9, ease: 'power3.out',
        scrollTrigger: { trigger: el, start: 'top 82%', toggleActions: 'play none none none' },
      }
    );
  });

  // Setlist items stagger
  gsap.from('.setlist-item', {
    opacity: 0, y: 30, stagger: .055, duration: .7, ease: 'power2.out',
    scrollTrigger: { trigger: '#setlist-grid', start: 'top 80%' },
  });

  // Stage section map reveal
  gsap.fromTo('.map-svg-wrap',
    { opacity: 0, scale: .94 },
    {
      opacity: 1, scale: 1, duration: 1.1, ease: 'power3.out',
      scrollTrigger: { trigger: '#stage', start: 'top 75%' },
    }
  );
}

// ─────────────────────────────────────────────────────────────
//  INTERACTIVE SEAT MAP
// ─────────────────────────────────────────────────────────────
(function initSeatMap() {
  const panel      = document.getElementById('price-panel');
  const placeholder= document.getElementById('pp-placeholder');
  const content    = document.getElementById('pp-content');
  const ppZone     = document.getElementById('pp-zone');
  const ppName     = document.getElementById('pp-name');
  const ppDesc     = document.getElementById('pp-desc');
  const ppPerks    = document.getElementById('pp-perks');
  const ppPrice    = document.getElementById('pp-price');
  const ppStatus   = document.getElementById('pp-status');
  const ppBuyBtn   = document.getElementById('pp-buy-btn');

  let activeZone = null;

  document.querySelectorAll('.zone-path').forEach(zone => {
    zone.addEventListener('click', () => {
      const key  = zone.dataset.zone;
      const data = ZONES[key];
      if (!data) return;

      // Deselect previous
      if (activeZone) activeZone.classList.remove('selected');
      zone.classList.add('selected');
      activeZone = zone;

      // Populate panel
      ppZone.textContent   = data.label;
      ppName.textContent   = data.name;
      ppDesc.textContent   = data.desc;
      ppPrice.textContent  = data.price;
      ppPerks.innerHTML    = data.perks.map(p => `<li>${p}</li>`).join('');
      ppStatus.textContent = data.statusLabel;
      ppStatus.className   = `pp-status ${data.statusClass}`;

      if (data.status === 'sold') {
        ppBuyBtn.textContent = 'Tiket Habis';
        ppBuyBtn.disabled    = true;
        ppBuyBtn.style.opacity = '.4';
        ppBuyBtn.style.cursor  = 'not-allowed';
      } else {
        ppBuyBtn.textContent = 'Pilih Tiket Ini';
        ppBuyBtn.disabled    = false;
        ppBuyBtn.style.opacity = '1';
        ppBuyBtn.style.cursor  = 'none';
        ppBuyBtn.onclick = () => window.location.href = '/tiket';
      }

      // Show content, hide placeholder
      placeholder.style.display = 'none';
      content.style.display     = 'block';
      panel.classList.add('active');

      // Animate panel content in
      gsap.fromTo(content,
        { opacity: 0, y: 12 },
        { opacity: 1, y: 0, duration: .45, ease: 'power2.out' }
      );
    });
  });
})();

// ─────────────────────────────────────────────────────────────
//  RENDER SETLIST
// ─────────────────────────────────────────────────────────────
(function renderSetlist() {
  const grid = document.getElementById('setlist-grid');
  SETLIST.forEach(s => {
    const div = document.createElement('div');
    div.className = 'setlist-item';
    div.innerHTML = `
      <span class="setlist-num">${s.num}</span>
      <span class="setlist-song">${s.title}</span>
      <span class="setlist-year">${s.year}</span>
    `;
    grid.appendChild(div);
  });
})();
</script>
</body>
</html>
