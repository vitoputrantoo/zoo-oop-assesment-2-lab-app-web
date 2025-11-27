<?php
require_once 'includes/session.php';
requireLogin();
require 'includes/header.php';

$dataFile = __DIR__ . '/data/hewan.json';
if (!file_exists($dataFile)) {
    file_put_contents($dataFile, json_encode([]));
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $umur = trim($_POST['umur'] ?? '');
    $jenis = trim($_POST['jenis'] ?? '');
    $keterangan = trim($_POST['keterangan'] ?? '');

    // basic validation
    if ($nama === '' || $umur === '' || $jenis === '') {
        $msg = 'Nama, umur, dan jenis wajib diisi.';
    } else {
        $gambar = '';
        if (!empty($_FILES['gambar']['name'])) {
            $targetDir = __DIR__ . '/uploads/images/';
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','gif'];
            if (!in_array($ext, $allowed)) {
                $msg = 'Format gambar tidak diperbolehkan.';
            } else {
                $newName = uniqid() . '.' . $ext;
                $target = $targetDir . $newName;
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
                    $gambar = $newName;
                } else {
                    $msg = 'Upload gambar gagal.';
                }
            }
        }

        if (!$msg) {
            $data = json_decode(file_get_contents($dataFile), true) ?: [];
            $data[] = [
                'id' => uniqid(),
                'nama' => $nama,
                'umur' => $umur,
                'jenis' => $jenis,
                'keterangan' => $keterangan,
                'gambar' => $gambar
            ];
            file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
            $msg = 'Data hewan berhasil ditambahkan.';
            // clear form vars
            $nama = $umur = $jenis = $keterangan = '';
        }
    }
}
?>

<h2>Tambah Hewan Baru</h2>
<?php if ($msg): ?><div class="alert"><?= $msg ?></div><?php endif; ?>

<form method="post" enctype="multipart/form-data" class="form card" style="max-width:600px;">
    <label>Nama Hewan</label>
    <input type="text" name="nama" required value="<?= htmlspecialchars($nama ?? '') ?>">

    <label>Umur (tahun)</label>
    <input type="number" name="umur" required value="<?= htmlspecialchars($umur ?? '') ?>">

    <label>Jenis</label>
    <select name="jenis" required>
        <option value="">-- Pilih --</option>
        <option value="Mamalia">Mamalia</option>
        <option value="Burung">Burung</option>
        <option value="Reptil">Reptil</option>
        <option value="Ikan">Ikan</option>
    </select>

    <label>Keterangan</label>
    <textarea name="keterangan" rows="5"><?= htmlspecialchars($keterangan ?? '') ?></textarea>

    <label>Gambar Hewan</label>
    <input type="file" name="gambar" accept="image/*">

    <button type="submit">Simpan</button>
</form>

<?php require 'includes/footer.php'; ?>