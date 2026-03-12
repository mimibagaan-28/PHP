<?php require_once __DIR__ . '/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1 class="auth-title">Forgot Password</h1>
            <p class="auth-subtitle">Reset your password</p>
        </div>
        <div class="auth-body">
            <?php if (isset($success)): ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                    <small style="color: var(--text-secondary);">Enter your registered email address to receive password reset instructions.</small>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Send Reset Instructions</button>
                
                <p style="text-align: center; margin-top: 1rem; color: var(--text-secondary);">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=login" style="color: var(--primary-color);">Back to Login</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
