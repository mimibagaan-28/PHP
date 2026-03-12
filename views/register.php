<?php require_once __DIR__ . '/header.php'; ?>

<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h1 class="auth-title">Create Account</h1>
            <p class="auth-subtitle">Join our CRUD system today</p>
        </div>
        <div class="auth-body">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 20px;">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name *</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" 
                           value="<?php echo isset($data['first_name']) ? htmlspecialchars($data['first_name']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="middle_name" class="form-label">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name" class="form-control" 
                           value="<?php echo isset($data['middle_name']) ? htmlspecialchars($data['middle_name']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name *</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" 
                           value="<?php echo isset($data['last_name']) ? htmlspecialchars($data['last_name']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="age" class="form-label">Age *</label>
                    <input type="number" id="age" name="age" class="form-control" 
                           value="<?php echo isset($data['age']) ? htmlspecialchars($data['age']) : ''; ?>" 
                           min="1" max="120" required>
                </div>

                <div class="form-group">
                    <label for="gender" class="form-label">Gender *</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?php echo isset($data['gender']) && $data['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo isset($data['gender']) && $data['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo isset($data['gender']) && $data['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           value="<?php echo isset($data['email']) ? htmlspecialchars($data['email']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">Address *</label>
                    <textarea id="address" name="address" class="form-control" rows="3" required><?php echo isset($data['address']) ? htmlspecialchars($data['address']) : ''; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="contact_number" class="form-label">Contact Number *</label>
                    <input type="tel" id="contact_number" name="contact_number" class="form-control" 
                           value="<?php echo isset($data['contact_number']) ? htmlspecialchars($data['contact_number']) : ''; ?>" 
                           pattern="[0-9]{10,15}" placeholder="10-15 digits" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" id="password" name="password" class="form-control" 
                           minlength="6" required>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
                
                <p style="text-align: center; margin-top: 1rem; color: var(--text-secondary);">
                    Already have an account? <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=login" style="color: var(--primary-color);">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
