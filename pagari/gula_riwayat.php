<?php
include "inc/config.php";
include "inc/auth.php";
include "inc/header.php";
include "inc/sidebar.php";

/* tanggal hari ini */
$tanggal = date("Y-m-d");

/* ambil data */
$q = mysqli_query(
  $conn,
  "SELECT * FROM food_diary 
   WHERE tanggal = '$tanggal'
   ORDER BY id DESC"
);

if (!$q) {
  die("DB Error: " . mysqli_error($conn));
}

/* hitung total gula */
$total = 0;
$data = [];
while ($r = mysqli_fetch_assoc($q)) {
  $total += $r['gula'];
  $data[] = $r;
}

$limit = 25;
$persen = min(100, ($total / $limit) * 100);
?>

<div class="section">
  <h2>Lacak Gula Harian</h2>

  <!-- FORM INPUT -->
  <div class="card">
    <form method="POST" action="process/food_save.php" class="gula-form">

      <div>
        <label>Nama makanan/minuman</label>
        <input name="item" placeholder="mis. Teh manis" required>
      </div>

      <div>
        <label>Gula (g)</label>
        <input type="number" name="gula" placeholder="mis. 12" required>
      </div>

      <div>
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $tanggal ?>" required>
      </div>

      <div>
        <button class="btn-primary" type="submit">+ Tambah</button>
      </div>

    </form>
  </div>

  <!-- TOTAL GULA -->
  <div class="card">
    <small>Total gula hari ini</small>
    <h3><?= $total ?>g <span style="font-size:14px;color:#6b7280;">/ <?= $limit ?>g</span></h3>

    <div class="progress">
      <div class="progress-bar" style="width:<?= $persen ?>%"></div>
    </div>
  </div>

  <!-- FOOD DIARY -->
  <div class="card">
    <h3>Food Diary</h3>

    <table class="gula-table">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Item</th>
          <th>Gula (g)</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php if (count($data) > 0): ?>
          <?php foreach ($data as $d): ?>
            <tr>
              <td><?= $d['tanggal']; ?></td>
              <td><?= htmlspecialchars($d['item']); ?></td>
              <td><?= $d['gula']; ?></td>
              <td>
                <a href="food_edit.php?id=<?= $d['id']; ?>" class="btn-edit">Edit</a>
                <a
                  href="process/food_delete.php?id=<?= $d['id']; ?>"
                  class="btn-delete"
                  onclick="return confirm('Hapus data ini?')">
                  Hapus
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" style="text-align:center;color:#6b7280;">
              Belum ada data hari ini
            </td>
          </tr>
        <?php endif; ?>

      </tbody>
    </table>
  </div>
</div>

<?php include "inc/footer.php"; ?>
