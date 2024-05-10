<?php

include("db_config.php");
include("header.php");
include("menu.php");


// Periksa apakah ID dosen disertakan dalam permintaan
if(isset($_POST['id'])){
    $id = $_POST['id'];

    // Lakukan penghapusan data dosen berdasarkan ID
    $query = "DELETE FROM dosen WHERE id = $id";
    $result = mysqli_query($mykoneksi, $query);

    if($result){
        echo "Data berhasil dihapus. <a href='dosen.php'>Lihat data dosen</a>";
    } else {
        echo "Terjadi kesalahan saat menghapus data";
    }
} else {
    echo "ID dosen tidak ditemukan";
}
?>
<?php
include("footer.php");
?>