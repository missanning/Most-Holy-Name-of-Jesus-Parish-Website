<?php
require_once __DIR__ . '/../includes/db.php';

$error   = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm'] ?? '';

    if (strlen($username) < 3) {
        $error = 'Username must be at least 3 characters.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->fetch()) {
            $error = 'Username or email is already taken.';
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)")
                ->execute([$username, $email, $hash]);
            $success = 'Account created! You can now <a href="?page=login">sign in</a>.';
        }
    }
}
?>
<div class="auth-wrap">
    <div class="auth-box">
        <div class="auth-header">
            <span class="auth-ornament">&#9769;</span>
            <h2>Create Account</h2>
            <p>Join the Most Holy Name of Jesus Parish</p>
        </div>
        <?php if ($error): ?>
            <div class="auth-error"><?= htmlspecialchars($error) ?></div>
        <?php elseif ($success): ?>
            <div class="auth-success"><?= $success ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
            <input type="email" name="email" placeholder="Email Address" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            <input type="password" name="password" placeholder="Password (min. 6 characters)" required>
            <input type="password" name="confirm" placeholder="Confirm Password" required>
            <button type="submit">Create Account</button>
        </form>
        <p class="auth-switch">Already have an account? <a href="?page=login">Sign In</a></p>
    </div>
</div>
