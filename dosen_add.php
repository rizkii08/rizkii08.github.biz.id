<?php

include("header.php");
include("menu.php");

if(isset($_POST["proses"])){
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    include("db_config.php");
    if(empty($nidn) || empty($nama)) {
        echo "NIDN dan NAMA harus diisi.";
    } else {
        $query = "INSERT INTO dosen (nidn, nama, email) VALUES ('$nidn', '$nama', '$email')";
        $result = mysqli_query($mykoneksi, $query);
        if($result){
            echo "Data tersimpan. <a href='dosen.php'>Lihat data dosen</a>";
        } else {
            echo "Gagal menyimpan data.";
        }
    }
}

?>
  <h2>Tambah Data Dosen</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> <!-- Perubahan di sini -->
  <div class="mb-3 mt-3">
    NIDN: <input type="text" class="form-control" placeholder="Enter NIDN" name="nidn">
  </div>
  <div class="mb-3">
    Nama :<input type="text" class="form-control" placeholder="Enter Nama" name="nama">
  </div>
  <div class="mb-3">
    Email :<input type="text" class="form-control" placeholder="Enter Email" name="email">
  </div>
  <button type="submit" name="proses" class="btn btn-primary">Submit</button>
</form>

<?php
include("footer.php");
?>
