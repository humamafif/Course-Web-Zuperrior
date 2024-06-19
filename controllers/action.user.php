<?php
include "connect.glob.php";
session_start();

$user = "";
$pass = "";
$id_prefix = "";

if (isset($_GET['username']) && isset($_GET['password'])) {
  $user = $_GET['username'];
  $pass = $_GET['password'];
}

$q = "SELECT * FROM user WHERE username = '" . $user . "'";
$result = $conn->query($q);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $user_check = $row['username'];
  $pass_check = $row['password'];
  $role = $row['role'];
  $id_prefix = substr($row['id_user'], 0, 2);

  if ($pass === $pass_check && $role === "admin") {
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['role'] = $role;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['authenticated'] = true;
    header("location: ../admin.php");
    exit();
  } else if ($pass === $pass_check && $role === "murid") {
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['role'] = $role;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['authenticated'] = true;
    header("location: ../root.php");
    exit();
  } else {
    // Jika username atau password salah, arahkan kembali ke halaman login dengan pesan error
    header("location: ../pages/login.php?error=InvalidCredentials");
    exit();
  }
} else {
  // Jika username tidak ditemukan, arahkan kembali ke halaman login dengan pesan error
  header("location: ../pages/login.php?error=UserNotFound");
  exit();
}
?>