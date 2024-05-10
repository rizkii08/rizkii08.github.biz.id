<?php

include("header.php");
include("menu.php");


if(isset($_POST["proses"])){
    $kode_matkul = $_POST['kode_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    $sks = $_POST['sks'];
    include("db_config.php");
    if(in_array("", $input)) {
        echo "Semua kolom harus diisi.";
    } else {
        $query = "INSERT INTO matkul (kode_matkul, nama_matkul, sks) VALUES ('$kode_matkul', '$nama_matkul', '$sks')";
        $result = mysqli_query($mykoneksi, $query);
        if($result){
            echo "Data tersimpan. <a href='matkul.php'>Lihat data mata kuliah</a>";
        } else {
            echo "Gagal menyimpan data.";
        }
    }
}
?>
<h2>Form Tambah Data Mata Kuliah</h2>
<form method="post" action="">
Kode Mata Kuliah <input type="text" name="kode_matkul"><br><br>
Nama Mata Kuliah <input type="text" name="nama_matkul"><br><br>
SKS <input type="int" name="sks"><br><br>
<input type="submit" name="proses" value="Simpan">
</form>

<?php
include("footer.php");
?>
