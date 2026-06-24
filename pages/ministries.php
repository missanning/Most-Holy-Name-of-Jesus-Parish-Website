<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="page-header">
    <h2>Ministries</h2>
    <p>Discover how you can serve God and the community through our parish ministries.</p>
</div>

<div class="cards">
    <?php foreach ($pdo->query("SELECT * FROM ministries ORDER BY sort_order, id") as $m): ?>
    <div class="card">
        <div class="icon"><?= $m['icon'] ?></div>
        <h3><?= htmlspecialchars($m['title']) ?></h3>
        <p><?= htmlspecialchars($m['description']) ?></p>
    </div>
    <?php endforeach; ?>
</div>

<section style="text-align:center; margin-top:20px;">
    <p>Interested in joining a ministry? <a href="?page=contact">Contact us</a> and we'll get you connected!</p>
</section>
