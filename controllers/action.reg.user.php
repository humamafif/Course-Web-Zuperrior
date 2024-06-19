<?php 
  include "connect.glob.php";
  session_start();
  
  $name = $_POST['fullname'];
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $no_hp = $_POST['phonenumber'];
  $role = "murid";

  $name_len = strlen($name);
  $user_len = strlen($user);
  $pass_len = strlen($pass);

  if ($name_len > 50) {
    $_SESSION['message_err'] = "Too many character from name, max character is 50!!";
    header("location: ../pages/register.php");
    exit();
  } else if ($name_len === 0) {
    $_SESSION['message_err'] = "The name can't be empty!!";
    header("location: ../pages/register.php");
    exit();
  }

  if ($user_len > 20) {
    $_SESSION['message_err'] = "Too many character from user, max character is 20!!";
    header("location: ../pages/register.php");
    exit();
  } else if ($user_len < 4) {
    $_SESSION['message_err'] = "Too short from user, min character is 4!!";
    header("location: ../pages/register.php");
    exit();
  } else if ($user_len === 0) {
    $_SESSION['message_err'] = "The username can't be empty!!";
    header("location: ../pages/register.php");
    exit();
  }

  if ($pass_len > 20) {
    $_SESSION['message_err'] = "Too many character from pass, max character is 20!!";
    header("location: ../pages/register.php");
    exit();
  } else if ($pass_len < 4) {
    $_SESSION['message_err'] = "Too short from pass, min character is 4!!";
    header("location: ../pages/register.php");
    exit();
  } else if ($pass_len === 0) {
    $_SESSION['message_err'] = "The password can't be empty!!";
    header("location: ../pages/register.php");
    exit();
  }

  $sql_get = "SELECT id_user FROM user";
  $result_get_id = $conn -> query($sql_get);
  
  $identifier_count = array();
  $count_user = 0;

  if ($result_get_id) {
    $row = $result_get_id -> fetch_all(MYSQLI_ASSOC);
    
    foreach ($row as $v) {
      $first_letter = substr($v['id_user'], 0, 2);

      if ($first_letter === "MD") {
        $count_user++;
      }

      if (isset($identifier_count[$first_letter])) {
        $identifier_count[$first_letter]++;
      } else {
        $identifier_count[$first_letter] = 1;
      }
    }

    // Output of counting
    // foreach ($identifier_count as $letters => $count) {
    //   echo "First two letters: $letters, Count: $count <br>";
    // }
  } else {
    echo "Error: " . $conn->error;
  }
  $count_user++;

  $random_number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

  $id = "MD" . $random_number;

  $sql_check_id = "SELECT id_user FROM user WHERE id_user = '".$id."'";
  $result_check_id = $conn->query($sql_check_id);

  if ($result_check_id && $result_check_id->num_rows > 0) {
    do {
      $random_number = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
      $id = "MD" . $random_number;
      $sql_check_id = "SELECT id_user FROM user WHERE id_user = '".$id."'";
      $result_check_id = $conn->query($sql_check_id);
    } while ($result_check_id && $result_check_id->num_rows > 0);
  }
  
  $sql_query = "INSERT INTO user (`id_user`, `nama`, `username`, `password`, `role`, `noHP`, `email`) VALUES ('".$id."', '".$name."', '".$user."', '".$pass."', '".$role."', '".$no_hp."', '".$email."')";
  $status = $conn -> query($sql_query);
  if ($status) {
    header("location: ../pages/login.php");
    exit();
  } else {
    echo "Error: " . $conn->error;
  }
?>