<?php
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['user_id'])) { header('Location: ../index.php?page=login'); exit; }
$me = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$me->execute([$_SESSION['user_id']]);
$me = $me->fetch();
if (!$me || !$me['is_admin']) { header('Location: ../index.php'); exit; }

$msg = '';

/* ── USERS ───────────────────────────────────────────── */
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'update_user') {
        $uid  = (int)$_POST['uid'];
        $uname = trim($_POST['username']);
        $email = trim($_POST['email']);
        $admin = isset($_POST['is_admin']) ? 1 : 0;
        $pdo->prepare("UPDATE users SET username=?, email=?, is_admin=? WHERE id=?")
            ->execute([$uname, $email, $admin, $uid]);
        if (!empty($_POST['new_password'])) {
            $pdo->prepare("UPDATE users SET password=? WHERE id=?")
                ->execute([password_hash($_POST['new_password'], PASSWORD_BCRYPT), $uid]);
        }
        $msg = 'User updated.';
    }

    elseif ($action === 'delete_user') {
        $uid = (int)$_POST['uid'];
        if ($uid !== (int)$_SESSION['user_id']) {
            $pdo->prepare("DELETE FROM users WHERE id=?")->execute([$uid]);
            $msg = 'User deleted.';
        } else {
            $msg = 'You cannot delete your own account.';
        }
    }

    /* ── NEWS ─────────────────────────────────────────── */
    elseif ($action === 'add_news') {
        $dl = !empty($_POST['date_label']) ? date('F j, Y', strtotime($_POST['date_label'])) : '';
        $pdo->prepare("INSERT INTO news (icon,date_label,title,body) VALUES (?,?,?,?)")
            ->execute([trim($_POST['icon']), $dl, trim($_POST['title']), trim($_POST['body'])]);
        $msg = 'News post added.';
    }

    elseif ($action === 'update_news') {
        $dl = !empty($_POST['date_label']) ? date('F j, Y', strtotime($_POST['date_label'])) : '';
        $pdo->prepare("UPDATE news SET icon=?,date_label=?,title=?,body=? WHERE id=?")
            ->execute([trim($_POST['icon']), $dl, trim($_POST['title']), trim($_POST['body']), (int)$_POST['nid']]);
        $msg = 'News post updated.';
    }

    elseif ($action === 'delete_news') {
        $pdo->prepare("DELETE FROM news WHERE id=?")->execute([(int)$_POST['nid']]);
        $msg = 'News post deleted.';
    }

    /* ── EVENTS ───────────────────────────────────────── */
    elseif ($action === 'add_event') {
        $ed = !empty($_POST['event_date']) ? date('F j, Y', strtotime($_POST['event_date'])) : '';
        $pdo->prepare("INSERT INTO events (event_date,title,time,venue) VALUES (?,?,?,?)")
            ->execute([$ed, trim($_POST['title']), trim($_POST['time']), trim($_POST['venue'])]);
        $msg = 'Event added.';
    }

    elseif ($action === 'update_event') {
        $ed = !empty($_POST['event_date']) ? date('F j, Y', strtotime($_POST['event_date'])) : '';
        $pdo->prepare("UPDATE events SET event_date=?,title=?,time=?,venue=? WHERE id=?")
            ->execute([$ed, trim($_POST['title']), trim($_POST['time']), trim($_POST['venue']), (int)$_POST['eid']]);
        $msg = 'Event updated.';
    }

    elseif ($action === 'delete_event') {
        $pdo->prepare("DELETE FROM events WHERE id=?")->execute([(int)$_POST['eid']]);
        $msg = 'Event deleted.';
    }

    /* ── MASS SCHEDULE ────────────────────────────────── */
    elseif ($action === 'add_mass') {
        $pdo->prepare("INSERT INTO mass_schedule (category,col1,col2,col3) VALUES (?,?,?,?)")
            ->execute([trim($_POST['category']), trim($_POST['col1']), trim($_POST['col2']), trim($_POST['col3']) ?: null]);
        $msg = 'Mass schedule entry added.';
    }

    elseif ($action === 'update_mass') {
        $pdo->prepare("UPDATE mass_schedule SET category=?,col1=?,col2=?,col3=? WHERE id=?")
            ->execute([trim($_POST['category']), trim($_POST['col1']), trim($_POST['col2']), trim($_POST['col3']) ?: null, (int)$_POST['mid']]);
        $msg = 'Mass schedule entry updated.';
    }

    elseif ($action === 'delete_mass') {
        $pdo->prepare("DELETE FROM mass_schedule WHERE id=?")->execute([(int)$_POST['mid']]);
        $msg = 'Mass schedule entry deleted.';
    }

    /* ── IMAGE UPLOAD ─────────────────────────────────── */
    elseif ($action === 'upload_image') {
        $allowed_types = ['image/jpeg','image/png','image/gif','image/webp'];
        $file = $_FILES['image'] ?? null;
        if ($file && $file['error'] === 0 && in_array($file['type'], $allowed_types)) {
            $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = preg_replace('/[^a-z0-9_-]/i', '_', pathinfo($file['name'], PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
            move_uploaded_file($file['tmp_name'], __DIR__ . '/../images/' . $filename);
            $msg = 'Image uploaded: ' . htmlspecialchars($filename);
        } else {
            $msg = 'Upload failed. Only JPG, PNG, GIF, WEBP allowed.';
        }
    }

    elseif ($action === 'delete_image') {
        $fname = basename($_POST['filename']);
        $path  = __DIR__ . '/../images/' . $fname;
        if (file_exists($path)) { unlink($path); $msg = 'Image deleted.'; }
    }

    /* ── MINISTRIES ───────────────────────────────────── */
    elseif ($action === 'add_ministry') {
        $pdo->prepare("INSERT INTO ministries (icon,title,description,sort_order) VALUES (?,?,?,?)")
            ->execute([trim($_POST['icon']), trim($_POST['title']), trim($_POST['description']), (int)($_POST['sort_order'] ?? 0)]);
        $msg = 'Ministry added.';
    }

    elseif ($action === 'update_ministry') {
        $pdo->prepare("UPDATE ministries SET icon=?,title=?,description=?,sort_order=? WHERE id=?")
            ->execute([trim($_POST['icon']), trim($_POST['title']), trim($_POST['description']), (int)($_POST['sort_order'] ?? 0), (int)$_POST['mnid']]);
        $msg = 'Ministry updated.';
    }

    elseif ($action === 'delete_ministry') {
        $pdo->prepare("DELETE FROM ministries WHERE id=?")->execute([(int)$_POST['mnid']]);
        $msg = 'Ministry deleted.';
    }

    /* ── SACRAMENTS ───────────────────────────────────── */
    elseif ($action === 'add_sacrament') {
        $img = trim($_POST['img'] ?? '');
        if (!empty($_FILES['simage']['name']) && $_FILES['simage']['error'] === 0) {
            $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
            if (in_array($_FILES['simage']['type'], $allowed)) {
                $ext  = pathinfo($_FILES['simage']['name'], PATHINFO_EXTENSION);
                $img  = preg_replace('/[^a-z0-9_-]/i', '_', pathinfo($_FILES['simage']['name'], PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
                move_uploaded_file($_FILES['simage']['tmp_name'], __DIR__ . '/../images/' . $img);
                $img  = 'images/' . $img;
            }
        }
        $pdo->prepare("INSERT INTO sacraments (img,name,label,description,sort_order) VALUES (?,?,?,?,?)")
            ->execute([$img, trim($_POST['name']), trim($_POST['label']), trim($_POST['description']), (int)($_POST['sort_order'] ?? 0)]);
        $msg = 'Sacrament added.';
    }

    elseif ($action === 'update_sacrament') {
        $sid = (int)$_POST['sid'];
        $row = $pdo->prepare("SELECT img FROM sacraments WHERE id=?");
        $row->execute([$sid]);
        $img = $row->fetchColumn();
        if (!empty($_FILES['simage']['name']) && $_FILES['simage']['error'] === 0) {
            $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
            if (in_array($_FILES['simage']['type'], $allowed)) {
                $ext  = pathinfo($_FILES['simage']['name'], PATHINFO_EXTENSION);
                $newf = preg_replace('/[^a-z0-9_-]/i', '_', pathinfo($_FILES['simage']['name'], PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
                move_uploaded_file($_FILES['simage']['tmp_name'], __DIR__ . '/../images/' . $newf);
                $img  = 'images/' . $newf;
            }
        }
        $pdo->prepare("UPDATE sacraments SET img=?,name=?,label=?,description=?,sort_order=? WHERE id=?")
            ->execute([$img, trim($_POST['name']), trim($_POST['label']), trim($_POST['description']), (int)($_POST['sort_order'] ?? 0), $sid]);
        $msg = 'Sacrament updated.';
    }

    elseif ($action === 'delete_sacrament') {
        $pdo->prepare("DELETE FROM sacraments WHERE id=?")->execute([(int)$_POST['sid']]);
        $msg = 'Sacrament deleted.';
    }

    /* ── GALLERY ──────────────────────────────────────── */
    elseif ($action === 'add_gallery') {
        $allowed_types = ['image/jpeg','image/png','image/gif','image/webp'];
        $file = $_FILES['gimage'] ?? null;
        if ($file && $file['error'] === 0 && in_array($file['type'], $allowed_types)) {
            $ext      = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = preg_replace('/[^a-z0-9_-]/i', '_', pathinfo($file['name'], PATHINFO_FILENAME)) . '_' . time() . '.' . $ext;
            move_uploaded_file($file['tmp_name'], __DIR__ . '/../images/' . $filename);
            $pdo->prepare("INSERT INTO gallery (filename,caption,sort_order) VALUES (?,?,?)")
                ->execute([$filename, trim($_POST['caption']), (int)($_POST['sort_order'] ?? 0)]);
            $msg = 'Gallery photo added.';
        } else {
            $msg = 'Upload failed. Only JPG, PNG, GIF, WEBP allowed.';
        }
    }

    elseif ($action === 'delete_gallery') {
        $gid   = (int)$_POST['gid'];
        $row   = $pdo->prepare("SELECT filename FROM gallery WHERE id=?");
        $row->execute([$gid]);
        $row   = $row->fetch();
        if ($row) {
            $path = __DIR__ . '/../images/' . $row['filename'];
            if (file_exists($path)) unlink($path);
            $pdo->prepare("DELETE FROM gallery WHERE id=?")->execute([$gid]);
            $msg = 'Gallery photo deleted.';
        }
    }

    /* ── RESOURCES ────────────────────────────────────── */
    elseif ($action === 'add_resource') {
        $pdo->prepare("INSERT INTO resources (category,icon,title,url,col2,sort_order) VALUES (?,?,?,?,?,?)")
            ->execute([trim($_POST['category']), trim($_POST['icon']), trim($_POST['title']), trim($_POST['url']), trim($_POST['col2']) ?: null, (int)($_POST['sort_order'] ?? 0)]);
        $msg = 'Resource added.';
    }

    elseif ($action === 'update_resource') {
        $pdo->prepare("UPDATE resources SET category=?,icon=?,title=?,url=?,col2=?,sort_order=? WHERE id=?")
            ->execute([trim($_POST['category']), trim($_POST['icon']), trim($_POST['title']), trim($_POST['url']), trim($_POST['col2']) ?: null, (int)($_POST['sort_order'] ?? 0), (int)$_POST['rid']]);
        $msg = 'Resource updated.';
    }

    elseif ($action === 'delete_resource') {
        $pdo->prepare("DELETE FROM resources WHERE id=?")->execute([(int)$_POST['rid']]);
        $msg = 'Resource deleted.';
    }
}

/* ── FETCH DATA ───────────────────────────────────────── */
$users      = $pdo->query("SELECT * FROM users ORDER BY id")->fetchAll();
$newsList   = $pdo->query("SELECT * FROM news ORDER BY id DESC")->fetchAll();
$events     = $pdo->query("SELECT * FROM events ORDER BY id")->fetchAll();
$masses     = $pdo->query("SELECT * FROM mass_schedule ORDER BY id")->fetchAll();
$images     = array_filter(scandir(__DIR__ . '/../images/'), fn($f) => preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $f));
$ministries = $pdo->query("SELECT * FROM ministries ORDER BY sort_order, id")->fetchAll();
$sacraments = $pdo->query("SELECT * FROM sacraments ORDER BY sort_order, id")->fetchAll();
$gallery    = $pdo->query("SELECT * FROM gallery ORDER BY sort_order, id")->fetchAll();
$resources  = $pdo->query("SELECT * FROM resources ORDER BY category, sort_order, id")->fetchAll();
$tab        = $_GET['tab'] ?? 'users';
?>

<div class="admin-wrap">
    <div class="admin-header">
        <h2>&#9881; Admin Panel</h2>
        <p>Manage users and website content</p>
    </div>

    <?php if ($msg): ?>
        <div class="admin-msg"><?= htmlspecialchars($msg) ?></div>
    <?php endif; ?>

    <div class="admin-tabs">
        <?php foreach (['users'=>'👤 Users','news'=>'📰 News','events'=>'📅 Events','mass'=>'📋 Schedule','images'=>'🖼️ Images','ministries'=>'🙏 Ministries','sacraments'=>'✝️ Sacraments','gallery'=>'📷 Gallery','resources'=>'📚 Resources'] as $t=>$label): ?>
        <a href="?page=admin&tab=<?= $t ?>" class="admin-tab <?= $tab===$t?'active':'' ?>"><?= $label ?></a>
        <?php endforeach; ?>
    </div>

    <?php if ($tab === 'users'): ?>
    <!-- ── USERS ─────────────────────────────────────── -->
    <div class="admin-section">
        <h3>User Accounts</h3>
        <?php foreach ($users as $u): ?>
        <details class="admin-details">
            <summary>
                <?= htmlspecialchars($u['username']) ?>
                <?php if ($u['is_admin']): ?><span class="badge-admin">Admin</span><?php endif; ?>
                <span class="badge-date"><?= $u['email'] ?></span>
            </summary>
            <form method="POST" class="admin-form">
                <input type="hidden" name="action" value="update_user">
                <input type="hidden" name="uid" value="<?= $u['id'] ?>">
                <div class="admin-form-row">
                    <label>Username</label>
                    <input type="text" name="username" value="<?= htmlspecialchars($u['username']) ?>" required>
                </div>
                <div class="admin-form-row">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($u['email']) ?>" required>
                </div>
                <div class="admin-form-row">
                    <label>New Password <small>(leave blank to keep)</small></label>
                    <input type="password" name="new_password" placeholder="New password">
                </div>
                <div class="admin-form-row">
                    <label><input type="checkbox" name="is_admin" <?= $u['is_admin']?'checked':'' ?>> Admin privileges</label>
                </div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin">Save Changes</button>
                    <?php if ($u['id'] !== (int)$_SESSION['user_id']): ?>
                    <button type="submit" name="action" value="delete_user" class="btn-admin btn-danger"
                        onclick="return confirm('Delete <?= htmlspecialchars($u['username']) ?>?')">Delete</button>
                    <?php endif; ?>
                </div>
            </form>
        </details>
        <?php endforeach; ?>
    </div>

    <?php elseif ($tab === 'news'): ?>
    <!-- ── NEWS ──────────────────────────────────────── -->
    <div class="admin-section">
        <h3>Add News Post</h3>
        <form method="POST" class="admin-form">
            <input type="hidden" name="action" value="add_news">
            <div class="admin-form-row"><label>Icon (emoji)</label><input type="text" name="icon" value="&#128591;" required></div>
            <div class="admin-form-row"><label>Date</label><input type="date" name="date_label" required></div>
            <div class="admin-form-row"><label>Title</label><input type="text" name="title" required></div>
            <div class="admin-form-row"><label>Body</label><textarea name="body" required></textarea></div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Add Post</button></div>
        </form>

        <h3 style="margin-top:36px">Existing News</h3>
        <?php foreach ($newsList as $n): ?>
        <details class="admin-details">
            <summary><?= htmlspecialchars($n['title']) ?> <span class="badge-date"><?= htmlspecialchars($n['date_label']) ?></span></summary>
            <form method="POST" class="admin-form">
                <input type="hidden" name="action" value="update_news">
                <input type="hidden" name="nid" value="<?= $n['id'] ?>">
                <div class="admin-form-row"><label>Icon</label><input type="text" name="icon" value="<?= htmlspecialchars($n['icon']) ?>"></div>
                <div class="admin-form-row"><label>Date</label><input type="date" name="date_label" value="<?= date('Y-m-d', strtotime($n['date_label'])) ?>"></div>
                <div class="admin-form-row"><label>Title</label><input type="text" name="title" value="<?= htmlspecialchars($n['title']) ?>"></div>
                <div class="admin-form-row"><label>Body</label><textarea name="body"><?= htmlspecialchars($n['body']) ?></textarea></div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin">Save</button>
                    <button type="submit" name="action" value="delete_news" class="btn-admin btn-danger"
                        onclick="return confirm('Delete this post?')">Delete</button>
                </div>
            </form>
        </details>
        <?php endforeach; ?>
    </div>

    <?php elseif ($tab === 'events'): ?>
    <!-- ── EVENTS ─────────────────────────────────────── -->
    <div class="admin-section">
        <h3>Add Event</h3>
        <form method="POST" class="admin-form">
            <input type="hidden" name="action" value="add_event">
            <div class="admin-form-row"><label>Date</label><input type="date" name="event_date" required></div>
            <div class="admin-form-row"><label>Event Title</label><input type="text" name="title" required></div>
            <div class="admin-form-row"><label>Time</label><input type="text" name="time" placeholder="e.g. 6:00 PM" required></div>
            <div class="admin-form-row"><label>Venue</label><input type="text" name="venue" required></div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Add Event</button></div>
        </form>

        <h3 style="margin-top:36px">Existing Events</h3>
        <?php foreach ($events as $e): ?>
        <details class="admin-details">
            <summary><?= htmlspecialchars($e['title']) ?> <span class="badge-date"><?= htmlspecialchars($e['event_date']) ?></span></summary>
            <form method="POST" class="admin-form">
                <input type="hidden" name="action" value="update_event">
                <input type="hidden" name="eid" value="<?= $e['id'] ?>">
                <div class="admin-form-row"><label>Date</label><input type="date" name="event_date" value="<?= date('Y-m-d', strtotime($e['event_date'])) ?>"></div>
                <div class="admin-form-row"><label>Title</label><input type="text" name="title" value="<?= htmlspecialchars($e['title']) ?>"></div>
                <div class="admin-form-row"><label>Time</label><input type="text" name="time" value="<?= htmlspecialchars($e['time']) ?>"></div>
                <div class="admin-form-row"><label>Venue</label><input type="text" name="venue" value="<?= htmlspecialchars($e['venue']) ?>"></div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin">Save</button>
                    <button type="submit" name="action" value="delete_event" class="btn-admin btn-danger"
                        onclick="return confirm('Delete this event?')">Delete</button>
                </div>
            </form>
        </details>
        <?php endforeach; ?>
    </div>

    <?php elseif ($tab === 'mass'): ?>
    <!-- ── SCHEDULE ──────────────────────────────── -->
    <div class="admin-section">
        <h3>Add Schedule Entry</h3>
        <form method="POST" class="admin-form">
            <input type="hidden" name="action" value="add_mass">
            <div class="admin-form-row">
                <label>Category</label>
                <select name="category">
                    <option value="weekly">Weekly Mass</option>
                    <option value="holyday">Holy Day</option>
                    <option value="office">Office Hours</option>
                </select>
            </div>
            <div class="admin-form-row"><label>Column 1 (Day / Holy Day)</label><input type="text" name="col1" required></div>
            <div class="admin-form-row"><label>Column 2 (Time / Masses)</label><input type="text" name="col2" required></div>
            <div class="admin-form-row"><label>Column 3 (Notes — optional)</label><input type="text" name="col3"></div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Add Entry</button></div>
        </form>

        <h3 style="margin-top:36px">Existing Schedule Entries</h3>
        <?php foreach ($masses as $m): ?>
        <details class="admin-details">
            <summary><?= htmlspecialchars($m['col1']) ?> <span class="badge-date"><?= $m['category'] ?></span></summary>
            <form method="POST" class="admin-form">
                <input type="hidden" name="action" value="update_mass">
                <input type="hidden" name="mid" value="<?= $m['id'] ?>">
                <div class="admin-form-row">
                    <label>Category</label>
                    <select name="category">
                        <?php foreach (['weekly'=>'Weekly Mass','holyday'=>'Holy Day','office'=>'Office Hours'] as $v=>$l): ?>
                        <option value="<?= $v ?>" <?= $m['category']===$v?'selected':'' ?>><?= $l ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="admin-form-row"><label>Column 1</label><input type="text" name="col1" value="<?= htmlspecialchars($m['col1']) ?>"></div>
                <div class="admin-form-row"><label>Column 2</label><input type="text" name="col2" value="<?= htmlspecialchars($m['col2']) ?>"></div>
                <div class="admin-form-row"><label>Column 3</label><input type="text" name="col3" value="<?= htmlspecialchars($m['col3'] ?? '') ?>"></div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin">Save</button>
                    <button type="submit" name="action" value="delete_mass" class="btn-admin btn-danger"
                        onclick="return confirm('Delete this entry?')">Delete</button>
                </div>
            </form>
        </details>
        <?php endforeach; ?>
    </div>

    <?php elseif ($tab === 'ministries'): ?>
    <!-- ── MINISTRIES ──────────────────────────────── -->
    <div class="admin-section">
        <h3>Add Ministry</h3>
        <form method="POST" class="admin-form">
            <input type="hidden" name="action" value="add_ministry">
            <div class="admin-form-row"><label>Icon (emoji)</label><input type="text" name="icon" value="&#128100;"></div>
            <div class="admin-form-row"><label>Title</label><input type="text" name="title" required></div>
            <div class="admin-form-row"><label>Description</label><textarea name="description" required></textarea></div>
            <div class="admin-form-row"><label>Sort Order</label><input type="number" name="sort_order" value="0"></div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Add Ministry</button></div>
        </form>

        <h3 style="margin-top:36px">Existing Ministries</h3>
        <?php foreach ($ministries as $mn): ?>
        <details class="admin-details">
            <summary><?= $mn['icon'] ?> <?= htmlspecialchars($mn['title']) ?></summary>
            <form method="POST" class="admin-form">
                <input type="hidden" name="action" value="update_ministry">
                <input type="hidden" name="mnid" value="<?= $mn['id'] ?>">
                <div class="admin-form-row"><label>Icon</label><input type="text" name="icon" value="<?= htmlspecialchars($mn['icon']) ?>"></div>
                <div class="admin-form-row"><label>Title</label><input type="text" name="title" value="<?= htmlspecialchars($mn['title']) ?>" required></div>
                <div class="admin-form-row"><label>Description</label><textarea name="description" required><?= htmlspecialchars($mn['description']) ?></textarea></div>
                <div class="admin-form-row"><label>Sort Order</label><input type="number" name="sort_order" value="<?= $mn['sort_order'] ?>"></div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin">Save</button>
                    <button type="submit" name="action" value="delete_ministry" class="btn-admin btn-danger"
                        onclick="return confirm('Delete this ministry?')">Delete</button>
                </div>
            </form>
        </details>
        <?php endforeach; ?>
    </div>

    <?php elseif ($tab === 'sacraments'): ?>
    <!-- ── SACRAMENTS ──────────────────────────────── -->
    <div class="admin-section">
        <h3>Add Sacrament</h3>
        <form method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="action" value="add_sacrament">
            <div class="admin-form-row"><label>Image</label><input type="file" name="simage" accept="image/*"></div>
            <div class="admin-form-row"><label>Name</label><input type="text" name="name" required></div>
            <div class="admin-form-row"><label>Label <small>(e.g. Sacraments of Initiation)</small></label><input type="text" name="label" required></div>
            <div class="admin-form-row"><label>Description</label><textarea name="description" required></textarea></div>
            <div class="admin-form-row"><label>Sort Order</label><input type="number" name="sort_order" value="0"></div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Add Sacrament</button></div>
        </form>

        <h3 style="margin-top:36px">Existing Sacraments</h3>
        <?php foreach ($sacraments as $s): ?>
        <details class="admin-details">
            <summary><?= htmlspecialchars($s['name']) ?> <span class="badge-date"><?= htmlspecialchars($s['label']) ?></span></summary>
            <form method="POST" enctype="multipart/form-data" class="admin-form">
                <input type="hidden" name="action" value="update_sacrament">
                <input type="hidden" name="sid" value="<?= $s['id'] ?>">
                <div class="admin-form-row"><label>Image <small>(leave blank to keep current)</small></label><input type="file" name="simage" accept="image/*"></div>
                <?php if ($s['img']): ?><div class="admin-form-row"><img src="<?= htmlspecialchars($s['img']) ?>" style="max-height:80px;"></div><?php endif; ?>
                <div class="admin-form-row"><label>Name</label><input type="text" name="name" value="<?= htmlspecialchars($s['name']) ?>" required></div>
                <div class="admin-form-row"><label>Label</label><input type="text" name="label" value="<?= htmlspecialchars($s['label']) ?>" required></div>
                <div class="admin-form-row"><label>Description</label><textarea name="description" required><?= htmlspecialchars($s['description']) ?></textarea></div>
                <div class="admin-form-row"><label>Sort Order</label><input type="number" name="sort_order" value="<?= $s['sort_order'] ?>"></div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin">Save</button>
                    <button type="submit" name="action" value="delete_sacrament" class="btn-admin btn-danger"
                        onclick="return confirm('Delete this sacrament?')">Delete</button>
                </div>
            </form>
        </details>
        <?php endforeach; ?>
    </div>

    <?php elseif ($tab === 'gallery'): ?>
    <!-- ── GALLERY ──────────────────────────────────── -->
    <div class="admin-section">
        <h3>Upload Gallery Photo</h3>
        <form method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="action" value="add_gallery">
            <div class="admin-form-row"><label>Image (JPG, PNG, GIF, WEBP)</label><input type="file" name="gimage" accept="image/*" required></div>
            <div class="admin-form-row"><label>Caption</label><input type="text" name="caption" placeholder="Optional caption"></div>
            <div class="admin-form-row"><label>Sort Order</label><input type="number" name="sort_order" value="0"></div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Upload</button></div>
        </form>

        <h3 style="margin-top:36px">Gallery Photos</h3>
        <div class="admin-image-grid">
            <?php foreach ($gallery as $g): ?>
            <div class="admin-image-item">
                <img src="images/<?= htmlspecialchars($g['filename']) ?>" alt="<?= htmlspecialchars($g['caption']) ?>">
                <p><?= htmlspecialchars($g['caption'] ?: $g['filename']) ?></p>
                <form method="POST">
                    <input type="hidden" name="action" value="delete_gallery">
                    <input type="hidden" name="gid" value="<?= $g['id'] ?>">
                    <button type="submit" class="btn-admin btn-danger btn-sm"
                        onclick="return confirm('Delete this photo?')">Delete</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php elseif ($tab === 'resources'): ?>
    <!-- ── RESOURCES ─────────────────────────────────── -->
    <div class="admin-section">
        <h3>Add Resource</h3>
        <form method="POST" class="admin-form">
            <input type="hidden" name="action" value="add_resource">
            <div class="admin-form-row">
                <label>Category</label>
                <select name="category">
                    <option value="document">Document</option>
                    <option value="faith">Faith Formation</option>
                    <option value="devotion">Devotion</option>
                </select>
            </div>
            <div class="admin-form-row"><label>Icon (emoji)</label><input type="text" name="icon" value="&#128196;"></div>
            <div class="admin-form-row"><label>Title</label><input type="text" name="title" required></div>
            <div class="admin-form-row"><label>URL <small>(documents &amp; faith links)</small></label><input type="text" name="url" value="#"></div>
            <div class="admin-form-row"><label>Schedule <small>(devotions only)</small></label><input type="text" name="col2" placeholder="e.g. Daily after 7:00 AM Mass"></div>
            <div class="admin-form-row"><label>Sort Order</label><input type="number" name="sort_order" value="0"></div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Add Resource</button></div>
        </form>

        <h3 style="margin-top:36px">Existing Resources</h3>
        <?php foreach ($resources as $r): ?>
        <details class="admin-details">
            <summary><?= htmlspecialchars($r['title']) ?> <span class="badge-date"><?= $r['category'] ?></span></summary>
            <form method="POST" class="admin-form">
                <input type="hidden" name="action" value="update_resource">
                <input type="hidden" name="rid" value="<?= $r['id'] ?>">
                <div class="admin-form-row">
                    <label>Category</label>
                    <select name="category">
                        <?php foreach (['document'=>'Document','faith'=>'Faith Formation','devotion'=>'Devotion'] as $v=>$l): ?>
                        <option value="<?= $v ?>" <?= $r['category']===$v?'selected':'' ?>><?= $l ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="admin-form-row"><label>Icon</label><input type="text" name="icon" value="<?= htmlspecialchars($r['icon'] ?? '') ?>"></div>
                <div class="admin-form-row"><label>Title</label><input type="text" name="title" value="<?= htmlspecialchars($r['title']) ?>" required></div>
                <div class="admin-form-row"><label>URL</label><input type="text" name="url" value="<?= htmlspecialchars($r['url'] ?? '#') ?>"></div>
                <div class="admin-form-row"><label>Schedule</label><input type="text" name="col2" value="<?= htmlspecialchars($r['col2'] ?? '') ?>"></div>
                <div class="admin-form-row"><label>Sort Order</label><input type="number" name="sort_order" value="<?= $r['sort_order'] ?>"></div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin">Save</button>
                    <button type="submit" name="action" value="delete_resource" class="btn-admin btn-danger"
                        onclick="return confirm('Delete this resource?')">Delete</button>
                </div>
            </form>
        </details>
        <?php endforeach; ?>
    </div>

    <?php elseif ($tab === 'images'): ?>
    <!-- ── IMAGES ─────────────────────────────────────── -->
    <div class="admin-section">
        <h3>Upload Image</h3>
        <form method="POST" enctype="multipart/form-data" class="admin-form">
            <input type="hidden" name="action" value="upload_image">
            <div class="admin-form-row">
                <label>Choose Image (JPG, PNG, GIF, WEBP)</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <div class="admin-form-actions"><button type="submit" class="btn-admin">Upload</button></div>
        </form>

        <h3 style="margin-top:36px">Current Images</h3>
        <div class="admin-image-grid">
            <?php foreach ($images as $img): ?>
            <div class="admin-image-item">
                <img src="images/<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($img) ?>">
                <p><?= htmlspecialchars($img) ?></p>
                <form method="POST">
                    <input type="hidden" name="action" value="delete_image">
                    <input type="hidden" name="filename" value="<?= htmlspecialchars($img) ?>">
                    <button type="submit" class="btn-admin btn-danger btn-sm"
                        onclick="return confirm('Delete <?= htmlspecialchars($img) ?>?')">Delete</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
