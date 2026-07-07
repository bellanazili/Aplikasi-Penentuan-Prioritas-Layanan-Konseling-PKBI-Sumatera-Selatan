<?php
include "../config/koneksi.php";

$n = 5; // jumlah kriteria tetap
$bobot = [];

// hitung bobot ROC untuk setiap rank
for ($j = 1; $j <= $n; $j++) {
    $sum = 0;
    for ($k = $j; $k <= $n; $k++) {
        $sum += 1 / $k;
    }
    $bobot[$j] = round($sum / $n, 4); // dibulatkan 4 angka desimal sebelum disimpan
}

// simpan ke database sesuai id_kriteria
// urutan rank disesuaikan dengan tingkat urgensi klinis:
// Riwayat Traumatis dan Dampak pada Aktivitas dinilai paling kritis,
// Keterlibatan Orang Lain paling rendah (lihat catatan diskusi dengan PKBI)
$data_kriteria = [
    1 => ['nama' => 'Lama Masalah Dirasakan',  'rank' => 3],
    2 => ['nama' => 'Dukungan Sosial',          'rank' => 4],
    3 => ['nama' => 'Dampak pada Aktivitas',    'rank' => 2],
    4 => ['nama' => 'Keterlibatan Orang Lain',  'rank' => 5],
    5 => ['nama' => 'Riwayat Traumatis',        'rank' => 1],
];

foreach ($data_kriteria as $id => $k) {
    $w = $bobot[$k['rank']]; // sudah dalam bentuk yang dibulatkan
    $nama = $k['nama'];

    // INSERT jika baris belum ada (tabel kosong),
    // UPDATE jika id_kriteria sudah ada (tabel sudah terisi)
    mysqli_query($koneksi, "
        INSERT INTO kriteria (id_kriteria, nama_kriteria, bobot)
        VALUES ('$id', '$nama', '$w')
        ON DUPLICATE KEY UPDATE
            nama_kriteria = '$nama',
            bobot = '$w'
    ");

    echo "K{$id} - {$k['nama']} | Rank {$k['rank']} | Bobot = {$w} <br>";
}

echo "<br>Bobot ROC berhasil disimpan ke database.";
?>