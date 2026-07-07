<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Visi Misi PKBI</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* ===== GLOBAL ===== */

body{
    background:#f8fafc;
    font-family:'Segoe UI', sans-serif;
}

/* ===== PAGE TITLE ===== */

.page-title{
    padding:35px 0 25px;
}

.title-main{
    font-size:40px;
    font-weight:700;
    color:#1f2937;
    text-align:center;
    line-height:1.3;
}

/* ===== SECTION ===== */

.section-profil{
    padding-bottom:60px;
}

/* ===== CARD ===== */

.card-visi{
    background:white;
    border-radius:25px;
    padding:45px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

/* ===== TITLE SECTION ===== */

.section-heading{
    font-size:30px;
    font-weight:700;
    color:#1e3a8a;
    margin-bottom:20px;
}

/* ===== VISI BOX ===== */

.visi-box{
    background:#eef4ff;
    border-left:6px solid #1e3a8a;
    border-radius:15px;
    padding:20px 25px;
    margin-bottom:35px;
}

.visi-text{
    font-size:18px;
    line-height:1.9;
    color:#374151;
    margin:0;
    text-align:center;
    font-weight:500;
}

/* ===== TEXT ===== */

.section-profil p,
.section-profil li{
    color:#374151;
    line-height:2;
    font-size:17px;
    text-align:justify;
}

.section-profil ol{
    padding-left:25px;
}

.section-profil li{
    margin-bottom:18px;
}

/* ===== RESPONSIVE ===== */

@media(max-width:768px){

    .title-main{
        font-size:28px;
    }

    .card-visi{
        padding:25px;
        border-radius:20px;
    }

    .section-heading{
        font-size:25px;
    }

    .visi-text{
        font-size:16px;
    }

    .section-profil li{
        font-size:15px;
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
        VISI DAN MISI PERKUMPULAN KELUARGA BERENCANA INDONESIA (PKBI) 
        DAERAH SUMATERA SELATAN
    </h2>

</div>

<!-- ================= CONTENT ================= -->

<div class="container section-profil">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card-visi">

                <!-- VISI -->
                <h3 class="section-heading">
                    Visi
                </h3>

                <div class="visi-box">

                    <p class="visi-text">
                        Terwujudnya keluarga dan masyarakat Indonesia 
                        yang bertanggung jawab dan inklusif.
                    </p>

                </div>

                <!-- MISI -->
                <h3 class="section-heading">
                    Misi
                </h3>

                <ol>

                    <li>
                        Memberdayakan masyarakat untuk mewujudkan 
                        keluarga yang bertanggung jawab.
                    </li>

                    <li>
                        Membangun gerakan remaja yang inklusif.
                    </li>

                    <li>
                        Memberikan pelayanan kesehatan seksual dan reproduksi 
                        secara komprehensif, profesional, dan inklusif.
                    </li>

                    <li>
                        Mempengaruhi dan menguatkan para pengambil kebijakan 
                        untuk menghormati, melindungi, dan memenuhi 
                        Hak Kesehatan Seksual dan Reproduksi (HKSR).
                    </li>

                    <li>
                        Mengembangkan organisasi yang profesional untuk 
                        mencapai kemandirian dan keberlanjutan.
                    </li>

                </ol>

            </div>

        </div>

    </div>

</div>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>