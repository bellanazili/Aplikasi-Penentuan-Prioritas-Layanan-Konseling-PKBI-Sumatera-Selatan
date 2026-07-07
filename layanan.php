<?php
session_start();

$pageTitle = "Layanan Kami";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Layanan Kami | PKBI Sumatera Selatan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>

:root {
    --navy-deep: #0f1f3d;
    --navy: #1e3a8a;
    --blue-primary: #2563eb;
    --blue-hover: #1d4ed8;
    --blue-light: #e8efff;
    --text-dark: #1f2937;
    --text-body: #475569;
    --text-muted: #94a3b8;
    --border-soft: #e5e9f2;
}

* { font-family: 'Poppins', 'Segoe UI', sans-serif; }

body {
    background: #f4f7fb;
    background-image:
        radial-gradient(circle at 100% 0%, rgba(37, 99, 235, 0.07) 0%, transparent 45%),
        radial-gradient(circle at 0% 100%, rgba(30, 58, 138, 0.06) 0%, transparent 45%);
    color: var(--text-dark);
}

/* ===== HERO LAYANAN ===== */
.layanan-hero {
    background: linear-gradient(135deg, var(--navy-deep), var(--navy) 55%, var(--blue-primary));
    border-radius: 26px;
    padding: 26px 32px;
    margin: 32px 0 40px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 45px rgba(15, 31, 61, 0.22);
}

.layanan-hero::before {
    content: "";
    position: absolute;
    width: 380px;
    height: 380px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.10) 0%, transparent 70%);
    top: -120px;
    right: -80px;
}

.layanan-hero::after {
    content: "";
    position: absolute;
    width: 280px;
    height: 280px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(255,255,255,0.07) 0%, transparent 70%);
    bottom: -100px;
    left: -60px;
}

.layanan-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(255,255,255,0.12);
    color: #fff;
    font-size: 12.5px;
    font-weight: 600;
    letter-spacing: 0.04em;
    padding: 7px 16px;
    border-radius: 30px;
    margin-bottom: 18px;
    position: relative;
    z-index: 1;
}

.layanan-hero h1 {
    color: #fff;
    font-weight: 800;
    font-size: 34px;
    max-width: 620px;
    line-height: 1.3;
    margin-bottom: 14px;
    position: relative;
    z-index: 1;
}

.layanan-hero p {
    color: rgba(255,255,255,0.82);
    font-size: 15.5px;
    max-width: 560px;
    line-height: 1.8;
    margin-bottom: 0;
    position: relative;
    z-index: 1;
}

/* ===== SECTION HEADER ===== */
.section-tag {
    display: inline-block;
    color: var(--blue-primary);
    font-weight: 700;
    font-size: 12.5px;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.section-title {
    font-weight: 700;
    font-size: 26px;
    color: var(--text-dark);
    margin-bottom: 10px;
}

.section-desc {
    color: var(--text-muted);
    font-size: 14.5px;
    max-width: 620px;
    line-height: 1.8;
    margin-bottom: 36px;
}

/* ===== LAYANAN CARDS ===== */
.layanan-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-bottom: 70px;
}

.layanan-card {
    background: #fff;
    border-radius: 20px;
    padding: 30px 26px;
    border: 1px solid var(--border-soft);
    box-shadow: 0 6px 20px rgba(15, 31, 61, 0.05);
    transition: all 0.25s ease;
    position: relative;
}

.layanan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 16px 32px rgba(15, 31, 61, 0.12);
    border-color: #cdddfb;
}

.layanan-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: var(--blue-light);
    color: var(--blue-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin-bottom: 18px;
    transition: all 0.25s ease;
}

.layanan-card:hover .layanan-icon {
    background: var(--blue-primary);
    color: #fff;
}

.layanan-card h3 {
    font-size: 16.5px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 10px;
}

.layanan-card p {
    font-size: 13.5px;
    color: var(--text-body);
    line-height: 1.75;
    margin-bottom: 0;
}

/* ===== KONSELOR ===== */
.konselor-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 32px 18px;
    margin-bottom: 60px;
}

.konselor-card {
    text-align: center;
}

