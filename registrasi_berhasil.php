<?php
session_start();

// Hanya bisa diakses setelah registrasi sukses, bukan diketik manual di URL
if (!isset($_SESSION['registrasi_sukses'])) {
    header('Location: registrasi.php');
    exit;
}
unset($_SESSION['registrasi_sukses']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi Berhasil - PKBI Sumatera Selatan</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Nunito', sans-serif; background:#f4f6fb; }

.page-wrap {
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:32px 16px;
}

.card {
    background:#fff;
    max-width:480px;
    width:100%;
    padding:40px 32px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(13,31,79,.10);
    text-align:center;
}

.icon-success {
    width:72px;
    height:72px;
    background:#e8f8ee;
    color:#1e9e54;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    margin:0 auto 20px;
}

h1 {
    font-size:19px;
    font-weight:800;
    color:#0d1f4f;
    margin-bottom:10px;
}

p {
    font-size:13.5px;
    color:#555;
    line-height:1.6;
    margin-bottom:24px;
}

a.btn-back {
    display:inline-block;
    padding:12px 28px;
    background:#0d1f4f;
    color:#fff;
    text-decoration:none;
    border-radius:10px;
    font-weight:700;
    font-size:14px;
}

a.btn-back:hover { background:#1e4799; }
</style>
</head>
<body>

<div class="page-wrap">
    <div class="card">
        <div class="icon-success"><i class="fas fa-clock"></i></div>
        <h1>Registrasi Berhasil Dikirim</h1>
        <p>
            Akun Anda sedang menunggu validasi dari admin PKBI Sumatera Selatan.
            Anda akan dapat login dan mendaftar konseling setelah akun disetujui.
            Silakan cek kembali dalam waktu 1&ndash;2 hari kerja.
        </p>
        <a href="index.php" class="btn-back">Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>