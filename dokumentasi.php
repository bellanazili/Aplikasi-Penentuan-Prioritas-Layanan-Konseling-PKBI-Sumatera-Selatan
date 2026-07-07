<style>

.dok-section{
    padding:50px 0 10px;
}

.dok-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:22px;
}

.dok-card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 2px 12px rgba(13,59,51,.06);
    transition:.3s;
    border:1px solid #f1ebdd;
}

.dok-card:hover{
    transform:translateY(-6px);
    box-shadow:0 16px 32px rgba(13,59,51,.12);
}

.dok-card .dok-img-wrap{
    height:170px;
    overflow:hidden;
}

.dok-card .dok-img-wrap img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.4s;
    background:linear-gradient(135deg, var(--hijau-pudar), #fdebd3);
}

.dok-card:hover .dok-img-wrap img{
    transform:scale(1.07);
}

.dok-card .dok-title{
    padding:14px 16px;
    font-size:13.5px;
    font-weight:700;
    color:var(--hijau-tua);
    line-height:1.4;
    text-align:center;
}

@media(max-width:991px){
    .dok-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){
    .dok-card .dok-img-wrap{
        height:140px;
    }
}

</style>

<section class="dok-section">

    <div class="section-head center">
        <span class="section-tag">Galeri Kegiatan</span>
        <h2 class="section-title">Dokumentasi Kegiatan</h2>
        <p class="section-sub">
            Sebagian momen kegiatan PKBI Sumatera Selatan dalam
            melayani dan mengedukasi masyarakat.
        </p>
    </div>

    <div class="dok-grid">

        <div class="dok-card">
            <div class="dok-img-wrap">
                <img src="assets/img/konseling individu.jpeg" alt="Konseling Individu">
            </div>
            <div class="dok-title">Konseling Individu</div>
        </div>

        <div class="dok-card">
    <div class="dok-img-wrap">
        <img src="../assets/img/pb1.jpeg" alt="Kegiatan Posyandu">
    </div>
    <div class="dok-title">Kegiatan Posyandu</div>
</div>

        <div class="dok-card">
            <div class="dok-img-wrap">
                <img src="../assets/img/dokumetasi pkbi.jpeg" alt="Workshop Mekanisme Rujukan">
            </div>
            <div class="dok-title">Workshop Mekanisme Rujukan</div>
        </div>

        <div class="dok-card">
            <div class="dok-img-wrap">
                <img src="../assets/img/Dialog Publik.jpeg" alt="Edukasi Akhiri Kekerasan Seksual">
            </div>
            <div class="dok-title">Edukasi Akhiri Kekerasan Seksual</div>
        </div>

        <div class="dok-card">
            <div class="dok-img-wrap">
                <img src="../assets/img/pelantikan.jpg" alt="Pelantikan Kepengurusan PKBI Sumatera Selatan">
            </div>
            <div class="dok-title">Pelantikan Kepengurusan PKBI Sumatera Selatan</div>
        </div>

        <div class="dok-card">
            <div class="dok-img-wrap">
                <img src="../assets/img/publikasi kb.jpg" alt="Pelayanan KB-KES Dalam Rangka Hari Kesehatan Nasional">
            </div>
            <div class="dok-title">Pelayanan KB-KES Dalam Rangka Hari Kesehatan Nasional</div>
        </div>

    </div>

</section>