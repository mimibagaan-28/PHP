<?php
require_once __DIR__ . '/config/database.php';

echo "<h2>Setting up CRUD System Database</h2>";

try {
    $database = new Database();
    $conn = $database->getConnection();
    
    echo "<p style='color: green;'>✓ Database connection successful</p>";
    
    $database->createTables();
    echo "<p style='color: green;'>✓ Tables created successfully</p>";
    
    echo "<h3>Database Setup Complete!</h3>";
    echo "<p>You can now use the CRUD system:</p>";
    echo "<ul>";
    echo "<li><a href='index.php?page=register'>Register a new user</a></li>";
    echo "<li><a href='index.php?page=login'>Login to access faculty management</a></li>";
    echo "<li><a href='index.php?page=home'>View home page</a></li>";
    echo "</ul>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
    echo "<p>Please make sure:</p>";
    echo "<ul>";
    echo "<li>XAMPP is running</li>";
    echo "<li>MySQL service is started</li>";
    echo "<li>Database 'crud_system' exists (or create it manually)</li>";
    echo "</ul>";
}
?>
