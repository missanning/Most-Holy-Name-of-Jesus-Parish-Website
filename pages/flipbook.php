<?php
// ── Add your book pages here in order ──────────────────
// Place images inside: images/flipbook/
// Recommended size: 800x1100px (portrait) or consistent size
$pages = array_map(fn($i) => "images/flipbook/{$i}.png", range(1, 91));

// Filter only existing pages
$pages = array_values(array_filter($pages, fn($p) => file_exists($p)));
?>

<div class="page-header">
    <h2>Coffee Table Book</h2>
    <p>A visual journey through the life and history of our parish community.</p>
</div>

<!-- StPageFlip Library -->
<script src="https://unpkg.com/page-flip/dist/js/page-flip.browser.js"></script>

<div class="flipbook-wrap">

    <?php if (empty($pages)): ?>
    <div class="flipbook-empty">
        <span>&#128218;</span>
        <h3>No Pages Yet</h3>
        <p>Add your book page images to <code>images/flipbook/</code> and list them in <code>pages/flipbook.php</code>.</p>
        <p>Recommended image size: <strong>800 &times; 1100px</strong> (portrait)</p>
    </div>
    <?php else: ?>

    <div class="flipbook-controls">
        <button class="flip-btn" id="btn-prev">&#8592; Prev</button>
        <span class="flip-info" id="flip-info">Page 1 of <?= count($pages) ?></span>
        <button class="flip-btn" id="btn-next">Next &#8594;</button>
    </div>

    <div class="flipbook-stage">
        <div id="flipbook">
            <?php foreach ($pages as $page): ?>
            <div class="page">
                <img src="<?= htmlspecialchars($page) ?>" alt="Book Page">
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="flipbook-hint">Click a page edge or use the arrows to flip &nbsp;&#8901;&nbsp; Drag to turn pages</div>

    <script>
    const pageFlip = new St.PageFlip(document.getElementById('flipbook'), {
        width:       520,
        height:      715,
        size:        'fixed',
        minWidth:    200,
        maxWidth:    700,
        minHeight:   300,
        maxHeight:   900,
        showCover:   true,
        mobileScrollSupport: false,
        drawShadow:  true,
        flippingTime: 700,
        usePortrait: true,
        startZIndex: 0,
        autoSize:    true,
        maxShadowOpacity: 0.5,
        startPage:   0,
        swipeDistance: 30,
        clickEventForward: true,
        useMouseEvents: true,
    });

    pageFlip.loadFromHTML(document.querySelectorAll('#flipbook .page'));

    const total = <?= count($pages) ?>;
    const info  = document.getElementById('flip-info');

    pageFlip.on('flip', (e) => {
        info.textContent = 'Page ' + (e.data + 1) + ' of ' + total;
    });

    document.getElementById('btn-prev').addEventListener('click', () => pageFlip.flipPrev());
    document.getElementById('btn-next').addEventListener('click', () => pageFlip.flipNext());
    </script>

    <?php endif; ?>
</div>
