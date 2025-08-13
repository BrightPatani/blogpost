<?php
require_once 'config.php';
require_once 'controllers/PostController.php';
require_once 'controllers/UserController.php';

$controller = $_GET['controller'] ?? 'post';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($controller === 'post') {
    $postController = new PostController($pdo);
    if ($action === 'index') {
        $postController->index();
    } elseif ($action === 'create') {
        $postController->create();
    } elseif ($action === 'store') {
        $postController->store();
    } elseif ($action === 'edit' && $id) {
        $postController->edit($id);
    } elseif ($action === 'update' && $id) {
        $postController->update($id);
    } elseif ($action === 'delete' && $id) {
        $postController->delete($id);
    }
} elseif ($controller === 'user') {
    $userController = new UserController($pdo);
    if ($action === 'login') {
        $userController->login();
    } elseif ($action === 'register') {
        $userController->register();
    } elseif ($action === 'profile') {
        $userController->profile();
    } elseif ($action === 'updateProfile') {
        $userController->updateProfile();
    }
}
?>