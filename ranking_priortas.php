<table class="table table-bordered">
<tr>
    <th>Rank</th>
    <th>Nama Klien</th>
    <th>Nilai</th>
</tr>

<?php
$rank = 1;
foreach($result as $r){
?>
<tr>
    <td><?= $rank++ ?></td>
    <td><?= $r['nama'] ?></td>
    <td><?= round($r['nilai'],3) ?></td>
</tr>
<?php } ?>

</table>