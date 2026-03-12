<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD System - <?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Home'; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
</head>
<body>
    <header class="header">
        <nav class="navbar container">
            <a href="<?php echo BASE_URL; ?>/?page=home" class="navbar-brand">CRUD System</a>
            <ul class="navbar-nav">
                <li><a href="<?php echo BASE_URL; ?>/?page=home" class="nav-link">Home</a></li>
                <li><a href="<?php echo BASE_URL; ?>/?page=register" class="nav-link">Register</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="<?php echo BASE_URL; ?>/?page=faculty" class="nav-link">Faculty</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/?page=logout" class="nav-link">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?php echo BASE_URL; ?>/?page=login" class="nav-link">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    <main>
        <?php if (isset($_GET['success'])): ?>
            <div class="container">
                <div class="alert alert-success">
                    <?php
                    switch($_GET['success']) {
                        case 'registered': echo 'Registration successful! Please login.'; break;
                        case 'created': echo 'Faculty member added successfully!'; break;
                        case 'updated': echo 'Faculty member updated successfully!'; break;
                        case 'deleted': echo 'Faculty member deleted successfully!'; break;
                        default: echo 'Operation completed successfully!';
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="container">
                <div class="alert alert-danger">
                    <?php
                    switch($_GET['error']) {
                        case 'delete_failed': echo 'Failed to delete faculty member!'; break;
                        default: echo 'An error occurred!';
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>
