<?php
include "inc/config.php";
include "inc/auth.php";
include "inc/header.php";
include "inc/sidebar.php";

$foods = mysqli_query($conn, "SELECT * FROM foods");
?>

<div class="section space-y-6">

  <!-- Header -->
  <div>
    <h2 class="text-xl font-semibold">Nutrisi</h2>
    <p class="text-sm text-gray-500">
      Tambah dan kelola makanan untuk memantau asupan gula harian.
    </p>
  </div>

  <!-- Search + Filter -->
  <div class="flex flex-wrap gap-2 items-center">
    <input
      type="text"
      placeholder="Cari makanan"
      class="px-3 py-2 border rounded w-full md:w-64"
    />

    <button class="filter-chip active">Semua</button>
    <button class="filter-chip">Rendah Gula</button>
    <button class="filter-chip">Tinggi Protein</button>
    <button class="filter-chip">Tinggi Serat</button>
    <button class="filter-chip">Rendah Karbo</button>
  </div>

  <!-- Tambah Makanan -->
  <div class="card p-4">
    <h3 class="font-semibold mb-3">Tambah Makanan</h3>

    <form method="post" action="food_store.php" class="grid grid-cols-1 md:grid-cols-2 gap-3">
      <input name="nama" class="input" placeholder="Nama makanan" required>
      <input name="gula" class="input" placeholder="Gula (gram)" type="number">
      <input name="protein" class="input" placeholder="Protein (gram)" type="number">
      <input name="serat" class="input" placeholder="Serat (gram)" type="number">
      <input name="karbo" class="input" placeholder="Karbohidrat (gram)" type="number">

      <select name="kategori" class="input">
        <option value="Rendah Gula">Rendah Gula</option>
        <option value="Tinggi Protein">Tinggi Protein</option>
        <option value="Tinggi Serat">Tinggi Serat</option>
        <option value="Rendah Karbo">Rendah Karbo</option>
      </select>

      <input name="gambar" class="input md:col-span-2" placeholder="URL gambar (opsional)">

      <button
        type="submit"
        class="btn-primary md:col-span-2">
        Simpan Makanan
      </button>
    </form>
  </div>

  <!-- Daftar Makanan -->
  <div>
    <h3 class="font-semibold mb-3">Daftar Makanan</h3>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      <?php while ($f = mysqli_fetch_assoc($foods)): ?>
        <div class="card p-3 space-y-2">

          <div class="font-semibold"><?= htmlspecialchars($f['nama']); ?></div>

          <span class="badge"><?= $f['kategori']; ?></span>

          <div class="text-sm text-gray-600 space-y-1">
            <div>Gula: <?= $f['gula']; ?> g</div>
            <div>Protein: <?= $f['protein']; ?> g</div>
            <div>Serat: <?= $f['serat']; ?> g</div>
            <div>Karbo: <?= $f['karbo']; ?> g</div>
          </div>

          <a
            href="gula_add.php?id=<?= $f['id']; ?>"
            class="btn-secondary w-full text-center">
            + Tambah ke Lacak Gula Hari Ini
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

</div>

<?php include "inc/footer.php"; ?>
