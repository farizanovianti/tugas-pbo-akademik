<h2>Cari Mata Pelajaran</h2>  
<form method="POST">
    Kode mapel: <br><input type="text" name="kodemapel">
    <input type="submit" value="Cari" name="submit">
</form>

<?php
include ('crudmp.php');
    if (isset($_POST['submit'])) {
        $kodemapel = $_POST['kodemapel'];
        $data = cariMapelDariKodemapel($kodemapel);

        if ($data == null) {
            echo "Masukkan kodemapel yang valid!";
        } else {
            echo "Data Mapel dengan kode $kodemapel";
            foreach ($data as $mapel) {
                $kodemapel = $mapel['kodemapel'];
                $nama = $mapel['namamapel'];
                $jam = $mapel['jam'];
                echo "<p>Kode Mapel : $kodemapel<br>
                      Nama Mapel : $nama<br>
                      Jumlah Jam Mapel : $jam jam</p>";
                }
        }
    }
?>
