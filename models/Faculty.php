<?php
require_once __DIR__ . '/../config/database.php';

class Faculty {
    private $conn;
    private $table_name = "faculty";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " 
                  (first_name, middle_name, last_name, age, gender, address, position, salary) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param("sssisssd", 
            $data['first_name'], 
            $data['middle_name'], 
            $data['last_name'], 
            $data['age'], 
            $data['gender'], 
            $data['address'], 
            $data['position'], 
            $data['salary']
        );
        
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $data) {
        $query = "UPDATE " . $this->table_name . " 
                  SET first_name=?, middle_name=?, last_name=?, age=?, gender=?, address=?, position=?, salary=? 
                  WHERE id=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssisssdi", 
            $data['first_name'], 
            $data['middle_name'], 
            $data['last_name'], 
            $data['age'], 
            $data['gender'], 
            $data['address'], 
            $data['position'], 
            $data['salary'],
            $id
        );
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
