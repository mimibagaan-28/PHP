<?php require_once __DIR__ . '/header.php'; ?>

<div class="dashboard-container">
    <div class="container">
        <h1 class="page-title">Faculty Management</h1>
        
        <div class="card">
            <div class="card-header">
                <?php echo isset($faculty_member) ? 'Edit Faculty Member' : 'Add New Faculty Member'; ?>
            </div>
            <div class="card-body">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding-left: 20px;">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo isset($faculty_member) ? $_SERVER['PHP_SELF'] . '?page=edit_faculty&id=' . $faculty_member['id'] : $_SERVER['PHP_SELF'] . '?page=add_faculty'; ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" 
                                       value="<?php echo isset($data['first_name']) ? htmlspecialchars($data['first_name']) : (isset($faculty_member['first_name']) ? htmlspecialchars($faculty_member['first_name']) : ''); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-control" 
                                       value="<?php echo isset($data['middle_name']) ? htmlspecialchars($data['middle_name']) : (isset($faculty_member['middle_name']) ? htmlspecialchars($faculty_member['middle_name']) : ''); ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" class="form-control" 
                                       value="<?php echo isset($data['last_name']) ? htmlspecialchars($data['last_name']) : (isset($faculty_member['last_name']) ? htmlspecialchars($faculty_member['last_name']) : ''); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="age" class="form-label">Age *</label>
                                <input type="number" id="age" name="age" class="form-control" 
                                       value="<?php echo isset($data['age']) ? htmlspecialchars($data['age']) : (isset($faculty_member['age']) ? htmlspecialchars($faculty_member['age']) : ''); ?>" 
                                       min="1" max="120" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender *</label>
                                <select id="gender" name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?php echo (isset($data['gender']) && $data['gender'] == 'Male') || (isset($faculty_member['gender']) && $faculty_member['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo (isset($data['gender']) && $data['gender'] == 'Female') || (isset($faculty_member['gender']) && $faculty_member['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                    <option value="Other" <?php echo (isset($data['gender']) && $data['gender'] == 'Other') || (isset($faculty_member['gender']) && $faculty_member['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="position" class="form-label">Position *</label>
                                <input type="text" id="position" name="position" class="form-control" 
                                       value="<?php echo isset($data['position']) ? htmlspecialchars($data['position']) : (isset($faculty_member['position']) ? htmlspecialchars($faculty_member['position']) : ''); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="salary" class="form-label">Salary *</label>
                                <input type="number" id="salary" name="salary" class="form-control" 
                                       value="<?php echo isset($data['salary']) ? htmlspecialchars($data['salary']) : (isset($faculty_member['salary']) ? htmlspecialchars($faculty_member['salary']) : ''); ?>" 
                                       min="0" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-label">Address *</label>
                        <textarea id="address" name="address" class="form-control" rows="3" required><?php echo isset($data['address']) ? htmlspecialchars($data['address']) : (isset($faculty_member['address']) ? htmlspecialchars($faculty_member['address']) : ''); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <?php echo isset($faculty_member) ? 'Update Faculty Member' : 'Add Faculty Member'; ?>
                    </button>
                    <?php if (isset($faculty_member)): ?>
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=faculty" class="btn btn-secondary">Cancel</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Faculty Members List
            </div>
            <div class="card-body">
                <?php if (empty($faculty_list)): ?>
                    <p>No faculty members found.</p>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($faculty_list as $faculty): ?>
                                <tr>
                                    <td><?php echo $faculty['id']; ?></td>
                                    <td><?php echo htmlspecialchars($faculty['first_name'] . ' ' . $faculty['middle_name'] . ' ' . $faculty['last_name']); ?></td>
                                    <td><?php echo $faculty['age']; ?></td>
                                    <td><?php echo htmlspecialchars($faculty['gender']); ?></td>
                                    <td><?php echo htmlspecialchars($faculty['position']); ?></td>
                                    <td>$<?php echo number_format($faculty['salary'], 2); ?></td>
                                    <td>
                                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=edit_faculty&id=<?php echo $faculty['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=delete_faculty&id=<?php echo $faculty['id']; ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('Are you sure you want to delete this faculty member?');">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.row {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
}

.col-md-4 {
    flex: 1;
}

.col-md-3 {
    flex: 1;
}

@media (max-width: 768px) {
    .row {
        flex-direction: column;
        gap: 0;
    }
}
</style>

<?php require_once __DIR__ . '/footer.php'; ?>
