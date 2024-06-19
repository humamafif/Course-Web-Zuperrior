<?php
include "connect.glob.php";
session_start();

// Getting data value
$mapel = $_POST['mapel'];
$ctx = $_POST['deskripsi'];

// Setting up and convert video to embed link

$video = $_POST['video'];

// Inserting data to mapel
$query = "INSERT INTO mapel (nama_mapel, keterangan) VALUES ('$mapel', '$ctx')";
$result = $conn->query($query);

// Getting id from mapel
$query_get_mapel = "SELECT id_mapel FROM mapel WHERE nama_mapel = '$mapel' AND keterangan = '$ctx'";
$result_get_mapel = $conn->query($query_get_mapel);
$row_get_mapel = $result_get_mapel->fetch_assoc();
$id_mapel = $row_get_mapel['id_mapel'];

// Inserting video to silabus
$query_video = "INSERT INTO silabus (id_mapel, video) VALUES ('$id_mapel', '$video')";
$result_video = $conn->query($query_video);

if (!$result || !$result_video) {
  echo "<script>alert(Gagal menambahkan mapel!)</script>";
  header("location: ../admin.php?halaman=form_mapel");
}

// Checking condition to file is added or not
if (isset($_FILES['file_silabus']) && $_FILES['file_silabus']['error'] != UPLOAD_ERR_NO_FILE) {
  // Getting file information
  $img = $_FILES['file_silabus'];
  $file_name = $img['name'];
  $tmp_file = $img['tmp_name'];

  $folder = "../assets/data/" . $file_name;

  if (move_uploaded_file($tmp_file, $folder)) {
    $query_silabus = "UPDATE silabus SET `file` = '$file_name' WHERE id_mapel = '$id_mapel'";
    $result_silabus = $conn->query($query_silabus);

    if (!$result_silabus) {
      echo "<script>alert(Gagal menambahkan file silabus!)</script>";
      header("location: ../admin.php?halaman=form_mapel");
    }
  }
} else {
  echo "<script>alert(Gagal menambahkan silabus!)</script>";
  header("location: ../admin.php?halaman=form_mapel");
}

// Checking condition to image
if (isset($_FILES['file_image']) && $_FILES['file_image']['error'] != UPLOAD_ERR_NO_FILE) {
  // Getting file information
  $img = $_FILES['file_image'];
  $file_name = $img['name'];
  $tmp_file = $img['tmp_name'];

  $folder = "../assets/img/" . $file_name;

  if (move_uploaded_file($tmp_file, $folder)) {
    $query_silabus = "UPDATE mapel SET `image_mapel` = '$file_name' WHERE id_mapel = '$id_mapel'";
    $result_silabus = $conn->query($query_silabus);

    if (!$result_silabus) {
      echo "<script>alert(Gagal menambahkan file silabus!)</script>";
      header("location: ../admin.php?halaman=form_mapel");
    }
  }
} else {
  echo "<script>alert(Gagal menambahkan gambar!)</script>";
  header("location: ../admin.php?halaman=form_mapel");
}

header("location: ../admin.php?halaman=mapel");
?>