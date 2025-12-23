<?php
include "../inc/config.php";
session_start();

$user_id = $_SESSION['user_id'];

$item    = $_POST['item'];
$gula    = $_POST['gula'];
$tanggal = $_POST['tanggal'];

mysqli_query(
  $conn,
  "INSERT INTO food_diary (user_id, item, gula, tanggal)
   VALUES ('$user_id', '$item', '$gula', '$tanggal')"
);

header("Location: ../lacak_gula.php");
exit;
