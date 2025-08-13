<?php
require_once 'models/Post.php';

class PostController {
    private $pdo;
    private $postModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->postModel = new Post($pdo);
    }

    public function index() {
        $posts = $this->postModel->getAllPosts();
        require_once 'views/layouts/main.php';
        require_once 'views/posts/index.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }
        require_once 'views/layouts/main.php';
        require_once 'views/posts/create.php';
    }

    public function store() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $user_id = $_SESSION['user_id'];
        $post_image = null;

        if (!empty($_FILES['post_image']['name'])) {
            $target_dir = "uploads/posts/";
            $image_name = time() . '_' . basename($_FILES['post_image']['name']);
            $target_file = $target_dir . $image_name;
            $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (in_array($image_type, ['jpg', 'jpeg', 'png', 'gif']) && $_FILES['post_image']['size'] <= 5000000) {
                if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file)) {
                    $post_image = $image_name;
                }
            }
        }

        if (!empty($title) && !empty($content)) {
            $this->postModel->createPost($user_id, $title, $content, $post_image);
            header('Location: index.php');
            exit();
        } else {
            echo "Please fill in all required fields.";
        }
    }

    public function edit($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $post = $this->postModel->getPostById($id, $_SESSION['user_id']);
        if (!$post) {
            header('Location: index.php');
            exit();
        }

        require_once 'views/layouts/main.php';
        require_once 'views/posts/edit.php';
    }

    public function update($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $user_id = $_SESSION['user_id'];
        $post = $this->postModel->getPostById($id, $user_id);

        if (!$post) {
            header('Location: index.php');
            exit();
        }

        $post_image = $post['post_image'];
        if (!empty($_FILES['post_image']['name'])) {
            $target_dir = "uploads/posts/";
            $image_name = time() . '_' . basename($_FILES['post_image']['name']);
            $target_file = $target_dir . $image_name;
            $image_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (in_array($image_type, ['jpg', 'jpeg', 'png', 'gif']) && $_FILES['post_image']['size'] <= 5000000) {
                if (move_uploaded_file($_FILES['post_image']['tmp_name'], $target_file)) {
                    if ($post['post_image'] && file_exists("uploads/posts/" . $post['post_image'])) {
                        unlink("uploads/posts/" . $post['post_image']);
                    }
                    $post_image = $image_name;
                }
            }
        }

        if (!empty($title) && !empty($content)) {
            $this->postModel->updatePost($id, $user_id, $title, $content, $post_image);
            header('Location: index.php');
            exit();
        } else {
            echo "Please fill in all required fields.";
        }
    }

    public function delete($id) {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            exit();
        }

        $post = $this->postModel->getPostById($id, $_SESSION['user_id']);
        if ($post) {
            if ($post['post_image'] && file_exists("uploads/posts/" . $post['post_image'])) {
                unlink("uploads/posts/" . $post['post_image']);
            }
            $this->postModel->deletePost($id, $_SESSION['user_id']);
        }

        header('Location: index.php');
        exit();
    }
}
?>