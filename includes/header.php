<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/db.php';
$me_nav = null;
if (isset($_SESSION['user_id'])) {
    $s = $pdo->prepare("SELECT is_admin FROM users WHERE id=?");
    $s->execute([$_SESSION['user_id']]);
    $me_nav = $s->fetch();
}
$navLinks = [
    'home'          => 'Home',
    'about'         => 'About Us',
    'mass-schedule' => 'Mass Schedule',
    'sacraments'    => 'Sacraments',
    'ministries'    => 'Ministries',
    'news'          => 'News & Events',
    'gallery'       => 'Gallery',
    'flipbook'      => 'Coffee Table Book',
    'resources'     => 'Resources',
    'donate'        => 'Donate',
    'contact'       => 'Contact Us',
];
$current = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parish of the Holy Family</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="sticky-header">
<div class="topbar">
    &#9769; &nbsp; Deus Caritas Est &mdash; God is Love &nbsp; &#9769;
</div>

<div class="nav-bar">
    <nav>
        <div class="nav-brand">
            <img src="images/ParishLogo.png" alt="Parish Logo" class="nav-logo">
            <div class="nav-title">
                <span class="nav-parish-name">Most Holy Name of Jesus Parish</span>
                <span class="nav-tagline">Barangay Narra, City of San Pedro, Laguna</span>
            </div>
        </div>
        <button class="menu-toggle" onclick="document.querySelector('.nav-bar nav ul').classList.toggle('open')">&#9776; Menu</button>
        <ul>
            <?php foreach ($navLinks as $key => $label): ?>
            <li>
                <a href="?page=<?= $key ?>" class="<?= $current === $key ? 'active' : '' ?>">
                    <?= htmlspecialchars($label) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <div class="nav-auth">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($me_nav && $me_nav['is_admin']): ?>
                <a href="?page=admin" class="nav-auth-btn <?= $current==='admin'?'active':'' ?>">&#9881; Admin</a>
                <?php endif; ?>
                <span class="nav-username">&#9769; <?= htmlspecialchars($_SESSION['username']) ?></span>
                <a href="auth/logout.php" class="nav-auth-btn">Sign Out</a>
            <?php else: ?>
                <a href="?page=login" class="nav-auth-btn <?= $current === 'login' ? 'active' : '' ?>">Login</a>
                <a href="?page=signup" class="nav-auth-btn nav-auth-btn--primary <?= $current === 'signup' ? 'active' : '' ?>">Sign Up</a>
            <?php endif; ?>
        </div>
    </nav>
</div>

</div><!-- /.sticky-header -->

<main>
