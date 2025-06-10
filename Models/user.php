<?php

class User
{
    private $db; // Připojení k databázi (PDO)

    public function __construct($db)
    {
        $this->db = $db; // Uložení databázového připojení do vlastnosti třídy
    }

    // Ověřuje, zda uživatel se zadaným uživatelským jménem již existuje
    public function existsByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT id FROM blog_users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch() !== false; // Vrací true, pokud existuje alespoň jeden záznam
    }

    // Ověřuje, zda uživatel se zadaným e-mailem již existuje
    public function existsByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT id FROM blog_users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }

    // Registruje nového uživatele (vloží do tabulky blog_users)
    public function register($username, $email, $password)
    {
        $stmt = $this->db->prepare("
            INSERT INTO blog_users (username, email, password)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([$username, $email, $password]); // Vrací true/false podle úspěšnosti dotazu
    }

    // Načte uživatele podle uživatelského jména (např. pro přihlášení)
    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM blog_users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Vrací asociativní pole s daty uživatele
    }

    // Načte všechny uživatele (např. pro výpis v administraci)
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM blog_users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Vrací pole všech uživatelů
    }

    // Smaže uživatele podle ID
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM blog_users WHERE id=?");
        return $stmt->execute([$id]);
    }
}
