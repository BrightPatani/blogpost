<?php
class Post {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllPosts() {
        $stmt = $this->pdo->query("SELECT posts.*, users.username, users.profile_image FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($id, $user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = :id AND user_id = :user_id");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPost($user_id, $title, $content, $post_image) {
        $stmt = $this->pdo->prepare("INSERT INTO posts (user_id, title, content, post_image) VALUES (:user_id, :title, :content, :post_image)");
        $stmt->execute([
            'user_id' => $user_id,
            'title' => $title,
            'content' => $content,
            'post_image' => $post_image
        ]);
    }

    public function updatePost($id, $user_id, $title, $content, $post_image) {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = :title, content = :content, post_image = :post_image WHERE id = :id AND user_id = :user_id");
        $stmt->execute([
            'title' => $title,
            'content' => $content,
            'post_image' => $post_image,
            'id' => $id,
            'user_id' => $user_id
        ]);
    }

    public function deletePost($id, $user_id) {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = :id AND user_id = :user_id");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }
}
?>