<?php
include "../config/koneksi.php";

$id_pendaftaran = $_GET['id']   ?? 0;
$kode           = $_GET['kode'] ?? '';

$lambda    = 0.5;
$max_nilai = 3;

// ambil bobot dari database (hasil ROC)
$bobot = [];
$q_kriteria = mysqli_query($koneksi, "SELECT id_kriteria, bobot FROM kriteria ORDER BY id_kriteria ASC");
while ($row = mysqli_fetch_assoc($q_kriteria)) {
    $bobot[$row['id_kriteria']] = (float) $row['bobot'];
}

// ambil jawaban klien dari database
$penilaian = mysqli_query($koneksi, "
    SELECT id_kriteria, nilai FROM penilaian
    WHERE id_pendaftaran = '$id_pendaftaran'
    ORDER BY id_kriteria ASC
");

$k = [];
while ($row = mysqli_fetch_assoc($penilaian)) {
    $k[$row['id_kriteria']] = (float) $row['nilai'];
}

// normalisasi
$r = [];
foreach ($k as $id => $nilai) {
    $r[$id] = $nilai / $max_nilai;
}

// SAW
$wsm = 0;
foreach ($bobot as $id => $w) {
    $wsm += $w * $r[$id];
}

// WP
$wpm = 1;
foreach ($bobot as $id => $w) {
    $wpm *= ($r[$id] > 0) ? pow($r[$id], $w) : 0;
}

// skor akhir WASPAS Qi(0,5)
$qi = ($lambda * $wsm) + ((1 - $lambda) * $wpm);

// prioritas
if ($qi >= 0.70) {
    $prioritas = "Tinggi";
} elseif ($qi >= 0.45) {
    $prioritas = "Sedang";
} else {
    $prioritas = "Rendah";
}

// simpan hasil
mysqli_query($koneksi, "DELETE FROM hasil_spk WHERE id_pendaftaran = '$id_pendaftaran'");
mysqli_query($koneksi, "
    INSERT INTO hasil_spk (id_pendaftaran, nilai, prioritas, tanggal)
    VALUES ('$id_pendaftaran', '$qi', '$prioritas', NOW())
");

// redirect ke halaman kode unik
header("Location: ../proses/code_unik.php?kode=$kode");
exit;
?>