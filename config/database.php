<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "crud_system";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function createTables() {
        $sql_users = "CREATE TABLE IF NOT EXISTS users (
            id INT(11) PRIMARY KEY AUTO_INCREMENT,
            first_name VARCHAR(50) NOT NULL,
            middle_name VARCHAR(50),
            last_name VARCHAR(50) NOT NULL,
            age INT(3) NOT NULL,
            gender ENUM('Male', 'Female', 'Other') NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            address TEXT NOT NULL,
            contact_number VARCHAR(20) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $sql_faculty = "CREATE TABLE IF NOT EXISTS faculty (
            id INT(11) PRIMARY KEY AUTO_INCREMENT,
            first_name VARCHAR(50) NOT NULL,
            middle_name VARCHAR(50),
            last_name VARCHAR(50) NOT NULL,
            age INT(3) NOT NULL,
            gender ENUM('Male', 'Female', 'Other') NOT NULL,
            address TEXT NOT NULL,
            position VARCHAR(100) NOT NULL,
            salary DECIMAL(10,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        $this->conn->query($sql_users);
        $this->conn->query($sql_faculty);
    }
}
?>
