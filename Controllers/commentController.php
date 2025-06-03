<?php
require_once __DIR__ . '/../Models/database.php';
require_once __DIR__ . '/../Models/comments.php';

class CommentController
{
    private $commentModel;

    public function __construct()
    {
        $pdo = (new Database())->getConnection();
        $this->commentModel = new Comment($pdo);
    }

    public function getComments($post_id)
    {
        try {
            return $this->commentModel->getByPost($post_id);
        } catch (Throwable $e) {
            return [];
        }
    }

    public function handleCommentSubmit($post_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $content = trim($_POST['content']);
            if (!empty($content)) {
                $this->commentModel->add($post_id, $_SESSION['user_id'], $content);
                header("Location: blog-p_$post_id.php");
                exit();
            }
        }
    }
}
