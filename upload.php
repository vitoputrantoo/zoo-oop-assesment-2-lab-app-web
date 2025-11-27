<?php
require_once 'includes/session.php';
requireLogin();
require 'includes/header.php';

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['upload_file'])) {
        if (!empty($_FILES['file']['name'])) {
            $targetDir = __DIR__ . '/uploads/files/';
            if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
            $fname = basename($_FILES['file']['name']);
            $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
            $allowed = ['pdf','doc','docx','zip','txt'];
            if (!in_array($ext, $allowed)) {
                $msg = 'Format file tidak diperbolehkan.';
            } else {
                $newName = uniqid() . '.' . $ext;
                $target = $targetDir . $newName;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
                    $msg = 'File berhasil diupload ke uploads/files/';
                } else {
                    $msg = 'Upload file gagal.';
                }
            }
        } else {
            $msg = 'Pilih file terlebih dahulu.';
        }
    }
}
?>

<h2>Upload File Umum</h2>
<?php if ($msg): ?><div class="alert"><?= $msg ?></div><?php endif; ?>
<form method="post" enctype="multipart/form-data" class="card" style="max-width:500px;">
  <input type="file" name="file" accept=".pdf,.doc,.docx,.zip,.txt" required>
  <button name="upload_file" type="submit">Upload File</button>
</form>

<?php require 'includes/footer.php'; ?>