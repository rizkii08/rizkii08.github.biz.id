<?php

include("header.php");
include("menu.php");

if(isset($_POST["proses"])){
    $id = $_POST['id'];
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    include("db_config.php");
    if(empty($nidn) || empty($nama)) {
        echo "NIDN dan NAMA harus diisi.";
    } else {
        $query = "UPDATE dosen SET nidn='$nidn', nama='$nama', email='$email' WHERE id=$id";
        $result = mysqli_query($mykoneksi, $query);
        if($result){
            echo "Data berhasil diperbarui. <a href='dosen.php'>Lihat data dosen</a>";
        } else {
            echo "Gagal memperbarui data.";
        }
    }
}

// Mendapatkan id dosen yang akan diedit
if(isset($_GET["id"])){
    $id = $_GET["id"];

    // Mendapatkan data dosen berdasarkan id
    include("db_config.php");
    $query = "SELECT * FROM dosen WHERE id=$id";
    $result = mysqli_query($mykoneksi, $query);
    $data = mysqli_fetch_assoc($result);

    // Menampilkan form untuk mengedit data dosen
    ?>
    <h2>Edit Data Dosen</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="mb-3 mt-3">
        NIDN: <input type="text" class="form-control" placeholder="Enter NIDN" name="nidn" value="<?php echo $data['nidn']; ?>">
      </div>
      <div class="mb-3">
        Nama :<input type="text" class="form-control" placeholder="Enter Nama" name="nama" value="<?php echo $data['nama']; ?>">
      </div>
      <div class="mb-3">
        Email :<input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $data['email']; ?>">
      </div>
      <button type="submit" name="proses" class="btn btn-primary">Submit</button>
    </form>
    <?php
}

include("footer.php");
?>
