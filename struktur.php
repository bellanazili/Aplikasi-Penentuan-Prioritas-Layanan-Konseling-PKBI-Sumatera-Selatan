<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Struktur Organisasi PKBI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* ===== GLOBAL ===== */

body{
    background:#f8fafc;
    font-family:'Segoe UI',sans-serif;
}

/* ===== TITLE ===== */

.page-title{
    padding:50px 0 30px;
    text-align:center;
}

.title-main{
    font-size:38px;
    font-weight:700;
    color:#1f2937;
    line-height:1.5;
}

/* ===== STRUKTUR IMAGE ===== */

.struktur-img{
    width:100%;
    max-width:1000px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

/* ===== PROFILE ===== */

.profile-zigzag{
    margin-bottom:80px;
    align-items:center;
}

/* zigzag otomatis */
.profile-zigzag:nth-child(even){
    flex-direction:row-reverse;
}

.profile-zigzag:nth-child(even) .profile-text{
    text-align:right;
    align-items:flex-end;
}

.profile-zigzag:nth-child(odd) .profile-text{
    text-align:left;
    align-items:flex-start;
}

.profile-img{
    width:260px;
    height:320px;
    object-fit:cover;
    border-radius:12px;
    border:8px solid #e8d2a8;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
}

/* ===== TEXT ===== */

.profile-text{
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.profile-role{
    font-size:26px;
    font-weight:700;
    color:#1e3a8a;
    margin-bottom:10px;
}

.profile-role span{
    font-style:italic;
    font-weight:600;
    color:#64748b;
}

.profile-name{
    font-size:20px;
    color:#374151;
}

/* ===== RESPONSIVE ===== */

@media(max-width:768px){

    .title-main{
        font-size:28px;
    }

    .profile-text{
        text-align:center !important;
        align-items:center !important;
        margin-top:25px;
    }

    .profile-img{
        width:220px;
        height:280px;
    }

}

</style>

</head>

<body>

<!-- NAVBAR -->
<?php include 'includes/navbar.php'; ?>

<!-- ================= TITLE ================= -->

<div class="container page-title">

    <h2 class="title-main">
        PENGURUS DAERAH PKBI SUMATERA SELATAN PERIODE 2024-2027
    </h2>

</div>

<!-- ================= STRUKTUR ================= -->

<div class="container">

    <!-- KETUA -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/ketua.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Ketua
            </div>

            <div class="profile-name">
                H. Amirul Husni, SH
            </div>

        </div>

    </div>

    <!-- WAKIL KETUA I -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wakil 1.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Ketua I
            </div>

            <div class="profile-name">
                dr. Hj. Dwi Rasmini Yunita
            </div>

        </div>

    </div>

    <!-- WAKIL KETUA II -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wakil 2.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Ketua II
            </div>

            <div class="profile-name">
                Dr. Evia Darmawani, M.Pd, Kons.
            </div>

        </div>

    </div>

    <!-- WAKIL KETUA III -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wakil 3.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Ketua III
            </div>

            <div class="profile-name">
                dr. M. Ramadhandie Odiesta, Sp.N
            </div>

        </div>

    </div>

    <!-- WAKIL KETUA IV -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wakil 4.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Ketua IV
            </div>

            <div class="profile-name">
                Redi Kaswara, SKM, MKM.
            </div>

        </div>

    </div>

    <!-- WAKIL KETUA V -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wakil 5.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Ketua V
            </div>

            <div class="profile-name">
                Karima Saraswati
            </div>

        </div>

    </div>

    <!-- SEKRETARIS -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/sekretaris.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Sekretaris
            </div>

            <div class="profile-name">
                Drs. H. Sumardi
            </div>

        </div>

    </div>

    <!-- WAKIL SEKRETARIS I -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wks2.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Sekretaris I
            </div>

            <div class="profile-name">
                Ani Hidayati Iriani, S.Sos, M.Si
            </div>

        </div>

    </div>

    <!-- WAKIL SEKRETARIS II -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wks1.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Sekretaris II
            </div>

            <div class="profile-name">
                Dhea Permata Putri Evsya
            </div>

        </div>

    </div>

    <!-- BENDAHARA -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/bendahara.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Bendahara
            </div>

            <div class="profile-name">
                Serly Andriani, A.Md
            </div>

        </div>

    </div>

    <!-- WAKIL BENDAHARA -->
    <div class="row profile-zigzag">

        <div class="col-md-6 text-center">

            <img src="assets/img/wakil bendahara.png" class="profile-img">

        </div>

        <div class="col-md-6 profile-text">

            <div class="profile-role">
                Wakil Bendahara
            </div>

            <div class="profile-name">
                Trida Setyorini, S.Pd., M.Pd
            </div>

        </div>

    </div>

</div>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>