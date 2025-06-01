
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../Models/Database.php';
require_once '../Models/User.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    $db = (new Database())->getConnection();
    $userModel = new User($db);

    // Zpracování přihlášení
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            die('Vyplňte prosím všechna pole.');
        }

        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Úspěšné přihlášení
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

    
