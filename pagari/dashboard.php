
<?php include "inc/config.php"; include "inc/auth.php";
include "inc/header.php"; include "inc/sidebar.php";
$last = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM blood_sugar WHERE user_id=".$_SESSION['user_id']." ORDER BY tanggal DESC LIMIT 1"));
$data = mysqli_query($conn,
  "SELECT tanggal, nilai FROM blood_sugar
   WHERE user_id=".$_SESSION['user_id']."
   ORDER BY tanggal ASC LIMIT 7"
);

$labels = [];
$values = [];

while ($d = mysqli_fetch_assoc($data)) {
  $labels[] = $d['tanggal'];
  $values[] = $d['nilai'];
}
?>
<div class="section">
<div class="card">
  <small>Gula Darah Terakhir</small>
  <div class="metric"><?= $last ? $last['nilai'].' mg/dL' : '-' ?></div>
  <div class="metric-sub">Update terakhir</div>
</div>

  <div class="card">
    <small>Status Hari Ini</small>
    <h3>Terpantau</h3>
  </div>

  <div class="card">
    <small>Target Harian</small>
    <h3>&lt; 140 mg/dL</h3>
  </div>
</div>
<div class="card">
  <small>Grafik Gula Darah (7 Hari)</small>
  <canvas id="gulaChart" height="100"></canvas>
</div>
</div>
<script>
const ctx = document.getElementById('gulaChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?= json_encode($labels); ?>,
    datasets: [{
      label: 'Gula Darah',
      data: <?= json_encode($values); ?>,
      borderColor: '#16a34a',
      backgroundColor: 'rgba(22,163,74,0.15)',
      tension: 0.4,
      fill: true
    }]
  },
  options: {
    plugins: { legend: { display: false } },
    scales: {
      y: { beginAtZero: false }
    }
  }
});
</script>

<?php include "inc/footer.php"; ?>
