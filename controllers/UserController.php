<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/database.php';

class UserController {
    private $user;
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->createTables();
        $this->user = new User($this->db->getConnection());
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $this->validateInput($_POST['first_name']),
                'middle_name' => $this->validateInput($_POST['middle_name']),
                'last_name' => $this->validateInput($_POST['last_name']),
                'age' => (int)$_POST['age'],
                'gender' => $this->validateInput($_POST['gender']),
                'email' => $this->validateInput($_POST['email']),
                'address' => $this->validateInput($_POST['address']),
                'contact_number' => $this->validateInput($_POST['contact_number']),
                'password' => $_POST['password']
            ];

            $errors = $this->validateRegistration($data);
            
            if (empty($errors)) {
                if ($this->user->emailExists($data['email'])) {
                    $errors[] = "Email already exists!";
                } else {
                    if ($this->user->create($data)) {
                        header("Location: index.php?page=login&success=registered");
                        exit();
                    } else {
                        $errors[] = "Registration failed!";
                    }
                }
            }
            
            return ['errors' => $errors, 'data' => $data];
        }
        return [];
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->validateInput($_POST['email']);
            $password = $_POST['password'];
            
            $user = $this->user->login($email, $password);
            
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                header("Location: index.php?page=home");
                exit();
            } else {
                return ['error' => 'Invalid email or password!'];
            }
        }
        return [];
    }

    public function forgotPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->validateInput($_POST['email']);
            
            if ($this->user->emailExists($email)) {
                return ['success' => 'Password reset instructions have been sent to your email.'];
            } else {
                return ['error' => 'Email not found!'];
            }
        }
        return [];
    }

    public function getAllUsers() {
        return $this->user->getAll();
    }

    private function validateRegistration($data) {
        $errors = [];

        if (empty($data['first_name'])) $errors[] = "First name is required!";
        if (empty($data['last_name'])) $errors[] = "Last name is required!";
        if (empty($data['age']) || $data['age'] < 1 || $data['age'] > 120) $errors[] = "Valid age is required!";
        if (empty($data['gender'])) $errors[] = "Gender is required!";
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required!";
        if (empty($data['address'])) $errors[] = "Address is required!";
        if (empty($data['contact_number']) || !preg_match('/^[0-9]{10,15}$/', $data['contact_number'])) $errors[] = "Valid contact number is required!";
        if (empty($data['password']) || strlen($data['password']) < 6) $errors[] = "Password must be at least 6 characters!";

        return $errors;
    }

    private function validateInput($input) {
        return htmlspecialchars(trim($input));
    }
}
?>
