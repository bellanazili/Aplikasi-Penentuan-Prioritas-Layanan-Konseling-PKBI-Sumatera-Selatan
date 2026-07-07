<?php
session_start();
include "config/koneksi.php";

$error = "";

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string(
        $koneksi,
        $_POST['username']
    );

    $password = $_POST['password'];

    $query = mysqli_query($koneksi,
        "SELECT * FROM users
        WHERE username='$username'"
    );

    if(mysqli_num_rows($query) > 0){

        $data = mysqli_fetch_assoc($query);

        if(password_verify(
            $password,
            $data['password']
        )){

            // ===== TAMBAHAN: cek status validasi akun =====
            if($data['status'] == "pending"){

                $error = "Akun Anda masih menunggu validasi admin. Silakan cek kembali dalam 1-2 hari kerja.";

            }
            else if($data['status'] == "rejected"){

                $alasan = !empty($data['alasan_tolak'])
                    ? $data['alasan_tolak']
                    : "Tidak ada alasan spesifik yang diberikan.";

                $error = "Registrasi akun Anda ditolak oleh admin. Alasan: " . htmlspecialchars($alasan);

            }
            else { // status == 'approved'

                $_SESSION['login']    = true;
                $_SESSION['id_users'] = $data['id'];
                $_SESSION['nama']     = $data['nama'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['role']     = $data['role'];
                $_SESSION['status']   = $data['status'];

                if($data['role'] == "admin"){
                    header("Location: Admin/dashboard.php");
                }
                else if($data['role'] == "konselor"){
                    header("Location: Konselor/dashboard.php");
                }
                else { // klien
                    header("Location: index.php");
                }

                exit;
            }

        } else {
            $error = "Username atau Password salah!";
        }

    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login PKBI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #1e3a8a, #182434);
    overflow: hidden;
}

body::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    filter: blur(8px);
    opacity: 0.3;
}

.login-container {
    width: 900px;
    height: 500px;
    background: white;
    border-radius: 25px;
    overflow: hidden;
    display: flex;
    position: relative;
    box-shadow: 0 15px 40px rgba(0,0,0,0.25);
    z-index: 1;
}

.left-side {
    width: 50%;
    background: url('assets/img/bgfoto.png');
    background-size: cover;
    background-position: center;
    position: relative;
}

.left-side::after {
    content: '';
    position: absolute;
    top: 0;
    right: -80px;
    width: 160px;
    height: 100%;
    background: white;
    border-radius: 50%;
}

.right-side {
    width: 50%;
    padding: 60px 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.right-side h1 {
    font-size: 42px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.right-side p {
    color: #999;
    margin-bottom: 35px;
}

/* INPUT */
.input-wrap {
    margin-bottom: 20px;
    position: relative;
}

.input-wrap input {
    width: 100%;
    padding: 14px 45px 14px 45px;
    border: 1px solid #ddd;
    border-radius: 30px;
    outline: none;
    font-size: 15px;
}

.input-wrap input:focus {
    border-color: #2563eb;
}

.input-wrap .icon-left {
    position: absolute;
    top: 50%;
    left: 18px;
    transform: translateY(-50%);
    color: #999;
    pointer-events: none;
}

/* TOGGLE PASSWORD BUTTON */
.input-wrap .toggle-password {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: #999;
    padding: 0 2px;
    display: flex;
    align-items: center;
    font-size: 15px;
    transition: color 0.2s;
}

.input-wrap .toggle-password:hover {
    color: #2563eb;
}

/* BUTTON */
.btn-login {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 30px;
    background: #2563eb;
    color: white;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s;
    cursor: pointer;
}

.btn-login:hover {
    background: #1d4ed8;
}

/* ALERT */
.alert {
    border-radius: 12px;
    font-size: 14px;
}

/* LINK */
.bottom-text {
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
}

.bottom-text a {
    text-decoration: none;
    color: #2563eb;
    font-weight: bold;
}

.bottom-text a:hover {
    text-decoration: underline;
}

/* RESPONSIVE */
@media(max-width: 768px) {
    .login-container {
        width: 95%;
        height: auto;
        flex-direction: column;
    }

    .left-side {
        display: none;
    }

    .right-side {
        width: 100%;
        padding: 40px 30px;
    }
}

</style>
</head>

<body>

<div class="login-container">

    <div class="left-side"></div>

    <div class="right-side">

        <h1>Welcome</h1>
        <p>Log in to your account to continue</p>

        <?php if($error != ""){ ?>
            <div class="alert alert-danger">
                <?= $error ?>
            </div>
        <?php } ?>

        <form method="POST">

            <!-- USERNAME -->
            <div class="input-wrap">
                <i class="fa fa-user icon-left"></i>
                <input type="text"
                    name="username"
                    placeholder="Username"
                    required>
            </div>

            <!-- PASSWORD -->
            <div class="input-wrap">
                <i class="fa fa-lock icon-left"></i>
                <input type="password"
                    id="passwordInput"
                    name="password"
                    placeholder="Password"
                    required>
                <button type="button"
                    class="toggle-password"
                    id="togglePasswordBtn"
                    onclick="toggleShowPassword()"
                    aria-label="Tampilkan password">
                    <i class="fa fa-eye" id="eyeIcon"></i>
                </button>
            </div>

            <button type="submit"
                name="login"
                class="btn-login">
                Log In
            </button>

        </form>

    </div>

</div>

<script>
function toggleShowPassword() {
    const input  = document.getElementById('passwordInput');
    const icon   = document.getElementById('eyeIcon');
    const btn    = document.getElementById('togglePasswordBtn');

    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'fa fa-eye-slash';
        btn.setAttribute('aria-label', 'Sembunyikan password');
    } else {
        input.type = 'password';
        icon.className = 'fa fa-eye';
        btn.setAttribute('aria-label', 'Tampilkan password');
    }
}
</script>

</body>
</html>