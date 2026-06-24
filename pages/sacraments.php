<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="page-header">
    <h2>Sacraments</h2>
    <p>The seven sacraments of the Catholic Church — signs of God's grace in our lives.</p>
</div>

<div class="sacraments-grid">
    <?php foreach ($pdo->query("SELECT * FROM sacraments ORDER BY sort_order, id") as $s): ?>
    <div class="sacrament-card">
        <div class="sacrament-img">
            <?php if (file_exists($s['img'])): ?>
                <img src="<?= htmlspecialchars($s['img']) ?>" alt="<?= htmlspecialchars($s['name']) ?>">
            <?php else: ?>
                <div class="sacrament-img-placeholder">
                    <span>&#9769;</span>
                    <p>Place image at:<br><code><?= htmlspecialchars($s['img']) ?></code></p>
                </div>
            <?php endif; ?>
            <div class="sacrament-label"><?= htmlspecialchars($s['label']) ?></div>
        </div>
        <div class="sacrament-body">
            <h3><?= htmlspecialchars($s['name']) ?></h3>
            <p><?= htmlspecialchars($s['description']) ?></p>
            <a href="?page=contact" class="sacrament-link">Inquire &rarr;</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
