<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="page-header">
    <h2>Mass Schedule</h2>
    <p>Join us in celebrating the Eucharist. All are welcome.</p>
</div>

<section>
    <h3>Weekly Mass Schedule</h3>
    <table>
        <thead><tr><th>Day</th><th>Time</th><th>Notes</th></tr></thead>
        <tbody>
            <?php foreach ($pdo->query("SELECT * FROM mass_schedule WHERE category='weekly' ORDER BY id") as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['col1']) ?></td>
                <td><?= htmlspecialchars($r['col2']) ?></td>
                <td><?= htmlspecialchars($r['col3']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="margin-top:14px;font-size:.88rem;color:#9a7a58;font-style:italic;">* Please confirm the latest schedule with the parish office.</p>
</section>

<section>
    <h3>Holy Day Masses</h3>
    <table>
        <thead><tr><th>Holy Day</th><th>Masses</th></tr></thead>
        <tbody>
            <?php foreach ($pdo->query("SELECT * FROM mass_schedule WHERE category='holyday' ORDER BY id") as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['col1']) ?></td>
                <td><?= htmlspecialchars($r['col2']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="margin-top:14px;font-size:.88rem;color:#9a7a58;font-style:italic;">Specific times are announced each year through parish bulletins and social media.</p>
</section>

<section>
    <h3>Confession Schedule</h3>
    <table>
        <thead><tr><th>Day</th><th>Time</th></tr></thead>
        <tbody>
            <tr><td>By Appointment</td><td>Contact the Parish Office</td></tr>
        </tbody>
    </table>
    <p style="margin-top:14px;font-size:.88rem;color:#9a7a58;font-style:italic;">Confession is currently available by appointment only.</p>
</section>

<section>
    <h3>Parish Office Hours</h3>
    <table>
        <thead><tr><th>Day</th><th>Hours</th></tr></thead>
        <tbody>
            <?php foreach ($pdo->query("SELECT * FROM mass_schedule WHERE category='office' ORDER BY id") as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['col1']) ?></td>
                <td><?= htmlspecialchars($r['col2']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
