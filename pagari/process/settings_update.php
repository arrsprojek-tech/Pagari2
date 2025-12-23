
<?php include "../inc/config.php";
$id=$_SESSION['user_id'];
mysqli_query($conn,"UPDATE users SET nama='".$_POST['nama']."', email='".$_POST['email']."' WHERE id=$id");
header("Location: ../pengaturan.php");
?>
