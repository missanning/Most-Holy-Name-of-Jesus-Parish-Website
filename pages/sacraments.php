<?php
$sacraments = [
    [
        'img'   => 'images/baptism.jpg',
        'name'  => 'Baptism',
        'label' => 'Sacraments of Initiation',
        'desc'  => 'The sacrament of initiation and entry into the Catholic Church. Baptisms are celebrated on the 2nd and 4th Sunday of each month. Please contact the parish office to register for the Baptism Preparation Program.',
    ],
    [
        'img'   => 'images/eucharist.jpg',
        'name'  => 'Eucharist',
        'label' => 'Sacraments of Initiation',
        'desc'  => 'The source and summit of Christian life. First Holy Communion preparation classes are held annually for children in Grade 2. Contact the Religious Education office to enroll.',
    ],
    [
        'img'   => 'images/confirmation.jpg',
        'name'  => 'Confirmation',
        'label' => 'Sacraments of Initiation',
        'desc'  => 'The completion of Baptism and full reception of the Holy Spirit. Confirmation is prepared over two years. Please inquire at the parish office for the current schedule.',
    ],
    [
        'img'   => 'images/reconciliation.jpg',
        'name'  => 'Reconciliation',
        'label' => 'Sacraments of Healing',
        'desc'  => 'God\'s mercy made present. Confessions are available by appointment. Please contact the parish office to schedule a time with a priest.',
    ],
    [
        'img'   => 'images/anointing.jpg',
        'name'  => 'Anointing of the Sick',
        'label' => 'Sacraments of Healing',
        'desc'  => 'Available to the seriously ill, elderly, or those preparing for major surgery. Contact the parish office or call for an emergency visit at any time.',
    ],
    [
        'img'   => 'images/matrimony.jpg',
        'name'  => 'Matrimony',
        'label' => 'Sacraments of Service',
        'desc'  => 'Marriage preparation (Pre-Cana) is required. Couples must contact the parish at least 6 months before the desired wedding date to begin the preparation process.',
    ],
    [
        'img'   => 'images/sacrament-holyorders.jpg',
        'name'  => 'Holy Orders',
        'label' => 'Sacraments of Service',
        'desc'  => 'Men discerning a vocation to the priesthood or diaconate are encouraged to speak with our Parish Priest for guidance and direction.',
    ],
];
?>

<div class="page-header">
    <h2>Sacraments</h2>
    <p>The seven sacraments of the Catholic Church — signs of God's grace in our lives.</p>
</div>

<div class="sacraments-grid">
    <?php foreach ($sacraments as $s): ?>
    <div class="sacrament-card">
        <div class="sacrament-img">
            <?php if (file_exists($s['img'])): ?>
                <img src="<?= htmlspecialchars($s['img']) ?>" alt="<?= htmlspecialchars($s['name']) ?>">
            <?php else: ?>
                <!-- Replace this div with: <img src="<?= htmlspecialchars($s['img']) ?>" alt="<?= htmlspecialchars($s['name']) ?>"> -->
                <div class="sacrament-img-placeholder">
                    <span>&#9769;</span>
                    <p>Place your image at:<br><code><?= htmlspecialchars($s['img']) ?></code></p>
                </div>
            <?php endif; ?>
            <div class="sacrament-label"><?= htmlspecialchars($s['label']) ?></div>
        </div>
        <div class="sacrament-body">
            <h3><?= htmlspecialchars($s['name']) ?></h3>
            <p><?= htmlspecialchars($s['desc']) ?></p>
            <a href="?page=contact" class="sacrament-link">Inquire &rarr;</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
