<?php

include("header.php");
include("menu.php");


if(isset($_POST["proses"])){
    $nidn = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['nohp'];
    include("db_config.php");
    if(empty($nidn) || empty($nama)) {
        echo "NIM dan NAMA harus diisi.";
    } else {
        $query = "INSERT INTO mahasiswa (nim, nama, nohp) VALUES ('$nidn', '$nama', '$email')";
        $result = mysqli_query($mykoneksi, $query);
        if($result){
            echo "Data tersimpan. <a href='mahasiswa.php'>Lihat data Mahasiswa</a>";
        } else {
            echo "Gagal menyimpan data.";
        }
    }
}
?>
<h2>Form Tambah Data Mahasiwa</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="mb-3 mt-3">
    NIM: <input type="text" class="form-control" placeholder="Enter NIM" name="nim">
  </div>
  <div class="mb-3">
    Nama :<input type="text" class="form-control" placeholder="Enter Nama" name="nama">
  </div>
  <div class="mb-3">
    No. HP :<input type="text" class="form-control" placeholder="Enter No. HP" name="nohp">
  </div>
  <button type="submit" name="proses" class="btn btn-primary">Submit</button>
</form>

<?php
include("footer.php");
?>
