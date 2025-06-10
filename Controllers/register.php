
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Models/database.php';
require_once '../Models/user.php';

session_start();

// Připojení k databázi a model
$db = (new Database())->getConnection();
$userModel = new User($db);

// Validace POST dat a načtení dat 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Kontrola povinných polí
    if (empty($username) || empty($password) || empty($password_confirm)) {
        die('Vyplňte prosím všechna povinná pole.');
    }

    // Ověření, že se hesla shodují
    if ($password !== $password_confirm) {
        die('Hesla se neshodují.');
    }

    // Kontrola, zda uživatelské jméno již neexistuje
    if ($userModel->existsByUsername($username)) {
        die('Uživatelské jméno je již obsazené.');
    }

    if ($userModel->existsByEmail($email)) {
        die('Email je již obsazený.');
    }

    // Zahashování hesla (bezpečné uložení)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Registrace nového uživatele
    if ($userModel->register($username, $email, $hashedPassword)) {
        header("Location: ../Views/auth/login.php");
        exit();
    } else {
        die('Registrace se nezdařila.');
    }
} else {
    die('Neplatný požadavek.');
}
