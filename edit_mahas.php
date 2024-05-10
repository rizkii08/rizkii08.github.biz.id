<?php

include("header.php");
include("menu.php");

if(isset($_POST["proses"])){
    $id = $_POST['id'];
    $nidn = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['nohp'];
    include("db_config.php");
    if(empty($nim) || empty($nama)) {
        echo "NIM dan NAMA harus diisi.";
    } else {
        $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', nohp='$nohp' WHERE id=$id";
        $result = mysqli_query($mykoneksi, $query);
        if($result){
            echo "Data berhasil diperbarui. <a href='mahasiswa.php'>Lihat data mahasiswa</a>";
        } else {
            echo "Gagal memperbarui data.";
        }
    }
}


if(isset($_GET["id"])){
    $id = $_GET["id"];

    include("db_config.php");
    $query = "SELECT * FROM mahasiswa WHERE id=$id";
    $result = mysqli_query($mykoneksi, $query);
    $data = mysqli_fetch_assoc($result);

    ?>
    <h2>Edit Data Mahasiswa</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="mb-3 mt-3">
        NIM: <input type="text" class="form-control" placeholder="Enter NIDN" name="nim" value="<?php echo $data['nim']; ?>">
      </div>
      <div class="mb-3">
        Nama :<input type="text" class="form-control" placeholder="Enter Nama" name="nama" value="<?php echo $data['nama']; ?>">
      </div>
      <div class="mb-3">
        No. HP :<input type="text" class="form-control" placeholder="Enter Email" name="nohp" value="<?php echo $data['nohp']; ?>">
      </div>
      <button type="submit" name="proses" class="btn btn-primary">Submit</button>
    </form>
    <?php
}

include("footer.php");
?>
