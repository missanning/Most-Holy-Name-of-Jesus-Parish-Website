<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="page-header">
    <h2>Resources</h2>
    <p>Faith formation materials, parish documents, and helpful links.</p>
</div>

<section>
    <h3>Parish Documents</h3>
    <ul>
        <?php foreach ($pdo->query("SELECT * FROM resources WHERE category='document' ORDER BY sort_order, id") as $r): ?>
        <li><?= $r['icon'] ?> <?= htmlspecialchars($r['title']) ?> — <a href="<?= htmlspecialchars($r['url']) ?>" target="_blank">Download</a></li>
        <?php endforeach; ?>
    </ul>
</section>

<section>
    <h3>Faith Formation</h3>
    <ul>
        <?php foreach ($pdo->query("SELECT * FROM resources WHERE category='faith' ORDER BY sort_order, id") as $r): ?>
        <li><?= $r['icon'] ?> <a href="<?= htmlspecialchars($r['url']) ?>" target="_blank"><?= htmlspecialchars($r['title']) ?></a></li>
        <?php endforeach; ?>
    </ul>
</section>

<section>
    <h3>Prayers &amp; Devotions</h3>
    <table>
        <thead><tr><th>Prayer</th><th>Schedule</th></tr></thead>
        <tbody>
            <?php foreach ($pdo->query("SELECT * FROM resources WHERE category='devotion' ORDER BY sort_order, id") as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['title']) ?></td>
                <td><?= htmlspecialchars($r['col2']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
