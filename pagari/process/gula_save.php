<?php
include "../inc/config.php";
session_start();

$user_id = $_SESSION['user_id'];

$nilai   = $_POST['nilai'];
$tanggal = $_POST['tanggal'];

mysqli_query(
  $conn,
  "INSERT INTO gula_darah (user_id, nilai, tanggal)
   VALUES ('$user_id', '$nilai', '$tanggal')"
);

header("Location: ../gula_input.php");
exit;
