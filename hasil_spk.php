<?php
include "config/koneksi.php";

// AMBIL DATA
$klien = mysqli_query($koneksi,"SELECT * FROM klien");
$kriteria = mysqli_query($koneksi,"SELECT * FROM kriteria");

$result = [];

// LOOP KLIEN
while($k = mysqli_fetch_assoc($klien)){

    $sum = 0;
    $product = 1;

    mysqli_data_seek($kriteria,0);

    // LOOP KRITERIA
    while($c = mysqli_fetch_assoc($kriteria)){

        // ambil nilai penilaian
        $query = mysqli_query($koneksi,"
            SELECT nilai FROM penilaian
            WHERE id_klien='{$k['id_klien']}'
            AND id_kriteria='{$c['id_kriteria']}'
        ");

        $data = mysqli_fetch_assoc($query);
        $nilai = isset($data['nilai']) ? $data['nilai'] : 0;

        // normalisasi (max 5)
        $x = $nilai / 5;

        // WASPAS
        $sum += $c['bobot'] * $x;
        $product *= pow($x, $c['bobot']);
    }

    $lambda = 0.5;
    $qi = ($lambda * $sum) + ((1 - $lambda) * $product);

    $result[] = [
        'id' => $k['id_klien'],
        'nama' => $k['nama_klien'],
        'nilai' => $qi
    ];
}

// URUTKAN RANKING
usort($result, function($a,$b){
    return $b['nilai'] <=> $a['nilai'];
});
?>

<!DOCTYPE html>
<html>
<head>
<title>Hasil SPK - WASPAS</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3 class="mb-3">📊 Hasil Perhitungan SPK (WASPAS)</h3>

<!-- TOMBOL HITUNG ULANG -->
<a href="hasil_spk.php" class="btn btn-primary mb-3">
🔄 Hitung Ulang SPK
</a>

<div class="card p-3">

<table class="table table-bordered">
<thead>
<tr>
    <th>Ranking</th>
    <th>Nama Klien</th>
    <th>Nilai WASPAS</th>
    <th>Status</th>
</tr>
</thead>

<tbody>

<?php
$rank = 1;
foreach($result as $r){
?>

<tr>
    <td><?= $rank++ ?></td>
    <td><?= $r['nama'] ?></td>
    <td><?= round($r['nilai'],3) ?></td>

    <td>
        <?php if($r['nilai'] >= 0.75){ ?>
            <span class="badge bg-danger">Prioritas Tinggi</span>
        <?php } elseif($r['nilai'] >= 0.35){ ?>
            <span class="badge bg-warning text-dark">Sedang</span>
        <?php } else { ?>
            <span class="badge bg-secondary">Rendah</span>
        <?php } ?>
    </td>
</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>

</body>
</html>