.konselor-photo-wrap {
    position: relative;
    width: 108px;
    height: 108px;
    margin: 0 auto 14px;
    border-radius: 50%;
    overflow: hidden;
    background: linear-gradient(135deg, var(--navy), #3b5bb0);
    border: 3px solid #fff;
    box-shadow: 0 6px 16px rgba(15, 31, 61, 0.12);
    transition: all 0.25s ease;
}

.konselor-card:hover .konselor-photo-wrap {
    border-color: var(--blue-primary);
    box-shadow: 0 10px 22px rgba(37, 99, 235, 0.22);
    transform: translateY(-4px);
}

.konselor-photo-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.konselor-info {
    padding: 0 4px;
}

.konselor-nama {
    font-size: 13.5px;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 3px;
    line-height: 1.3;
}

.konselor-spesialisasi {
    font-size: 11.5px;
    color: var(--blue-primary);
    font-weight: 600;
    line-height: 1.4;
}

/* ===== CTA BAWAH ===== */
.cta-box {
    background: var(--blue-light);
    border-radius: 22px;
    padding: 38px 44px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 60px;
}

.cta-box h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--navy-deep);
    margin-bottom: 6px;
}

.cta-box p {
    font-size: 13.5px;
    color: var(--text-body);
    margin-bottom: 0;
}

