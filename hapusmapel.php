<?php
include ('crudmp.php');
?>
<h2>Daftar Mata Pelajaran</h2>
<?php
$data = bacaSemuaMapel(); 
if($data==null){echo "Record tidak ditemukan";}
?>
<table border="1">
    <tr>
        <th>Kode Mapel</th>
        <th>Nama Mata Pelajaran</th>
        <th>Jumlah Jam</th>
        <th>Aksi</th>
    </tr>
<?php
foreach ($data as $mapel)
{
    $kodemapel = $mapel['kodemapel'];
    $namamapel = $mapel['namamapel'];
    $jam = $mapel['jam'];
    echo"
    <tr>
    <td>$kodemapel</td>
    <td>$namamapel</td>
    <td>$jam</td>
    <td><a href='proseshapusmapel.php?kodemapel=$kodemapel'>Hapus</a></td>
    ";
}
?>
</table>
