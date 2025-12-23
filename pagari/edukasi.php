
<?php include "inc/config.php"; include "inc/auth.php";
include "inc/header.php"; include "inc/sidebar.php";
$r=mysqli_query($conn,"SELECT * FROM education");
while($e=mysqli_fetch_assoc($r)):
?>
<div class="section">
  <h2>Zona Edukasi</h2>

  <?php while ($e = mysqli_fetch_assoc($r)): ?>
    <div class="card">
      <h3><?= $e['judul']; ?></h3>
      <p class="metric-sub"><?= $e['konten']; ?></p>
    </div>
  <?php endwhile; ?>
</div>

<?php endwhile; include "inc/footer.php"; ?>
