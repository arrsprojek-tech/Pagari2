
<?php include "../inc/config.php";
$q=mysqli_query($conn,"SELECT * FROM users WHERE email='".$_POST['email']."'");
$u=mysqli_fetch_assoc($q);
if($u && password_verify($_POST['password'],$u['password'])){
$_SESSION['user_id']=$u['id'];
$_SESSION['nama']=$u['nama'];
header("Location: ../dashboard.php");
}else header("Location: ../login.php");
?>
