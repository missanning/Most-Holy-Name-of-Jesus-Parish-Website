<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="page-header">
    <h2>News &amp; Events</h2>
    <p>Stay updated with what's happening in our parish community.</p>
</div>

<section>
    <h3>Latest News</h3>
    <div class="news-grid">
        <?php foreach ($pdo->query("SELECT * FROM news ORDER BY id DESC") as $n): ?>
        <div class="news-card">
            <div class="news-img"><?= $n['icon'] ?></div>
            <div class="news-body">
                <div class="date"><?= htmlspecialchars($n['date_label']) ?></div>
                <h4><?= htmlspecialchars($n['title']) ?></h4>
                <p><?= htmlspecialchars($n['body']) ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <h3>Upcoming Events</h3>
    <table>
        <thead><tr><th>Date</th><th>Event</th><th>Time</th><th>Venue</th></tr></thead>
        <tbody>
            <?php foreach ($pdo->query("SELECT * FROM events ORDER BY id ASC") as $e): ?>
            <tr>
                <td><?= htmlspecialchars($e['event_date']) ?></td>
                <td><?= htmlspecialchars($e['title']) ?></td>
                <td><?= htmlspecialchars($e['time']) ?></td>
                <td><?= htmlspecialchars($e['venue']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
