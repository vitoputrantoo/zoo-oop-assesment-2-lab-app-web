<?php
require_once 'includes/header.php';

$dataFile = __DIR__ . '/data/hewan.json';
$hewanList = [];
if (file_exists($dataFile)) {
    $hewanList = json_decode(file_get_contents($dataFile), true) ?: [];
}
?>

<h2>Daftar Hewan</h2>
<?php if (!is_dir(__DIR__ . '/uploads/images')): ?>
  <div class="alert">Folder uploads/images tidak ditemukan. Mohon buat folder <code>uploads/images</code> dan pastikan dapat ditulis.</div>
<?php endif; ?>

<a href="add_hewan.php" class="btn" style="display:inline-block;margin-bottom:16px;">+ Tambah Data Hewan</a>

<div class="grid">
<?php if (empty($hewanList)): ?>
    <div class="card">Belum ada data hewan. Tambahkan data lewat tombol "Tambah Data Hewan".</div>
<?php endif; ?>

<?php foreach ($hewanList as $h): ?>
    <div class="card">
        <?php if (!empty($h['gambar']) && file_exists(__DIR__.'/uploads/images/'.$h['gambar'])): ?>
            <img src="uploads/images/<?= htmlspecialchars($h['gambar']) ?>" alt="<?= htmlspecialchars($h['nama']) ?>" style="width:100%;height:180px;object-fit:cover;">
        <?php else: ?>
            <div style="width:100%;height:180px;background:#eee;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#999">No Image</div>
        <?php endif; ?>
        <h3><?= htmlspecialchars($h['nama']) ?></h3>
        <p class="meta"><strong>Umur:</strong> <?= htmlspecialchars($h['umur']) ?> tahun • <strong>Jenis:</strong> <?= htmlspecialchars($h['jenis']) ?></p>
        <p><?= nl2br(htmlspecialchars($h['keterangan'])) ?></p>
    </div>
<?php endforeach; ?>
</div>

<?php require 'includes/footer.php'; ?>