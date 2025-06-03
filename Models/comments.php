<?php
class Comment
{
    private $db;

    public function __construct($pdo)
    {
        $this->db = $pdo;
    }

    // Přidání komentáře k článku nebo uživatelskému příspěvku
    public function add($postId, $userId, $content)
    {
        $stmt = $this->db->prepare("INSERT INTO blog_comments (post_id, user_id, content) VALUES (?, ?, ?)");
        return $stmt->execute([$postId, $userId, $content]);
    }

    // Získání komentářů podle ID článku/příspěvku a typu
    public function getByPost($postId)
    {
        $stmt = $this->db->prepare("SELECT c.*, u.username 
                                    FROM blog_comments c
                                    JOIN blog_users u ON c.user_id = u.id
                                    WHERE c.post_id = ? 
                                    ORDER BY c.created_at DESC");
        $stmt->execute([$postId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
