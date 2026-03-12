<?php
require_once __DIR__ . '/../models/Faculty.php';
require_once __DIR__ . '/../config/database.php';

class FacultyController {
    private $faculty;
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->createTables();
        $this->faculty = new Faculty($this->db->getConnection());
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $this->validateInput($_POST['first_name']),
                'middle_name' => $this->validateInput($_POST['middle_name']),
                'last_name' => $this->validateInput($_POST['last_name']),
                'age' => (int)$_POST['age'],
                'gender' => $this->validateInput($_POST['gender']),
                'address' => $this->validateInput($_POST['address']),
                'position' => $this->validateInput($_POST['position']),
                'salary' => (float)$_POST['salary']
            ];

            $errors = $this->validateFacultyData($data);
            
            if (empty($errors)) {
                if ($this->faculty->create($data)) {
                    header("Location: index.php?page=faculty&success=created");
                    exit();
                } else {
                    $errors[] = "Failed to add faculty!";
                }
            }
            
            return ['errors' => $errors, 'data' => $data];
        }
        return [];
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $this->validateInput($_POST['first_name']),
                'middle_name' => $this->validateInput($_POST['middle_name']),
                'last_name' => $this->validateInput($_POST['last_name']),
                'age' => (int)$_POST['age'],
                'gender' => $this->validateInput($_POST['gender']),
                'address' => $this->validateInput($_POST['address']),
                'position' => $this->validateInput($_POST['position']),
                'salary' => (float)$_POST['salary']
            ];

            $errors = $this->validateFacultyData($data);
            
            if (empty($errors)) {
                if ($this->faculty->update($id, $data)) {
                    header("Location: index.php?page=faculty&success=updated");
                    exit();
                } else {
                    $errors[] = "Failed to update faculty!";
                }
            }
            
            return ['errors' => $errors, 'data' => $data];
        }
        return [];
    }

    public function delete($id) {
        if ($this->faculty->delete($id)) {
            header("Location: index.php?page=faculty&success=deleted");
            exit();
        } else {
            header("Location: index.php?page=faculty&error=delete_failed");
            exit();
        }
    }

    public function getAllFaculty() {
        return $this->faculty->getAll();
    }

    public function getFacultyById($id) {
        return $this->faculty->getById($id);
    }

    private function validateFacultyData($data) {
        $errors = [];

        if (empty($data['first_name'])) $errors[] = "First name is required!";
        if (empty($data['last_name'])) $errors[] = "Last name is required!";
        if (empty($data['age']) || $data['age'] < 1 || $data['age'] > 120) $errors[] = "Valid age is required!";
        if (empty($data['gender'])) $errors[] = "Gender is required!";
        if (empty($data['address'])) $errors[] = "Address is required!";
        if (empty($data['position'])) $errors[] = "Position is required!";
        if (empty($data['salary']) || $data['salary'] <= 0) $errors[] = "Valid salary is required!";

        return $errors;
    }

    private function validateInput($input) {
        return htmlspecialchars(trim($input));
    }
}
?>
