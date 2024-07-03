<?php
include ('crudsiswa.php');
?>
<h2>Daftar Siswa</h2>
<?php
$data = bacaSemuaSiswa(); 
if($data==null){echo "record tidak ditemukan";}
?>
<table border = 1>
    <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>
<?php
foreach ($data as $siswa)
{
    $nis = $siswa['NIS'];
    $nama = $siswa['nama'];
    $jenkel = $siswa['jenkel'];
    $jurusan = $siswa['jurusan'];
    echo"
    <tr>
    <td>$nis</td>
    <td>$nama</td>
    <td>$jenkel</td>
    <td>$jurusan</td>
    <td><a href='proseshapus.php?NIS=$nis'>HAPUS</a></td>
    ";
}
?>
</table>
