<?php
include "../../config.php";
$id_kategori = $_GET['id_kategori'];
$query = "DELETE FROM kategori WHERE id_kategori= '$id_kategori' ";
$sql = mysqli_query($conn, $query);
if ($sql) {
    header('Location: kategori.php');
}
