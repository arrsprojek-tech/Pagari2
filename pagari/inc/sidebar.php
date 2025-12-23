<?php
$current = basename($_SERVER['PHP_SELF']);
function active($page, $current) {
  return $page === $current ? 'active' : '';
}
?>

<div class="app">
  <aside class="sidebar">
    <nav>
      <a class="<?= active('dashboard.php',$current) ?>" href="dashboard.php">
        Beranda
      </a>

      <a class="<?= active('nutrisi.php',$current) ?>" href="nutrisi.php">
        Nutrisi
      </a>

      <a class="<?= active('gula_input.php',$current) ?>" href="gula_input.php">
        Pemantauan Gula Darah
      </a>

      <a class="<?= active('gula_riwayat.php',$current) ?>" href="gula_riwayat.php">
        Lacak Gula Harian
      </a>

      <a class="<?= active('edukasi.php',$current) ?>" href="edukasi.php">
        Zona Edukasi
      </a>

      <a class="<?= active('riwayat.php',$current) ?>" href="riwayat.php">
        Riwayat Pengguna
      </a>

      <a class="<?= active('pengaturan.php',$current) ?>" href="pengaturan.php">
        Pengaturan
      </a>
    </nav>
  </aside>

  <main class="content">
