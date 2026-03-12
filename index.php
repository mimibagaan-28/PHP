<?php
session_start();

define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/PHP');

require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/FacultyController.php';

$userController = new UserController();
$facultyController = new FacultyController();

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $users = $userController->getAllUsers();
        $faculty = $facultyController->getAllFaculty();
        include __DIR__ . '/views/home.php';
        break;
        
    case 'register':
        $result = $userController->register();
        $errors = $result['errors'] ?? [];
        $data = $result['data'] ?? [];
        include __DIR__ . '/views/register.php';
        break;
        
    case 'login':
        $result = $userController->login();
        $error = $result['error'] ?? null;
        include __DIR__ . '/views/login.php';
        break;
        
    case 'forgot_password':
        $result = $userController->forgotPassword();
        $success = $result['success'] ?? null;
        $error = $result['error'] ?? null;
        include __DIR__ . '/views/forgot_password.php';
        break;
        
    case 'logout':
        session_destroy();
        header('Location: index.php?page=login');
        exit();
        
    case 'faculty':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit();
        }
        $faculty_list = $facultyController->getAllFaculty();
        include __DIR__ . '/views/faculty.php';
        break;
        
    case 'add_faculty':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit();
        }
        $result = $facultyController->create();
        $errors = $result['errors'] ?? [];
        $data = $result['data'] ?? [];
        $faculty_list = $facultyController->getAllFaculty();
        include __DIR__ . '/views/faculty.php';
        break;
        
    case 'edit_faculty':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit();
        }
        
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?page=faculty');
            exit();
        }
        
        $faculty_member = $facultyController->getFacultyById($id);
        if (!$faculty_member) {
            header('Location: index.php?page=faculty');
            exit();
        }
        
        $result = $facultyController->update($id);
        $errors = $result['errors'] ?? [];
        $data = $result['data'] ?? [];
        $faculty_list = $facultyController->getAllFaculty();
        include __DIR__ . '/views/faculty.php';
        break;
        
    case 'delete_faculty':
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit();
        }
        
        $id = $_GET['id'] ?? null;
        if ($id) {
            $facultyController->delete($id);
        }
        break;
        
    default:
        include __DIR__ . '/views/home.php';
        break;
}
?>