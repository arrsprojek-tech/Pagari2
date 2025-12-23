
<?php include "inc/config.php"; include "inc/auth.php";
include "inc/header.php"; include "inc/sidebar.php";
$r=mysqli_query($conn,"SELECT * FROM user_activity WHERE user_id=".$_SESSION['user_id']);
while($a=mysqli_fetch_assoc($r)):
?>
<div class="section">
  <h2>Riwayat Aktivitas</h2>

  <?php while ($a = mysqli_fetch_assoc($r)): ?>
    <div class="card">
      <strong><?= $a['aktivitas']; ?></strong>
      <div class="metric-sub"><?= $a['created_at']; ?></div>
    </div>
  <?php endwhile; ?>
</div>

<?php endwhile; include "inc/footer.php"; ?>
