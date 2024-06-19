<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "controllers/connect.glob.php";

if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
  echo "ini di file admin";
  include "components/admin/index.php";
} else if (isset($_SESSION['role']) && $_SESSION['role'] == "murid") {
  header("location: root.php");
  exit();
} else {
  header("location: root.php");
  exit();
}
?>

</html>