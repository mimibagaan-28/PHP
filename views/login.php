<?php require_once __DIR__ . '/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1 class="auth-title">Welcome Back</h1>
            <p class="auth-subtitle">Login to your account</p>
        </div>
        <div class="auth-body">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['success']) && $_GET['success'] == 'registered'): ?>
                <div class="alert alert-success">
                    Registration successful! Please login with your credentials.
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
                
                <p style="text-align: center; margin-top: 1rem; color: var(--text-secondary);">
                    Don't have an account? <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=register" style="color: var(--primary-color);">Register</a>
                </p>
                
                <p style="text-align: center; margin-top: 0.5rem;">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=forgot_password" style="color: var(--primary-color);">Forgot Password?</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
