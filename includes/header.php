<?php
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
    </nav>
</div>

</div><!-- /.sticky-header -->

<main>
