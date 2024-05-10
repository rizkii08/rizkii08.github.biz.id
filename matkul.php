<?php

include("db_config.php");
include("header.php");

$queri = mysqli_query($mykoneksi, "SELECT nama_matkul, kode_matkul, sks, id FROM matkul");
?>
<h1>Data Dosen</h1>
<p><a href="matkul_add.php">Tambah Data</a></p>
<table border=1>
    <tr>
        <th>ID</th>
        <th>Kode Mata Kuliah</th>
        <th>Nama Mata Kuliah</th>
        <th>Email</th>
    </tr>
    <?php
    while($data = mysqli_fetch_assoc($queri)){
        echo "<tr>";
        echo "<td>".$data["id"], "</td>";
        echo "<td>".$data["kode_matkul"],"</td>";
        echo "<td>".$data["nama_matkul"], "</td>";
        echo "<td>".$data["sks"],"</td>";
        echo "</tr>";
    }
    ?>
</table>
<?php
include("footer.php");
