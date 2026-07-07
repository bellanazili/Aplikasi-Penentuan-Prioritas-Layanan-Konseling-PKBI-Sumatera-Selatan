<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SPK Konseling PKBI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

<style>

/* =========================================================
   ROOT VARIABLES
   ========================================================= */
:root{
    --biru-tua:#0C447C;
    --biru:#185FA5;
    --biru-aksen:#378ADD;
    --biru-pudar:#EBF4FF;
    --biru-muda:#F0F7FF;
    --teal:#0D9488;
    --teal-pudar:#F0FDFB;
    --oranye:#F97316;
    --oranye-pudar:#FFF7ED;
    --teks-gelap:#0F172A;
    --teks-muted:#64748B;
    --bg:#F8FAFD;
}

body{
    background:var(--bg);
    font-family:'Plus Jakarta Sans',sans-serif;
    color:var(--teks-gelap);
    overflow-x:hidden;
}

/* =========================================================
   SCROLL REVEAL — state awal & animasi
   ========================================================= */
[data-reveal]{
    opacity:0;
    transform:translateY(32px);
    transition:opacity .65s cubic-bezier(.22,.68,0,1.2), transform .65s cubic-bezier(.22,.68,0,1.2);
}

[data-reveal="left"]{
    opacity:0;
    transform:translateX(-36px);
}

[data-reveal="right"]{
    opacity:0;
    transform:translateX(36px);
}

[data-reveal="scale"]{
    opacity:0;
    transform:scale(.9);
}

[data-reveal].revealed{
    opacity:1;
    transform:none;
}

/* Delay kelas pembantu */
.delay-1{ transition-delay:.1s; }
.delay-2{ transition-delay:.2s; }
.delay-3{ transition-delay:.3s; }
.delay-4{ transition-delay:.4s; }
.delay-5{ transition-delay:.5s; }

/* =========================================================
   HERO
   ========================================================= */
.hero-wrap{
    position:relative;
    padding:72px 0 60px;
    overflow:hidden;
}

.hero-wrap::before{
    content:'';
    position:absolute;
    inset:0;
    background-image:radial-gradient(var(--biru-aksen) 1px, transparent 1px);
    background-size:28px 28px;
    opacity:.055;
    z-index:0;
}

