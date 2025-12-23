
<?php include "inc/config.php"; include "inc/auth.php";
include "inc/header.php"; include "inc/sidebar.php";
$u=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id=".$_SESSION['user_id']));
?>
<div class="section">
  <h2>Pengaturan Akun</h2>

  <div class="card" style="max-width:420px;">
    <form method="POST" action="process/settings_update.php">
      <div class="form-group">
        <label>Nama</label>
        <input name="nama" value="<?= $u['nama']; ?>">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input name="email" value="<?= $u['email']; ?>">
      </div>

      <button class="btn">Simpan Perubahan</button>
    </form>
  </div>
</div>

<?php include "inc/footer.php"; ?>
