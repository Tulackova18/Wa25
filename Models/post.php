<?php
class Post
{
    private $conn; // Připojení k databázi (PDO)

    public function __construct($db)
    {
        $this->conn = $db; // Uložení připojení do vlastnosti třídy
    }

    // Vytvoří nový příspěvek (po ověření, že uživatel existuje)
    public function createPost($user_id, $title, $content)
    {
        // Ověření, že uživatel s daným ID existuje
        $checkUserSql = "SELECT COUNT(*) FROM blog_users WHERE id = :user_id";
        $checkStmt = $this->conn->prepare($checkUserSql);
        $checkStmt->bindParam(':user_id', $user_id);
        $checkStmt->execute();

        // Pokud uživatel neexistuje, loguje chybu a vrací false
        if ($checkStmt->fetchColumn() == 0) {
            error_log("User with ID $user_id does not exist in blog_users table");
            return false;
        }

        // SQL dotaz na vložení nového příspěvku
        $sql = "INSERT INTO blog_posts (user_id, title, content, created_at) VALUES (:user_id, :title, :content, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        // Provede dotaz a zachytí případné chyby
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating post: " . $e->getMessage());
            return false;
        }
    }

    // Načte všechny příspěvky spolu s uživatelskými jmény
    public function getAll()
    {
        try {
            $query = "SELECT blog_posts.*, blog_users.username 
                  FROM blog_posts 
                  JOIN blog_users ON blog_posts.user_id = blog_users.id 
                  ORDER BY blog_posts.created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Vrátí výsledek jako pole asociativních polí
        } catch (PDOException $e) {
            echo "Chyba při načítání veřejných příspěvků: " . $e->getMessage();
            return [];
        }
    }

    // Načte jeden příspěvek podle ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Vrací jeden záznam jako asociativní pole
    }

    // Smaže příspěvek podle ID
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM blog_posts WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Aktualizuje příspěvek (název a obsah) podle ID
    public function update($id, $title, $content)
    {
        $stmt = $this->conn->prepare("UPDATE blog_posts SET title = ?, content = ?, updated_at = NOW() WHERE id = ?");
        return $stmt->execute([$title, $content, $id]);
    }

    // Vrátí všechny příspěvky od konkrétního uživatele
    public function getUserPosts($userId)
    {
        try {
            $query = "SELECT * FROM blog_posts WHERE user_id = :user_id ORDER BY created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Vrací všechny příspěvky uživatele jako pole
        } catch (PDOException $e) {
            echo "Chyba při načítání příspěvků: " . $e->getMessage();
            return [];
        }
    }
}
