<?php
session_start();
require_once 'config/koneksi.php';

// Jika sudah login, tidak perlu registrasi lagi
if (isset($_SESSION['user_id'])) {
    header('Location: ' . ($_SESSION['role'] === 'klien' ? 'klien/pendaftaran.php' : 'dashboard.php'));
    exit;
}

$errors = [];
$old = [
    'nama' => '',
    'username' => '',
    'no_hp' => '',
    'tempat_lahir' => '',
    'tanggal_lahir' => '',
    'email' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ===== Ambil & bersihkan input =====
    $nama          = trim($_POST['nama'] ?? '');
    $username      = trim($_POST['username'] ?? '');
    $password      = $_POST['password'] ?? '';
    $konfirmasi    = $_POST['konfirmasi_password'] ?? '';
    $no_hp         = trim($_POST['no_hp'] ?? '');
    $tempat_lahir  = trim($_POST['tempat_lahir'] ?? '');
    $tanggal_lahir = trim($_POST['tanggal_lahir'] ?? '');
    $email      = trim($_POST['email'] ?? '');

    $old = compact('nama', 'username', 'no_hp', 'tempat_lahir', 'tanggal_lahir', 'email');

    // ===== Validasi wajib isi =====
    if ($nama === '')          $errors[] = 'Nama lengkap wajib diisi.';
    if ($username === '')      $errors[] = 'Username wajib diisi.';
    if ($password === '')      $errors[] = 'Password wajib diisi.';
    if ($no_hp === '')         $errors[] = 'Nomor HP wajib diisi.';
    if ($tempat_lahir === '')  $errors[] = 'Tempat lahir wajib diisi.';
    if ($tanggal_lahir === '') $errors[] = 'Tanggal lahir wajib diisi.';
    if ($email === '')      $errors[]      = 'Emailwajib diisi.';

    // ===== Validasi format =====
    if ($username !== '' && !preg_match('/^[a-zA-Z0-9_]{4,20}$/', $username)) {
        $errors[] = 'Username 4-20 karakter, hanya huruf, angka, dan underscore.';
    }

    if ($password !== '' && strlen($password) < 8) {
        $errors[] = 'Password minimal 8 karakter.';
    }

    if ($password !== '' && !preg_match('/[A-Z]/', $password)) {
        $errors[] = 'Password harus mengandung minimal 1 huruf besar.';
    }

    if ($password !== '' && !preg_match('/[0-9]/', $password)) {
        $errors[] = 'Password harus mengandung minimal 1 angka.';
    }

    if ($password !== $konfirmasi) {
        $errors[] = 'Konfirmasi password tidak cocok.';
    }

    if ($no_hp !== '' && !preg_match('/^[0-9+\-\s]{8,15}$/', $no_hp)) {
        $errors[] = 'Format nomor HP tidak valid.';
    }

    if ($tanggal_lahir !== '') {
        $d = DateTime::createFromFormat('Y-m-d', $tanggal_lahir);
        if (!$d || $d->format('Y-m-d') !== $tanggal_lahir) {
            $errors[] = 'Format tanggal lahir tidak valid.';
        }
    }

    // ===== Cek username sudah dipakai atau belum =====
    if (empty($errors)) {
        $stmt = $koneksi->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors[] = 'Username sudah digunakan, silakan pilih username lain.';
        }
        $stmt->close();
    }

    // ===== Simpan jika tidak ada error =====
    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $role   = 'klien';
        $status = 'pending';

        $stmt = $koneksi->prepare(
            "INSERT INTO users
                (nama, username, password, role, no_hp, tempat_lahir, tanggal_lahir, email, status)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "sssssssss",
            $nama, $username, $password_hash, $role,
            $no_hp, $tempat_lahir, $tanggal_lahir, $email, $status
        );

        if ($stmt->execute()) {
            $stmt->close();
            $_SESSION['registrasi_sukses'] = true;
            header('Location: registrasi_berhasil.php');
            exit;
        } else {
            $errors[] = 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.';
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrasi Klien - PKBI Sumatera Selatan</title>

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'Nunito', sans-serif; background:#f4f6fb; }

:root{
    --navy:#0d1f4f;
    --blue:#1e4799;
    --gold:#d4a437;
    --border:#e2e8f0;
    --danger:#dc2626;
}

.page-wrap {
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:32px 16px;
}

.regis-card {
    background:#fff;
    width:100%;
    max-width:560px;
    border-radius:16px;
    box-shadow:0 10px 30px rgba(13,31,79,.10);
    overflow:hidden;
}

.regis-header {
    background:var(--navy);
    padding:28px 32px;
    color:#fff;
}

.regis-header h1 {
    font-size:20px;
    font-weight:800;
}

.regis-header p {
    font-size:13px;
    color:rgba(255,255,255,.75);
    margin-top:4px;
}

.regis-body {
    padding:32px;
}

.info-box {
    background:#eef2fb;
    border-left:4px solid var(--blue);
    padding:12px 16px;
    border-radius:8px;
    font-size:13px;
    color:#1e3a5f;
    margin-bottom:20px;
    line-height:1.5;
}

.alert-error {
    background:#fef2f2;
    border-left:4px solid var(--danger);
    padding:14px 16px;
    border-radius:8px;
    margin-bottom:20px;
}

.alert-error ul {
    margin-left:18px;
    font-size:13px;
    color:#991b1b;
}

.alert-error li { margin-bottom:4px; }

.form-group { margin-bottom:16px; }

.form-row {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
}

label {
    display:block;
    font-size:13px;
    font-weight:700;
    color:#333;
    margin-bottom:6px;
}

input {
    width:100%;
    padding:11px 14px;
    border:1px solid var(--border);
    border-radius:8px;
    font-size:14px;
    font-family:inherit;
}

input:focus {
    outline:none;
    border-color:var(--blue);
}

.password-wrap { position:relative; }

.toggle-password {
    position:absolute;
    right:14px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    color:#888;
    font-size:14px;
}

small.hint {
    display:block;
    font-size:11.5px;
    color:#888;
    margin-top:4px;
}

.btn-submit {
    width:100%;
    padding:13px;
    background:var(--navy);
    color:#fff;
    border:none;
    border-radius:10px;
    font-weight:700;
    font-size:14.5px;
    cursor:pointer;
    margin-top:8px;
}

.btn-submit:hover { background:var(--blue); }

.login-link {
    text-align:center;
    margin-top:18px;
    font-size:13px;
    color:#555;
}

.login-link a {
    color:var(--blue);
    font-weight:700;
    text-decoration:none;
}

@media (max-width:480px){
    .form-row { grid-template-columns:1fr; }
    .regis-body { padding:24px; }
}
</style>
</head>
<body>

<div class="page-wrap">
    <div class="regis-card">

        <div class="regis-header">
            <h1>Registrasi Akun Klien</h1>
            <p>PKBI Sumatera Selatan &mdash; Layanan Konseling</p>
        </div>

        <div class="regis-body">

            <div class="info-box">
                <i class="fas fa-circle-info"></i>
                Akun Anda akan ditinjau oleh admin terlebih dahulu. Anda baru dapat login dan
                mendaftar konseling setelah akun divalidasi.
            </div>

            <?php if (!empty($errors)): ?>
                <div class="alert-error">
                    <ul>
                        <?php foreach ($errors as $e): ?>
                            <li><?= htmlspecialchars($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="" autocomplete="off">

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                           value="<?= htmlspecialchars($old['nama']) ?>">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required
                           value="<?= htmlspecialchars($old['username']) ?>">
                    <small class="hint">4-20 karakter, huruf/angka/underscore saja.</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrap">
                            <input type="password" id="password" name="password" required>
                            <i class="fas fa-eye toggle-password" data-target="password"></i>
                        </div>
                        <small class="hint">Min. 8 karakter, 1 huruf besar, 1 angka.</small>
                    </div>

                    <div class="form-group">
                        <label for="konfirmasi_password">Konfirmasi Password</label>
                        <div class="password-wrap">
                            <input type="password" id="konfirmasi_password" name="konfirmasi_password" required>
                            <i class="fas fa-eye toggle-password" data-target="konfirmasi_password"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx" required
                           value="<?= htmlspecialchars($old['no_hp']) ?>">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir" required
                               value="<?= htmlspecialchars($old['tempat_lahir']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                               value="<?= htmlspecialchars($old['tanggal_lahir']) ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required
                           value="<?= htmlspecialchars($old['email']) ?>">
                    <small class="hint">Digunakan untuk verifikasi jika lupa password.</small>
                </div>

                <button type="submit" class="btn-submit">Daftar Sekarang</button>
            </form>

            <p class="login-link">
                Sudah punya akun? <a href="login.php">Login di sini</a>
            </p>

        </div>
    </div>
</div>

<script>
document.querySelectorAll('.toggle-password').forEach(function (icon) {
    icon.addEventListener('click', function () {
        var target = document.getElementById(this.dataset.target);
        var isHidden = target.type === 'password';
        target.type = isHidden ? 'text' : 'password';
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
</script>

</body>
</html>