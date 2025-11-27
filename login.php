<?php
require_once 'includes/session.php';
if (isLoggedIn()) {
    header('Location: index.php');
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username'] ?? '');
    if ($u === '') $error = 'Nama tidak boleh kosong.';
    else {
        $_SESSION['user'] = $u;
        setcookie('zoo_user', $u, time() + 86400, '/');
        header('Location: index.php');
        exit;
    }
}
require 'includes/header.php';
?>
<h2>Login</h2>
<?php if ($error): ?><div class="alert"><?= $error ?></div><?php endif; ?>
<form method="post" class="form card" style="max-width:400px;">
  <label>Nama:</label>
  <input type="text" name="username" required>
  <button type="submit">Login</button>
</form>
<?php require 'includes/footer.php'; ?>