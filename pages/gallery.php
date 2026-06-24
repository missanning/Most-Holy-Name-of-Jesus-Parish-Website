<div class="page-header">
    <h2>Gallery</h2>
    <p>A glimpse of our parish life, events, and celebrations.</p>
</div>

<section>
    <h3>Parish Life</h3>
    <div class="gallery-grid">
        <?php
        $items = ['&#9970;','&#127882;','&#127760;','&#128149;','&#127925;','&#128591;','&#127891;','&#9749;','&#127860;','&#128247;','&#128100;','&#127926;'];
        $labels = ['Church Interior','Parish Fiesta','Community','Mass Celebration','Music Ministry','Adoration','Youth Camp','Morning Mass','Outreach','Media Team','Parish Staff','Choir Concert'];
        foreach ($items as $i => $emoji): ?>
        <div class="gallery-item" title="<?= $labels[$i] ?>"><?= $emoji ?></div>
        <?php endforeach; ?>
    </div>
</section>

<section>
    <p style="color:#888; font-size:.9rem; text-align:center; margin-top:20px;">
        &#128247; Replace the placeholders above with actual <code>&lt;img&gt;</code> tags pointing to your <code>images/</code> folder.
    </p>
</section>
