<div class="page-header">
    <h2>News &amp; Events</h2>
    <p>Stay updated with what's happening in our parish community.</p>
</div>

<section>
    <h3>Latest News</h3>
    <div class="news-grid">
        <?php
        $news = [
            ['&#127882;', 'July 5, 2025', 'Parish Fiesta Celebration', 'Join us for our annual Parish Fiesta in honor of our patron saint with Mass, procession, and community activities.'],
            ['&#128218;', 'June 28, 2025', 'New Bible Study Group Forming', 'We are forming a new weekly Bible Study group open to all parishioners. Sign-ups available at the parish office.'],
            ['&#127891;', 'June 20, 2025', 'Religious Education Enrollment', 'Enrollment for the 2025-2026 Religious Education program is now open for children ages 6–17.'],
            ['&#128139;', 'June 15, 2025', 'Medical Mission', 'Our outreach team will conduct a free medical mission for underprivileged families. Volunteers are welcome.'],
            ['&#127926;', 'June 8, 2025', 'Choir Summer Concert', 'The Parish Choir presents an evening of sacred music. Admission is free. All are welcome!'],
            ['&#128591;', 'June 1, 2025', 'Perpetual Adoration Chapel Opens', 'Our new Perpetual Adoration Chapel is now open 24 hours. Sign up for your holy hour online or at the office.'],
        ];
        foreach ($news as $n): ?>
        <div class="news-card">
            <div class="news-img"><?= $n[0] ?></div>
            <div class="news-body">
                <div class="date"><?= $n[1] ?></div>
                <h4><?= $n[2] ?></h4>
                <p><?= $n[3] ?></p>
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
            <tr><td>July 20, 2025</td><td>Youth Fellowship Night</td><td>6:00 PM</td><td>Parish Hall</td></tr>
            <tr><td>July 25, 2025</td><td>Parish Family Day</td><td>9:00 AM</td><td>Parish Grounds</td></tr>
            <tr><td>August 1, 2025</td><td>Rosary Procession</td><td>5:00 PM</td><td>Church Grounds</td></tr>
            <tr><td>August 10, 2025</td><td>Choir Recital</td><td>7:00 PM</td><td>Main Church</td></tr>
            <tr><td>August 15, 2025</td><td>Assumption of Mary — Solemnity</td><td>7AM / 9AM / 6PM</td><td>Main Church</td></tr>
        </tbody>
    </table>
</section>
