<?php
include "inc/config.php";
include "inc/auth.php";
include "inc/header.php";
include "inc/sidebar.php";

/* Ambil data gula darah (terbaru dulu) */

$user_id = $_SESSION['user_id'];

$q = mysqli_query(
  $conn,
  "SELECT * FROM blood_sugar
   WHERE user_id = $user_id
   ORDER BY tanggal DESC"
);

if (!$q) {
  die(mysqli_error($conn));
}
?>


<div class="section">
  <h2>Pemantauan Gula Darah</h2>

  <!-- FORM INPUT -->
  <div class="card">
    <form method="POST" action="process/gula_save.php" class="gula-form">

      <div>
        <label>Hasil cek gula (mg/dL)</label>
        <input
          type="number"
          name="nilai"
          placeholder="mis. 110"
          required
        >
      </div>

      <div>
        <label>Waktu</label>
        <input
          type="datetime-local"
          name="tanggal"
          required
        >
      </div>

      <div>
        <button type="submit" class="btn-primary">
          + Simpan
        </button>
      </div>

    </form>
  </div>

  <!-- RIWAYAT -->
  <div class="card">
    <h3 style="margin-bottom:16px;">Riwayat cek gula darah</h3>

    <table class="gula-table">
      <thead>
        <tr>
          <th>Waktu</th>
          <th>Nilai (mg/dL)</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php if (mysqli_num_rows($q) > 0): ?>
          <?php while ($row = mysqli_fetch_assoc($q)): ?>
            <tr>
              <td>
                <?= date("d/m/Y, H:i", strtotime($row['tanggal'])); ?>
              </td>
              <td><?= htmlspecialchars($row['nilai']); ?></td>
              <td>
                <a
                  href="gula_edit.php?id=<?= $row['id']; ?>"
                  class="btn-edit">
                  Edit
                </a>
                <a
                  href="process/gula_delete.php?id=<?= $row['id']; ?>"
                  class="btn-delete"
                  onclick="return confirm('Hapus data ini?')">
                  Hapus
                </a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" style="text-align:center;color:#6b7280;">
              Belum ada data gula darah
            </td>
          </tr>
        <?php endif; ?>

      </tbody>
    </table>
  </div>

</div>

<?php include "inc/footer.php"; ?>
