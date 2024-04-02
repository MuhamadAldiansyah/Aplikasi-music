<?php
include '../config.php';

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['login'] = true;
        header("Location: dashboard/index.php");
        exit;
    } else {
        echo "<script>alert('username atau password Anda salah. Silakan coba lagi!'); window.location.href = 'index.php';</script>";
    }
}
?>
