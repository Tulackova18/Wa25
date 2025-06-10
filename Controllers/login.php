
<?php
//Zobrazení chyb 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Třídy pro připojení k databázi a práci s uživateli
require_once '../Models/Database.php';
require_once '../Models/User.php';

//Kontroluje, jestli session ještě neběží a spustí ji
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Vytvoří objekt třídy User, který bude pracovat s tabulkou uživatelů
$db = (new Database())->getConnection();
$userModel = new User($db);

// Zpracování přihlášení
if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Spouští přihlašovací logiku pouze v případě využití POST
    $username = trim($_POST['username']); //Získává hodnoty username a password z formuláře
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die('Vyplňte prosím všechna pole.');
    }

    //Pomocí modelu vyhledá uživatele v databázi podle uživatelského jména
    $user = $userModel->findByUsername($username);

    //Ověří heslo (porovná zadané heslo s hashovaným v DB)
    if ($user && password_verify($password, $user['password'])) {

        // Uloží informace o uživateli do session (je přihlášen)
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: ../Views/pages/blog.php");
        exit();
    } else {
        die('Neplatné přihlašovací údaje.');
    }
} else {
    die('Neplatný požadavek.');
}