.hero-circle-1{
    position:absolute;
    top:-120px;
    right:-120px;
    width:520px;
    height:520px;
    border-radius:50%;
    background:radial-gradient(circle at 40% 40%, #DBEAFE, #EBF4FF 60%, transparent 80%);
    z-index:0;
}

.hero-circle-2{
    position:absolute;
    bottom:-100px;
    left:-80px;
    width:320px;
    height:320px;
    border-radius:50%;
    background:radial-gradient(circle at 60% 60%, #CCFBF1, transparent 70%);
    z-index:0;
}

.hero-row{
    position:relative;
    z-index:1;
    display:flex;
    align-items:center;
    gap:56px;
    flex-wrap:wrap;
}

.hero-text{ flex:1 1 440px; }

.hero-eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:var(--biru-pudar);
    color:var(--biru-tua);
    font-size:12.5px;
    font-weight:700;
    padding:7px 16px;
    border-radius:30px;
    margin-bottom:24px;
    letter-spacing:.3px;
    border:1px solid rgba(55,138,221,.2);
}

.hero-eyebrow i{ color:var(--oranye); font-size:15px; }

.hero-text h1{
    font-size:3rem;
    color:var(--teks-gelap);
    margin-bottom:20px;
    line-height:1.18;
}

.hero-text h1 .aksen-biru{ color:var(--biru); }

.hero-text h1 .garis-bawah{ position:relative; white-space:nowrap; }

.hero-text h1 .garis-bawah::after{
    content:'';
    position:absolute;
    left:0; bottom:3px;
    width:100%; height:10px;
    background:var(--oranye);
    opacity:.22;
    z-index:-1;
    border-radius:6px;
}

.hero-text p.lead-text{
    font-size:1.06rem;
    color:var(--teks-muted);
    max-width:480px;
    margin-bottom:36px;
    line-height:1.75;
}

.hero-cta{
    display:flex;
    gap:14px;
    flex-wrap:wrap;
    margin-bottom:0;
}

.btn-utama{
    background:var(--biru-tua);
    color:#fff;
    border:none;
    padding:14px 28px;
    border-radius:12px;
    font-weight:700;
    font-size:14.5px;
    display:inline-flex;
    align-items:center;
    gap:10px;
    text-decoration:none;
    transition:.25s;
    box-shadow:0 8px 24px -6px rgba(12,68,124,.38);
}

.btn-utama .btn-arrow{
    width:24px; height:24px;
    background:rgba(255,255,255,.18);
    border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    transition:.25s;
}

.btn-utama:hover{
    background:var(--biru);
    color:#fff;
    transform:translateY(-2px);
    box-shadow:0 12px 28px -6px rgba(12,68,124,.48);
}

.btn-utama:hover .btn-arrow{ transform:translateX(3px); background:var(--oranye); }

.btn-kedua{
    background:#fff;
    color:var(--biru-tua);
    border:1.5px solid rgba(12,68,124,.2);
    padding:14px 24px;
    border-radius:12px;
    font-weight:700;
    font-size:14.5px;
    display:inline-flex;
    align-items:center;
    gap:8px;
    text-decoration:none;
    transition:.25s;
}

.btn-kedua i{ color:var(--oranye); transition:.25s; }
.btn-kedua:hover{ border-color:var(--biru); color:var(--biru); background:var(--biru-muda); }
.btn-kedua:hover i{ transform:translateX(3px); }

.hero-image-wrap{ flex:1 1 420px; position:relative; }

.hero-image-frame{
    position:relative;
    border-radius:28px;
    padding:10px;
    background:#fff;
    box-shadow:0 32px 64px -20px rgba(12,68,124,.22);
    border:1px solid rgba(55,138,221,.12);
}

.hero-image{
    width:100%; height:440px;
    object-fit:cover;
    border-radius:20px;
    display:block;
    background:linear-gradient(135deg, var(--biru-pudar), #E0F2FE);
}

.hero-badge-floating{
    position:absolute;
    top:28px; left:-20px;
    background:#fff;
    border-radius:14px;
    padding:10px 16px;
    display:flex; align-items:center; gap:10px;
    box-shadow:0 12px 28px rgba(0,0,0,.1);
    border:1px solid rgba(55,138,221,.12);
    z-index:2;
}

.pulse-dot{
    width:10px; height:10px;
    border-radius:50%;
    background:#22C55E;
    position:relative; flex-shrink:0;
}

.pulse-dot::after{
    content:'';
    position:absolute; inset:-4px;
    border-radius:50%;
    background:#22C55E;
    opacity:.4;
    animation:pulse-ring 1.8s ease-out infinite;
}

@keyframes pulse-ring{
    0%{ transform:scale(.6); opacity:.6; }
    100%{ transform:scale(1.8); opacity:0; }
}

.badge-text{ font-size:12.5px; font-weight:700; color:var(--teks-gelap); }

.layanan-stack{
    position:absolute;
    right:-16px; bottom:-24px;
    z-index:2;
    display:flex; flex-direction:column; gap:12px;
}

.layanan-card{
    background:#fff;
    padding:13px 16px;
    border-radius:14px;
    box-shadow:0 10px 24px rgba(0,0,0,.09);
    display:flex; align-items:center; gap:12px;
    width:230px;
    transition:.3s;
    border:1px solid rgba(55,138,221,.1);
}

.layanan-card:hover{ transform:translateX(-6px); box-shadow:0 16px 32px rgba(0,0,0,.13); }
.layanan-card.geser-kiri{ margin-left:-44px; }

.icon-box{
    width:40px; height:40px;
    border-radius:11px;
    display:flex; align-items:center; justify-content:center;
    font-size:19px; flex-shrink:0;
}

.icon-box.tone-biru{ background:var(--biru-pudar); color:var(--biru); }
.icon-box.tone-teal{ background:var(--teal-pudar); color:var(--teal); }
.icon-box.tone-oranye{ background:var(--oranye-pudar); color:var(--oranye); }

.label-top{ font-size:10px; color:var(--teks-muted); font-weight:600; text-transform:uppercase; letter-spacing:.5px; }
.label-main{ font-size:13px; font-weight:700; color:var(--teks-gelap); line-height:1.3; }

/* =========================================================
   SECTION TITLE (umum)
   ========================================================= */
.section-tag{
    display:inline-flex;
    align-items:center; gap:6px;
    font-size:12px; font-weight:700;
    color:var(--biru);
    text-transform:uppercase; letter-spacing:1px;
    margin-bottom:10px;
    background:var(--biru-pudar);
    padding:5px 14px; border-radius:20px;
    border:1px solid rgba(55,138,221,.2);
}

.section-tag i{ font-size:13px; color:var(--oranye); }
.section-title{ font-weight:800; color:var(--teks-gelap); margin-bottom:0; font-size:2rem; }
.section-head{ margin-bottom:36px; }
.section-head.center{ text-align:center; max-width:560px; margin-left:auto; margin-right:auto; }
.section-sub{ color:var(--teks-muted); font-size:.97rem; margin-top:10px; }

/* =========================================================
   ALUR PENDAFTARAN — timeline horizontal
   ========================================================= */
.alur-section{
    background:#fff;
    border-radius:28px;
    padding:52px 48px;
    margin:60px 0;
    border:1px solid rgba(55,138,221,.1);
    box-shadow:0 4px 32px rgba(12,68,124,.05);
    position:relative;
    overflow:hidden;
}

.alur-section::before{
    content:'';
    position:absolute;
    top:-60px; right:-60px;
    width:200px; height:200px;
    background:var(--biru-pudar);
    border-radius:50%;
    opacity:.5;
}

.alur-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:0;
    position:relative;
}

/* Garis penghubung */
.alur-grid::before{
    content:'';
    position:absolute;
    top:28px;
    left:calc(12.5% + 8px);
    width:calc(75% - 16px);
    height:2px;
    background:linear-gradient(90deg, var(--biru-pudar), var(--biru-aksen), var(--biru-pudar));
    z-index:0;
}

.alur-step{
    display:flex;
    flex-direction:column;
    align-items:center;
    text-align:center;
    padding:0 16px;
    position:relative;
    z-index:1;
}

.alur-num{
    width:56px; height:56px;
    border-radius:50%;
    background:var(--biru-pudar);
    border:2px solid var(--biru-aksen);
    color:var(--biru-tua);
    font-size:1.2rem; font-weight:800;
    display:flex; align-items:center; justify-content:center;
    margin-bottom:18px;
    transition:.3s;
    position:relative;
}

.alur-step:hover .alur-num{
    background:var(--biru-tua);
    color:#fff;
    border-color:var(--biru-tua);
    transform:scale(1.1);
}

.alur-num .alur-icon{
    position:absolute;
    bottom:-6px; right:-6px;
    width:22px; height:22px;
    border-radius:50%;
    background:var(--oranye);
    color:#fff;
    display:flex; align-items:center; justify-content:center;
    font-size:11px;
}

.alur-step h6{
    font-size:14px; font-weight:700;
    color:var(--teks-gelap);
    margin-bottom:6px;
}

.alur-step p{
    font-size:12.5px;
    color:var(--teks-muted);
    line-height:1.55;
    margin:0;
}

/* =========================================================
   TRUST STRIP (Kenapa PKBI)
   ========================================================= */
.trust-strip{
    background:linear-gradient(135deg, #EFF6FF 0%, #F0FDFB 100%);
    border-radius:28px;
    padding:56px 48px;
    margin:0 0 60px;
    position:relative;
    overflow:hidden;
    border:1px solid rgba(55,138,221,.13);
}

.trust-strip::before{
    content:'';
    position:absolute;
    top:-60px; right:-60px;
    width:220px; height:220px;
    background:rgba(55,138,221,.06);
    border-radius:50%;
}

.trust-strip::after{
    content:'';
    position:absolute;
    bottom:-80px; left:15%;
    width:200px; height:200px;
    background:rgba(13,148,136,.07);
    border-radius:50%;
}

.trust-row{
    position:relative; z-index:1;
    display:flex; flex-wrap:wrap; gap:32px; align-items:center;
}

.trust-head{ flex:1 1 260px; }

.trust-head h3{ font-size:1.6rem; color:var(--biru-tua); margin-bottom:10px; }
.trust-head p{ color:var(--teks-muted); font-size:14px; margin-bottom:0; line-height:1.7; }

.trust-points{
    flex:2 1 480px;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:16px;
}

.trust-point{
    background:#fff;
    border:1px solid rgba(55,138,221,.14);
    border-radius:18px;
    padding:20px;
    transition:.25s;
}

.trust-point:hover{
    border-color:var(--biru-aksen);
    transform:translateY(-4px);
    box-shadow:0 12px 28px -8px rgba(12,68,124,.12);
}

.tp-icon{
    width:42px; height:42px;
    border-radius:12px;
    background:var(--biru-pudar);
    color:var(--biru);
    display:flex; align-items:center; justify-content:center;
    font-size:20px;
    margin-bottom:12px;
}

.trust-point:nth-child(2) .tp-icon{ background:var(--teal-pudar); color:var(--teal); }
.trust-point:nth-child(3) .tp-icon{ background:var(--oranye-pudar); color:var(--oranye); }

.tp-title{ color:var(--teks-gelap); font-weight:700; font-size:13.5px; margin-bottom:5px; }
.tp-text{ color:var(--teks-muted); font-size:12.5px; line-height:1.6; }

/* =========================================================
   INFORMASI TERBARU
   ========================================================= */
.info-section{
    background:#fff;
    border-radius:28px;
    padding:52px;
    box-shadow:0 4px 32px rgba(12,68,124,.06);
    margin-top:20px;
    border:1px solid rgba(55,138,221,.1);
}

.info-card{
    background:var(--bg);
    border-radius:20px;
    overflow:hidden;
    height:100%;
    display:flex; flex-direction:column;
    transition:.3s;
    border:1px solid rgba(55,138,221,.1);
}

.info-card:hover{
    transform:translateY(-6px);
    box-shadow:0 18px 36px rgba(12,68,124,.11);
    border-color:rgba(55,138,221,.25);
}

.info-image{
    position:relative; height:195px; overflow:hidden;
}

.info-image img{ width:100%; height:100%; object-fit:cover; transition:.4s; }
.info-card:hover .info-image img{ transform:scale(1.06); }

.info-cat{
    position:absolute; top:12px; left:12px;
    color:#fff; font-size:11px; font-weight:700;
    padding:5px 13px; border-radius:20px;
    text-transform:uppercase; letter-spacing:.4px;
    backdrop-filter:blur(4px);
}

.info-cat.cat-biru{ background:rgba(12,68,124,.82); }
.info-cat.cat-oranye{ background:rgba(234,103,12,.88); }
.info-cat.cat-teal{ background:rgba(13,148,136,.88); }

.info-content{ padding:22px 22px 26px; display:flex; flex-direction:column; flex:1; }
.info-content h5{ font-size:1rem; font-weight:700; color:var(--teks-gelap); margin-bottom:10px; line-height:1.45; }
.info-content p{ color:var(--teks-muted); font-size:13.5px; margin-bottom:18px; flex:1; line-height:1.7; }

.info-link{
    color:var(--biru); text-decoration:none;
    font-weight:700; font-size:13.5px;
    display:inline-flex; align-items:center; gap:6px;
}

.info-link i{ transition:.25s; }
.info-link:hover i{ transform:translateX(4px); }
.info-link:hover{ color:var(--biru-tua); }

/* =========================================================
   GENERIC CARD
   ========================================================= */
.card{
    transition:.3s;
    border:none;
    border-radius:18px;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 16px 36px rgba(12,68,124,.1);
}

/* =========================================================
   RESPONSIVE
   ========================================================= */
@media(max-width:991px){
    .hero-image-frame{ max-width:480px; margin:0 auto; }
    .hero-image{ height:360px; }
    .layanan-stack{ right:6px; bottom:-14px; }
    .layanan-card{ width:200px; padding:11px 13px; }
    .layanan-card.geser-kiri{ margin-left:-28px; }
    .trust-points{ grid-template-columns:repeat(2,1fr); }
    .alur-grid{ grid-template-columns:repeat(2,1fr); gap:28px; }
    .alur-grid::before{ display:none; }
}

@media(max-width:768px){
    .hero-wrap{ padding:36px 0 40px; }
    .hero-text h1{ font-size:2.1rem; }
    .hero-image{ height:280px; }
    .hero-badge-floating{ left:8px; top:14px; padding:8px 12px; }
    .layanan-stack{ position:static; flex-direction:row; flex-wrap:wrap; margin-top:18px; gap:10px; }
    .layanan-card{ width:auto; flex:1 1 140px; }
    .layanan-card.geser-kiri{ margin-left:0; }
    .info-section{ padding:28px 20px; border-radius:20px; }
    .trust-strip{ padding:34px 22px; border-radius:20px; }
    .trust-points{ grid-template-columns:1fr; }
    .trust-row{ flex-direction:column; align-items:flex-start; }
    .alur-section{ padding:32px 24px; border-radius:20px; }
    .alur-grid{ grid-template-columns:1fr; gap:20px; }
    .alur-step{ flex-direction:row; text-align:left; gap:16px; align-items:flex-start; }
    .alur-num{ margin-bottom:0; flex-shrink:0; }
}

</style>

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container pt-2 pb-5">

    <!-- ===================== HERO ===================== -->
    <section class="hero-wrap">
        <div class="hero-circle-1"></div>
        <div class="hero-circle-2"></div>

        <div class="hero-row">

            <div class="hero-text" data-reveal="left">

                <span class="hero-eyebrow">
                    <i class="ri-shield-check-line"></i>
                    PKBI Sumatera Selatan
                </span>

                <h1>
                    Konseling kesehatan reproduksi yang
                    <span class="garis-bawah"><span class="aksen-biru">tepat</span> dan terpercaya</span>
                </h1>

                <p class="lead-text">
                    Dapatkan pendampingan dari konselor terlatih untuk
                    kesehatan reproduksi, keluarga berencana, dan
                    kesejahteraan Anda — didukung sistem penentuan
                    prioritas layanan yang adil dan terukur.
                </p>

                <div class="hero-cta">
                    <a href="<?= defined('BASE_URL') ? BASE_URL : '' ?>layanan.php" class="btn-utama">
                        layanan Konseling
                        <span class="btn-arrow"><i class="ri-arrow-right-line"></i></span>
                    </a>
                    <a href="#alur" class="btn-kedua">
                        <i class="ri-play-circle-line"></i>
                        Cara Mendaftar
                    </a>
                </div>

            </div>

            <div class="hero-image-wrap" data-reveal="right">

                <div class="hero-badge-floating">
                    <span class="pulse-dot"></span>
                    <span class="badge-text">Konselor Online Sekarang</span>
                </div>

                <div class="hero-image-frame">
                    <img src="assets/img/index konsul.png" alt="Sesi konseling PKBI" class="hero-image">
                </div>

                <div class="layanan-stack">
                    <div class="layanan-card">
                        <div class="icon-box tone-biru"><i class="ri-user-heart-line"></i></div>
                        <div>
                            <div class="label-top">Layanan</div>
                            <div class="label-main">Konseling Privat &amp; Rahasia</div>
                        </div>
                    </div>
                    <div class="layanan-card geser-kiri">
                        <div class="icon-box tone-teal"><i class="ri-parent-line"></i></div>
                        <div>
                            <div class="label-top">Layanan</div>
                            <div class="label-main">Keluarga Berencana</div>
                        </div>
                    </div>
                    <div class="layanan-card">
                        <div class="icon-box tone-oranye"><i class="ri-shield-cross-line"></i></div>
                        <div>
                            <div class="label-top">Layanan</div>
                            <div class="label-main">Edukasi Kesehatan Reproduksi</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- ===================== ALUR PENDAFTARAN ===================== -->
    <section class="alur-section" id="alur" data-reveal>
        <div class="section-head center">
            <span class="section-tag"><i class="ri-route-line"></i> Cara Mendaftar</span>
            <h2 class="section-title">Alur Pendaftaran Konseling</h2>
            <p class="section-sub">Empat langkah mudah untuk memulai perjalanan konseling Anda bersama kami.</p>
        </div>

        <div class="alur-grid">

            <div class="alur-step" data-reveal="scale" style="transition-delay:.1s">
                <div class="alur-num">
                    1
                    <span class="alur-icon"><i class="ri-user-add-line"></i></span>
                </div>
                <h6>Registrasi Akun</h6>
                <p>Buat akun baru melalui halaman registrasi dengan data diri yang lengkap dan valid.</p>
            </div>

            <div class="alur-step" data-reveal="scale" style="transition-delay:.22s">
                <div class="alur-num">
                    2
                    <span class="alur-icon"><i class="ri-shield-check-line"></i></span>
                </div>
                <h6>Validasi Admin</h6>
                <p>Admin akan memverifikasi data Anda dan memberikan akses login dalam waktu singkat.</p>
            </div>

            <div class="alur-step" data-reveal="scale" style="transition-delay:.34s">
                <div class="alur-num">
                    3
                    <span class="alur-icon"><i class="ri-file-list-3-line"></i></span>
                </div>
                <h6>Isi Formulir</h6>
                <p>Login dan isi formulir pendaftaran konseling dengan keluhan dan kebutuhan Anda.</p>
            </div>

            <div class="alur-step" data-reveal="scale" style="transition-delay:.46s">
                <div class="alur-num">
                    4
                    <span class="alur-icon"><i class="ri-calendar-check-line"></i></span>
                </div>
                <h6>Jadwal Dikonfirmasi</h6>
                <p>Sistem akan menentukan prioritas dan konselor terbaik untuk sesi konseling Anda.</p>
            </div>

        </div>
    </section>

    <!-- ===================== DOKUMENTASI KEGIATAN ===================== -->
    <?php include 'includes/dokumentasi.php'; ?>

    <!-- ===================== KENAPA PKBI ===================== -->
    <section class="trust-strip" id="layanan" data-reveal>
        <div class="trust-row">

            <div class="trust-head" data-reveal="left" style="transition-delay:.1s">
                <h3>Mengapa Memilih PKBI Sumatera Selatan?</h3>
                <p>
                    Lebih dari sekadar layanan konseling — kami hadir
                    dengan standar profesional dan kepedulian yang nyata.
                </p>
            </div>

            <div class="trust-points">
                <div class="trust-point" data-reveal="scale" style="transition-delay:.15s">
                    <div class="tp-icon"><i class="ri-lock-2-line"></i></div>
                    <div class="tp-title">Kerahasiaan Terjaga</div>
                    <div class="tp-text">Setiap data dan sesi konseling Anda dijamin kerahasiaannya.</div>
                </div>
                <div class="trust-point" data-reveal="scale" style="transition-delay:.28s">
                    <div class="tp-icon"><i class="ri-award-line"></i></div>
                    <div class="tp-title">Konselor Bersertifikat</div>
                    <div class="tp-text">Ditangani oleh konselor yang telah terlatih dan berpengalaman.</div>
                </div>
                <div class="trust-point" data-reveal="scale" style="transition-delay:.42s">
                    <div class="tp-icon"><i class="ri-time-line"></i></div>
                    <div class="tp-title">Penjadwalan Fleksibel</div>
                    <div class="tp-text">Atur jadwal konseling sesuai waktu yang paling nyaman bagi Anda.</div>
                </div>
            </div>

        </div>
    </section>

    <!-- ===================== INFORMASI TERBARU ===================== -->
    <div class="info-section mb-5" data-reveal>

        <div class="section-head">
            <span class="section-tag"><i class="ri-newspaper-line"></i> Kabar &amp; Kegiatan</span>
            <h2 class="section-title">Informasi Terbaru</h2>
            <p class="section-sub">Ikuti perkembangan program dan kegiatan kami.</p>
        </div>

        <div class="row g-4">

            <div class="col-lg-4" data-reveal style="transition-delay:.1s">
                <div class="info-card">
                    <div class="info-image">
                        <img src="assets/img/publikasi unisa.jpeg" alt="Edukasi dampak sunat perempuan">
                        <span class="info-cat cat-biru">Edukasi</span>
                    </div>
                    <div class="info-content">
                        <h5>Edukasi Mengenai Dampak Sunat Perempuan di Universitas Aisyiyah Palembang</h5>
                        <p>Edukasi dampak sunat perempuan untuk meningkatkan pemahaman kesehatan reproduksi dan hak perempuan.</p>
                        <a href="includes/detail_berita1.php?id=1" class="info-link">
                            Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-reveal style="transition-delay:.22s">
                <div class="info-card">
                    <div class="info-image">
                        <img src="assets/img/publikasi FGM.jpeg" alt="Assessment FGM/C">
                        <span class="info-cat cat-oranye">Riset</span>
                    </div>
                    <div class="info-content">
                        <h5>Assessment and Mapping Female Genital Mutilation / Cutting</h5>
                        <p>Kegiatan assessment dan pemetaan praktik FGM/C sebagai dasar pengumpulan data di masyarakat.</p>
                        <a href="includes/detail_berita2.php?id=1" class="info-link">
                            Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-reveal style="transition-delay:.34s">
                <div class="info-card">
                    <div class="info-image">
                        <img src="assets/img/publikasi hiv.jpeg" alt="Edukasi pencegahan HIV/AIDS">
                        <span class="info-cat cat-teal">Kesehatan</span>
                    </div>
                    <div class="info-content">
                        <h5>Edukasi Pencegahan HIV/AIDS</h5>
                        <p>PKBI Sumatera Selatan melakukan edukasi kepada masyarakat mengenai pencegahan HIV/AIDS dan kesehatan reproduksi.</p>
                        <a href="includes/detail_berita3.php?id=1" class="info-link">
                            Baca Selengkapnya <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// =============================================
// SCROLL REVEAL — IntersectionObserver ringan
// =============================================
(function(){
    var io = new IntersectionObserver(function(entries){
        entries.forEach(function(entry){
            if(entry.isIntersecting){
                entry.target.classList.add('revealed');
                io.unobserve(entry.target);
            }
        });
    },{
        threshold: 0.12,
        rootMargin: '0px 0px -48px 0px'
    });

    // Hero langsung visible tanpa tunggu scroll
    document.querySelectorAll('.hero-wrap [data-reveal]').forEach(function(el){
        el.classList.add('revealed');
    });

    // Semua elemen lain pakai IntersectionObserver
    document.querySelectorAll('[data-reveal]:not(.hero-wrap [data-reveal])').forEach(function(el){
        io.observe(el);
    });

    // Reduced motion — matikan animasi jika user prefer
    if(window.matchMedia('(prefers-reduced-motion: reduce)').matches){
        document.querySelectorAll('[data-reveal]').forEach(function(el){
            el.classList.add('revealed');
        });
    }
})();
</script>

</body>
</html>