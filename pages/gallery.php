<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="page-header">
    <h2>Gallery</h2>
    <p>A glimpse of our parish life, events, and celebrations.</p>
</div>

<section>
    <h3>Parish Life</h3>
    <?php $photos = $pdo->query("SELECT * FROM gallery ORDER BY sort_order, id")->fetchAll(); ?>
    <?php if ($photos): ?>
    <div class="gallery-grid">
        <?php foreach ($photos as $g): ?>
        <div class="gallery-item" title="<?= htmlspecialchars($g['caption']) ?>">
            <img src="images/<?= htmlspecialchars($g['filename']) ?>" alt="<?= htmlspecialchars($g['caption']) ?>" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p style="color:var(--text2);text-align:center;font-style:italic;">No photos yet. Upload images from the Admin panel.</p>
    <?php endif; ?>
</section>