.cta-btn {
    background: var(--blue-primary);
    color: #fff;
    font-weight: 600;
    font-size: 14px;
    padding: 13px 28px;
    border-radius: 30px;
    text-decoration: none;
    white-space: nowrap;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.cta-btn:hover {
    background: var(--blue-hover);
    color: #fff;
    transform: translateY(-2px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 992px) {
    .layanan-grid { grid-template-columns: repeat(2, 1fr); }
    .konselor-grid { grid-template-columns: repeat(3, 1fr); }
}

@media (max-width: 768px) {
    .layanan-hero { padding: 44px 26px; border-radius: 20px; }
    .layanan-hero h1 { font-size: 25px; }
    .section-title { font-size: 21px; }
    .cta-box { padding: 28px 24px; flex-direction: column; align-items: flex-start; }
    .konselor-grid { grid-template-columns: repeat(3, 1fr); gap: 26px 14px; }
}

@media (max-width: 480px) {
    .layanan-grid { grid-template-columns: 1fr; }
    .konselor-grid { grid-template-columns: 1fr 1fr; gap: 22px 12px; }
    .konselor-photo-wrap { width: 92px; height: 92px; }
    .konselor-info { padding: 0; }
    .konselor-nama { font-size: 12.5px; }
    .konselor-spesialisasi { font-size: 10.5px; }
}

</style>
</head>
<body>

<?php include 'includes/navbar.php'; // sesuaikan nama file/folder navbar kamu ?>

<div class="container py-4" style="max-width: 1100px;">

    <!-- Daftar Layanan -->
    <span class="section-tag">Apa yang kami tawarkan</span>
    <h2 class="section-title">Jenis Layanan</h2>
    <p class="section-desc">Berikut layanan utama yang tersedia di PKBI Daerah Sumatera Selatan. Semua layanan diberikan secara rahasia dan ramah bagi remaja maupun dewasa.</p>

    <div class="layanan-grid">

        <div class="layanan-card">
            <div class="layanan-icon"><i class="fa-solid fa-comments"></i></div>
            <h3>Konseling Kesehatan Reproduksi</h3>
            <p>Sesi konseling individu untuk membahas kesehatan reproduksi, siklus menstruasi, kesuburan, hingga masalah seksual secara rahasia.</p>
        </div>

        <div class="layanan-card">
            <div class="layanan-icon"><i class="fa-solid fa-baby"></i></div>
            <h3>Keluarga Berencana (KB)</h3>
            <p>Konsultasi pemilihan alat kontrasepsi yang sesuai kebutuhan, beserta pemasangan dan pemantauan rutin.</p>
        </div>

        <div class="layanan-card">
            <div class="layanan-icon"><i class="fa-solid fa-vial-circle-check"></i></div>
            <h3>Skrining IMS &amp; HIV</h3>
            <p>Pemeriksaan dan tes sukarela untuk infeksi menular seksual (IMS) dan HIV, dengan konseling sebelum dan sesudah tes.</p>
        </div>

        <div class="layanan-card">
            <div class="layanan-icon"><i class="fa-solid fa-user-graduate"></i></div>
            <h3>Konseling Remaja &amp; Pranikah</h3>
            <p>Pendampingan khusus remaja dan calon pasangan menikah seputar kesehatan reproduksi dan kesiapan berkeluarga.</p>
        </div>

        <div class="layanan-card">
            <div class="layanan-icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
            <h3>Pendampingan Korban Kekerasan</h3>
            <p>Layanan pendampingan psikososial bagi penyintas kekerasan berbasis gender, termasuk rujukan ke layanan hukum dan medis.</p>
        </div>

        <div class="layanan-card">
            <div class="layanan-icon"><i class="fa-solid fa-people-group"></i></div>
            <h3>Edukasi &amp; Penyuluhan Komunitas</h3>
            <p>Pelatihan dan penyuluhan kesehatan reproduksi untuk sekolah, kampus, dan komunitas guna meningkatkan kesadaran publik.</p>
        </div>

    </div>

    <!-- Tim Konselor -->
    <span class="section-tag">Siap mendengarkan tanpa menghakimi</span>
    <h2 class="section-title">Tim Konselor Kami</h2>
    <p class="section-desc">Konselor kami terlatih dan berpengalaman dalam menangani isu kesehatan reproduksi dengan pendekatan yang aman dan rahasia.</p>

    <div class="konselor-grid">

        <!-- Baris 1 -->
        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/fitri yenni.jpeg" alt="Foto Konselor 1">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">Fitri Yenni, SKM</div>
                <div class="konselor-spesialisasi">Konseling Kesehatan Reproduksi</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/kusdariani.jpeg" alt="Foto Konselor 2">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">Kusdariani, AM.Kep</div>
                <div class="konselor-spesialisasi">Konseling Keperawatan & Kesehatan</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/dr atia.jpeg" alt="Foto Konselor 3">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">dr. Atia Julika</div>
                <div class="konselor-spesialisasi">Konseling Kesehatan Pranikah</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/wakil 5.png" alt="Foto Konselor 4">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">Karima Saraswati</div>
                <div class="konselor-spesialisasi">Konseling Remaja & Sosial</div>
            </div>
        </div>

        <!-- Baris 2 -->
        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/redy kaswara.jpeg" alt="Foto Konselor 5">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">Redi Kaswara, SKM, MKM</div>
                <div class="konselor-spesialisasi">Konseling Kesehatan Masyarakat dan Reproduksi</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/Dr evia.jpeg" alt="Foto Konselor 6">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">	Dr. Evia Darmawani, M.Pd., Kons.</div>
                <div class="konselor-spesialisasi">Konseling Pendidikan, Remaja & Psikologis</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/ani hidayati iriani.jpeg" alt="Foto Konselor 7">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">Ani Hidayati Iriani, S.Sos., M.Si</div>
                <div class="konselor-spesialisasi">Konseling Sosial & Keluarga dan Kesehatan Reproduksi</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/dr dwi.jpeg" alt="Foto Konselor 8">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">dr. Hj. Dwi Rasmini Yunita</div>
                <div class="konselor-spesialisasi">Konseling Kesehatan Umum & Reproduksi</div>
            </div>
        </div>

        <!-- Baris 3 -->
        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/ardiansyah.jpeg" alt="Foto Konselor 9">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">H. Ardiansyah, SKM</div>
                <div class="konselor-spesialisasi">Konseling Kesehatan Masyarakat / Kesehatan Reproduksi</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/dr odis.jpeg" alt="Foto Konselor 10">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">dr. M. Ramadhandie Odiesta, Sp.N</div>
                <div class="konselor-spesialisasi">Konseling Neurologi / Kesehatan Saraf</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/hamdi.jpeg" alt="Foto Konselor 11">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">	Hamdi, S.A.P.</div>
                <div class="konselor-spesialisasi">Konseling Pranikah</div>
            </div>
        </div>

        <div class="konselor-card">
            <div class="konselor-photo-wrap">
                <img src="assets/img/nindi.jpeg" alt="Foto Konselor 12">
            </div>
            <div class="konselor-info">
                <div class="konselor-nama">	Nindi Nupita, SE</div>
                <div class="konselor-spesialisasi">Konseling Umum</div>
            </div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; // sesuaikan nama file/folder navbar kamu ?>

</body>
</html>