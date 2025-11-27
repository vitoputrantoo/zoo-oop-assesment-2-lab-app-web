<?php
require_once 'includes/session.php';
session_unset();
session_destroy();
setcookie('zoo_user', '', time()-3600, '/');
header('Location: login.php');
exit;
?>