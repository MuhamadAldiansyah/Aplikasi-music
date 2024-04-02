<?php
include "../../config.php";
$id_musik = $_GET['id_musik'];
$query = "DELETE FROM musik WHERE id_musik= '$id_musik' ";
$sql = mysqli_query($conn, $query);
if ($sql) {
    header('Location: index.php');
}
