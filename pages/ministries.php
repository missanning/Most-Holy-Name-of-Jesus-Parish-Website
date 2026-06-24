<div class="page-header">
    <h2>Ministries</h2>
    <p>Discover how you can serve God and the community through our parish ministries.</p>
</div>

<div class="cards">
    <?php
    $ministries = [
        ['&#127925;', 'Music Ministry', 'Lead the community in worship through song and music at Sunday and special Masses.'],
        ['&#128149;', 'Lectors & Lectors', 'Proclaim the Word of God at Mass. Training provided for new volunteers.'],
        ['&#128100;', 'Extraordinary Ministers', 'Assist in the distribution of Holy Communion during Mass.'],
        ['&#128101;', 'Youth Ministry', 'Programs for teens and young adults to grow in faith, fellowship, and service.'],
        ['&#128140;', 'Couples for Christ', 'A family-based movement dedicated to evangelization and building Christian communities.'],
        ['&#9749;', 'Legion of Mary', 'Apostolic organization consecrated to Mary, engaging in spiritual and charitable works.'],
        ['&#127860;', 'Parish Outreach', 'Serving the poor through feeding programs, medical missions, and livelihood projects.'],
        ['&#128247;', 'Media & Communications', 'Manage the parish website, social media, and audio-visual needs.'],
        ['&#128270;', 'Ushers & Hospitality', 'Welcome parishioners and visitors, and maintain order during liturgical celebrations.'],
        ['&#128156;', 'Prayer Groups', 'Come together to pray the Rosary, Divine Mercy Chaplet, and other devotions.'],
    ];
    foreach ($ministries as $m): ?>
    <div class="card">
        <div class="icon"><?= $m[0] ?></div>
        <h3><?= $m[1] ?></h3>
        <p><?= $m[2] ?></p>
    </div>
    <?php endforeach; ?>
</div>

<section style="text-align:center; margin-top:20px;">
    <p>Interested in joining a ministry? <a href="?page=contact" style="color:#1a3a5c; font-weight:bold;">Contact us</a> and we'll get you connected!</p>
</section>
