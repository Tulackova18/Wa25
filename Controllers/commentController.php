<?php
require_once __DIR__ . '/../Models/database.php';
require_once __DIR__ . '/../Models/comments.php'; // provádí operace s komentáři (např. načítání, přidávání)

class CommentController //Definuje třídu CommentController
{
    private $commentModel; // soukromá proměnná, do které uloží instanci modelu Comment

    public function __construct()
    {
        $pdo = (new Database())->getConnection(); //připojení k databázi
        $this->commentModel = new Comment($pdo);  //nový objekt comment 
    }
    //Zavolá metodu getByPost($post_id) z modelu Comment, která vrátí všechny komentáře k danému příspěvku
    public function getComments($post_id)
    {
        try {
            return $this->commentModel->getByPost($post_id);
        } catch (Throwable $e) {
            return [];
        }
    }

    public function handleCommentSubmit($post_id)
    {   //Spustí se, pokud byl formulář odeslán metodou POST a uživatel je přihlášen
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $content = trim($_POST['content']); //Z formuláře vezme obsah komentáře, odstraní mezery na začátku a konci
            if (!empty($content)) { //Pokračuje jen, pokud obsah není prázdný

                $this->commentModel->add($post_id, $_SESSION['user_id'], $content); //vloží do databáze 
                header("Location: blog-p_$post_id.php"); // přesměruje zpět na článek 
                exit();
            }
        }
    }
}
