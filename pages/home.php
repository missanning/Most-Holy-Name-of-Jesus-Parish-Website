<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="video-section">
    <iframe width="100%" height="500" src="https://www.youtube.com/embed/NmnJVLS6mGI" title="Parish Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <p class="video-caption">A glimpse into the life, faith &amp; community of the Most Holy Name of Jesus Parish</p>
</div>

<div class="hero">
    <div class="hero-inner">
    <span class="hero-ornament">Most Holy Name of Jesus Parish &nbsp;&mdash;&nbsp; Est. 1952</span>
    <div class="hero-badge">Diocese of San Pablo</div>
    <h2>Where Faith Meets<br>Community</h2>
    <h3>Barangay Narra &nbsp;&bull;&nbsp; City of San Pedro, Laguna</h3>
    <div class="divider"></div>
    <p>"Where faith is nurtured, community is built,<br>and the love of God is proclaimed to all."</p>
    <a href="?page=mass-schedule" class="btn">View Mass Schedule</a>
    </div>
</div>

<div class="section-title">
    <span class="ornament">Our Parish Life</span>
    <h2>Faith &amp; Community</h2>
    <div class="line"></div>
</div>

<div class="cards">
    <div class="card">
        <img src="images/dailymass.jpg" alt="Daily Holy Mass" class="card-img">
        <h3>Sunday Holy Mass</h3>
        <p>7:00am & 6:30pm at Parish</p>
        <p>9:00am at SM Center San Pedro</p>
        <p>All the faithful are warmly welcomed.</p>
    </div>
    <div class="card">
        <img src="images/sacraments.jpg" alt="Sacraments" class="card-img">
        <h3>Sacraments</h3>
        <p>Baptism, Confirmation, Eucharist, and all sacraments of the Church are available to the faithful.</p>
    </div>
    <div class="card">
        <img src="images/ministries.jpg" alt="Ministries" class="card-img">
        <h3>Ministries</h3>
        <p>Join one of our many active parish ministries and answer God's call to serve the community.</p>
    </div>
    <div class="card">
        <img src="images/events.jpg" alt="News &amp; Events" class="card-img">
        <h3>News &amp; Events</h3>
        <p>Stay informed with the latest parish news, upcoming events, and community announcements.</p>
    </div>
</div>

<div class="section-title">
    <span class="ornament">What's Coming Up</span>
    <h2>Upcoming Events</h2>
    <div class="line"></div>
</div>

<section>
    <table>
        <thead>
            <tr><th>Date</th><th>Event</th><th>Time</th><th>Venue</th></tr>
        </thead>
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
