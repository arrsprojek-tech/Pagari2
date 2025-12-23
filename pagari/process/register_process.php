
<?php include "../inc/config.php";
$h=password_hash($_POST['password'],PASSWORD_DEFAULT);
mysqli_query($conn,"INSERT INTO users(nama,email,password) VALUES('".$_POST['nama']."','".$_POST['email']."','$h')");
header("Location: ../login.php");
?>
