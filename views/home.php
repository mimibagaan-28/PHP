<?php require_once __DIR__ . '/header.php'; ?>

<div class="dashboard-container">
    <div class="container">
        <h1 class="page-title">Welcome to CRUD System</h1>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo count($users); ?></div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo count($faculty); ?></div>
                <div class="stat-label">Total Faculty</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Registered Users
            </div>
            <div class="card-body">
                <?php if (empty($users)): ?>
                    <p>No users registered yet.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo $user['id']; ?></td>
                                    <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                                    <td><?php echo $user['age']; ?></td>
                                    <td><?php echo htmlspecialchars($user['gender']); ?></td>
                                    <td><?php echo htmlspecialchars($user['contact_number']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (isset($_SESSION['user_id'])): ?>
        <div class="card">
            <div class="card-header">
                Faculty Management
            </div>
            <div class="card-body">
                <p>Manage faculty records with full CRUD functionality.</p>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=faculty" class="btn btn-primary">Manage Faculty</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/footer.php'; ?>
