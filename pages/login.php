<?php
require_once __DIR__ . '/../includes/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = trim($_POST['identifier'] ?? '');
    $password   = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1");
    $stmt->execute([$identifier, $identifier]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: ../index.php');
        exit;
    } else {
        $error = 'Invalid username/email or password.';
    }
}
?>
<div class="auth-wrap">
    <div class="auth-box">
        <div class="auth-header">
            <span class="auth-ornament">&#9769;</span>
            <h2>Welcome Back</h2>
            <p>Sign in to your parish account</p>
        </div>
        <?php if ($error): ?>
            <div class="auth-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="identifier" placeholder="Username or Email" required value="<?= htmlspecialchars($_POST['identifier'] ?? '') ?>">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>
        <p class="auth-switch">Don't have an account? <a href="?page=signup">Sign Up</a></p>
    </div>
</div>
