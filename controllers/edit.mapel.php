<?php
include "connect.glob.php";

$id = $_GET['id'];

$mapel = $_POST['mapel'];
$ctx = $_POST['deskripsi'];

$q = "UPDATE mapel SET nama_mapel = '$mapel', keterangan = '$ctx' WHERE id_mapel = $id";
$result = mysqli_query($conn, $q);

if (!$result) {
  echo "<script>alert('Something went wrong!!')</script>";
  header("location: ../admin.php?halaman=edit_mapel");
}

// Checking condition to image
if (isset($_FILES['file_image']) && $_FILES['file_image']['error'] != UPLOAD_ERR_NO_FILE) {
  // Getting file information
  $img = $_FILES['file_image'];
  $file_name = $img['name'];
  $tmp_file = $img['tmp_name'];

  $folder = "../assets/img/" . $file_name;

  if (move_uploaded_file($tmp_file, $folder)) {
    $query_silabus = "UPDATE mapel SET `image_mapel` = '$file_name' WHERE id_mapel = '$id'";
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