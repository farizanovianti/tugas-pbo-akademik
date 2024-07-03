<?php
include("koneksi.php");

$sql = "SELECT * FROM siswa";
$hasil = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($hasil) > 0) {
    while ($baris = mysqli_fetch_assoc($hasil)) {
        $nis = $baris['NIS'];
        $nama = $baris['nama'];
        echo "NIS: $nis, Nama: $nama <br>";
    }
} else {
    echo "Tidak ada record";
}
?>
