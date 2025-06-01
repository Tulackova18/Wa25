<?php
class Comment {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getByPost($post_id) {
        $stmt = $this->db->prepare("
            SELECT c.id, c.content, c.created_at, u.username
            FROM blog_comments c
            JOIN blog_users u ON c.user_id = u.id
            WHERE c.post_id = ?
            ORDER BY c.created_at DESC
        ");
        $stmt->execute([$post_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($post_id, $user_id, $content) {
        $stmt = $this->db->prepare("
            INSERT INTO blog_comments (post_id, user_id, content)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$post_id, $user_id, $content]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM blog_comments WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
