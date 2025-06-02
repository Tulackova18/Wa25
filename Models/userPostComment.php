<?php

class UserPostComment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Získat všechny komentáře pro konkrétní příspěvek
  public function getByPostId($user_post_id)
{
    $stmt = $this->pdo->prepare("SELECT c.id, c.user_id, c.content, c.created_at, u.username 
                                 FROM user_post_comments c 
                                 JOIN blog_users u ON c.user_id = u.id 
                                 WHERE c.user_post_id = ? 
                                 ORDER BY c.created_at DESC");
    $stmt->execute([$user_post_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Přidat nový komentář k příspěvku
    public function add($user_post_id, $user_id, $content)
    {
        $stmt = $this->pdo->prepare("INSERT INTO user_post_comments (user_post_id, user_id, content) 
                                     VALUES (?, ?, ?)");
        return $stmt->execute([$user_post_id, $user_id, $content]);
    }
}
