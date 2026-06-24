<?php require_once __DIR__ . '/../includes/db.php'; ?>
<div class="page-header">
    <h2>Ministries</h2>
    <p>Discover how you can serve God and the community through our parish ministries.</p>
</div>

<?php
$sections = [
    [
        'title' => 'Parish Councils',
        'items' => [
            ['name' => 'Parish Pastoral Council (PPC)',  'img' => 'images/ministries/ppc.jpg'],
            ['name' => 'Parish Finance Council (PFC)',   'img' => 'images/ministries/pfc.jpg'],
        ],
    ],
    [
        'title' => 'Mini Parish Pastoral Councils',
        'items' => [
            ['name' => 'San Martin de Porres (Narra)',                    'img' => 'images/ministries/san-martin.jpg'],
            ['name' => 'Mary Mother of God (Riverside)',                  'img' => 'images/ministries/mary-mother.jpg'],
            ['name' => 'San Antonio de Padua (Laram)',                    'img' => 'images/ministries/san-antonio.jpg'],
            ['name' => 'Holy Family (United Bayanihan)',                  'img' => 'images/ministries/holy-family.jpg'],
            ['name' => 'San Isidro Labrador (Magsaysay Purok 1)',         'img' => 'images/ministries/san-isidro-1.jpg'],
            ['name' => 'Immaculate Conception (Magsaysay Purok 2)',       'img' => 'images/ministries/immaculate-2.jpg'],
            ['name' => 'Immaculate Conception (Villa San Pedro)',         'img' => 'images/ministries/immaculate-villa.jpg'],
            ['name' => 'Our Lady of Perpetual Help (Bagong Silang)',      'img' => 'images/ministries/olph.jpg'],
            ['name' => 'St. Joseph the Worker (Filinvest)',               'img' => 'images/ministries/st-joseph.jpg'],
            ['name' => 'Our Lady of Visitation (Southern Heights 2)',     'img' => 'images/ministries/olv.jpg'],
            ['name' => 'Sto. Niño (United Better Living)',                'img' => 'images/ministries/sto-nino.jpg'],
            ['name' => 'Black Nazarene (Estrella)',                       'img' => 'images/ministries/black-nazarene.jpg'],
            ['name' => 'Divine Mercy (Villa Rosa Homes)',                 'img' => 'images/ministries/divine-mercy.jpg'],
            ['name' => 'San Isidro Labrador (Bayan-Bayanan)',             'img' => 'images/ministries/san-isidro-2.jpg'],
        ],
    ],
    [
        'title' => 'Priestly Ministry',
        'items' => [
            ['name' => 'Lectors and Commentators Ministry',               'img' => 'images/ministries/lectors.jpg'],
            ['name' => 'Extraordinary Ministers of Holy Communion (EMHC)','img' => 'images/ministries/emhc.jpg'],
            ['name' => 'Usherettes and Collectors Guild (UCG)',           'img' => 'images/ministries/ucg.jpg'],
            ['name' => 'Parish Liturgical Music Ministry',                'img' => 'images/ministries/music.jpg'],
            ['name' => 'Lingkod ng Dambana',                              'img' => 'images/ministries/lingkod.jpg'],
            ['name' => 'Mother Butler Guild',                             'img' => 'images/ministries/mother-butler.jpg'],
            ['name' => 'Apostolado ng Panalangin',                        'img' => 'images/ministries/apostolado.jpg'],
            ['name' => 'Order of Franciscan Secular (OFS)',               'img' => 'images/ministries/ofs.jpg'],
            ['name' => 'Holy Face of Jesus',                              'img' => 'images/ministries/holy-face.jpg'],
            ['name' => 'Little Brethren of Mary',                         'img' => 'images/ministries/little-brethren.jpg'],
        ],
    ],
    [
        'title' => 'Prophetic Ministry',
        'items' => [
            ['name' => 'Parish Catechetical Ministry',                    'img' => 'images/ministries/catechetical.jpg'],
            ['name' => 'El Shaddai',                                      'img' => 'images/ministries/el-shaddai.jpg'],
            ['name' => 'Parish Youth Council (PYC)',                      'img' => 'images/ministries/pyc.jpg'],
            ['name' => 'Shepherd of the Lord Sheep',                      'img' => 'images/ministries/shepherd.jpg'],
            ['name' => 'Couples for Christ (CFC)',                        'img' => 'images/ministries/cfc.jpg'],
            ['name' => 'Family & Life',                                   'img' => 'images/ministries/family-life.jpg'],
            ['name' => 'Social Communications Commission (SOCCOM)',       'img' => 'images/ministries/soccom.jpg'],
            ['name' => 'Charismatic Movement',                            'img' => 'images/ministries/charismatic.jpg'],
            ['name' => 'Dalaw Patron sa Kapitbahayang Katoliko (DPKK)',   'img' => 'images/ministries/dpkk.jpg'],
        ],
    ],
    [
        'title' => 'Kingly Ministry',
        'items' => [
            ['name' => 'Health Ministry',                                 'img' => 'images/ministries/health.jpg'],
            ['name' => 'Knights of Columbus (KOC)',                       'img' => 'images/ministries/koc.jpg'],
            ['name' => 'Parish Pastoral Council for Responsible Voting (PPCRV)', 'img' => 'images/ministries/ppcrv.jpg'],
            ['name' => 'Ecology Ministry',                                'img' => 'images/ministries/ecology.jpg'],
            ['name' => 'Social Action Ministry',                          'img' => 'images/ministries/social-action.jpg'],
            ['name' => 'Migrant Ministry',                                'img' => 'images/ministries/migrant.jpg'],
            ['name' => 'Vocation Ministry',                               'img' => 'images/ministries/vocation.jpg'],
            ['name' => 'Prison Ministry',                                 'img' => 'images/ministries/prison.jpg'],
            ['name' => 'Gawad Kalinga',                                   'img' => 'images/ministries/gawad-kalinga.jpg'],
            ['name' => 'Human Resource',                                  'img' => 'images/ministries/human-resource.jpg'],
        ],
    ],
];
?>

<div class="ministry-page">
    <?php foreach ($sections as $section): ?>
    <div class="ministry-section">
        <h3 class="ministry-section-title"><?= $section['title'] ?></h3>
        <div class="ministry-cards">
            <?php foreach ($section['items'] as $item): ?>
            <div class="ministry-card">
                <?php if (file_exists($item['img'])): ?>
                    <img src="<?= htmlspecialchars($item['img']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                <?php else: ?>
                    <div class="ministry-img-placeholder">&#9997;</div>
                <?php endif; ?>
                <div class="ministry-card-name"><?= htmlspecialchars($item['name']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<section style="text-align:center; margin-top:30px;">
    <p>Interested in joining a ministry? <a href="?page=contact" style="color:#1a3a5c; font-weight:bold;">Contact us</a> and we'll get you connected!</p>
</section>

<style>
.ministry-section { margin-bottom: 40px; }
.ministry-section-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1a3a5c;
    border-left: 4px solid #e8c96b;
    padding-left: 10px;
    margin-bottom: 16px;
}
.ministry-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 16px;
}
.ministry-card {
    background: #fff;
    border: 1px solid #dde3ec;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 6px rgba(0,0,0,0.06);
    text-align: center;
}
.ministry-card img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}
.ministry-img-placeholder {
    width: 100%;
    height: 120px;
    background: #f0f4f8;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #aaa;
}
.ministry-card-name {
    padding: 10px 8px;
    font-size: 0.82rem;
    font-weight: 600;
    color: #1a3a5c;
    line-height: 1.3;
}
</style>
