<?php

class Database
{
    private $host = "localhost";
    private $db_name = "wa_projekt_lt";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );

            // DŮLEŽITÉ: zapnutí režimu výpisu chyb jako výjimek
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "<strong>Chyba připojení:</strong> " . $exception->getMessage();
        }

        return $this->conn;
    }
}

// Používání připojení:
$database = new Database();
$pdo = $database->getConnection();
