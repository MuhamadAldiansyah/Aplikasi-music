<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $sql = "INSERT INTO  kategori (nama)  VALUES ('$nama')";
    
    include "../../config.php";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        header("Location: kategori.php");  
      } else {
        echo "gagal";
    }
}
?>