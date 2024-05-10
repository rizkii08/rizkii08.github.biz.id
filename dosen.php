<?php

include("db_config.php");
include("header.php");
include("menu.php");

$queri = mysqli_query($mykoneksi, "SELECT nidn, nama, email, id FROM dosen");
?>

<h1>Data Dosen</h1>
<a href="dosen_add.php" class="btn btn-success">Tambah Data</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>nidn</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Action</th> <!-- Kolom baru untuk tombol edit dan hapus -->
    </tr>
    <?php
    while($data = mysqli_fetch_assoc($queri)){
        echo "<tr>";
        echo "<td>".$data["id"]."</td>";
        echo "<td>".$data["nidn"]."</td>";
        echo "<td>".$data["nama"]."</td>";
        echo "<td>".$data["email"]."</td>";

        // Tombol Edit dan Hapus sebagai button
        echo "<td>";
        echo "<form action='edit_dosen.php' method='get' style='display: inline;'>"; // Form untuk tombol edit
        echo "<input type='hidden' name='id' value='".$data["id"]."'>"; // Hidden input untuk menyimpan id
        echo "<button type='submit' class='btn btn-primary'>Edit</button>";
        echo "</form>";
        echo "<form action='del_dosen.php' method='post' style='display: inline;' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>"; // Form untuk tombol hapus dengan notifikasi konfirmasi
        echo "<input type='hidden' name='id' value='".$data["id"]."'>"; // Hidden input untuk menyimpan id
        echo "<button type='submit' class='btn btn-danger'>Hapus</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
include("footer.php");
?>
