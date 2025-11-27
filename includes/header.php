<?php
require_once __DIR__ . '/session.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Zoo OOP - Demo</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
  <div class="container header-inner">
    <div>
      <h1>Zoo OOP</h1>
      <p>Sistem pengelolaan data hewan</p>
    </div>
    <div class="user-area">
    <?php if (isLoggedIn()): ?>
      Halo, <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>
      <a href="index.php">Home</a>
      <a href="add_hewan.php">Tambah Hewan</a>
      <a href="upload.php">Upload file</a>
      <a href="logout.php" class="btn-logout">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
    <?php endif; ?>
    </div>
  </div>
</header>
<main class="container">
