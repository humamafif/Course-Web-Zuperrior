<?php
include "connect.glob.php";
session_start();

$id = $_GET['id'];

$video = $_POST['video'];

if (isset($_FILES['file_silabus']) && $_FILES['file_silabus']['error'] != UPLOAD_ERR_NO_FILE) {
  $silabus = $_FILES['file_silabus'];
  $file_name = $silabus['name'];
  $tmp_file = $silabus['tmp_name'];

  $folder = "../assets/data/" . $file_name;

  if (move_uploaded_file($tmp_file, $folder)) {
    $query = "UPDATE silabus SET video = '$video', `file` = '$file_name' WHERE id_silabus = '$id'";
    $result = $conn->query($query);

    if (!$result) {
      echo "<script>alert('Something went wrong!!')</script>";
    }
  } else {
    echo "<script>alert('Failed to upload file!!')</script>";
  }
} else {
  $query = "UPDATE silabus SET video = '$video' WHERE id_silabus = '$id'";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    echo "<script>alert('Something went wrong!!')</script>";
  }
}

header("location: ../admin.php?halaman=silabus");
?>