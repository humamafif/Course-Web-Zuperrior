<?php
include "connect.glob.php";

$id = $_GET['id_mapel'];

$sql = "DELETE FROM mapel WHERE id_mapel = '" . $id . "'";
$result = $conn->query($sql);

if (!$result || $result === null) {
  echo "<script>alert('There is something error with database!')</script>";
}

header('location: ../admin.php?halaman=mapel');
exit();
?>