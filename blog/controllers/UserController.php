<?php
require_once 'models/User.php';

class UserController {
    private $pdo;
    private $userModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userModel = new User($pdo);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $user = $this->userModel->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: index.php');
                exit();
            } else {
                $error = "Invalid username or password.";
            }
        }

        require_once 'views/layouts/main.php';
        require_once 'views/auth/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            try {
                $this->userModel->register($username, $password);
                header('Location: index.php?controller=user&action=login');
                exit();
            } catch (PDOException $e) {
                $error = "Username already exists.";
            }
        }

        require_once 'views/layouts/main.php';
        require_once 'views/auth/register.php';
    }

    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);
        require_once 'views/layouts/main.php';
        require_once 'views/profile/profile.php';
    }

    public function updateProfile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $user = $this->userModel->getUserById($user_id);

        if (!empty($_FILES['profile_image']['name'])) {
            $target_dir = "uploads/profiles/";
            $image_name = time() . '_' . basename($_FILES['profile_image']['name']);
            $target_file = $target_dir . $image_name;
            $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (in_array($image_type, ['jpg', 'jpeg', 'png', 'gif']) && $_FILES['profile_image']['size'] <= 5000000) {
                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                    if ($user['profile_image'] && file_exists("uploads/profiles/" . $user['profile_image'])) {
                        unlink("uploads/profiles/" . $user['profile_image']);
                    }
                    $this->userModel->updateProfileImage($user_id, $image_name);
                }
            }
        }

        header('Location: index.php?controller=user&action=profile');
        exit();
    }
}
?>